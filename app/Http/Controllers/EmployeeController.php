<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;



class EmployeeController extends Controller
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
        $employees = Employee::latest()->paginate(6);
        return view('employee.index',compact('employees'));
    }

    public function trashedEmployees()
    {
        $employees = Employee::onlyTrashed()->latest()->paginate(6);
        return view('employee.trash',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');

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
            'cin'=>'required|unique:employees,cin',
            'first_name'=>'required',
            'last_name'=>'required',
            'job'=>'required',
            'phone'=>'required|unique:employees,phone|min:10',
            'address'=>'nullable' 
        ]);
        $employee = Employee::create($request->all());
        return redirect()->route('employee.create')->with('success','L\' Utilisateur a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // $validator = Validator::make($request->all(), [
        //     'cin'=>'required|unique:employees,cin',
        //     'first_name'=>'required',
        //     'last_name'=>'required',
        //     'job'=>'required',
        //     'phone'=>'required|unique:employees,phone|min:10',
        //     'address'=>'nullable'
        // ]);
        // if ($validator->fails()) {
        //     $failed = $validator->failed();
        //     $error = $validator->errors()->getMessages();;
        //         if($error == 'The cin has already been taken.'){
        //             return redirect()->route('employee.edit',$employee->id)->with('success','CNE a déjà été prise!');
        //         }elseif($error == 'The phone has already been taken.'){
        //             return redirect()->route('employee.edit',$employee->id)->with('success','Numéro de Téléphone a déjà été prise!');
        //         }elseif($error == 'The phone must be at least 10 characters.'){
        //             return redirect()->route('employee.edit',$employee->id)->with('success','Numéro de Téléphone doit comporter au moins 10 numéros.!');
        //         }
        // }

        $request->validate([
            'cin'=>'required|unique:employees,cin,'.$employee->id,
            'first_name'=>'required',
            'last_name'=>'required',
            'job'=>'required',
            'phone'=>'required|unique:employees,phone,'.$employee->id.'|min:10',
            'address'=>'nullable' 
        ]);

        $employee->update($request->all());
        return redirect()->route('employee.index')->with('success','L\' Utilisateur a été mise a jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function softDelete($id)
    {
        $employee = Employee::find($id)->delete();
        return redirect()->route('employee.index')->with('success','L\'Utilisateur a été mis à la supprimé avec succès!');
    }

    public function hardDelete($id)
    {
        $employees = Employee::onlyTrashed()->where('id',$id)->first()->forcedelete();
        return redirect()->route('employee.trash')->with('success','L\'Utilisateur a été supprimé avec succès!');
    }

    public function restoreEmployee($id)
    {
        $employees = Employee::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('employee.trash')->with('success','L\'Utilisateur  a été restauré à partir de la corbeille avec succès!');
    }

    public function search(Request $request)
    {
        $employee = Employee::where('cin','Like','%'.$request->get('searchQuest').'%')->
            orWhere('first_name','Like','%'.$request->get('searchQuest').'%')->
            orWhere('last_name','Like','%'.$request->get('searchQuest').'%')->
            orWhere('phone','Like','%'.$request->get('searchQuest').'%')->get();
                    return json_encode($employee);
    }

    public function searchTrash(Request $request)
    {
        $employee = Employee::onlyTrashed()->where('cin','Like','%'.$request->get('searchQuest').'%')->get();
        $employee1 = Employee::onlyTrashed()->where('first_name','Like','%'.$request->get('searchQuest').'%')->get();
        $employee2 = Employee::onlyTrashed()->where('last_name','Like','%'.$request->get('searchQuest').'%')->get();
        $employee3 = Employee::onlyTrashed()->where('phone','Like','%'.$request->get('searchQuest').'%')->get();
        $employee = $employee->union($employee1);
        $employee = $employee->union($employee2);
        $employee = $employee->union($employee3);
        return json_encode($employee);
    }

    public function export()
    {
        return (new FastExcel(Employee::all()))->download('Employés.xlsx',function($emp){
            return ['id' => $emp->id,
            'CIN' => $emp->cin,
            'Prénom' => $emp->first_name,
            'Nom' => $emp->last_name,
            'Fonction' => $emp->job,
            'Numéro Téléphone' => $emp->phone,
            'Adresse' => $emp->address];
        });
    }   
    public function exportSearch($searchQuest)
    {
        $employee = Employee::where('cin','Like','%'.$searchQuest.'%')->
            orWhere('first_name','Like','%'.$searchQuest.'%')->
            orWhere('last_name','Like','%'.$searchQuest.'%')->
            orWhere('phone','Like','%'.$searchQuest.'%')->get();
        return (new FastExcel($employee))->download('Employés.xlsx',function($emp){
            return ['id' => $emp->id,
            'CIN' => $emp->cin,
            'Prénom' => $emp->first_name,
            'Nom' => $emp->last_name,
            'Fonction' => $emp->job,
            'Numéro Téléphone' => $emp->phone,
            'Adresse' => $emp->address];
        });
    }   

}
