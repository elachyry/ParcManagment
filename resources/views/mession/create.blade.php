@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Missions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Affectaions</li>
                <li class="breadcrumb-item"><a href="{{route('mession.index')}}">Missions</a></li>
                <li class="breadcrumb-item active">Ajouter</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="jumbotron">
        <a href="{{route('mession.index')}}" class="btn btn-secondary"><i
                class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
        <hr class="my-4">
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('failed0'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('failed1'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('failed2'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('failed3'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
    @foreach($errors->all() as $error)
    @if($error == 'The date depart must be a date after or equal to Date Acquisition.')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        La date de départ doit être postérieure à la date d'acquisition location!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif($error == 'The date retour must be a date after or equal to date depart.')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        La date de retour doit être postérieure à la date de départ!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- {{$error}} -->
    @endforeach
    @endif


    @php
    @endphp
    <section class="section dashboard">
        <form action="{{route('mession.store')}}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf


            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">CIN*</label>
                <select class="form-select" id="cin" name="cin" required>
                    <option selected disabled value="">Choisir...</option>
                    @foreach($cins as $cin)
                    <option value="{{$cin->cin}}" {{$cin->cin == $employee->cin ? 'selected' : ''}}> {{$cin->cin}}
                    </option>
                    @endforeach
                    <div class="invalid-feedback">
                        Veuillez choisir un CIN .
                    </div>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Prénom*</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{Request::is('mession/choseMiss/'.$employee->id) ? $employee->first_name : ''}}" readonly
                    required>
                <div class="invalid-feedback">
                    Veuillez choisir une Prénom valide.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Nom*</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{Request::is('mession/choseMiss/'.$employee->id) ? $employee->last_name : ''}}" readonly
                    required>
                <div class="invalid-feedback">
                    Veuillez choisir une Nom valide.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Numéro Téléphone*</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{Request::is('mession/choseMiss/'.$employee->id) ? $employee->phone : ''}}" required
                    readonly>
                <div class="invalid-feedback">
                    Veuillez choisir un model valide.
                </div>
            </div>
            <div class="col-md-3" hidden>
                <label for="validationCustom03" class="form-label">Fonction*</label>
                <input type="text" class="form-control" id="job" name="job"
                    value="{{Request::is('mession/choseMiss/'.$employee->id) ? $employee->job : ''}}" required readonly>
                <div class="invalid-feedback">
                    Veuillez choisir une Fonction valide.
                </div>
            </div>
            <div class="col-md-3" hidden>
                <label for="validationCustom03" class="form-label">Statut*</label>
                <input type="text" class="form-control" id="statut" name="statut" value="En Attendant" required
                    readonly>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Immatriculation*</label>
                <select class="form-select" id="immat" name="immatriculation" required>
                    <option selected disabled value="">Choisir...</option>
                    @foreach($mats as $mat)
                    <option value="{{$mat->immatriculation}}" {{ $car->immatriculation == $mat->immatriculation ? 'selected' : ''}}> {{$mat->immatriculation}}</option>
                    @endforeach
                </select>

                <div class="invalid-feedback">
                    Veuillez choisir un matricule .
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Marque*</label>
                <input type="text" class="form-control" id="marque" name="marque" value="{{Request::is('car/choseMiss/'.$car->id) ? $car->marque : ''}}" disabled required>
                <div class="invalid-feedback">
                    Veuillez choisir une marque valide.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Model*</label>
                <input type="text" class="form-control" id="model" name="model" value="{{Request::is('car/choseMiss/'.$car->id) ? $car->model : ''}}" disabled required>
                <div class="invalid-feedback">
                    Veuillez choisir un model valide.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Date Acquisition*</label>
                <input type="date" id="validationCustom" class="form-control" name="date_acquisition_location" required>
                <div class="invalid-feedback">
                    Veuillez choisir la Date d'acauisition Location.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Date de Départ*</label>
                <input type="date" id="validationCustom12" class="form-control" name="date_depart" required>
                <div class="invalid-feedback">
                    Veuillez choisir la Date de Départ.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Date de Retour*</label>
                <input type="date" id="validationCustom87" class="form-control" name="date_retour" required>
                <div class="invalid-feedback">
                    Veuillez choisir la Date de Retour.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Type de Mission*</label>
                <input type="text" class="form-control" id="validationCustom10" name="type_mission" value="" required>
                <div class="invalid-feedback">
                    Veuillez choisir Type de Mission.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Destination</label>
                <input type="text" class="form-control" id="validationCustom10" name="destination" value="">
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Distance Parcourue (Km)</label>
                <input type="number" class="form-control" id="validationCustom10" name="distance_parcourue" value="">
            </div>



            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Accepter d'ajouter cette Affectaion*.
                    </label>
                    <div class="invalid-feedback">
                        Vous devez accepter avant de soumettre.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajouter Affectaion</button>
            </div>
        </form>
    </section>

</main>
<script>
$('#immat').change(function() {
    var id = $(this).val();
    console.log(id);
    var url = '{{ route("mession.getDetails", ":id") }}';
    url = url.replace(':id', id);
    console.log(url);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response) {
            if (response != null) {
                $('#model').val(response.model);
                $('#marque').val(response.marque);
            }
        }
    });
});
$('#cin').change(function() {
    var id = $(this).val();
    console.log(id);
    var url = '{{ route("getDetailsMess", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response) {
            if (response != null) {
                $('#first_name').val(response.first_name);
                $('#last_name').val(response.last_name);
                $('#phone').val(response.phone);
                $('#job').val(response.job);
            }
        }
    });
});

$('#qty').change(function() {
    var qty = $(this).val();
    var prix_ut = $('#prix').val();
    console.log(qty);
    console.log(prix_ut);
    document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
    var prix_ht = document.getElementById("prix-ht").value;
    document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

});
$('#prix').change(function() {
    var prix_ut = $(this).val();
    var qty = $('#qty').val();
    console.log(qty);
    console.log(prix_ut);
    document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
    var prix_ht = document.getElementById("prix-ht").value;
    document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

});
$('#vid').change(function() {
    var vid = $(this).val();
    var next_vid = $('#next-vid').val();
    console.log(next_vid);
    document.getElementById("next-vid").value = parseFloat(vid) + 8000;


});
</script>

@endsection