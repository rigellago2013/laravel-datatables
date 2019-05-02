@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="{{ route('request')}}"class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Form Management</a>
            <a href="{{ route('logout')}}" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        </div>
        <div class="col-md-10" >
            <div class="card">
                <div class="card-header title m-b-md"> <h4> Form Management </h4> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('request')}}">Document Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('orientation')}}">Orientation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="{{ route('consultation')}}">Consultation</a>
                        </li>
                    </ul>

                    <div class="mt-3">
                        <h3></h3>
                        <hr>
                    </div>
                    <div style="width: 98%; margin: 0 auto; padding-top: 1%; padding-bottom: 2%;" >
                    <div style="padding-bottom: 3%;">
                        <h3> Prefectures </h3>
                        <hr>
                         <a  class="btn btn-primary mt-1 " href="{{ url("admin/request/")}}"> All </a>
                     @foreach ($prefectures as $prefecture)
                        <a  class="btn btn-primary mt-1 " href="{{ url("admin/request/prefecture/$prefecture->prefecture_cd")}}"> {{ $prefecture->prefecture_name }} </a>
                     @endforeach
                    </div>

                    <h3> {{ $prefecture_name }} prefecture  </h3>
                    <hr>
                        <table id="example" class="display" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Mail</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($data as $consultation)
                            <tr>
                                <td>{{ $consultation->indexcode }}</td>
                                <td><?php $date = date_create($consultation->regist_datetime); echo date_format($date,"Y/m/d"); ?></td>
                                <td>{{ $consultation->last_name_kanji.' '.$consultation->first_name_kanji }}</td>
                                <td>{{ $consultation->mail_address_pc }}</td>
                                <td><center> <a href="{{ url("/admin/request/$consultation->indexcode") }}" class="btn btn-primary btn-sm active center" role="button" aria-pressed="true">View</a></center></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mail</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!--col-sm-9 closing-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    // Setup - add a text input to each footer cell
    // $('#example thead tr').clone(true).appendTo( '#example thead' );
    // $('#example thead tr:eq(1) th').each( function (i) {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

    //     $( 'input', this ).on( 'keyup change', function () {
    //         if ( table.column(i).search() !== this.value ) {
    //             table
    //                 .column(i)
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );

    var table = $('#example').DataTable( {
        // orderCellsTop: true,
        // fixedHeader: true,
    } );

} );
</script>


@endsection
