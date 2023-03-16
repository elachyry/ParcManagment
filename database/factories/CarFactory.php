<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'immatriculation' => $this->faker->unique()->ean8(),
            'type_vehicule' => $this->faker->word(),
            'marque' => $this->faker->word(),
            'model' => $this->faker->word(),
            'consomation_moyen' => $this->faker->numberBetween($min = 4, $max = 40),
            'puissance_fiscale' => $this->faker->numberBetween($min = 7, $max = 20),
            'carburant' => 'Essance',
            'date_1ere_immat' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'propriete' => 'Bon Etat',
            'date_acquisition_location' =>  $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'kilometrage' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'km_effectues_depuis_debut_annee' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'date_dernier_controle_technique' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cadence_vidange' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'km_derniere_vidange' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'cadence_courroie' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'km_derniere_courroie' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'remarque_sur_etat_generale' => $this->faker->paragraph(),
        ];
    }
}
