@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="{{ route('index')}}"class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Form Management</a>
            <a href="{{ route('logout')}}" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        </div>
        <div class="col-md-10" >
            <div class="card">
                <div class="card-header title m-b-md"> <h4> Form Management </h4> </div>
                <div  class="card-body">
                    <h3> Branches </h3>
                    <hr>
                    <a class="btn btn-primary" href="{{ url("/admin")}}" role="button">All</a>
                    @foreach($branches as $branch)
                        <a class="btn btn-primary" href="{{ url("/admin/branch/$branch->branch_cd/request")}}" role="button">{{ $branch->branch_name}}</a>
                    @endforeach
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs">
                        <?php
                            $url = url()->current();
                            $parts = Explode('/', $url);
                            $id = $parts[count($parts) - 2];
                  
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/branch/<?php echo $id; ?>/request">Document Request</a>
                        </li>
                        <li class="nav-item">
                         
                            <a class="nav-link active" href="/admin/branch/<?php echo $id; ?>/orientation">Orientation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/branch/<?php echo $id; ?>/consultation">Consultation</a>
                        </li>
                    </ul>
                    <div style="width: 93%; margin: 0 auto; padding-top: 2%; padding-bottom: 2%;" >
                    <table id="table" class="table table-bordered display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
            </div>
        </div> <!--col-sm-9 closing-->
    </div>
</div>


<script>
$(document).ready(function() {
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url()->current() }}",
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
