<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('home');
});

Route::get('/', function(){
    return view('home');
})->name('home');
Route::get('/test', function(){
    return view('car.test');
})->name('test');

// Route::get('/car/test', function(){
//     return view('car.test');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/profile', 'App\Http\Controllers\showProfile@show')->name('profile');

    
    //Routs For Car
    Route::get('/car.export', 'App\Http\Controllers\CarController@export')->name('car.export');
    Route::get('/car.exportSearch/{id}', 'App\Http\Controllers\CarController@exportSearch')->name('car.exportSearch');
    Route::get('/car/choseMiss/{id}','App\Http\Controllers\CarController@choseMiss')->name('car.choseMiss');
    Route::get('/car/chosePerm/{id}','App\Http\Controllers\CarController@chosePer')->name('car.chosePerm');
    Route::get('/car/ficheTech/{id}', 'App\Http\Controllers\CarController@ficheTech')->name('ficheTech');
    Route::get('/dashboard', 'App\Http\Controllers\CarController@stats')->name('dashboard');
    Route::post('/search','App\Http\Controllers\CarController@search')->name('car.search');
    Route::post('/searchTrash/car','App\Http\Controllers\CarController@searchTrash')->name('car.searchTrash');
    Route::get('/car/trash','App\Http\Controllers\CarController@trashedCars')->name('car.trash');
    Route::get('/car/restore/{id}','App\Http\Controllers\CarController@restoreCar')->name('car.restore');
    Route::get('/car/hard/delete/{id}','App\Http\Controllers\CarController@hardDelete')->name('hard.delete');
    Route::resource('car','App\Http\Controllers\CarController');
    Route::get('/car/soft/delete/{id}','App\Http\Controllers\CarController@softDelete')->name('soft.Delete');
    
    //Routs For Employee
    Route::get('/employee/export','App\Http\Controllers\EmployeeController@export')->name('employee.export');
    Route::get('/employee.exportSearch/{id}', 'App\Http\Controllers\EmployeeController@exportSearch')->name('employee.exportSearch');
    Route::get('/employee/trash','App\Http\Controllers\EmployeeController@trashedEmployees')->name('employee.trash');
    Route::get('/employee/restore/{id}','App\Http\Controllers\EmployeeController@restoreEmployee')->name('employee.restore');
    Route::get('/employee/hard/delete/{id}','App\Http\Controllers\EmployeeController@hardDelete')->name('employee.hard.delete');    
    Route::post('/search/employee','App\Http\Controllers\EmployeeController@search')->name('employee.search');
    Route::post('/searchTrash/employee','App\Http\Controllers\EmployeeController@searchTrash')->name('employee.trashSearch');
    Route::resource('employee','App\Http\Controllers\EmployeeController');
    Route::get('/employee/soft/delete/{id}','App\Http\Controllers\EmployeeController@softDelete')->name('employee.soft.Delete');
    
    //Routs For Reparation
    Route::get('/reparation/export','App\Http\Controllers\ReparationController@export')->name('reparation.export');
    Route::post('/reparation/searchTrash','App\Http\Controllers\ReparationController@searchTrash')->name('reparation.searchTrash');
    Route::get('/reparation.exportSearch/{id}', 'App\Http\Controllers\ReparationController@exportSearch')->name('reparation.exportSearch');
    Route::get('/reparation/details/{id}', 'App\Http\Controllers\ReparationController@getDetails')->name('reparation.getDetails');
    Route::get('/reparation/chose/{id}','App\Http\Controllers\ReparationController@choseEntreType')->name('choseEntre');
    Route::get('/reparation/choseRep/{id}','App\Http\Controllers\ReparationController@choseRep')->name('choseRep');
    Route::get('/reparation/trash','App\Http\Controllers\ReparationController@trashedReparations')->name('reparation.trash');
    Route::get('/reparation/restore/{id}','App\Http\Controllers\ReparationController@restoreReparation')->name('reparation.restore');
    Route::get('/reparation/hard/delete/{id}','App\Http\Controllers\ReparationController@hardDelete')->name('reparation.hard.delete');    
    Route::post('/search/reparation','App\Http\Controllers\ReparationController@search')->name('reparation.search');
    Route::resource('reparation','App\Http\Controllers\ReparationController');
    Route::get('/reparation/soft/delete/{id}','App\Http\Controllers\ReparationController@softDelete')->name('reparation.soft.Delete');
    Route::get('/reparation/hard/delete/{id}','App\Http\Controllers\ReparationController@hardDelete')->name('reparation.hard.delete');

    //Routs For Vidange
    Route::get('/vidange/export','App\Http\Controllers\VidangeController@export')->name('vidange.export');
    Route::get('/vidange.exportSearch/{id}', 'App\Http\Controllers\VidangeController@exportSearch')->name('vidange.exportSearch');
    Route::post('/vidange/searchTrash','App\Http\Controllers\VidangeController@searchTrash')->name('vidange.searchTrash');
    Route::get('/vidange/details/{id}', 'App\Http\Controllers\VidangeController@getDetails')->name('vidange.getDetails');
    Route::get('/vidange/choseViden/{id}','App\Http\Controllers\VidangeController@choseViden')->name('choseViden');
    Route::get('/vidange/trash','App\Http\Controllers\VidangeController@trashedVidanges')->name('vidange.trash');
    Route::get('/vidange/restore/{id}','App\Http\Controllers\VidangeController@restoreVidange')->name('vidange.restore');
    Route::get('/vidange/hard/delete/{id}','App\Http\Controllers\VidangeController@hardDelete')->name('vidange.hard.delete');    
    Route::post('/search/vidange','App\Http\Controllers\VidangeController@search')->name('vidange.search');
    Route::resource('vidange','App\Http\Controllers\VidangeController');
    Route::get('/vidange/soft/delete/{id}','App\Http\Controllers\VidangeController@softDelete')->name('vidange.soft.Delete');
    Route::get('/vidange/hard/delete/{id}','App\Http\Controllers\VidangeController@hardDelete')->name('vidange.hard.delete');
    
    //Routs For Mission
    Route::get('/mession/car/{id}', 'App\Http\Controllers\MessionController@getDetails')->name('mession.getDetails');
    Route::get('/mession/export','App\Http\Controllers\MessionController@export')->name('mession.export');
    Route::get('/mession.exportSearch/{id}', 'App\Http\Controllers\MessionController@exportSearch')->name('mession.exportSearch');
    Route::get('/mession/ordreMession/{id}', 'App\Http\Controllers\MessionController@ordreMession')->name('ordreMession');
    Route::get('/mession/messionFinished/{id}', 'App\Http\Controllers\MessionController@messionFinished')->name('messionFinished');
    Route::post('/searchTrash/mession','App\Http\Controllers\MessionController@searchTrash')->name('mession.searchTrash');
    Route::get('/affectation/chose/{id}','App\Http\Controllers\MessionController@choseAffecType')->name('mession.choseAffecType');
    Route::get('/mession/details/{id}', 'App\Http\Controllers\MessionController@getDetailsMess')->name('getDetailsMess');
    Route::get('/mession/choseMiss/{id}','App\Http\Controllers\MessionController@choseMiss')->name('choseMiss');
    Route::get('/mession/trash','App\Http\Controllers\MessionController@trashedMessions')->name('mession.trash');
    Route::get('/mession/restore/{id}','App\Http\Controllers\MessionController@restoreMession')->name('mession.restore');
    Route::get('/mession/hard/delete/{id}','App\Http\Controllers\MessionController@hardDelete')->name('mession.hard.delete');    
    Route::post('/search/mession','App\Http\Controllers\MessionController@search')->name('mession.search');
    Route::resource('mession','App\Http\Controllers\MessionController');
    Route::get('/mession/soft/delete/{id}','App\Http\Controllers\MessionController@softDelete')->name('mession.soft.Delete');
    Route::get('/mession/hard/delete/{id}','App\Http\Controllers\MessionController@hardDelete')->name('mession.hard.delete');
    
    //Routs For Permanent
    Route::get('/permanent/export','App\Http\Controllers\PermanentController@export')->name('permanent.export');
    Route::get('/permanent.exportSearch/{id}', 'App\Http\Controllers\PermanentController@exportSearch')->name('permanent.exportSearch');
    Route::get('/permanent/affectaionDoc/{id}', 'App\Http\Controllers\PermanentController@affectaionDoc')->name('affectaionDoc');
    Route::get('/permanent/car/{id}', 'App\Http\Controllers\PermanentController@getDetails')->name('permanent.getDetails');
    Route::get('/permanent/permanent/{id}', 'App\Http\Controllers\PermanentController@permanentFinished')->name('permanentFinished');
    Route::get('/permanent/details/{id}', 'App\Http\Controllers\PermanentController@getDetailsMess')->name('getDetailsPerm');
    Route::get('/permanent/chosePerm/{id}','App\Http\Controllers\PermanentController@chosePer')->name('chosePerm');
    Route::get('/permanent/trash','App\Http\Controllers\PermanentController@trashedPermanents')->name('permanent.trash');
    Route::get('/permanent/restore/{id}','App\Http\Controllers\PermanentController@restorePermanent')->name('permanent.restore');
    Route::get('/permanent/hard/delete/{id}','App\Http\Controllers\PermanentController@hardDelete')->name('permanent.hard.delete');    
    Route::post('/search/permanent','App\Http\Controllers\PermanentController@search')->name('permanent.search');
    Route::post('/searchTrash','App\Http\Controllers\PermanentController@searchTrash')->name('permanent.searchTrash');
    Route::resource('permanent','App\Http\Controllers\PermanentController');
    Route::get('/permanent/soft/delete/{id}','App\Http\Controllers\PermanentController@softDelete')->name('permanent.soft.Delete');
    Route::get('/permanent/hard/delete/{id}','App\Http\Controllers\PermanentController@hardDelete')->name('permanent.hard.delete');

    


});
