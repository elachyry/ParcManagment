<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Car;
use App\Models\Employee;
use App\Models\Reparation;
use App\Models\Vidange;
use App\Models\Permanent;
use App\Models\Mession;
use Carbon\Carbon;
use PDF;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Rap2hpoutre\FastExcel\FastExcel;
use Faker\Generator as Faker;




class CarController extends Controller
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
        $cars = Car::latest()->paginate(6);
        return view('car.index',compact('cars'));
    }

    public function stats()
    {
        $countCar = Car::count();
        $countEmp = Employee::count();
        $countAffec = Permanent::where('statut','=', 'active')->count();
        $counts = [
            "countCar" => $countCar,
            "countEmp" => $countEmp,
            "countAffec" => $countAffec,
        ];
        $bon = Car::where('propriete','=','Bon Etat')->count();
        $moyen = Car::where('propriete','=','Moyen')->count();
        $pane = Car::where('propriete','=','En panne')->count();
        $hors = Car::where('propriete','=','Hors usage')->count();
        $ref = Car::where('propriete','=','Reformer')->count();
        $status = [
            "bon" => $bon,
            "moyen" => $moyen,
            "pane" => $pane,
            "hors" => $hors,
            "ref" => $ref,
        ];
        $att = Mession::where('statut','=','En Attendant')->count();
        $active = Mession::where('statut','=','active')->count();
        $comp = Mession::where('statut','=','complété')->count();
        $reta = Mession::where('statut','=','En Retard')->count();
        $statusMess = [
            "att" => $att,
            "active" => $active,
            "reta" => $reta,
            "comp" => $comp,
        ];
        $recent = Mession::whereIn('statut',["active","En Attendant","En Retard"])->orderBy('date_retour', 'ASC')->limit(14)->get();
        $currentDateTime = Carbon::now();
        $newDateTime =date('Y', strtotime($currentDateTime));
        // dd($newDateTime);
        $dateE = Carbon::now()->startOfMonth()->subMonth(1);
        $dateE =date('Y-m-d', strtotime($dateE));
        // dd($dateE);

        // $reps = Reparation::select(array('date_reparation', DB::raw('COUNT(*) as nbr')))
        // ->groupBy('date_reparation')
        // ->orderBy('date_reparation', 'ASC')->whereBetween('date_reparation', [$dateE, $newDateTime])->get();
        $dates = array();
        $c1 = Reparation::whereBetween('date_reparation', [$newDateTime.'-01-01', $newDateTime.'-01-31'])->count();
        $c2 = Reparation::whereBetween('date_reparation', [$newDateTime.'-02-01', $newDateTime.'-02-28'])->count();
        $c3 = Reparation::whereBetween('date_reparation', [$newDateTime.'-03-01', $newDateTime.'-03-31'])->count();
        $c4 = Reparation::whereBetween('date_reparation', [$newDateTime.'-04-01', $newDateTime.'-04-30'])->count();
        $c5 = Reparation::whereBetween('date_reparation', [$newDateTime.'-05-01', $newDateTime.'-05-31'])->count();
        $c6 = Reparation::whereBetween('date_reparation', [$newDateTime.'-06-01', $newDateTime.'-06-30'])->count();
        $c7 = Reparation::whereBetween('date_reparation', [$newDateTime.'-07-01', $newDateTime.'-07-31'])->count();
        $c8 = Reparation::whereBetween('date_reparation', [$newDateTime.'-08-01', $newDateTime.'-08-31'])->count();
        $c9 = Reparation::whereBetween('date_reparation', [$newDateTime.'-09-01', $newDateTime.'-09-30'])->count();
        $c10 = Reparation::whereBetween('date_reparation', [$newDateTime.'-10-01', $newDateTime.'-10-31'])->count();
        $c11 = Reparation::whereBetween('date_reparation', [$newDateTime.'-11-01', $newDateTime.'-11-30'])->count();
        $c12 = Reparation::whereBetween('date_reparation', [$newDateTime.'-12-01', $newDateTime.'-12-31'])->count();
        $cm = array($c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,$c12);

        $c1 = Vidange::whereBetween('date_vidange', [$newDateTime.'-01-01', $newDateTime.'-01-31'])->count();
        $c2 = Vidange::whereBetween('date_vidange', [$newDateTime.'-02-01', $newDateTime.'-02-28'])->count();
        $c3 = Vidange::whereBetween('date_vidange', [$newDateTime.'-03-01', $newDateTime.'-03-31'])->count();
        $c4 = Vidange::whereBetween('date_vidange', [$newDateTime.'-04-01', $newDateTime.'-04-30'])->count();
        $c5 = Vidange::whereBetween('date_vidange', [$newDateTime.'-05-01', $newDateTime.'-05-31'])->count();
        $c6 = Vidange::whereBetween('date_vidange', [$newDateTime.'-06-01', $newDateTime.'-06-30'])->count();
        $c7 = Vidange::whereBetween('date_vidange', [$newDateTime.'-07-01', $newDateTime.'-07-31'])->count();
        $c8 = Vidange::whereBetween('date_vidange', [$newDateTime.'-08-01', $newDateTime.'-08-31'])->count();
        $c9 = Vidange::whereBetween('date_vidange', [$newDateTime.'-09-01', $newDateTime.'-09-30'])->count();
        $c10 = Vidange::whereBetween('date_vidange', [$newDateTime.'-10-01', $newDateTime.'-10-31'])->count();
        $c11 = Vidange::whereBetween('date_vidange', [$newDateTime.'-11-01', $newDateTime.'-11-30'])->count();
        $c12 = Vidange::whereBetween('date_vidange', [$newDateTime.'-12-01', $newDateTime.'-12-31'])->count();
        $cv = array($c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,$c12);
                // dd($cm);
        // foreach ($reps as $key => $value) {
        //     $dates[$key] = $value->date_reparation;
        //     dd($key);
        // }
        // dd($dates);
        return view('dashboard',compact('counts','status','statusMess','recent','cm','cv'));
    }

    // public function getInfo()
    // {
    //     $name = Auth::name();
    //     $info = [
    //         "name" => $name
    //     ];
    //     return view('layouts.auth',compact('info'));
    // }

    public function trashedCars()
    {
        $cars = Car::onlyTrashed()->latest()->paginate(6);
        return view('car.trash',compact('cars'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
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
            'immatriculation'=>'required|unique:cars,immatriculation',
            'type_vehicule'=>'nullable',
            'marque'=>'required',
            'model'=>'required',
            'carburant'=>'required',
            'consomation_moyen'=>'nullable',
            'puissance_fiscale'=>'nullable',
            'date_1ere_immat'=>'nullable|date',
            'propriete'=>'required',
            'date_acquisition_location'=>'required|date',
            'kilometrage'=>'nullable',
            'km_effectues_depuis_debut_annee'=>'nullable',
            'date_dernier_controle_technique'=>'nullable|date',
            'cadence_vidange'=>'nullable',
            'km_derniere_vidange'=>'nullable',
            'cadence_courroie'=>'nullable',
            'km_derniere_courroie'=>'nullable',
            'remarque_sur_etat_generale'=>'nullable',
            'image_path'=>'nullable|mimes:jpg,png,jped|max:5048'
            
        ]);
        $newImageName = null;
        if($request->hasfile('image_path')){
            $newImageName = time() . '-' . $request->immatriculation . '.' . $request->image_path->extension();
            // dd($newImageName);
            $request->image_path->move(public_path('carImages'),$newImageName);
        }
        $car = Car::create([
            'immatriculation'=>$request->input('immatriculation'),
            'type_vehicule'=>$request->input('type_vehicule'),
            'marque'=>$request->input('marque'),
            'model'=>$request->input('model'),
            'carburant'=>$request->input('carburant'),
            'consomation_moyen'=>$request->input('consomation_moyen'),
            'puissance_fiscale'=>$request->input('puissance_fiscale'),
            'date_1ere_immat'=>$request->input('date_1ere_immat'),
            'propriete'=>$request->input('propriete'),
            'date_acquisition_location'=>$request->input('date_acquisition_location'),
            'kilometrage'=>$request->input('kilometrage'),
            'km_effectues_depuis_debut_annee'=>$request->input('km_effectues_depuis_debut_annee'),
            'date_dernier_controle_technique'=>$request->input('date_dernier_controle_technique'),
            'cadence_vidange'=>$request->input('cadence_vidange'),
            'km_derniere_vidange'=>$request->input('km_derniere_vidange'),
            'cadence_courroie'=>$request->input('cadence_courroie'),
            'km_derniere_courroie'=>$request->input('km_derniere_courroie'),
            'remarque_sur_etat_generale'=>$request->input('remarque_sur_etat_generale'),
            'image_path'=>$newImageName
        ]);
        return redirect()->route('car.create')->with('success','Le véhicule a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('car.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(), [
            'immatriculation'=>'required|unique:cars,immatriculation,'.$car->id,
            'type_vehicule'=>'nullable',
            'marque'=>'required',
            'model'=>'required',
            'carburant'=>'required',
            'consomation_moyen'=>'nullable',
            'puissance_fiscale'=>'nullable',
            'date_1ere_immat'=>'nullable',
            'propriete'=>'required',
            'date_acquisition_location'=>'required',
            'kilometrage'=>'nullable',
            'km_effectues_depuis_debut_annee'=>'nullable',
            'date_dernier_controle_technique'=>'nullable',
            'cadence_vidange'=>'nullable',
            'km_derniere_vidange'=>'nullable',
            'cadence_courroie'=>'nullable',
            'km_derniere_courroie'=>'nullable',
            'remarque_sur_etat_generale'=>'nullable',
            'image_path'=>'nullable'
        ]);
     
        if ($validator->fails()) {
            dd($validator->messages());
            return redirect()->route('car.edit',$car->id)->with('success','L\'immatriculation a déjà été prise!');
        }

        // $validator = $request->validate([
        //     'immatriculation'=>'required|unique:cars,immatriculation',
        //     'type_vehicule'=>'nullable',
        //     'marque'=>'required',
        //     'model'=>'required',
        //     'carburant'=>'required',
        //     'consomation_moyen'=>'nullable',
        //     'puissance_fiscale'=>'nullable',
        //     'date_1ere_immat'=>'nullable',
        //     'propriete'=>'required',
        //     'date_acquisition_location'=>'required',
        //     'kilometrage'=>'nullable',
        //     'km_effectues_depuis_debut_annee'=>'nullable',
        //     'date_dernier_controle_technique'=>'nullable',
        //     'cadence_vidange'=>'nullable',
        //     'km_derniere_vidange'=>'nullable',
        //     'cadence_courroie'=>'nullable',
        //     'km_derniere_courroie'=>'nullable',
        //     'remarque_sur_etat_generale'=>'nullable'
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->route('car.edit');
        // }
        // $car->fill($data);
        // $car->save();
        // $car->update($request->all());
        if($request->hasfile('image_path')){
            $destination = 'carImages/'.$car->image_path;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $newImageName = time() . '-' . $request->immatriculation . '.' . $request->image_path->extension();
            // dd($newImageName);
            $request->image_path->move(public_path('carImages'),$newImageName);
            $car->image_path= $newImageName;
        }

        $car->immatriculation= $request->input('immatriculation');
        $car->type_vehicule= $request->input('type_vehicule');
        $car->marque= $request->input('marque');
        $car->model= $request->input('model');
        $car->carburant= $request->input('carburant');
        $car->consomation_moyen= $request->input('consomation_moyen');
        $car->puissance_fiscale= $request->input('puissance_fiscale');
        $car->date_1ere_immat= $request->input('date_1ere_immat');
        $car->propriete= $request->input('propriete');
        $car->date_acquisition_location= $request->input('date_acquisition_location');
        $car->kilometrage= $request->input('kilometrage');
        $car->km_effectues_depuis_debut_annee= $request->input('km_effectues_depuis_debut_annee');
        $car->date_dernier_controle_technique= $request->input('date_dernier_controle_technique');
        $car->cadence_vidange= $request->input('cadence_vidange');
        $car->km_derniere_vidange= $request->input('km_derniere_vidange');
        $car->cadence_courroie= $request->input('cadence_courroie');
        $car->km_derniere_courroie= $request->input('km_derniere_courroie');
        $car->remarque_sur_etat_generale= $request->input('remarque_sur_etat_generale');

        $car->update();
        return redirect()->route('car.index')->with('success','Le véhicule a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index')->with('success','Le véhicule a été supprimée avec succès!');
    }

    public function softDelete($id)
    {
        $imat = Car::where('id',$id)->first();
        $test1 = Mession::where('immatriculation',$imat->immatriculation)->get();
        $test2 = Permanent::where('immatriculation',$imat->immatriculation)->get();
        $test3 = Vidange::where('immatriculation',$imat->immatriculation)->get();
        $test4 = Reparation::where('immatriculation',$imat->immatriculation)->get();
        // dd($test2->count() );
        if($test1->count() > 0 || $test2->count() > 0){
            return redirect()->route('car.index')->with('failed1','vous ne pouvez pas supprimer cette Véhicule car elle est affecté à une personne
            !');
        }
        if($test3->count() > 0 || $test4->count() > 0){
            return redirect()->route('car.index')->with('failed2','vous ne pouvez pas supprimer cette Véhicule car elle a une Réparation ou un Vidange
            !');
        }

        $car = Car::find($id)->delete();
        return redirect()->route('car.index')->with('success','Le véhicule a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $cars = Car::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('car.trash')->with('success','Le véhicule a été supprimé avec succès!');
    }

    public function restoreCar($id)
    {
        $cars = Car::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('car.trash')->with('success','Le véhicule a été restauré à partir de la corbeille avec succès!');
    }

    // public function search(Request $request)
    // {
    //     $output = "";
    //     $car = Car::where('immatriculation','Like','%'.$request->search.'%')->
    //     orWhere('marque','Like','%'.$request->search.'%')->
    //     orWhere('model','Like','%'.$request->search.'%')->get();
    //     foreach ($car as $car) {
    //         $output .=
    //             "<tr>
    //                 <td> class='px-4 py-3' ".$car->immatriculation."</td>
    //             </tr>";
    //     }
    //     return response($output);

    // }

    public function search(Request $request)
    {
        $car = Car::where('immatriculation','Like','%'.$request->get('searchQuest').'%')->
            orWhere('marque','Like','%'.$request->get('searchQuest').'%')->
            orWhere('propriete','Like','%'.$request->get('searchQuest').'%')->
            orWhere('model','Like','%'.$request->get('searchQuest').'%')->get();
                    return json_encode($car);
    }

      public function searchTrash(Request $request)
    {
        $car = Car::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')->get();
        $car1 = Car::onlyTrashed()->where('marque','Like','%'.$request->get('searchQuest').'%')->get();
        $car2 = Car::onlyTrashed()->where('model','Like','%'.$request->get('searchQuest').'%')->get();
        $car3 = Car::onlyTrashed()->where('propriete','Like','%'.$request->get('searchQuest').'%')->get();
        $car = $car->union($car1);
        $car = $car->union($car2);
        $car = $car->union($car3);
        return json_encode($car);
        
        // $car = Car::onlyTrashed()->where(function ($query) {
        //     $query->where('immatriculation','Like','%'.$request->get('searchQuest').'%')
        //             ->orWhere('marque', 'Like', '%'.$request->get('searchQuest').'%')
        //             ->orWhere('model', 'Like', '%'.$request->get('searchQuest').'%');
        //             })->get();
        //             return json_encode($car);

        // $car = Car::onlyTrashed()->where('immatriculation','Like','%'.$request->get('searchQuest').'%')
        // ->orWhere('marque', 'Like', '%'.$request->get('searchQuest').'%')
        //     ->orWhere('model', 'Like', '%'.$request->get('searchQuest').'%')->toSql();
        //     dd($car);
        //             return json_encode($car);
    }
    

    public function ficheTech($id)
    {
        $car = Car::where('id',$id)->first();  


        // $data = Reparation::where('reparations.immatriculation' , '=' , $car->immatriculation)
        //         ->join('vidanges','vidanges.immatriculation' , '=' , 'reparations.immatriculation')
        //         ->get(['reparations.immatriculation','vidanges.immatriculation','reparations.date_reparation','reparations.designation','vidanges.date_vidange','vidanges.quantity_huile']);
        //         dd($data);

        $data1 = Reparation::select('date_reparation','designation')->where('immatriculation',$car->immatriculation)->get();
        // dd($data1);
        $reparations = array();
        foreach ($data1 as $key => $value) {
            $reparations[$value->date_reparation] = $value->date_reparation.' : '.$value->designation.'.';
        }
        
        // // dd($reparations);
        $data2 = Vidange::select('date_vidange','quantity_huile')->where('immatriculation',$car->immatriculation)->get();

        // // dd($data2);
        foreach ($data2 as $key => $value) {
            $reparations[$value->date_vidange] = $value->date_vidange.' : Un vidange de '.$value->quantity_huile.'L de huile.';
        }
        // // dd($reparations);

        // $reparations = array();
        // foreach ($data1 as $key => $value) {
        //     $reparations[$value->date_reparation.' : '.$value->designation.'.'] = $value->date_reparation;
        // }

        // // dd($reparations);
        
        // $data2 = Vidange::select('date_vidange','quantity_huile')->where('immatriculation',$car->immatriculation)->get();
        
        $vidanges = array();
        // foreach ($data2 as $key => $value) {
        //     $vidanges[$value->date_vidange.' : Un vidange de '.$value->quantity_huile.'L de huile.'] = $value->date_vidange;
        // }
        // return view('car.test',compact('reparations','car','data2'));
        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('car.fichTech',compact('reparations','car','data2'))->stream();
        $pdf = PDF::loadView('car.fichTech',compact('reparations','car','data2'));
        return $pdf->download("ficheTech_".$car->immatriculation.'_'.$car->marque.'_'.$car->model.'.pdf');

        // return view('permanent.ordreMission',compact('permanent','data','dataEmp'));
    }

    public function export()
    {
        return (new FastExcel(Car::all()))->download('Véhicules.xlsx',function($car){
            return ['id' => $car->id,
            'Immatriculation' => $car->immatriculation,
            'Type Vehicule' => $car->type_vehicule,
            'Marque' => $car->marque,
            'Model' => $car->model,
            'Consomation Moyen' => $car->consomation_moyen,
            'Puissance Fiscale' => $car->puissance_fiscale,
            'Carburant' => $car->carburant,
            'Date 1ere Immat' => $car->date_1ere_immat,
            'Etat' => $car->propriete,
            'Date Acquisition' => $car->date_acquisition_location,
            'Kilometrage' => $car->kilometrage,
            'Km Effectues depuis le début l\'année' => $car->km_effectues_depuis_debut_annee,
            'Date Dernier Controle Technique' => $car->date_dernier_controle_technique,
            'Cadence Vidange' => $car->cadence_vidange,
            'Km Dernière Vidange' => $car->km_derniere_vidange,
            'Cadence Courroie' => $car->cadence_courroie,
            'Km Derniere Courroie' => $car->km_derniere_courroie,
            'Remarque Sur Etat Générale' => $car->remarque_sur_etat_generale];
        });
    }  
    public function exportSearch($searchQuest)
    { 
        $car = Car::where('immatriculation','Like','%'.$searchQuest.'%')->
        orWhere('marque','Like','%'.$searchQuest.'%')->
        orWhere('propriete','Like','%'.$searchQuest.'%')->
        orWhere('model','Like','%'.$searchQuest.'%')->get();
        return (new FastExcel($car))->download('Véhicules.xlsx',function($car){
            return ['id' => $car->id,
            'Immatriculation' => $car->immatriculation,
            'Type Vehicule' => $car->type_vehicule,
            'Marque' => $car->marque,
            'Model' => $car->model,
            'Consomation Moyen' => $car->consomation_moyen,
            'Puissance Fiscale' => $car->puissance_fiscale,
            'Carburant' => $car->carburant,
            'Date 1ere Immat' => $car->date_1ere_immat,
            'Etat' => $car->propriete,
            'Date Acquisition' => $car->date_acquisition_location,
            'Kilometrage' => $car->kilometrage,
            'Km Effectues depuis le début l\'année' => $car->km_effectues_depuis_debut_annee,
            'Date Dernier Controle Technique' => $car->date_dernier_controle_technique,
            'Cadence Vidange' => $car->cadence_vidange,
            'Km Dernière Vidange' => $car->km_derniere_vidange,
            'Cadence Courroie' => $car->cadence_courroie,
            'Km Derniere Courroie' => $car->km_derniere_courroie,
            'Remarque Sur Etat Générale' => $car->remarque_sur_etat_generale];
        });
    }  
    
    public function choseMiss($id)
    {        
        // $cins = Employee::select('cin')->get();
        // $mats = Car::select('immatriculation')->get();
        $dataCar = Car::where('id',$id)->first();
        $test1 = Permanent::select('immatriculation')->where('immatriculation',$dataCar->immatriculation)->where('statut','=', 'active')->get();
        $test2 = Mession::select('immatriculation')->where('immatriculation',$dataCar->immatriculation)->whereIn('statut',["active","En Attendant","En Retard"])->get(); 
        if($test1->count() > 0 || $test2->count() > 0){
            return redirect()->route('car.index')->with('failed2',$dataCar->marque.' '.$dataCar->model.' non disponible!');
        }  

        $employee = new Employee();
        $car = Car::where('id',$id)->first();
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
        return view('mession.create',compact('employee','mats','cins','car'));
    }

    public function chosePer($id)
    {        
        // $cins = Employee::select('cin')->get();
        // $mats = Car::select('immatriculation')->get();
        $dataCar = Car::where('id',$id)->first();
        $test1 = Permanent::select('immatriculation')->where('immatriculation',$dataCar->immatriculation)->where('statut','=', 'active')->get();
        $test2 = Mession::select('immatriculation')->where('immatriculation',$dataCar->immatriculation)->whereIn('statut',["active","En Attendant","En Retard"])->get(); 
        if($test1->count() > 0 || $test2->count() > 0){
            return redirect()->route('car.index')->with('failed2',$dataCar->marque.' '.$dataCar->model.' non disponible!');
        }  


        $employee = new Employee();
        $car = Car::where('id',$id)->first();
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
        return view('permanent.create',compact('employee','mats','cins','car'));
    }



    
    
}