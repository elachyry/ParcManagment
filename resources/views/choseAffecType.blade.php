@extends('layouts.auth')

@section('content')

<main id="main" class="main ">

    <section class="section dashboard ">
        <div class="card" style="margin-top:17%;">
            <div class="card-body">
                <center>
                    <h4 class="card-title" style="font-size: 35px;">Veuillez sélectionner le type d'affectation</h4>
                </center>
                <center>
                    <a href="{{route('choseMiss',$id)}}" class="btn btn-warning"
                        style="font-size: 20px; margin: 10px 5px"><i class="bi bi-hourglass me-1"></i> Mission</a>
                    <a href="{{route('chosePerm',$id)}}" class="btn btn-success" style="font-size: 20px;"><i
                            class="bi bi-infinity me-1"></i> Permanent</a>
                </center>
            </div>
        </div>
    </section>

</main>


@endsection