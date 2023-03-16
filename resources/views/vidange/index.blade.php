@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Vidanges</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('vidange.index')}}">Vidanges</a></li>
                <li class="breadcrumb-item active">Tout les Vidanges</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <br>
    <!-- <div class="jumbotron">
        <a href="{{route('employee.create')}}" class="btn btn-primary" ><i class="bi bi-plus-circle me-1"></i>Ajouter Véhicule</a>        
        <a href="{{route('employee.trash')}}" class="btn btn-warning" ><i class="bi bi-trash me-1"></i>supprimé</a>        
        
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
                <div class="col-lg-6">
                    <a href="{{route('vidange.create')}}" class="btn btn-primary"><i
                            class="bi bi-plus-circle me-1"></i>Ajouter Vidange</a>
                            <a href="{{route('vidange.export')}}" class="btn btn-success"><i
                            class="bi bi-file-excel me-1"></i>Exporter</a>
                    <a href="{{route('vidange.trash')}}" class="btn btn-warning trash"><i
                            class="bi bi-trash me-1"></i>supprimé</a>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4 trash">
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

    <section class="section dashboard">

        <div class="table-responsive">
            <table class="table table-responsive-md  table-hover">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <center>#</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Immatriculation</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Date Vidange</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Type Huile</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Quantité Huile</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Prix DH/L</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Totale HT</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Totale TTC</center>
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
                    @if(!($vidanges->isEmpty()))
                    @foreach($vidanges as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <center>{{++$i}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->immatriculation}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->date_vidange}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->type_huile}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->quantity_huile}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->liter_price}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->totale_HT}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->totale_TTC}}</center>
                        </td>

                        <td class="px-4 py-3" style="text-align:center">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{route('vidange.show',$item->id)}}"
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
                                <a href="{{route('vidange.edit',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="Blue" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="{{route('vidange.soft.Delete',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="Orange" viewBox="0 0 20 20">
                                        <path
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z">
                                        </path>
                                    </svg>
                                </a>

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
                        </td>
                    </tr>
                    @endif
                </tbody>
                <tbody id="Content"></tbody>
            </table>
        </div>

        {!! $vidanges->links() !!}
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
        url: '{{route("vidange.search")}}',
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

                    var url = '{{ route("vidange.show", ":id") }}';
                    url = url.replace(':id', value.id);
                    var url1 = '{{ route("vidange.edit", ":id") }}';
                    url1 = url1.replace(':id', value.id);
                    var url2 = '{{ route("vidange.soft.Delete", ":id") }}';
                    url2 = url2.replace(':id', value.id);


                    searchResult = '<tr class="text-gray-700 dark:text-gray-400">' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + (++index) + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3">' +
                        '<center>' + value.immatriculation + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.date_vidange + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.type_huile + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.quantity_huile + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.liter_price + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.totale_HT + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.totale_TTC + '</center>' +
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
                var url4 = '{{ route("vidange.exportSearch", ":id") }}';
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