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
                            <a class="nav-link" href="{{ route('orientation')}}">Orientation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('consultation')}}">Consultation</a>
                        </li>
                    </ul>
                </div>
                <div style="width: 93%; margin: 0 auto; padding-top: 2%; padding-bottom: 2%;" >
                    <!--output different prefectures-->
                    <div style="padding-bottom: 3%;">
                        <h3> Prefectures </h3>
                        <hr>
                        <a  class="btn btn-primary mt-1 " href="{{ url("admin/request")}}"> All </a>
                     @foreach ($prefectures as $prefecture)
                        <a  class="btn btn-primary mt-1 " href="{{ url("admin/request/prefecture/$prefecture->prefecture_cd")}}"> {{ $prefecture->prefecture_name }} </a>
                     @endforeach
                    </div>
                    <table id="table" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    </table>
                </div>
            </div> <!-- card closing -->
        </div> <!--col-sm-9 closing-->
    </div>
</div> <!-- container fluid closing -->
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('request') }}",
        columns: [
            { data: 'indexcode', name: 'indexcode' },
            { data: 'date', name: 'date' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            {data: 'action', name: 'action'},  
        ]
    });
});
</script>

@endsection
