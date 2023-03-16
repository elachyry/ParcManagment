<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Car;
use App\Models\Permanent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use Response;



class ReparationController extends Controller
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
        $reparations = Reparation::latest()->paginate(6);
        return view('reparation.index',compact('reparations'));
    }

    public function trashedReparations()
    {
        $reparations = Reparation::onlyTrashed()->latest()->paginate(6);
        return view('reparation.trash',compact('reparations'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = new Car;
        $mats = Car::select('immatriculation')->get();
        return view('reparation.create',compact('car','mats'));
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
            'date_reparation'=>'required',
            'affectaion'=>'required',
            'designation'=>'required',
            'quantity'=>'required',
            'unit_price'=>'required',
            'totale_HT'=>'required',
            'totale_TTC'=>'required' 
        ]);
        $reparation = Reparation::create($request->all());
        return redirect()->route('reparation.index')->with('success','Le Réparation a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show(Reparation $reparation)
    {
        $data = Car::where('immatriculation',$reparation->immatriculation)->first();
        return view('reparation.show',compact('reparation','data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparation $reparation)
    {
        $car = new Car;
        $data = Car::where('immatriculation',$reparation->immatriculation)->first();
        $mats = Car::select('immatriculation')->get();
        return view('reparation.edit',compact('reparation','car','mats','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparation $reparation)
    {
        $validator = Validator::make($request->all(), [
            'immatriculation'=>'required',
            'date_reparation'=>'required',
            'affectaion'=>'required',
            'designation'=>'required',
            'quantity'=>'required',
            'unit_price'=>'required',
            'totale_HT'=>'required',
            'totale_TTC'=>'required' 
        ]);
        $reparation->update($request->all());
        return redirect()->route('reparation.index')->with('success','Le Réparation a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparation $reparation)
    {
        //
    }

    public function softDelete($id)
    {
        $reparation = Reparation::find($id)->delete();
        return redirect()->route('reparation.index')->with('success','Le Réparation a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $reparations = Reparation::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('reparation.trash')->with('success','Le Réparation a été supprimé avec succès!');
    }

    public function restoreReparation($id)
    {
        $reparations = Reparation::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('reparation.trash')->with('success','Le Réparation  a été restauré à partir de la corbeille avec succès!');
    }

    public function search(Request $request)
    {
        $reparation = Reparation::where('immatriculation','Like','%'.$request->get('searchQuest').'%')->
            orWhere('designation','Like','%'.$request->get('searchQuest').'%')->get();
                    return json_encode($reparation);
    }

    public function searchTrash(Request $request)
    {
        $reparation = Reparation::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
        $reparation1 = Reparation::onlyTrashed()->where('designation','Like','%'.$request->get('searchQuest').'%')->get();
    
        $reparation = $reparation->union($reparation1);
        return json_encode($reparation);
    }

    public function choseEntreType($id)
    {     
        return view('choseEntreType',compact('id'));
    }
    public function choseRep($id)
    {        
        $car = Car::where('id',$id)->first();  
        $mats = Car::select('immatriculation')->get();

        $data['data1'] = 'Parc Auto';
        $test2 = Permanent::where('immatriculation',$car->immatriculation)->where('statut','=',"active")->get();
        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$id)->get();
        // dd($test2);
        if($test2->count() > 0){
            foreach($test2 as $t){
                $data['data1'] = $t->first_name . ' ' . $t->last_name . ' (' . $t->job .')';
                }
        }else{
            if($test->count() > 0){
                foreach($test as $t){
                    $data['data1'] = $t->propriete;
                }
            }
        }  
        // dd( $data);
        return view('reparation.create',compact('car','mats','data'));

    }


    public function getDetails($id = 0)
    {
        $data = array();
        $data1 = Car::where('immatriculation',$id)->first();
        $data['data1'] = $data1;
        $data['data2'] = null;
        $data['data3'] = null;
        $data['data4'] = 'Parc Auto';
        $test2 = Permanent::where('immatriculation',$id)->where('statut','=',"active")->get();
        $test = Car::whereNotIn('propriete',["Bon Etat","Moyen"])->where('immatriculation',$id)->get();
        if($test2->count() > 0){
            foreach($test2 as $t){
                $data['data2'] = $t;
                }
        }else{
            if($test->count() > 0){
                foreach($test as $t){
                    $data['data3'] = $t;
                }
            }
        }

        
        return response()->json($data);
    }

    public function export()
    {
        return (new FastExcel(Reparation::all()))->download('Reparations.xlsx',function($rep){
            return ['id' => $rep->id,
            'Immatriculation' => $rep->immatriculation,
            'Date Réparation' => $rep->date_reparation,
            'Affectaion' => $rep->affectaion,
            'Désignation' => $rep->designation,
            'Quantité' => $rep->quantity,
            'Prix UT' => $rep->unit_price,
            'Prix HT' => $rep->totale_HT,
            'Prix TTC' => $rep->totale_TTC];
        });
    } 
    public function exportSearch($searchQuest)
    {
        $reparation = Reparation::where('immatriculation','Like','%'.$searchQuest.'%')->
            orWhere('designation','Like','%'.$searchQuest.'%')->get();
        return (new FastExcel($reparation))->download('Reparations.xlsx',function($rep){
            return ['id' => $rep->id,
            'Immatriculation' => $rep->immatriculation,
            'Date Réparation' => $rep->date_reparation,
            'Affectaion' => $rep->affectaion,
            'Désignation' => $rep->designation,
            'Quantité' => $rep->quantity,
            'Prix UT' => $rep->unit_price,
            'Prix HT' => $rep->totale_HT,
            'Prix TTC' => $rep->totale_TTC];
        });
    } 
}
