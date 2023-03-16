<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style=" font-family: 'Open Sans', sans-serif;font-size:12px">
        <div>
            <strong>
            ROYAULE DU MAROC<br>
            MINISTERE DE L'INTERIEUR<br>
            REGION DAKHLA OUED EDDAHAB<br>
            DIRECTION DES AFFAIRES FINANCIÈRES, DES ADMINISTRATIONS ET DES ÉQUIPEMENTS<br>
            DIVISION DE LA GESTION DU DOMAINE PUBLIC ET LES BIENS RÉGIONAUX<br>
            SERVICE TRANSPORT ET LOGISTIQUE<br>

            </strong>
        </div>

        <div style="margin-top:40px;margin-left:158px;font-size:24px">
            <strong>Fich de contrôle de véhicule</strong>
        </div>
        <div style="margin-left:250px;font-size:30px">
            <strong></strong>
        </div>
        @php
        use Carbon\Carbon;
        $currentDateTime = Carbon::now();
        $newDateTime =date('Y-m-d', strtotime($currentDateTime))
        @endphp
        <div style="margin-left:70%;margin-top:20px;font-size:10px">
            <span>Date: {{$newDateTime}}</span>
        </div>

        <div style="margin-top:40px">
            <table style="margin-left:0px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px;">
                    <td style="width:20%">N véhicule:</td>
                    <td style="width:40%"><strong>{{$car->id}}</strong></td>
                    <td style="width:20%"></td>
                    <td><strong></strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:20%">immatriculation:</td>
                    <td style="width:40%"><strong>{{$car->immatriculation}}</strong></td>
                    <td style="width:20%">Type véhicule</td>
                    <td><strong>{{$car->type_vehicule}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:20%">Marque:</td>
                    <td style="width:40%"><strong>{{$car->marque}}</strong></td>
                    <td style="width:20%">Modèle:</td>
                    <td><strong>{{$car->model}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:20%">Energie:</td>
                    <td style="width:40%"><strong>{{$car->carburant}}</strong></td>
                    <td style="width:20%">Date acquisition:</td>
                    <td><strong>{{$car->date_acquisition_location}}</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <hr style=" border: 1px dotted ">
        <br>
        @php
        $dateOfBirth = $car->date_acquisition_location;
        $age = \Carbon\Carbon::parse($dateOfBirth)->age;
        @endphp
        <div>
            <table style="margin-left:0px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px;">
                    <td style="width:60%">Age du véhicule en années:</td>
                    <td><strong>{{$age}} ans</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Killométrage:</td>
                    <td><strong>{{$car->kilometrage}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Km effectués depuis le début de l'années:</td>
                    <td><strong>{{$car->km_effectues_depuis_debut_annee}}</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <hr style=" border: 1px dotted ">
        <br>
        <div>
            <table style="margin-left:0px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px;">
                    <td style="width:60%">Date Dernier Contrôle Technique:</td>
                    <td><strong>{{$car->date_dernier_controle_technique}}</strong></td>
                </tr>
                @php
                $date1 = Carbon::parse($car->date_dernier_controle_technique);
                $newDateTime =date('Y-m-d', strtotime($date1->addYear()))
                @endphp

                <tr style="margin-left:10px;">
                    <td style="width:50%">Date Prochaine Contrôle Technique:</td>
                    <td><strong>{{$newDateTime}}</strong></td>
                </tr>
                @php
                $result = 'Oui';
                $date1 = Carbon::parse($newDateTime);
                $currentDateTime = Carbon::now();
                if($date1->gte($currentDateTime)){
                $result = 'Non';
                }

                @endphp
                <tr style="margin-left:10px;">
                    <td style="width:50%">Date Contrôle Technique Dépassé?</td>
                    <td><strong>{{$result}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Cadence Vidange:</td>
                    <td><strong>{{$car->cadence_vidange}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Km Dernière Vidange:</td>
                    <td><strong>{{$car->km_derniere_vidange}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Vidange à Faire?</td>
                    <td><strong>................</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Cadence Courroie:</td>
                    <td><strong>{{$car->cadence_courroie}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Km Dernière Courroie:</td>
                    <td><strong>{{$car->km_derniere_courroie}}</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Courroie à remplacer?</td>
                    <td><strong>................</strong></td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:50%">Remarque Sur Etat Générale:</td>
                    <td><strong>{{$car->remarque_sur_etat_generale}}</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <table style="margin-left:0px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px; ">
                    <td colspan="2" style="height:7%;"> <strong><u> Liste de Contrôles Visuels à Effectuer:</u></strong>
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td style="width:20%">Propreté:</td>
                    <td style="width:80%">
                        .................................................................................................................................................
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td>Essuie-glaces:</td>
                    <td>.................................................................................................................................................
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td>Plaquettes de Frein:</td>
                    <td>.................................................................................................................................................
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td>Pneus:</td>
                    <td>.................................................................................................................................................
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td>Feux:</td>
                    <td>.................................................................................................................................................
                    </td>
                </tr>
                <tr style="margin-left:10px;">
                    <td>Autres:</td>
                    <td>.................................................................................................................................................
                    </td>
                </tr>
            </table>
        </div>
        <br>
        @php
        $array = $reparations;

        $out = array();
        $array = $reparations;
        foreach($array as $key=>$time) {
        $out[strtotime($key)] = $time;
        }
        sort($out);

        @endphp
        <div>
            <table style="margin-left:0px; margin-top:5px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px; ">
                    <td colspan="2" style="height:7%;"> <strong><u> Liste des Interventions Effectuées jusqu'à ce
                                jour:</u></strong>
                    </td>
                </tr>
            </table>
        </div>
        <Ul>
            @foreach($out as $key => $value)
            <li style="font-size:12px;  line-height: 1.8;">{{$value}}</li>
            @endforeach

        </Ul>
        <div>
            <table style="margin-left:0px; margin-top:5px; font-size:12px;  line-height: 1.8;width:100%">
                <tr style="margin-left:10px; ">
                    <td colspan="2" style="height:7%;"> <strong><u> Accrocs:</u></strong>
                    </td>
                </tr>
            </table>
            <img src="{{ public_path('/assets/auth/img/voiture.jpg') }}" alt="">
        </div>
        <div style=" margin-left:450px;margin-top:20px;margin-bottom:16px;margin-right:30px">
            <strong>
                <i>Signature du responsable:</i>
            </strong>
        </div>
    </div>
</body>

</html>