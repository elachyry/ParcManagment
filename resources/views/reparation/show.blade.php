@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Réparations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('reparation.index')}}">Réparations</a></li>
          <li class="breadcrumb-item active">Afficher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <header class="py-12">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5" >
                        <h1 class="display-5 fw-bold" style="padding-top:-120px;">{{$data->marque}} {{$data->model}}</h1>
                        <h2 class="fs-4"> {{$reparation->immatriculation}}</h2>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('reparation.index')}}"><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('reparation.edit',$reparation->id)}}"><i class="bi bi-pencil me-1"></i>Modifier</a>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
    </header>

    <section class="section">


      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Immatriculation</center> </h5>
              <p><center>{{$reparation->immatriculation}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Date Réparation</center> </h5>
                    <p><center>{{$reparation->date_reparation}}</center></p>
            </div>
          </div>
        </div>
        
</div>
<div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Désignation</center> </h5>
              <p><center>{{$reparation->designation}}</center></p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Quantité</center> </h5>
              <p><center>{{$reparation->quantity}}</center></p>
            </div>
          </div>
        </div>
         
</div>
        <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Prix UT</center> </h5>
                    <p><center>{{$reparation->unit_price}}</center></p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Prix HT</center> </h5>
                    <p><center>{{$reparation->totale_HT}}</center></p>
            </div>
          </div>
        </div>
</div>
<div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Prix TTC</center> </h5>
                    <p><center>{{$reparation->totale_TTC}}</center></p>
            </div>
          </div>
        </div>
        </div>
</div>
        



    </section>


  </main>

@endsection