@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Réparation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('reparation.index')}}">Employés</a></li>
          <li class="breadcrumb-item active">Modifier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="jumbotron">
        <a href="{{route('reparation.index')}}" class="btn btn-secondary" ><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>        
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
    <form action="{{ url('reparation/'.$reparation->id)}}" method="post" class="row g-3 needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Immatriculation*</label>
                  <select class="form-select" id="immat" name="immatriculation" required>
                      <option selected disabled value="">Choisir...</option>
                      @foreach($mats as $mat)
                        <option value="{{$mat->immatriculation}}" {{$mat->immatriculation == $reparation->immatriculation ? 'selected' : ''}} > {{$mat->immatriculation}} </option>
                      @endforeach
                  </select>
                  
                  <div class="invalid-feedback">
                  Veuillez choisir un matricule valide.
                  </div>
                </div>
                
                <div class="col-md-2">
                    <label for="validationCustom02" class="form-label">Marque*</label>
                    <!-- <input type="text" class="form-control" id="marque" name="first_name" value="{{Request::is('reparation/choseViden/'.$car->id) ? $car->marque : ''}}" {{Request::is('reparation/choseViden/'.$car->id) ? 'disabled' : ''}} required> -->
                    <input type="text" class="form-control" id="marque" name="marque" value="{{$data->marque}}" disabled required>
                    <div class="invalid-feedback">
                    Veuillez choisir une marque valide.
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="validationCustom03" class="form-label"  >Model*</label>
                    <!-- <input type="text" class="form-control" id="model" name="last_name" value="{{Request::is('reparation/choseViden/'.$car->id) ? $car->model : ''}}" {{Request::is('reparation/choseViden/'.$car->id) ? 'disabled' : ''}} required> -->
                    <input type="text" class="form-control" id="model" name="model" value="{{$data->model}}" disabled required>
                    <div class="invalid-feedback">
                    Veuillez choisir un model valide.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom03" class="form-label"  >Affectaion*</label>
                    <!-- <input type="text" class="form-control" id="affectaion" name="last_name" value="{{Request::is('reparation/choseViden/'.$car->id) ? $car->model : ''}}" {{Request::is('reparation/choseViden/'.$car->id) ? 'disabled' : ''}} required> -->
                    <input type="text" class="form-control" id="affectaion" name="affectaion" value="{{$reparation->affectaion}}" readonly required>
                    <div class="invalid-feedback">
                    Veuillez choisir un affectaion valide.
                    </div>
                  </div>
                  <div class="col md-4">
                    <label for="validationCustom10" class="form-label">Date de Réparation*</label>
                      <input type="date" id="validationCustom10" class="form-control" name="date_reparation" value="{{$reparation->date_reparation}}" required>
                    <div class="invalid-feedback">
                      Veuillez choisir la Date de Réparation.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Désignation*</label>
                    <input type="text" class="form-control" id="validationCustom04" name="designation" value="{{$reparation->designation}}" required>
                    <div class="invalid-feedback">
                      Veuillez choisir une Fonction valide.
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="validationCustom05" class="form-label" >Quantité*</label>
                    <input type="number" class="form-control" id="qty" name="quantity" value="{{$reparation->quantity}}" step="any" required>
                    <div class="invalid-feedback">
                      Veuillez choisir un Quantité.
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Prix UT (DHs)*</label>
                    <input type="number" class="form-control" id="prix-ut" name="unit_price" value="{{$reparation->unit_price}}" step="any" required>
                    <div class="invalid-feedback">
                      Veuillez enter un Prix UT.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Prix HT (DHs)*</label>
                    <input type="number" class="form-control" id="prix-ht" name="totale_HT" value="{{$reparation->totale_HT}}" step="any" required>
                    <div class="invalid-feedback">
                      Veuillez enter un Prix HT.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Prix TTC (DHs)*</label>
                    <input type="number" class="form-control" id="prix-ttc" name="totale_TTC" value="{{$reparation->totale_TTC}}" step="any" required>
                    <div class="invalid-feedback">
                      Veuillez enter Prix TTC.
                    </div>
                  </div>
                  

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Accepter de modifier cette Réparation*.
                    </label>
                    <div class="invalid-feedback">
                      Vous devez accepter avant de soumettre.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Modifier Réparation</button>
                </div>
              </form>
    </section>

  </main>

  <script>
      $('#immat').change(function(){
      var id = $(this).val();
      console.log(id);
      var url = '{{ route("reparation.getDetails", ":id") }}';
      url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response){
              if(response != null){
                    $('#model').val(response['data1'].model);
                    $('#marque').val(response['data1'].marque);
                    console.log(response);
                    if (response['data3'] != null){
                      $('#affectaion').val(response['data3'].propriete);
                    }else if(response['data2'] != null){
                      $('#affectaion').val(response['data2'].first_name + ' ' + response['data2'].last_name + ' (' + response['data2'].job +')'  );
                    }else{
                      $('#affectaion').val(response['data4'])
                    }
                }
            }
        });
    });

    $('#qty').change(function(){
      var qty = $(this).val();
      var prix_ut = $('#prix-ut').val();
      console.log(qty);
      console.log(prix_ut);
      document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
      var prix_ht = document.getElementById("prix-ht").value;
      document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

    });
    $('#prix-ut').change(function(){
      var prix_ut = $(this).val();
      var qty = $('#qty').val();
      console.log(qty);
      console.log(prix_ut);
      document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
      var prix_ht = document.getElementById("prix-ht").value;
      document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

    });
    </script>
@endsection