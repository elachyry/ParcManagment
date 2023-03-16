<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['immatriculation','cin','first_name','last_name','job','phone' ,'date_acquisition_location',
    'date_depart','date_retour','type_mission','destination','distance_parcourue','statut'];

    protected $dates = ['deleted_at'];

    public function car()
    {
        return $this->belongsTo('App\Car','immatriculation');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee','cin');
    }
}
