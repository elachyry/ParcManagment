@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Utilisateurs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Utilisateurs</a></li>
                <li class="breadcrumb-item active">supprimé</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <br>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('employee.index')}}" class="btn btn-secondary"><i
                            class="bi bi-arrow-left-circle me-1"></i>Retourner</a>
                </div>
                <div class="col-lg-4">
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
                            <center>CIN</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Prénom</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Nom</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Fonction</center>
                        </th>
                        <th class="px-4 py-3">
                            <center>Numéro Téléphone</center>
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
                    @if(!($employees->isEmpty()))
                    @foreach($employees as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <center>{{++$i}}</center>
                        </td>
                        <td class="px-4 py-3">
                            <center> {{$item->cin}} </center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->first_name}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->last_name}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->job}}</center>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <center>{{$item->phone}}</center>
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{route('employee.restore',$item->id)}}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Restore">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="Green"
                                        class="w-5 h-5" viewBox="0 0 20 20">
                                        <path
                                            d="M3.24,7.51c-0.146,0.142-0.146,0.381,0,0.523l5.199,5.193c0.234,0.238,0.633,0.064,0.633-0.262v-2.634c0.105-0.007,0.212-0.011,0.321-0.011c2.373,0,4.302,1.91,4.302,4.258c0,0.957-0.33,1.809-1.008,2.602c-0.259,0.307,0.084,0.762,0.451,0.572c2.336-1.195,3.73-3.408,3.73-5.924c0-3.741-3.103-6.783-6.916-6.783c-0.307,0-0.615,0.028-0.881,0.063V2.575c0-0.327-0.398-0.5-0.633-0.261L3.24,7.51 M4.027,7.771l4.301-4.3v2.073c0,0.232,0.21,0.409,0.441,0.366c0.298-0.056,0.746-0.123,1.184-0.123c3.402,0,6.172,2.709,6.172,6.041c0,1.695-0.718,3.24-1.979,4.352c0.193-0.51,0.293-1.045,0.293-1.602c0-2.76-2.266-5-5.046-5c-0.256,0-0.528,0.018-0.747,0.05C8.465,9.653,8.328,9.81,8.328,9.995v2.074L4.027,7.771z" />
                                    </svg>
                                </a>

                                <form action="{{route('employee.hard.delete',$item->id)}}" method="post"
                                    onsubmit="return confirm('Voulez-vous supprimer définitivement ce Utilisateur?')">
                                    @csrf
                                    @method('HEAD')
                                    <button type="submit"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="red" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
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
            </table>
        </div>

        {!! $employees->links() !!}
        </div>

        </div>
        </div>
    </section>

</main>

<script type="text/javascript">
$('body').on('keyup', '#search', function() {
    var searchQuest = $(this).val();
    console.log(searchQuest);
    $.ajax({
        method: 'POST',
        url: '{{route("employee.trashSearch")}}',
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
                    var url = '{{ route("employee.restore", ":id") }}';
                    url = url.replace(':id', value.id);
                    var url1 = '{{ route("employee.hard.delete", ":id") }}';
                    url1 = url1.replace(':id', value.id);

                    var url2 =
                        "return confirm('Voulez-vous supprimer définitivement ce Utilisateur?')";

                    searchResult = '<tr class="text-gray-700 dark:text-gray-400">' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + (++index) + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3">' +
                        '<center>' + value.cin + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.first_name + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.last_name + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.job + '</center>' +
                        '</td>' +
                        '<td class="px-4 py-3 text-sm">' +
                        '<center>' + value.phone + '</center>' +
                        '</td>' +
                        +'<td class="px-4 py-3">' +
                        '<div class="flex items-center space-x-4 text-sm">' +
                        '<a ' +
                        'href="' + url + '"' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Restore">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="Green" class="w-5 h-5"  viewBox="0 0 20 20">' +
                        '<path d="M3.24,7.51c-0.146,0.142-0.146,0.381,0,0.523l5.199,5.193c0.234,0.238,0.633,0.064,0.633-0.262v-2.634c0.105-0.007,0.212-0.011,0.321-0.011c2.373,0,4.302,1.91,4.302,4.258c0,0.957-0.33,1.809-1.008,2.602c-0.259,0.307,0.084,0.762,0.451,0.572c2.336-1.195,3.73-3.408,3.73-5.924c0-3.741-3.103-6.783-6.916-6.783c-0.307,0-0.615,0.028-0.881,0.063V2.575c0-0.327-0.398-0.5-0.633-0.261L3.24,7.51 M4.027,7.771l4.301-4.3v2.073c0,0.232,0.21,0.409,0.441,0.366c0.298-0.056,0.746-0.123,1.184-0.123c3.402,0,6.172,2.709,6.172,6.041c0,1.695-0.718,3.24-1.979,4.352c0.193-0.51,0.293-1.045,0.293-1.602c0-2.76-2.266-5-5.046-5c-0.256,0-0.528,0.018-0.747,0.05C8.465,9.653,8.328,9.81,8.328,9.995v2.074L4.027,7.771z"/>' +
                        '</svg>' +
                        '</a>'

                        +
                        '<form action="' + url1 + '" method="post" onsubmit="' + url2 +
                        '")">' +
                        '@csrf ' +
                        '@method('HEAD')' +
                        '<button ' +
                        'type="submit"' +
                        'class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"' +
                        'aria-label="Delete">' +
                        '<svg ' +
                        'class="w-5 h-5"' +
                        'aria-hidden="true"' +
                        'fill="red"' +
                        'viewBox="0 0 20 20">' +
                        '<path ' +
                        'fill-rule="evenodd"' +
                        'd="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"' +
                        'clip-rule="evenodd"></path>' +
                        '</svg>' +
                        '</button>' +
                        '</form>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';

                    $('#search-result').append(searchResult);
                });
            }
        }
    });
});
</script>


@endsection