<?php

namespace App\Http\Controllers;

use App\Models\Permanent;
use App\Models\Mession;
use App\Models\Car;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use DB;

class PermanentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __constract()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permanents = Permanent::latest()->paginate(6);
        $ldate = date('Y-m-d');

        return view('permanent.index',compact('permanents'));
    }

    public function trashedPermanents()
    {
        $permanents = Permanent::onlyTrashed()->latest()->paginate(6);
        return view('permanent.trash',compact('permanents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee;
        $car = new Car;
        $mats = Car::select('immatriculation')->whereIn('propriete',["Bon Etat","Moyen"])->get();
        $mats2 = Permanent::select('immatriculation')->where('statut','=', 'active')->get();
        $mats3 = Mession::select('immatriculation')->whereIn('statut',["active","En Attendant","En Retard"])->get();

        // dd($mats2);
        // $mats = $mats->union($mats2);
        // $mats->forget(0);
        // dd($mats);

        // dd($mats->count());

        // for ($i=0; $i < $mats->count(); $i++) { 
        //     for ($j=0; $j < $mats2->count(); $j++) { 
        //         if($mats[$i]->immatriculation == $mats2[$j]->immatriculation){
        //             // dd($mats[$i]);
        //             $mats->forget($i);
        //         }
        //     }
        // }
        foreach ($mats as $key => $value) {
            foreach ($mats2 as $key2 => $value2) {
                if($value->immatriculation == $value2->immatriculation){
                    // dd($value);
                    $mats->forget($key);
                }
            }
        }
        foreach ($mats as $key => $value) {
            foreach ($mats3 as $key2 => $value2) {
                if($value->immatriculation == $value2->immatriculation){
                    // dd($value);
                    $mats->forget($key);
                }
            }
        }
        // dd($mats->all());
        $cins = Employee::select('cin')->get();
        $cins2 = Permanent::select('cin')->where('statut','=', 'active')->get();
        $cins3 = Mession::select('cin')->whereIn('statut',["active","En Attendant","En Retard"])->get();

        foreach ($cins as $key => $value) {
            foreach ($cins2 as $key2 => $value2) {
                if($value->cin == $value2->cin){
                    // dd($value);
                    $cins->forget($key);
                }
            }
        }
        foreach ($cins as $key => $value) {
            foreach ($cins3 as $key2 => $value2) {
                if($value->cin == $value2->cin){
                    // dd($value);
                    $cins->forget($key);
                }
            }
        }
        return view('permanent.create',compact('employee','mats','cins','car'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'immatriculation'=>'required',
            'cin'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'job'=>'required',
            'date_acquisition_location'=>'required|date',
            'note'=>'nullable',
            'statut'=>'required'
        ]);
        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$request->immatriculation)->get();
                // dd($test );
        foreach($test as $t){
            if($test->count() > 0){
                return redirect()->route('permanent.create')->with('failed0','Cette vehicule est '.$t->propriete.'!');
            }
        }
        $test1 = Permanent::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test1->count() );
        if($test1->count() > 0){
            return redirect()->route('permanent.create')->with('failed1','Cette vehicule non disponible!');
        }
        $test2 = Permanent::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test2->count() );
        if($test2->count() > 0){
            return redirect()->route('permanent.create')->with('failed2',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }
        $test3 = Mession::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test3->count() );
        if($test3->count() > 0){
            return redirect()->route('permanent.create')->with('failed3',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        
        $test4 = Mession::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test->count() );
        if($test4->count() > 0){
            return redirect()->route('permanent.create')->with('failed1','Cette vehicule non disponible!');
        }
        $permanent = Permanent::create($request->all());
        return redirect()->route('permanent.index')->with('success','L\'Affectaion a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permanent  $permanent
     * @return \Illuminate\Http\Response
     */
    public function show(Permanent $permanent)
    {
        $data = Car::where('immatriculation',$permanent->immatriculation)->first();
        $dataEmp = Employee::where('cin',$permanent->cin)->first();
        return view('permanent.show',compact('permanent','data','dataEmp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permanent  $permanent
     * @return \Illuminate\Http\Response
     */
    public function edit(Permanent $permanent)
    {
        $employee = new Employee;
        $data = Car::where('immatriculation',$permanent->immatriculation)->first();
        $dataEmp = Employee::where('cin',$permanent->cin)->first();
        $mats = Car::select('immatriculation')->get();
        $cins = Employee::select('cin')->get();
        return view('permanent.edit',compact('permanent','mats','data','dataEmp','cins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permanent  $permanent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permanent $permanent)
    {
        $validator = Validator::make($request->all(), [
            'immatriculation'=>'required',
            'cin'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'job'=>'required',
            'date_acquisition_location'=>'required|date',
            'note'=>'nullable',
            'statut'=>'required'
        ]);

        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$request->immatriculation)->get();
        // dd($test->count() );
        if($test->count() > 0){
            return redirect()->route('permanent.edit',$permanent->id)->with('failed1','Cette vehicule disponible!');
        }
        $test1 = Permanent::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)
        ->where('id','!=',$permanent->id)->get();
        // dd($test->count() );
        if($test->count() > 0){
            return redirect()->route('permanent.edit',$permanent->id)->with('failed1','Cette vehicule non disponible!');
        }
        $test2 = Permanent::where('statut','!=',"complété")->where('cin',$request->cin)
        ->where('id','!=',$permanent->id)->get();
        // dd($test2->count() );
        if($test2->count() > 0){
            return redirect()->route('permanent.edit',$permanent->id)->with('failed2',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        $test3 = Mession::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test3->count() );
        if($test3->count() > 0){
            return redirect()->route('permanent.edit',$permanent->id)->with('failed3',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        $test4 = Mession::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test4->count() );
        if($test4->count() > 0){
            return redirect()->route('permanent.edit',$permanent->id)->with('failed1','Cette vehicule non disponible!');
        }

        $permanent->update($request->all());
        return redirect()->route('permanent.index')->with('success','L\'Affectaion a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permanent  $permanent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permanent $permanent)
    {
        //
    }

    public function softDelete($id)
    {
        // $retard = DB::table('permanents')->update(['statut'=> "complété"]);
        $permanent = Permanent::find($id)->delete();
        return redirect()->route('permanent.index')->with('success','L\'Affectaion a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $permanents = Permanent::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('permanent.trash')->with('success','L\'Affectaion a été supprimé avec succès!');
    }

    public function restorePermanent($id)
    {
        $permanents = Permanent::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('permanent.trash')->with('success','L\'Affectaion  a été restauré à partir de la corbeille avec succès!');
    }

    public function search(Request $request)
    {
        $permanent = Permanent::where('immatriculation','Like','%'.$request->get('searchQuest').'%')->
        orwhere('cin','Like','%'.$request->get('searchQuest').'%')->
        orWhere('first_name','Like','%'.$request->get('searchQuest').'%')->
        orWhere('last_name','Like','%'.$request->get('searchQuest').'%')->
        orWhere('statut','Like','%'.$request->get('searchQuest').'%')->
        orWhere('phone','Like','%'.$request->get('searchQuest').'%')->get();
        
        return json_encode($permanent);
    }

    public function searchTrash(Request $request)
    {
        $permanent = Permanent::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
        $permanent1 = Permanent::onlyTrashed()->where('cin','Like','%'.$request->get('searchQuest').'%')->get();
        $permanent2 = Permanent::onlyTrashed()->where('first_name','Like','%'.$request->get('searchQuest').'%')->get();
        $permanent3 = Permanent::onlyTrashed()->where('last_name','Like','%'.$request->get('searchQuest').'%')->get();
        $permanent4 = Permanent::onlyTrashed()->where('phone','Like','%'.$request->get('searchQuest').'%')->get();
        $permanent5 = Permanent::onlyTrashed()->where('statut','Like','%'.$request->get('searchQuest').'%')->get();

        $permanent = $permanent->union($permanent1);
        $permanent = $permanent->union($permanent2);
        $permanent = $permanent->union($permanent3);
        $permanent = $permanent->union($permanent4);
        $permanent = $permanent->union($permanent5);

        return json_encode($permanent);
    }

    public function chosePer($id)
    {        
        // $cins = Employee::select('cin')->get();
        // $mats = Car::select('immatriculation')->get();
        $employee = Employee::where('id',$id)->first();
        // // dd($cins);
        // return view('permanent.create',compact('mats','cins','employee'));


        $mats = Car::select('immatriculation')->whereIn('propriete',["Bon Etat","Moyen"])->get();
        $mats2 = Permanent::select('immatriculation')->where('statut','=', 'active')->get();
        $mats3 = Mession::select('immatriculation')->whereIn('statut',["active","En Attendant","En Retard"])->get();


        foreach ($mats as $key => $value) {
            foreach ($mats2 as $key2 => $value2) {
                if($value->immatriculation == $value2->immatriculation){
                    // dd($value);
                    $mats->forget($key);
                }
            }
        }
        foreach ($mats as $key => $value) {
            foreach ($mats3 as $key2 => $value2) {
                if($value->immatriculation == $value2->immatriculation){
                    // dd($value);
                    $mats->forget($key);
                }
            }
        }
        // dd($mats->all());
        $cins = Employee::select('cin')->get();
        $cins2 = Permanent::select('cin')->where('statut','=', 'active')->get();
        $cins3 = Mession::select('cin')->whereIn('statut',["active","En Attendant","En Retard"])->get();

        foreach ($cins as $key => $value) {
            foreach ($cins2 as $key2 => $value2) {
                if($value->cin == $value2->cin){
                    // dd($value);
                    $cins->forget($key);
                }
            }
        }
        foreach ($cins as $key => $value) {
            foreach ($cins3 as $key2 => $value2) {
                if($value->cin == $value2->cin){
                    // dd($value);
                    $cins->forget($key);
                }
            }
        }
        $car = new Car;
        return view('permanent.create',compact('employee','mats','cins','car'));
    }

    public function getDetails($id = 0)
    {
        $data = Car::where('immatriculation',$id)->first();
        return response()->json($data);
    }

    public function getDetailsMess($id = 0)
    {
        $dataMess = Employee::where('cin',$id)->first();
        return response()->json($dataMess);
    }

    public function affectaionDoc($id)
    {
        $permanent = Permanent::where('id',$id)->first();  
        $data = Car::where('immatriculation',$permanent->immatriculation)->first();
        $dataEmp = Employee::where('cin',$permanent->cin)->first();
        $pdf = PDF::loadView('permanent.affectaionDoc',compact('permanent','data','dataEmp'));
        return $pdf->download("affectaion_".$permanent->first_name.'_'.$permanent->first_name.'_'.$permanent->immatriculation.'.pdf');
        // return view('permanent.ordreMission',compact('permanent','data','dataEmp'));
    }

    public function permanentFinished()
    {
        $retard = DB::table('permanents')->update(['statut'=> "complété"]);

        return redirect()->route('permanent.index')->with('success','Statut de L\'Affectaion  a été modifier avec succès!');
    }

    public function export()
    {
        return (new FastExcel(Permanent::all()))->download('Affectaions.xlsx',function($affec){
            return ['id' => $affec->id,
            'CIN' => $affec->cin,
            'Prénom' => $affec->first_name,
            'Nom' => $affec->last_name,
            'Numéro Téléphone' => $affec->phone,
            'Fonction' => $affec->job,
            'Immatriculation' => $affec->immatriculation,
            'Date Acquisition' => $affec->date_acquisition_location,
            'Ce véhicule est affecté avec' => $affec->note,
            'Statut' => $affec->statut
        ];
        });
    } 
    public function exportSearch($searchQuest)
    {
        
        $permanent = Permanent::where('immatriculation','Like','%'.$searchQuest.'%')->
        orwhere('cin','Like','%'.$searchQuest.'%')->
        orWhere('first_name','Like','%'.$searchQuest.'%')->
        orWhere('last_name','Like','%'.$searchQuest.'%')->
        orWhere('statut','Like','%'.$searchQuest.'%')->
        orWhere('phone','Like','%'.$searchQuest.'%')->get();
        return (new FastExcel($permanent))->download('Affectaions.xlsx',function($affec){
            return ['id' => $affec->id,
            'CIN' => $affec->cin,
            'Prénom' => $affec->first_name,
            'Nom' => $affec->last_name,
            'Numéro Téléphone' => $affec->phone,
            'Fonction' => $affec->job,
            'Immatriculation' => $affec->immatriculation,
            'Date Acquisition' => $affec->date_acquisition_location,
            'Ce véhicule est affecté avec' => $affec->note,
            'Statut' => $affec->statut
        ];
        });
    } 
}
