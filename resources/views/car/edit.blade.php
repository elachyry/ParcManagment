@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Véhicules</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('car.index')}}">Véhicules</a></li>
          <li class="breadcrumb-item active">Modifier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="jumbotron">
        <a href="{{route('car.index')}}" class="btn btn-secondary" ><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>        
        <hr class="my-4">
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section dashboard">
    <form action="{{ url('car/'.$car->id)}}" method="post" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="col-md-3">
                  <label for="validationCustom01" class="form-label">Image</label>
                  <input type="file" class="form-control" id="validationCustom01" name="image_path" value="" >
                </div>
                <div class="col-md-3">
                  <label for="validationCustom01" class="form-label">Immatriculation*</label>
                  <input type="text" class="form-control" id="validationCustom01" name="immatriculation" value="{{$car->immatriculation}}" required>
                  <div class="invalid-feedback">
                    Veuillez choisir un matricule valide.
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Marque*</label>
                    <input type="text" class="form-control" id="validationCustom02" name="marque" value="{{$car->marque}}" required>
                    <div class="invalid-feedback">
                      Veuillez choisir une marque valide.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Model*</label>
                    <input type="text" class="form-control" id="validationCustom03" name="model" value="{{$car->model}}" required>
                    <div class="invalid-feedback">
                      Veuillez choisir un model valide.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Type Vehicule</label>
                    <input type="text" class="form-control" id="validationCustom04" name="type_vehicule" value="{{$car->type_vehicule}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Puissance Fiscale</label>
                    <input type="number" class="form-control" id="validationCustom05" name="puissance_fiscale" value="{{$car->puissance_fiscale}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom06" class="form-label">Consomation Moyen</label>
                    <input type="number" class="form-control" id="validationCustom06" name="consomation_moyen" value="{{$car->consomation_moyen}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom07" class="form-label">Carburant*</label>
                    <select class="form-select" id="validationCustom07" name="carburant" required>
                      <option selected disabled value="">Choisir...</option>
                      @if($car->carburant == "Gazole" )
                        <option value="Gazole" selected>Gazole </option>
                        <option value="Essence">Essence </option>
                      @else
                        <option value="Gazole" >Gazole </option>
                        <option value="Essence" selected>Essence </option>
                      @endif
                    </select>
                    <div class="invalid-feedback">
                      Veuillez choisir le carburant.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom08" class="form-label">L'état* </label>
                    <select class="form-select" id="validationCustom08" name="propriete" required>
                        <option selected disabled value="">Choisir...</option>
                        @if($car->propriete == "Bon Etat" )
                            <option value="Bon Etat" selected>Bon Etat</option>
                            <option value="Moyen">Moyen</option>
                            <option value="En panne">En panne</option>
                            <option value="Hors usage">Hors usage</option>
                            <option value="Reformer">Reformer</option>
                        @elseif($car->propriete == "Moyen" )
                            <option value="Bon Etat" >Bon Etat</option>
                            <option value="Moyen" selected>Moyen</option>
                            <option value="En panne">En panne</option>
                            <option value="Hors usage">Hors usage</option>
                            <option value="Reformer">Reformer</option>
                        @elseif($car->propriete == "En panne" )
                            <option value="Bon Etat" >Bon Etat</option>
                            <option value="Moyen" >Moyen</option>
                            <option value="En panne" selected>En panne</option>
                            <option value="Hors usage">Hors usage</option>
                            <option value="Reformer">Reformer</option>
                        @elseif($car->propriete == "Reformer" )
                            <option value="Bon Etat" >Bon Etat</option>
                            <option value="Moyen" >Moyen</option>
                            <option value="En panne" >En panne</option>
                            <option value="Hors usage" >Hors usage</option>>
                            <option value="Reformer" selected>Reformer</option>
                        @else
                            <option value="Bon Etat" >Bon Etat</option>
                            <option value="Moyen" >Moyen</option>
                            <option value="En panne" >En panne</option>
                            <option value="Hors usage" selected>Hors usage</option>>
                            <option value="Reformer" >Reformer</option>
                         @endif
                    </select>
                    <div class="invalid-feedback">
                      Veuillez choisir le l'état.
                    </div>
                  </div>
                
                <div class="col md-3">
                  <label for="validationCustom09" class="form-label">Date 1<sup>ere</sup> Immat</label>
                    <input type="date" id="validationCustom09" class="form-control" name="date_1ere_immat" value="{{$car->date_1ere_immat}}">
                </div>
                <div class="col md-3">
                  <label for="validationCustom10" class="form-label">Date Acquisition</label>
                    <input type="date" id="validationCustom10" class="form-control" name="date_acquisition_location" value="{{$car->date_acquisition_location}}" required>
                  <div class="invalid-feedback">
                    Veuillez choisir la date d'Acquisition/Location.
                  </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Kilometrage</label>
                    <input type="number" class="form-control" id="validationCustom04" name="kilometrage" value="{{$car->kilometrage}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Km Effectues depuis le début l'année</label>
                    <input type="number" class="form-control" id="validationCustom05" name="km_effectues_depuis_debut_annee" value="{{$car->km_effectues_depuis_debut_annee}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom06" class="form-label">Date Dernier Controle Technique</label>
                    <input type="date" id="validationCustom09" class="form-control" name="date_dernier_controle_technique" value="{{$car->date_dernier_controle_technique}}">
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Cadence Vidange</label>
                    <input type="text" class="form-control" id="validationCustom05" name="cadence_vidange" value="{{$car->cadence_vidange}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Km Dernière Vidange</label>
                    <input type="number" class="form-control" id="validationCustom05" name="km_derniere_vidange" value="{{$car->km_derniere_vidange}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Cadence Courroie</label>
                    <input type="text" class="form-control" id="validationCustom05" name="cadence_courroie" value="{{$car->cadence_courroie}}" >
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Km Derniere Courroie</label>
                    <input type="number" class="form-control" id="validationCustom05" name="km_derniere_courroie" value="{{$car->km_derniere_courroie}}" >
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Remarque Sur Etat Générale</label>
                    <textarea class="form-control" name="remarque_sur_etat_generale" placeholder="Remarque..." id="floatingTextarea" style="height: 100px;" >
                        {!!$car->remarque_sur_etat_generale!!}
                    </textarea>
                  </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Accepter de modifier cette véhicule*.
                    </label>
                    <div class="invalid-feedback">
                      Vous devez accepter avant de soumettre.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Modifier Véhicule</button>
                </div>
              </form>
    </section>

  </main>

@endsection