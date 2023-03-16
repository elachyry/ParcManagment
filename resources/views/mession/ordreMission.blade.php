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
        <div >
            <strong>
                ROYAULE DU MAROC <br>
                MINISTERE DE L'INTERIEUR <br>
                REGION DAKHLA OUED EDDAHAB <br>
                DIRECTION GENERALE DES SERVICES <br>
                N°  <span style="margin-left:100px;">s.m/d.g.s </span>
            </strong>
        </div>

        <div style="margin-top:200px;margin-left:210px;font-size:26px">
            <strong>ORDRE DE MISSION</strong>
        </div>
        <div style="margin-top:100px">
            <p style="margin-left:20px; font-size:15px;  line-height: 1.8;">
            <span style=" margin-left:50px;">Monsieur,&nbsp;</span><strong>{{$dataEmp->first_name}} {{$dataEmp->last_name}}</strong>,&nbsp; 
            &nbsp;<strong>{{$mession->job}}</strong>&nbsp; de la
             CIN : &nbsp;<strong>{{$mession->cin}}</strong>&nbsp; est autorisé
             à conduire la &nbsp;<strong>{{$data->marque}} {{$data->model}}</strong>&nbsp;  N° d’immatriculation&nbsp;<strong>{{$mession->immatriculation}}</strong>&nbsp; pour les besoins
              du service appartenant au parc de la région DAKHLA OUED EDDAHAB à travers l’ensemble du royaume. 
            </p>
        </div>

        <div style=" margin-left:450px;margin-top:140px;margin-bottom:16px;margin-right:30px">
            <strong>
            DAKHLA, LE  _____________/ <br>
		    LE PRESIDENT DE LA REGION <br>
		    DAKHLA OUED EDDAHAB


            </strong>
        </div>
    </div>
</body>
</html>