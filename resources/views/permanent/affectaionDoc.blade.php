<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style=" font-family: 'Open Sans', sans-serif;font-size:16px">
        <div>
            <strong>
                ROYAULE DU MAROC <br>
                MINISTERE DE L'INTERIEUR <br>
                REGION DAKHLA OUED EDDAHAB <br>
                DIRECTION GENERALE DES SERVICES <br>
            </strong>
        </div>

        <div style="margin-top:130px;margin-left:180px;font-size:24px">
            <strong>AFFECTATION DE VEHICULE</strong>
        </div>
        <div style="margin-left:290px;font-size:24px">
            <strong>DU SERVICE</strong>
        </div>


        <div style="margin-top:120px">
            <table style="margin-left:0px; font-size:12px;  line-height: 2;width:100%">

                <tr style="margin-left:0px;">
                    <td style="width:60%">MARQUE ET TYPE:</td>
                    <td><strong>{{$data->marque}} {{$data->model}}</strong></td>
                </tr>
                <tr>
                    <td>N° MINERALOGIQUE :</td>
                    <td><strong>{{$permanent->immatriculation}}</strong></td>
                </tr>
                <tr>
                    <td>DATE DE MISE EN CIRCULATION :</td>
                    <td><strong>{{$data->date_1ere_immat}}</strong></td>
                </tr>
                <tr>
                    <td>ETAT DE VEHICULE :</td>
                    <td><strong>{{$data->propriete}}</strong></td>
                </tr>
                <tr>
                    <td>AFFECTATION :</td>
                    <td><strong>{{$dataEmp->first_name}} {{$dataEmp->last_name}}</strong></td>
                </tr>
                <tr>
                    <td>CIN :</td>
                    <td><strong>{{$permanent->cin}}</strong></td>
                </tr>
                <tr>
                    <td>FONCTION :</td>
                    <td><strong>{{$permanent->job}}</strong></td>
                </tr>
                <tr>
                    <td colspan="2"> Ce véhicule est affecté avec <strong>{!!$permanent->note!!}</strong> </td>
                </tr>
            </table>
        </div>
        <div style="margin-top:140px">
            <table style="margin-left:0px;width:100%;font-size:16px">

                <tr>
                    <td style="width:60%"> <strong>
                            DAKHLA, LE _____________/ <br>
                            PARTIE PRENANTE  <br>
                        </strong></td>
                    <td> <strong>
                            DAKHLA, LE _____________/ <br>
                            LE PRESIDENT DE LA REGION <br>
                            DAKHLA OUED EDDAHAB
                        </strong></td>
                </tr>
            </table>
        </div>

        <!-- <div style=" margin-top:120px;margin-bottom:30px;margin-right:30px">
            <strong>
                DAKHLA, LE _____________/ <br>
                LE PRESIDENT DE LA REGION <br>
                DAKHLA OUED EDDAHAB


            </strong>
        </div>

        <div style=" margin-left:450px;margin-top:120px;margin-bottom:30px;margin-right:30px">
            <strong>
                DAKHLA, LE _____________/ <br>
                LE PRESIDENT DE LA REGION <br>
                DAKHLA OUED EDDAHAB
            </strong>
        </div> -->
    </div>
</body>

</html>