<?php

namespace App\Http\Controllers;

use App\Models\Mession;
use App\Models\Permanent;
use App\Models\Car;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use DB;

class MessionController extends Controller
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
        $messions = Mession::latest()->paginate(6);
        $ldate = date('Y-m-d');

        $active = DB::table('messions')->where("date_depart", '<=',  $ldate)
        ->where("statut", '=',  "En Attendant")
        ->update(['statut'=> "active"]);

        $retard = DB::table('messions')->where("date_retour", '<=',  $ldate)
        ->where("statut", '=',  "active")
        ->update(['statut'=> "En Retard"]);

        return view('mession.index',compact('messions'));
    }

    public function trashedMessions()
    {
        $messions = Mession::onlyTrashed()->latest()->paginate(6);
        return view('mession.trash',compact('messions'));
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
        return view('mession.create',compact('employee','mats','cins','car'));
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
            'date_depart'=>'required|date|after_or_equal:date_acquisition_location',
            'date_retour'=>'required|date|after_or_equal:date_depart',
            'type_mission'=>'required',
            'destination'=>'nullable',
            'distance_parcourue'=>'nullable',
            'statut'=>'required'
        ]);
        // $testArr = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$request->immatriculation)->get()->toArray();
        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$request->immatriculation)->get();
                // dd($test );
        foreach($test as $t){
            if($test->count() > 0){
                return redirect()->route('mession.create')->with('failed0','Cette vehicule est '.$t->propriete.'!');
            }
        }
        $test1 = Mession::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test1->count() );
        if($test1->count() > 0){
            return redirect()->route('mession.create')->with('failed1','Cette vehicule non disponible!');
        }
        $test2 = Mession::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test2->count() );
        if($test2->count() > 0){
            return redirect()->route('mession.create')->with('failed2',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        
        $test3 = Permanent::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test3->count() );
        if($test3->count() > 0){
            return redirect()->route('mession.create')->with('failed3',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        $test4 = Permanent::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test4->count() );
        if($test4->count() > 0){
            return redirect()->route('mession.create')->with('failed1','Cette vehicule non disponible!');
        }
        $mession = Mession::create($request->all());
        return redirect()->route('mession.index')->with('success','L\'Affectaion a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mession  $mession
     * @return \Illuminate\Http\Response
     */
    public function show(Mession $mession)
    {
        $data = Car::where('immatriculation',$mession->immatriculation)->first();
        $dataEmp = Employee::where('cin',$mession->cin)->first();
        return view('mession.show',compact('mession','data','dataEmp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mession  $mession
     * @return \Illuminate\Http\Response
     */
    public function edit(Mession $mession)
    {
        $employee = new Employee;
        $data = Car::where('immatriculation',$mession->immatriculation)->first();
        $dataEmp = Employee::where('cin',$mession->cin)->first();
        $mats = Car::select('immatriculation')->get();
        $cins = Employee::select('cin')->get();
        return view('mession.edit',compact('mession','mats','data','dataEmp','cins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mession  $mession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mession $mession)
    {
        $validator = Validator::make($request->all(), [
            'immatriculation'=>'required',
            'cin'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'job'=>'required',
            'date_acquisition_location'=>'required|date',
            'date_depart'=>'required|date|after_or_equal:date_acquisition_location',
            'date_retour'=>'required|date|after_or_equal:date_depart',
            'type_mission'=>'required',
            'destination'=>'nullable',
            'distance_parcourue'=>'nullable',
            'statut'=>'required'
        ]);

        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$request->immatriculation)->get();
        // dd($test->count() );
        if($test->count() > 0){
            return redirect()->route('mession.edit',$mession->id)->with('failed1','Cette vehicule disponible!');
        }
        $test1 = Mession::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)
        ->where('id','!=',$mession->id)->get();
        // dd($test->count() );
        if($test->count() > 0){
            return redirect()->route('mession.edit',$mession->id)->with('failed1','Cette vehicule non disponible!');
        }
        $test2 = Mession::where('statut','!=',"complété")->where('cin',$request->cin)
        ->where('id','!=',$mession->id)->get();
        // dd($test2->count() );
        if($test2->count() > 0){
            return redirect()->route('mession.edit',$mession->id)->with('failed2',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        $test3 = Permanent::where('statut','!=',"complété")->where('cin',$request->cin)->get();
        // dd($test3->count() );
        if($test3->count() > 0){
            return redirect()->route('mession.edit',$mession->id)->with('failed3',$request->first_name.' '.$request->last_name.' a déjà une affectation non complété!');
        }

        $test4 = Permanent::where('statut','!=',"complété")->where('immatriculation',$request->immatriculation)->get();
        // dd($test4->count() );
        if($test4->count() > 0){
            return redirect()->route('mession.edit',$mession->id)->with('failed1','Cette vehicule non disponible!');
        }

        $mession->update($request->all());
        return redirect()->route('mession.index')->with('success','L\'Affectaion a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mession  $mession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mession $mession)
    {
        //
    }

    public function softDelete($id)
    {
        // $retard = DB::table('messions')->update(['statut'=> "complété"]);
        $mession = Mession::find($id)->delete();
        return redirect()->route('mession.index')->with('success','L\'Affectaion a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $messions = Mession::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('mession.trash')->with('success','L\'Affectaion a été supprimé avec succès!');
    }

    public function restoreMession($id)
    {
        $messions = Mession::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('mession.trash')->with('success','L\'Affectaion  a été restauré à partir de la corbeille avec succès!');
    }

    public function search(Request $request)
    {
        $mession = Mession::where('immatriculation','Like','%'.$request->get('searchQuest').'%')->
        orwhere('cin','Like','%'.$request->get('searchQuest').'%')->
        orWhere('first_name','Like','%'.$request->get('searchQuest').'%')->
        orWhere('last_name','Like','%'.$request->get('searchQuest').'%')->
        orWhere('statut','Like','%'.$request->get('searchQuest').'%')->
        orWhere('phone','Like','%'.$request->get('searchQuest').'%')->get();
        
        return json_encode($mession);
    }

    public function searchTrash(Request $request)
    {
        $mession = Mession::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
        $mession1 = Mession::onlyTrashed()->where('cin','Like','%'.$request->get('searchQuest').'%')->get();
        $mession2 = Mession::onlyTrashed()->where('first_name','Like','%'.$request->get('searchQuest').'%')->get();
        $mession3 = Mession::onlyTrashed()->where('last_name','Like','%'.$request->get('searchQuest').'%')->get();
        $mession4 = Mession::onlyTrashed()->where('phone','Like','%'.$request->get('searchQuest').'%')->get();
        $mession5 = Mession::onlyTrashed()->where('statut','Like','%'.$request->get('searchQuest').'%')->get();

        $mession = $mession->union($mession1);
        $mession = $mession->union($mession2);
        $mession = $mession->union($mession3);
        $mession = $mession->union($mession4);
        $mession = $mession->union($mession5);

        return json_encode($mession);
    }

    public function choseAffecType($id)
    {   $dataEmp = Employee::where('id',$id)->first();
        $test1 = Permanent::select('cin')->where('cin',$dataEmp->cin)->where('statut','=', 'active')->get();
        $test2 = Mession::select('cin')->where('cin',$dataEmp->cin)->whereIn('statut',["active","En Attendant","En Retard"])->get(); 
        if($test1->count() > 0 || $test2->count() > 0){
            return redirect()->route('employee.index')->with('failed1',$dataEmp->first_name.' '.$dataEmp->last_name.' a déjà une affectation!');
        }  
        return view('choseAffecType',compact('id'));
    }

    public function choseMiss($id)
    {        
        // $cins = Employee::select('cin')->get();
        // $mats = Car::select('immatriculation')->get();
        $employee = Employee::where('id',$id)->first();
        // // dd($cins);
        // return view('mession.create',compact('mats','cins','employee'));




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
        return view('mession.create',compact('car','employee','mats','cins'));
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

    public function ordreMession($id)
    {
        $mession = Mession::where('id',$id)->first();  
        $data = Car::where('immatriculation',$mession->immatriculation)->first();
        $dataEmp = Employee::where('cin',$mession->cin)->first();
        $pdf = PDF::loadView('mession.ordreMission',compact('mession','data','dataEmp'));
        return $pdf->download("order_mission_".$mession->first_name.'_'.$mession->first_name.'_'.$mession->immatriculation.'.pdf');
        // return view('mession.ordreMission',compact('mession','data','dataEmp'));
    }

    public function messionFinished()
    {
        $retard = DB::table('messions')->update(['statut'=> "complété"]);

        return redirect()->route('mession.index')->with('success','Statut de L\'Affectaion  a été modifier avec succès!');
    }

    public function export()
    {
        return (new FastExcel(Mession::all()))->download('Missions.xlsx',function($miss){
            return ['id' => $miss->id,
            'CIN' => $miss->cin,
            'Prénom' => $miss->first_name,
            'Nom' => $miss->last_name,
            'Numéro Téléphone' => $miss->phone,
            'Fonction' => $miss->job,
            'Immatriculation' => $miss->immatriculation,
            'Date Acquisition' => $miss->date_acquisition_location,
            'Date de Départ' => $miss->totaldate_departe_HT,
            'Date de Retour' => $miss->date_retour,
            'Type de Mission' => $miss->type_mission,
            'Destination' => $miss->destination,
            'Distance Parcourue' => $miss->distance_parcourue,
            'Statut' => $miss->statut
        ];
        });
    } 
    public function exportSearch($searchQuest)
    {
        $mession = Mession::where('immatriculation','Like','%'.$searchQuest.'%')->
        orwhere('cin','Like','%'.$searchQuest.'%')->
        orWhere('first_name','Like','%'.$searchQuest.'%')->
        orWhere('last_name','Like','%'.$searchQuest.'%')->
        orWhere('statut','Like','%'.$searchQuest.'%')->
        orWhere('phone','Like','%'.$searchQuest.'%')->get();
        return (new FastExcel($mession))->download('Missions.xlsx',function($miss){
            return ['id' => $miss->id,
            'CIN' => $miss->cin,
            'Prénom' => $miss->first_name,
            'Nom' => $miss->last_name,
            'Numéro Téléphone' => $miss->phone,
            'Fonction' => $miss->job,
            'Immatriculation' => $miss->immatriculation,
            'Date Acquisition' => $miss->date_acquisition_location,
            'Date de Départ' => $miss->totaldate_departe_HT,
            'Date de Retour' => $miss->date_retour,
            'Type de Mission' => $miss->type_mission,
            'Destination' => $miss->destination,
            'Distance Parcourue' => $miss->distance_parcourue,
            'Statut' => $miss->statut
        ];
        });
    } 
}