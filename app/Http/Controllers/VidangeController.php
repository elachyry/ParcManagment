<?php

namespace App\Http\Controllers;

use App\Models\Vidange;
use App\Models\Car;
use App\Models\Permanent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;


class VidangeController extends Controller
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
        $vidanges = Vidange::latest()->paginate(6);
        return view('vidange.index',compact('vidanges'));
    }

    public function trashedVidanges()
    {
        $vidanges = Vidange::onlyTrashed()->latest()->paginate(6);
        return view('vidange.trash',compact('vidanges'));
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
        return view('vidange.create',compact('car','mats'));
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
            'date_vidange'=>'required',
            'affectaion'=>'required',
            'kilomitrage'=>'nullable',
            'kilomitrage_next_vidange'=>'nullable',
            'type_huile'=>'required',
            'quantity_huile'=>'required',
            'liter_price'=>'required',
            'totale_HT'=>'required',
            'totale_TTC'=>'required' 
        ]);
        $vidange = Vidange::create($request->all());
        return redirect()->route('vidange.index')->with('success','Le Vidange a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidange  $vidange
     * @return \Illuminate\Http\Response
     */
    public function show(Vidange $vidange)
    {
        $data = Car::where('immatriculation',$vidange->immatriculation)->first();
        return view('vidange.show',compact('vidange','data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidange  $vidange
     * @return \Illuminate\Http\Response
     */
    public function edit(Vidange $vidange)
    {
        $car = new Car;
        $data = Car::where('immatriculation',$vidange->immatriculation)->first();
        $mats = Car::select('immatriculation')->get();
        return view('vidange.edit',compact('vidange','car','mats','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vidange  $vidange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vidange $vidange)
    {
        $validator = Validator::make($request->all(), [
            'immatriculation'=>'required',
            'date_vidange'=>'required',
            'affectaion'=>'required',
            'kilomitrage'=>'nullable',
            'kilomitrage_next_vidange'=>'nullable',
            'type_huile'=>'required',
            'quantity_huile'=>'required',
            'liter_price'=>'required',
            'totale_HT'=>'required',
            'totale_TTC'=>'required' 
        ]);
        $vidange->update($request->all());
        return redirect()->route('vidange.index')->with('success','Le Vidange a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidange  $vidange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vidange $vidange)
    {
        //
    }

    public function softDelete($id)
    {
        $vidange = Vidange::find($id)->delete();
        return redirect()->route('vidange.index')->with('success','Le Vidange a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $vidanges = Vidange::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('vidange.trash')->with('success','Le Vidange a été supprimé avec succès!');
    }

    public function restoreVidange($id)
    {
        $vidanges = Vidange::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('vidange.trash')->with('success','Le Vidange  a été restauré à partir de la corbeille avec succès!');
    }

    public function search(Request $request)
    {
        $vidange = Vidange::where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
                    return json_encode($vidange);
    }

    public function searchTrash(Request $request)
    {
        $vidange = Vidange::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
        return json_encode($vidange);
    }



    public function choseViden($id)
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
        return view('vidange.create',compact('car','mats','data'));
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
        }        return response()->json($data);
    }

    public function export()
    {
        return (new FastExcel(Vidange::all()))->download('Vidanges.xlsx',function($vid){
            return ['id' => $vid->id,
            'Immatriculation' => $vid->immatriculation,
            'Date Vidange' => $vid->date_vidange,
            'Kilomitrage' => $vid->kilomitrage,
            'Kilomitrage de Prochaine Vidange' => $vid->kilomitrage_next_vidange,
            'Type Huile' => $vid->type_huile,
            'Quantité Huile' => $vid->quantity_huile,
            'Prix UT' => $vid->liter_price,
            'Prix HT' => $vid->totale_HT,
            'Prix TTC' => $vid->totale_TTC];
        });
    } 
    public function exportSearch($searchQuest)
    {
        $vidange = Vidange::where('immatriculation','Like','%'.$searchQuest.'%')->get();

        return (new FastExcel($vidange))->download('Vidanges.xlsx',function($vid){
            return ['id' => $vid->id,
            'Immatriculation' => $vid->immatriculation,
            'Date Vidange' => $vid->date_vidange,
            'Kilomitrage' => $vid->kilomitrage,
            'Kilomitrage de Prochaine Vidange' => $vid->kilomitrage_next_vidange,
            'Type Huile' => $vid->type_huile,
            'Quantité Huile' => $vid->quantity_huile,
            'Prix UT' => $vid->liter_price,
            'Prix HT' => $vid->totale_HT,
            'Prix TTC' => $vid->totale_TTC];
        });
    } 
}
