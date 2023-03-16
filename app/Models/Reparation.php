<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reparation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['immatriculation','date_reparation', 'affectaion' ,'designation',
            'quantity','unit_price','totale_HT','totale_TTC'];

    protected $dates = ['deleted_at'];

    public function car()
    {
        return $this->belongsTo('App\Car','immatriculation');
    }
}
