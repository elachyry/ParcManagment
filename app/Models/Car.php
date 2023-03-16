<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['immatriculation','type_vehicule','marque','model',
    'carburant','consomation_moyen','puissance_fiscale','date_1ere_immat','propriete','date_acquisition_location',
    'kilometrage','km_effectues_depuis_debut_annee','date_dernier_controle_technique',
    'cadence_vidange','km_derniere_vidange','cadence_courroie',
    'km_derniere_courroie','remarque_sur_etat_generale','image_path'
    ];

    protected $dates = ['deleted_at'];

}
