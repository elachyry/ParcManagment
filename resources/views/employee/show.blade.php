@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Utilisateurs</a></li>
          <li class="breadcrumb-item active">Afficher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <header class="py-12">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5" >
                        <h1 class="display-5 fw-bold" style="padding-top:-120px;">{{$employee->first_name}} {{$employee->last_name}}</h1>
                        <h2 class="fs-4"> {{$employee->job}}</h2>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('employee.index')}}"><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('employee.edit',$employee->id)}}"><i class="bi bi-pencil me-1"></i>Modifier</a>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
    </header>

    <section class="section">


      <div class="row">

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>CIN</center> </h5>
              <p><center>{{$employee->cin}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Prénom</center> </h5>
                    <p><center>{{$employee->first_name}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Nom</center> </h5>
              <p><center>{{$employee->last_name}}</center></p>
            </div>
          </div>
        </div>
</div>
<div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Fonction</center> </h5>
              <p><center>{{$employee->job}}</center></p>
            </div>
          </div>
        </div>
         


        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Numéro Téléphone</center> </h5>
                    <p><center>{{$employee->phone}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Adresse</center> </h5>
                @if($employee->puissance_fiscale)
                    <p><center>{{$employee->address}}</center></p>
                @else
                    <p><center>ــــ</center></p>
                @endif
            </div>
          </div>
        </div>
        </div>
        
        </div>


    </section>


  </main>

@endsection