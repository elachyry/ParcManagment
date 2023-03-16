@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Véhicules</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Véhicules</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <br>
    <!-- <div class="jumbotron">
        <a href="{{route('car.create')}}" class="btn btn-primary" ><i class="bi bi-plus-circle me-1"></i>Ajouter Véhicule</a>        
        <a href="{{route('car.trash')}}" class="btn btn-warning" ><i class="bi bi-trash me-1"></i>supprimé</a>        
        
        <div class="row mb-3 " >
        <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="rechercher">
        </div>
    </div>
        <hr class="my-4">
    </div> -->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <a href="{{route('car.create')}}" class="btn btn-primary"><i
                            class="bi bi-plus-circle me-1"></i>Ajouter Véhicule</a>
                    <a href="{{route('car.export')}}" class="btn btn-success"><i
                            class="bi bi-file-excel me-1"></i>Exporter</a>
                    <a href="{{route('car.trash')}}" class="btn btn-warning trash"><i
                            class="bi bi-trash me-1"></i>supprimé</a>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4 trash" >
                    <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher...">
                </div>
            </div>
        </div>
        <hr class="my-4">
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
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

    <section class="section dashboard">

        <div class="table-responsive">
            <table class="table table-responsive-md  table-hover">
                <thead>
                    <tr style="font-size: 11px;"
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <center>#</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Immatriculation</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Marque</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Model</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>carburant</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Date Acquisition</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Etat</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Action</center>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="search-result">
                    @php
                    $i = 0;
                    @endphp
                    @if(!($cars->isEmpty()))
                    @foreach($cars as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <center>{{++$i}}</center>
                        </td>
                        <td class="px-4 py-3">
                            <center> {{$item->immatriculation}} </center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->marque}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->model}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->carburant}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->date_acquisition_location}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>
                                @if($item->propriete == "Bon Etat")
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$item->propriete}}
                                </span>
                                @elseif($item->propriete == "Moyen")
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    {{$item->propriete}}
                                </span>
                                @elseif($item->propriete == "En panne")
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    {{$item->propriete}}
                                </span>
                                @elseif($item->propriete == "Reformer")
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    {{$item->propriete}}
                                </span>
                                @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:text-white dark:bg-blue-600">

                                    {{$item->propriete}}
                                </span>
                                @endif
                            </center>
                        </td>
                        <td class="px-4 py-3" style="text-align:center">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{route('car.show',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Show">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="w-5 h-5" viewBox="0 0 20 20">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                                <a href="{{route('car.edit',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="Blue" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="{{route('choseEntre',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Entretient">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="Green" viewBox="0 0 20 20">
                                        <path
                                            d="M17.498,11.697c-0.453-0.453-0.704-1.055-0.704-1.697c0-0.642,0.251-1.244,0.704-1.697c0.069-0.071,0.15-0.141,0.257-0.22c0.127-0.097,0.181-0.262,0.137-0.417c-0.164-0.558-0.388-1.093-0.662-1.597c-0.075-0.141-0.231-0.22-0.391-0.199c-0.13,0.02-0.238,0.027-0.336,0.027c-1.325,0-2.401-1.076-2.401-2.4c0-0.099,0.008-0.207,0.027-0.336c0.021-0.158-0.059-0.316-0.199-0.391c-0.503-0.274-1.039-0.498-1.597-0.662c-0.154-0.044-0.32,0.01-0.416,0.137c-0.079,0.106-0.148,0.188-0.22,0.257C11.244,2.956,10.643,3.207,10,3.207c-0.642,0-1.244-0.25-1.697-0.704c-0.071-0.069-0.141-0.15-0.22-0.257C7.987,2.119,7.821,2.065,7.667,2.109C7.109,2.275,6.571,2.497,6.07,2.771C5.929,2.846,5.85,3.004,5.871,3.162c0.02,0.129,0.027,0.237,0.027,0.336c0,1.325-1.076,2.4-2.401,2.4c-0.098,0-0.206-0.007-0.335-0.027C3.001,5.851,2.845,5.929,2.77,6.07C2.496,6.572,2.274,7.109,2.108,7.667c-0.044,0.154,0.01,0.32,0.137,0.417c0.106,0.079,0.187,0.148,0.256,0.22c0.938,0.936,0.938,2.458,0,3.394c-0.069,0.072-0.15,0.141-0.256,0.221c-0.127,0.096-0.181,0.262-0.137,0.416c0.166,0.557,0.388,1.096,0.662,1.596c0.075,0.143,0.231,0.221,0.392,0.199c0.129-0.02,0.237-0.027,0.335-0.027c1.325,0,2.401,1.076,2.401,2.402c0,0.098-0.007,0.205-0.027,0.334C5.85,16.996,5.929,17.154,6.07,17.23c0.501,0.273,1.04,0.496,1.597,0.66c0.154,0.047,0.32-0.008,0.417-0.137c0.079-0.105,0.148-0.186,0.22-0.256c0.454-0.453,1.055-0.703,1.697-0.703c0.643,0,1.244,0.25,1.697,0.703c0.071,0.07,0.141,0.15,0.22,0.256c0.073,0.098,0.188,0.152,0.307,0.152c0.036,0,0.073-0.004,0.109-0.016c0.558-0.164,1.096-0.387,1.597-0.66c0.141-0.076,0.22-0.234,0.199-0.393c-0.02-0.129-0.027-0.236-0.027-0.334c0-1.326,1.076-2.402,2.401-2.402c0.098,0,0.206,0.008,0.336,0.027c0.159,0.021,0.315-0.057,0.391-0.199c0.274-0.5,0.496-1.039,0.662-1.596c0.044-0.154-0.01-0.32-0.137-0.416C17.648,11.838,17.567,11.77,17.498,11.697 M16.671,13.334c-0.059-0.002-0.114-0.002-0.168-0.002c-1.749,0-3.173,1.422-3.173,3.172c0,0.053,0.002,0.109,0.004,0.166c-0.312,0.158-0.64,0.295-0.976,0.406c-0.039-0.045-0.077-0.086-0.115-0.123c-0.601-0.6-1.396-0.93-2.243-0.93s-1.643,0.33-2.243,0.93c-0.039,0.037-0.077,0.078-0.116,0.123c-0.336-0.111-0.664-0.248-0.976-0.406c0.002-0.057,0.004-0.113,0.004-0.166c0-1.75-1.423-3.172-3.172-3.172c-0.054,0-0.11,0-0.168,0.002c-0.158-0.312-0.293-0.639-0.405-0.975c0.044-0.039,0.085-0.078,0.124-0.115c1.236-1.236,1.236-3.25,0-4.486C3.009,7.719,2.969,7.68,2.924,7.642c0.112-0.336,0.247-0.664,0.405-0.976C3.387,6.668,3.443,6.67,3.497,6.67c1.75,0,3.172-1.423,3.172-3.172c0-0.054-0.002-0.11-0.004-0.168c0.312-0.158,0.64-0.293,0.976-0.405C7.68,2.969,7.719,3.01,7.757,3.048c0.6,0.6,1.396,0.93,2.243,0.93s1.643-0.33,2.243-0.93c0.038-0.039,0.076-0.079,0.115-0.123c0.336,0.112,0.663,0.247,0.976,0.405c-0.002,0.058-0.004,0.114-0.004,0.168c0,1.749,1.424,3.172,3.173,3.172c0.054,0,0.109-0.002,0.168-0.004c0.158,0.312,0.293,0.64,0.405,0.976c-0.045,0.038-0.086,0.077-0.124,0.116c-0.6,0.6-0.93,1.396-0.93,2.242c0,0.847,0.33,1.645,0.93,2.244c0.038,0.037,0.079,0.076,0.124,0.115C16.964,12.695,16.829,13.021,16.671,13.334 M10,5.417c-2.528,0-4.584,2.056-4.584,4.583c0,2.529,2.056,4.584,4.584,4.584s4.584-2.055,4.584-4.584C14.584,7.472,12.528,5.417,10,5.417 M10,13.812c-2.102,0-3.812-1.709-3.812-3.812c0-2.102,1.71-3.812,3.812-3.812c2.102,0,3.812,1.71,3.812,3.812C13.812,12.104,12.102,13.812,10,13.812">
                                        </path>
                                    </svg>
                                </a>
                                <a href="{{route('soft.Delete',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="Orange" viewBox="0 0 20 20">
                                        <path
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z">
                                        </path>
                                    </svg>
                                </a>
                                <!-- <form action="{{route('car.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete"
                            >
                                <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                                </svg>
                            </button>
                        </form> -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9">
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <center>
                                    <h4>Il n'y a pas de données!</h4>
                                </center>
                            </div>
                            <!-- <center><h3 class="pagetitle"> Il n'y a pas de données!</h3></center></td> -->
                    </tr>
                    @endif
                </tbody>
                <tbody id="Content"></tbody>
            </table>
        </div>

        {{ $cars->links() }}
        </div>

        </div>
        </div>
    </section>

</main>
<!-- 
  <script type="text/javascript" >
      $('#search').on('keyup',function(){
        $value = $(this).val();
        alert($value);
        $.ajax({
            type:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                alert(data);
                console.log(data);
                $('#Content').html(data);
            }
        });
      });
  </script> -->

<script type="text/javascript">
$('body').on('keyup', '#search', function() {
    var searchQuest = $(this).val();
    console.log(searchQuest);
    $.ajax({
        method: 'POST',
        url: '{{route("car.search")}}',
        dataType: 'json',
        data: {
            '_token': '{{ csrf_token()}}',
            searchQuest: searchQuest,
        },
        success: function(res) {
            console.log(res);
            var searchResult = '';
            $('#search-result').html('');
            if (Array.isArray(res) && res.length == 0) {
                searchResult = '<tr>' +
                    '<td colspan="9">' +
                    '<div class="alert alert-info alert-dismissible fade show" role="alert">' +
                    '<center><h4>Il n\'y a pas de données!</h4> </center>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
                $('#search-result').append(searchResult);
            } else {
                $.each(res, function(index, value) {
                    var url = '{{ route("car.show", ":id") }}';
                    url = url.replace(':id', value.id);
                    var url1 = '{{ route("car.edit", ":id") }}';
                    url1 = url1.replace(':id', value.id);
                    var url2 = '{{ route("choseEntre", ":id") }}';
                    url2 = url2.replace(':id', value.id);
                    var url3 = '{{ route("soft.Delete", ":id") }}';
                    var url3 = '{{ route("soft.Delete", ":id") }}';
                    

                    var etat = '';
                    if (value.propriete == "Bon Etat") {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">' +
                            value.propriete + '</span>';
                    } else if (value.propriete == "Moyen") {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">' +
                            value.propriete + '</span>';
                    } else if (value.propriete == "En panne") {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">' +
                            value.propriete + '</span>';
                    } else if (value.propriete == "Hors usage") {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">' +
                            value.propriete + '</span>';
                    } else if (value.propriete == "Reformer") {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">' +
                            value.propriete + '</span>';
                    } else {
                        etat =
                            '<span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">' +
                            value.propriete + '</span>';
                    }
                    searchResult = '<tr class="text-gray-700 dark:text-gray-400">' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + (++index) + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3">' +
                        '<center>' + value.immatriculation + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.marque + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.model + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm"><center>' + value.carburant +
                        '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.date_acquisition_location + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-xs">' +
                        '<center>' + etat + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3" style="text-align:center">' +
                        '<div class="flex items-center space-x-4 text-sm">' +
                        '<a ' +
                        'href="' + url + '"' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Show"' +
                        '>' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5" viewBox="0 0 20 20"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>' +
                        '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>' +
                        '</svg>' +
                        '</a>' +
                        '<a ' +
                        'href="' + url1 + '" ' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Edit"' +
                        '>' +
                        '<svg ' +
                        'class="w-5 h-5"' +
                        'aria-hidden="true"' +
                        'fill="Blue"' +
                        'viewBox="0 0 20 20">' +
                        '<path ' +
                        'd="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"' +
                        '></path>' +
                        '</svg>' +
                        '</a>' +
                        '<a ' +
                        'href="' + url2 + '"' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Entretient"' +
                        '>' +
                        '<svg ' +
                        'class="w-5 h-5"' +
                        'aria-hidden="true"' +
                        'fill="Green"' +
                        'viewBox="0 0 20 20"' +
                        '>' +
                        '<path d="M17.498,11.697c-0.453-0.453-0.704-1.055-0.704-1.697c0-0.642,0.251-1.244,0.704-1.697c0.069-0.071,0.15-0.141,0.257-0.22c0.127-0.097,0.181-0.262,0.137-0.417c-0.164-0.558-0.388-1.093-0.662-1.597c-0.075-0.141-0.231-0.22-0.391-0.199c-0.13,0.02-0.238,0.027-0.336,0.027c-1.325,0-2.401-1.076-2.401-2.4c0-0.099,0.008-0.207,0.027-0.336c0.021-0.158-0.059-0.316-0.199-0.391c-0.503-0.274-1.039-0.498-1.597-0.662c-0.154-0.044-0.32,0.01-0.416,0.137c-0.079,0.106-0.148,0.188-0.22,0.257C11.244,2.956,10.643,3.207,10,3.207c-0.642,0-1.244-0.25-1.697-0.704c-0.071-0.069-0.141-0.15-0.22-0.257C7.987,2.119,7.821,2.065,7.667,2.109C7.109,2.275,6.571,2.497,6.07,2.771C5.929,2.846,5.85,3.004,5.871,3.162c0.02,0.129,0.027,0.237,0.027,0.336c0,1.325-1.076,2.4-2.401,2.4c-0.098,0-0.206-0.007-0.335-0.027C3.001,5.851,2.845,5.929,2.77,6.07C2.496,6.572,2.274,7.109,2.108,7.667c-0.044,0.154,0.01,0.32,0.137,0.417c0.106,0.079,0.187,0.148,0.256,0.22c0.938,0.936,0.938,2.458,0,3.394c-0.069,0.072-0.15,0.141-0.256,0.221c-0.127,0.096-0.181,0.262-0.137,0.416c0.166,0.557,0.388,1.096,0.662,1.596c0.075,0.143,0.231,0.221,0.392,0.199c0.129-0.02,0.237-0.027,0.335-0.027c1.325,0,2.401,1.076,2.401,2.402c0,0.098-0.007,0.205-0.027,0.334C5.85,16.996,5.929,17.154,6.07,17.23c0.501,0.273,1.04,0.496,1.597,0.66c0.154,0.047,0.32-0.008,0.417-0.137c0.079-0.105,0.148-0.186,0.22-0.256c0.454-0.453,1.055-0.703,1.697-0.703c0.643,0,1.244,0.25,1.697,0.703c0.071,0.07,0.141,0.15,0.22,0.256c0.073,0.098,0.188,0.152,0.307,0.152c0.036,0,0.073-0.004,0.109-0.016c0.558-0.164,1.096-0.387,1.597-0.66c0.141-0.076,0.22-0.234,0.199-0.393c-0.02-0.129-0.027-0.236-0.027-0.334c0-1.326,1.076-2.402,2.401-2.402c0.098,0,0.206,0.008,0.336,0.027c0.159,0.021,0.315-0.057,0.391-0.199c0.274-0.5,0.496-1.039,0.662-1.596c0.044-0.154-0.01-0.32-0.137-0.416C17.648,11.838,17.567,11.77,17.498,11.697 M16.671,13.334c-0.059-0.002-0.114-0.002-0.168-0.002c-1.749,0-3.173,1.422-3.173,3.172c0,0.053,0.002,0.109,0.004,0.166c-0.312,0.158-0.64,0.295-0.976,0.406c-0.039-0.045-0.077-0.086-0.115-0.123c-0.601-0.6-1.396-0.93-2.243-0.93s-1.643,0.33-2.243,0.93c-0.039,0.037-0.077,0.078-0.116,0.123c-0.336-0.111-0.664-0.248-0.976-0.406c0.002-0.057,0.004-0.113,0.004-0.166c0-1.75-1.423-3.172-3.172-3.172c-0.054,0-0.11,0-0.168,0.002c-0.158-0.312-0.293-0.639-0.405-0.975c0.044-0.039,0.085-0.078,0.124-0.115c1.236-1.236,1.236-3.25,0-4.486C3.009,7.719,2.969,7.68,2.924,7.642c0.112-0.336,0.247-0.664,0.405-0.976C3.387,6.668,3.443,6.67,3.497,6.67c1.75,0,3.172-1.423,3.172-3.172c0-0.054-0.002-0.11-0.004-0.168c0.312-0.158,0.64-0.293,0.976-0.405C7.68,2.969,7.719,3.01,7.757,3.048c0.6,0.6,1.396,0.93,2.243,0.93s1.643-0.33,2.243-0.93c0.038-0.039,0.076-0.079,0.115-0.123c0.336,0.112,0.663,0.247,0.976,0.405c-0.002,0.058-0.004,0.114-0.004,0.168c0,1.749,1.424,3.172,3.173,3.172c0.054,0,0.109-0.002,0.168-0.004c0.158,0.312,0.293,0.64,0.405,0.976c-0.045,0.038-0.086,0.077-0.124,0.116c-0.6,0.6-0.93,1.396-0.93,2.242c0,0.847,0.33,1.645,0.93,2.244c0.038,0.037,0.079,0.076,0.124,0.115C16.964,12.695,16.829,13.021,16.671,13.334 M10,5.417c-2.528,0-4.584,2.056-4.584,4.583c0,2.529,2.056,4.584,4.584,4.584s4.584-2.055,4.584-4.584C14.584,7.472,12.528,5.417,10,5.417 M10,13.812c-2.102,0-3.812-1.709-3.812-3.812c0-2.102,1.71-3.812,3.812-3.812c2.102,0,3.812,1.71,3.812,3.812C13.812,12.104,12.102,13.812,10,13.812"></path>' +
                        '</svg>' +
                        '</a>' +
                        '<a ' +
                        'href="' + url3 + '"' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Delete"' +
                        '>' +
                        '<svg ' +
                        'class="w-5 h-5"' +
                        'aria-hidden="true"' +
                        'fill="Orange"' +
                        'viewBox="0 0 20 20"' +
                        '>' +
                        '<path ' +
                        'd="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"' +
                        '></path>' +
                        '</svg>' +
                        '</a>' +
                        '</div>' +
                        '</td>'

                        +
                        '</tr>';
                    $('#search-result').append(searchResult);
                });
                var url4 = '{{ route("car.exportSearch", ":id") }}';
                    url4 = url4.replace(':id', searchQuest);
                searchResult = '<tr>' +
                    '<td colspan="9">' +
                    '<center><a href="'+url4+'" class="btn btn-success"><i '
                           +' class="bi bi-file-excel me-1"></i>Exporter La résultats</a><a> </center>' +
                    '</td>' +
                    '</tr>';
                $('#search-result').append(searchResult);
            }
        }
    });
});
</script>

@endsection