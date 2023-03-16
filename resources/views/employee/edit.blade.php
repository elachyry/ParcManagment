@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Utilisateurs</a></li>
          <li class="breadcrumb-item active">Modifier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="jumbotron">
        <a href="{{route('employee.index')}}" class="btn btn-secondary" ><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>        
        <hr class="my-4">
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
      @foreach($errors->all() as $error)
        @if($error == 'The cin has already been taken.')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                  CIN a déjà été prise!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif($error == 'The phone has already been taken.')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                  Numéro de Téléphone a déjà été prise!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @elseif($error == 'The phone must be at least 10 characters.')
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    Numéro de Téléphone doit comporter au moins 10 numéros.!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @endforeach
    @endif

    <section class="section dashboard">
    <form action="{{ url('employee/'.$employee->id)}}" method="post" class="row g-3 needs-validation" novalidate>
        @csrf
        @method('PUT')
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">CIN*</label>
                  <input type="text" class="form-control" id="validationCustom01" name="cin" value="{{$employee->cin}}" required>
                  <div class="invalid-feedback">
                  Veuillez choisir un CIN valide.
                  </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Prénom*</label>
                    <input type="text" class="form-control" id="validationCustom02" name="first_name" value="{{$employee->first_name}}" required>
                    <div class="invalid-feedback">
                    Veuillez choisir un Prénom valide.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Nom*</label>
                    <input type="text" class="form-control" id="validationCustom03" name="last_name" value="{{$employee->last_name}}" required>
                    <div class="invalid-feedback">
                    Veuillez choisir un Nom valide.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Fonction*</label>
                    <input type="text" class="form-control" id="validationCustom04" name="job" value="{{$employee->job}}"  required>
                    <div class="invalid-feedback">
                      Veuillez choisir une Fonction valide.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Numéro Téléphone*</label>
                    <input type="number" class="form-control" id="validationCustom05" name="phone" value="{{$employee->phone}}"  required>
                    <div class="invalid-feedback">
                      Veuillez choisir un Numéro de Téléphone valide.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom06" class="form-label"> Adresse</label>
                    <input type="text" class="form-control" id="validationCustom06" name="address" value="{{$employee->address}}" >
                  </div>
                  

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Accepter de modifier cette Utilisateur*.
                    </label>
                    <div class="invalid-feedback">
                      Vous devez accepter avant de soumettre.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Modifier Utilisateur</button>
                </div>
              </form>
    </section>

  </main>

@endsection