@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Vidanges</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('vidange.index')}}">Vidanges</a></li>
          <li class="breadcrumb-item active">Ajouter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="jumbotron">
        <a href="{{route('vidange.index')}}" class="btn btn-secondary" ><i class="bi bi-arrow-left-circle me-1"></i>Retourner</a>        
        <hr class="my-4">
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- @if ($errors->any())
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
        {{$error}}
        @endforeach
    @endif -->


    @php
      $oilType = array("0W-20","0W-30","0W-40","5W-30","10W-30","5W-40","10W-40","15W-40","0W-50","10W-60","20W-60");
    @endphp
    <section class="section dashboard">
    <form action="{{route('vidange.store')}}" method="post" class="row g-3 needs-validation" novalidate>
    @csrf

                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Immatriculation*</label>
                  <select class="form-select" id="immat" name="immatriculation" required>
                      <option selected disabled value="">Choisir...</option>
                      @foreach($mats as $mat)
                        <option value="{{$mat->immatriculation}}" {{$mat->immatriculation == $car->immatriculation ? 'selected' : ''}} > {{$mat->immatriculation}} </option>
                      @endforeach
                  </select>
                  
                  <div class="invalid-feedback">
                  Veuillez choisir un matricule .
                  </div>
                </div>
                
                <div class="col-md-2">
                    <label for="validationCustom02" class="form-label">Marque*</label>
                    <input type="text" class="form-control" id="marque" name="marque" value="{{Request::is('vidange/choseViden/'.$car->id) ? $car->marque : ''}}" disabled required>
                    <div class="invalid-feedback">
                    Veuillez choisir une marque valide.
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="validationCustom03" class="form-label"  >Model*</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{Request::is('vidange/choseViden/'.$car->id) ? $car->model : ''}}" disabled required>
                    <div class="invalid-feedback">
                    Veuillez choisir un model valide.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom03" class="form-label"  >Affectaion*</label>
                    <!-- <input type="text" class="form-control" id="affectaion" name="last_name" value="{{Request::is('reparation/choseViden/'.$car->id) ? $car->model : ''}}" {{Request::is('reparation/choseViden/'.$car->id) ? 'disabled' : ''}} required> -->
                    <input type="text" class="form-control" id="affectaion" name="affectaion" value="{{Request::is('vidange/choseViden/'.$car->id) ? $data['data1'] : ''}}" readonly required>
                    <div class="invalid-feedback">
                    Veuillez choisir un affectaion valide.
                    </div>
                  </div>
                  <div class="col md-4">
                    <label for="validationCustom10" class="form-label">Date de Vidange*</label>
                      <input type="date" id="validationCustom10" class="form-control" name="date_vidange" required>
                    <div class="invalid-feedback">
                      Veuillez choisir la Date de Vidange.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Kilomitrage (Km)</label>
                    <input type="number" class="form-control" id="vid" name="kilomitrage" value="" step="any" >
                    <div class="invalid-feedback">
                      Veuillez choisir une Fonction valide.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label" >Kilomitrage de Prochaine Vidange (Km)</label>
                    <input type="number" class="form-control" id="next-vid" name="kilomitrage_next_vidange" value="" step="any">
                    <div class="invalid-feedback">
                      Veuillez choisir un Quantité.
                    </div>
                  </div>
                  <!-- <div class="col-md-1">
                    <label for="validationCustom05" class="form-label" style="color:#f6f9ff;">`</label>
                    <button class="btn btn-dark" >Ajouter</button>
                  </div> -->

                  <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Type Huile*</label>
                  <select class="form-select" id="immat" name="type_huile" required>
                      <option selected disabled value="">Choisir...</option>
                      @foreach($oilType as $type)
                        <option value="{{$type}}" > {{$type}} </option>
                      @endforeach
                  </select>
                  
                  <div class="invalid-feedback">
                  Veuillez choisir un matricule valide.
                  </div>
                </div>

                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Quantité Huile (L)*</label>
                    <input type="number" class="form-control" id="qty" name="quantity_huile" value="1" required step="any">
                    <div class="invalid-feedback">
                      Veuillez enter un Prix UT.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Prix (DH/L)*</label>
                    <input type="number" class="form-control" id="prix" name="liter_price" value="0" required step="any">
                    <div class="invalid-feedback">
                      Veuillez enter un Prix HT.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Prix HT (DHs)*</label>
                    <input type="number" class="form-control" id="prix-ht" name="totale_HT" value="" required step="any">
                    <div class="invalid-feedback">
                      Veuillez enter Prix TTC.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Prix TTC (DHs)*</label>
                    <input type="number" class="form-control" id="prix-ttc" name="totale_TTC" value="" required step="any">
                    <div class="invalid-feedback">
                      Veuillez enter Prix TTC.
                    </div>
                  </div>
                  

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Accepter d'ajouter cette Vidange*.
                    </label>
                    <div class="invalid-feedback">
                      Vous devez accepter avant de soumettre.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Ajouter Vidange</button>
                </div>
              </form>
    </section>

  </main>
  <script>
      $('#immat').change(function(){
      var id = $(this).val();
      console.log(id);
      var url = '{{ route("vidange.getDetails", ":id") }}';
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
      var prix_ut = $('#prix').val();
      console.log(qty);
      console.log(prix_ut);
      document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
      var prix_ht = document.getElementById("prix-ht").value;
      document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

    });
    $('#prix').change(function(){
      var prix_ut = $(this).val();
      var qty = $('#qty').val();
      console.log(qty);
      console.log(prix_ut);
      document.getElementById("prix-ht").value = parseFloat(qty * prix_ut);
      var prix_ht = document.getElementById("prix-ht").value;
      document.getElementById("prix-ttc").value = parseFloat(prix_ht) + (parseFloat(prix_ht * 0.2));

    });
    $('#vid').change(function(){
      var vid = $(this).val();
      var next_vid = $('#next-vid').val();
      console.log(next_vid);
      document.getElementById("next-vid").value = parseFloat(vid) + 8000;


    });


  </script>

@endsection