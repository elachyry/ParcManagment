@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Véhicules</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('car.index')}}">Véhicules</a></li>
          <li class="breadcrumb-item active">Afficher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <header class="py-12">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5" >
                      <!-- <img src="{{asset('carImages/'.$car->image_path)}}" class="rounded mx-auto d-block" alt="..."> -->
                      @if($car->image_path)
                      <div class="text-center">
                        <img src="{{asset('carImages/'.$car->image_path)}}" class="img-fluid" alt="...">
                      </div>
                      @endif
                      <h1 class="display-5 fw-bold" style="padding-top:-120px;">{{$car->marque}} {{$car->model}}</h1>
                        <h2 class="fs-4"> {{$car->immatriculation}}</h2>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('car.index')}}"><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('car.edit',$car->id)}}"><i class="bi bi-pencil me-1"></i>Modifier</a>
                        <a class="btn btn-secondary" style="margin-top:12px;"
                        href="{{route('ficheTech',$car->id)}}"><i class="bi bi-file-pdf me-1"></i>Fiche Technique</a>
                        
                        <hr class="my-4">
                    </div>
                </div>
            </div>
    </header>

    <section class="section">


      <div class="row">

        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Immatriculation</center> </h5>
              <p><center>{{$car->immatriculation}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Type Vehicule</center> </h5>
                @if($car->type_vehicule)
                    <p><center>{{$car->type_vehicule}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Marque</center> </h5>
              <p><center>{{$car->marque}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Model</center> </h5>
              <p><center>{{$car->model}}</center></p>
            </div>
          </div>
        </div>
         
      </div>
      <div class="row">

        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Consomation Moyen</center> </h5>
                @if($car->consomation_moyen)
                    <p><center>{{$car->consomation_moyen}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Puissance Fiscale</center> </h5>
                @if($car->puissance_fiscale)
                    <p><center>{{$car->puissance_fiscale}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Carburant</center> </h5>
              <p><center>{{$car->carburant}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Date 1<sup>ere</sup> Immat</center> </h5>
                @if($car->date_1ere_immat)
                    <p><center>{{$car->date_1ere_immat}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        
      </div>
      <div class="row">

        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Etat</center> </h5>
              <p><center>{{$car->propriete}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Date Acquisition</center> </h5>
              <p><center>{{$car->date_acquisition_location}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Kilometrage</center> </h5>
                @if($car->kilometrage)
                    <p><center>{{$car->kilometrage}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Km Effectues depuis le début l'année</center> </h5>
                @if($car->km_effectues_depuis_debut_annee)
                    <p><center>{{$car->km_effectues_depuis_debut_annee}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        
      </div>
      <div class="row">

        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Date Dernier Controle Technique</center> </h5>
                @if($car->date_dernier_controle_technique)
                    <p><center>{{$car->date_dernier_controle_technique}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Cadence Vidange</center> </h5>
                @if($car->cadence_vidange)
                    <p><center>{{$car->cadence_vidange}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Km Dernière Vidange</center> </h5>
                @if($car->km_derniere_vidange)
                    <p><center>{{$car->km_derniere_vidange}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Cadence Courroie</center> </h5>
                @if($car->cadence_courroie)
                <p><center>{{$car->cadence_courroie}}</center></p>
                @else
                <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        
      </div>
      
      <div class="row">

        <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title"><center>Km Derniere Courroie</center> </h5>
            @if($car->km_derniere_courroie)
                <p><center>{{$car->km_derniere_courroie}}</center></p>
            @else
                <p><center>ــــ</center></p>
            @endif
            </div>
        </div>
        </div>
        <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title"><center>Remarque Sur Etat Générale</center> </h5>
            @if($car->remarque_sur_etat_generale)
                <p><center>{{$car->remarque_sur_etat_generale}}</center></p>
            @else
                <p><center>ــــ</center></p>
            @endif
            </div>
        </div>
        </div>

        </div>

    </section>


  </main>

@endsection