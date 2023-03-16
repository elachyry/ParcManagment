@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Vidanges</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('vidange.index')}}">Vidanges</a></li>
          <li class="breadcrumb-item active">Afficher</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <header class="py-12">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5" >
                        <h1 class="display-5 fw-bold" style="padding-top:-120px;">{{$data->marque}} {{$data->model}}</h1>
                        <h2 class="fs-4"> {{$vidange->immatriculation}}</h2>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('vidange.index')}}"><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                        <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('vidange.edit',$vidange->id)}}"><i class="bi bi-pencil me-1"></i>Modifier</a>
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
              <p><center>{{$vidange->immatriculation}}</center></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Date Vidange</center> </h5>
                    <p><center>{{$vidange->date_vidange}}</center></p>
            </div>
          </div>
        </div>
        
</div>
<div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Kilomitrage</center> </h5>

                  @if($vidange->kilomitrage)
                      <p><center>{{$vidange->kilomitrage}}</center></p>
                  @else
                      <p><center>ــــ</center></p>
                  @endif
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Kilomitrage de Prochaine Vidange</center> </h5>
              @if($vidange->kilomitrage_next_vidange)
                      <p><center>{{$vidange->kilomitrage_next_vidange}}</center></p>
                  @else
                      <p><center>ــــ</center></p>
                  @endif
            </div>
          </div>
        </div>
         
</div>
<div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Type Huile</center> </h5>
              <p><center>{{$vidange->type_huile}}</center></p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Quantité Huile</center> </h5>
              <p><center>{{$vidange->quantity_huile}}</center></p>
            </div>
          </div>
        </div>
         
</div>
        <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Prix DH/L</center> </h5>
                    <p><center>{{$vidange->liter_price}}</center></p>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Totale HT</center> </h5>
                    <p><center>{{$vidange->totale_HT}}</center></p>
            </div>
          </div>
        </div>
</div>
<div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><center>Totale TTC</center> </h5>
                    <p><center>{{$vidange->totale_TTC}}</center></p>
            </div>
          </div>
        </div>
        </div>
</div>
        



    </section>


  </main>

@endsection