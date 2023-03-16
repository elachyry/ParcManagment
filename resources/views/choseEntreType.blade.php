@extends('layouts.auth')

@section('content')

<main id="main" class="main ">

    <section class="section dashboard ">
        <div class="card" style="margin-top:6%;">
            <div class="card-body">
                <center>
                    <h4 class="card-title" style="font-size: 35px;">Veuillez sélectionner le type d'entretien</h4>
                </center>
                <center>
                    <a href="{{route('choseViden',$id)}}" class="btn btn-dark"
                        style="font-size: 20px; margin: 10px 5px"><i class="bi bi-funnel me-1"></i> Vidange</a>
                    <a href="{{route('choseRep',$id)}}" class="btn btn-danger" style="font-size: 20px;"><i
                            class="bi bi-tools me-1"></i> Reaparations</a>
                </center>
            </div>
        </div>
        <h4 class="card-title" style="font-size: 35px;"><center>Ou Bien</center> </h4>

        <div class="card" style="margin-top:2%;">
            <div class="card-body">
            <center>
                    <h4 class="card-title" style="font-size: 35px;">Veuillez sélectionner le type d'affectation</h4>
                </center>
                <center>
                    <a href="{{route('car.choseMiss',$id)}}" class="btn btn-warning"
                        style="font-size: 20px; margin: 10px 5px"><i class="bi bi-hourglass me-1"></i> Mission</a>
                    <a href="{{route('car.chosePerm',$id)}}" class="btn btn-success" style="font-size: 20px;"><i
                            class="bi bi-infinity me-1"></i> Permanent</a>
                </center>
            </div>
        </div>
    </section>

</main>


@endsection