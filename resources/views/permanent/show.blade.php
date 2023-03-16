@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Affectaions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Affectaions</li>
                <li class="breadcrumb-item"><a href="{{route('permanent.index')}}">Permanent</a></li>
                <li class="breadcrumb-item active">Afficher</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <header class="py-12">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold" style="padding-top:-120px;">{{$dataEmp->first_name}}
                        {{$dataEmp->last_name}}</h1>
                    <h2 class="fs-4"> {{$permanent->immatriculation}}</h2>
                    <h2 class="fs-4"> @if($permanent->statut == "En Attendant")
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                            {{$permanent->statut}}
                        </span>
                        @elseif($permanent->statut == "active")
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-green dark:bg-green-600">
                            {{$permanent->statut}}
                        </span>
                        @elseif($permanent->statut == "complété")
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-700">
                            {{$permanent->statut}}
                        </span>
                        @else
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red dark:bg-red-600">

                            {{$permanent->statut}}
                        </span>
                        @endif
                    </h2>

                    <a class="btn btn-secondary" style="margin-top:12px;" href="{{route('permanent.index')}}"><i
                            class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                    <a class="btn btn-secondary" style="margin-top:12px;"
                        href="{{route('permanent.edit',$permanent->id)}}"><i class="bi bi-pencil me-1"></i>Modifier</a>
                    <a class="btn btn-secondary" style="margin-top:12px;"
                        href="{{route('permanentFinished',$permanent->id)}}"><i
                            class="bi bi-check2-square me-1"></i>complété</a>
                    <a class="btn btn-secondary" style="margin-top:12px;"
                        href="{{route('affectaionDoc',$permanent->id)}}"><i class="bi bi-file-pdf me-1"></i>Affectaion</a>
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
                        <h3 class="card-title">
                            <center>CIN</center>
                            </h5>
                            <p>
                                <center>{{$permanent->cin}}</center>
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Prénom</center>
                            </h5>
                            <p>
                                <center>{{$permanent->first_name}}</center>
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Nom</center>
                            </h5>
                            <p>
                                <center>{{$permanent->last_name}}</center>
                            </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Numéro Téléphone</center>
                            </h5>
                            <p>
                                <center>{{$permanent->phone}}</center>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Fonction</center>
                            </h5>
                            <p>
                                <center>{{$permanent->job}} </center>
                            </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Marque</center>
                            </h5>
                            <p>
                                <center>{{$data->marque}}</center>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Modele</center>
                            </h5>
                            <p>
                                <center>{{$data->model}}</center>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Immatriculation</center>
                            </h5>
                            <p>
                                <center>{{$permanent->immatriculation}}</center>
                            </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Date Acquisition</center>
                            </h5>
                            <p>
                                <center>{{$permanent->date_acquisition_location}}</center>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <center>Ce véhicule est affecté avec</center>
                            </h5>
                        
                            @if($permanent->note)
                                <p><center>{{$permanent->note}}</center></p>
                            @else
                                <p><center>Rien</center></p>
                            @endif
                    </div>
                </div>
            </div>
        </div>






    </section>


</main>

@endsection