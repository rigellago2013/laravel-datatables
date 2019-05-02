@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
           <div class="col-sm-3 col-md-2 sidebar">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href=""class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Form Management</a>
                <a href="{{ route('logout')}}" class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <div class="col-md-10" >
            <div class="card" style="padding-bottom: 2%;">
                <div class="card-header title m-b-md"> <h4> Form Management </h4> </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link " href="/admin">Document Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('orientation')}}">Orientation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('consultation')}}">Consultation</a>
                            </li>
                        </ul>
                    </div>
             @foreach($data as $docrequest)
                    <form method="PATCH" action="{{ url('admin/request/edit') }}">
                        <div class="row">
                            <div class="col-sm-5 ml-3">
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name </label>
                                    <input type="text" class="form-control" placeholder="Enter name" required value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name (phoenetic) </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name (phoenetic)" required>
                                </div>
                                <hr>
                                <div class="form-group"><!--gender container-->
                                    <label class="input-label" for="gender"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gender </font></font><span class="req-container"><span class="req-field"><span class="req-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></span></span></label>
                                    <div>
                                        <label class="radio-inline ml15">
                                        <input type="radio" name="gender" value="0" checked=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Woman
                                        </font></font></label>
                                        <label class="radio-inline">
                                        <input type="radio" name="gender" value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">male
                                        </font></font></label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Age </label>
                                    <input type="number" class="form-control"  placeholder="Age" required>
                                </div>
                                <hr>
                                </div>
                                <div class="col-sm-5 ml-3">
                                    <hr>
                                    <div class="form-group">
                                        <label >Zip Code </label>
                                        <input type="number" class="form-control"  placeholder="Zip code" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Address </label>
                                        <input type="text" class="form-control"  placeholder="Address" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control"  placeholder="Phone number" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label >E-mail address </label>
                                        <input type="text" class="form-control" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail address confirmation</label>
                                        <input type="text" class="form-control"  placeholder="Email address confirmation" required>
                                    </div>
                                    <hr>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            <input type="hidden" value="{{ $docrequest->indexcode }}">
                        </div>
                    </form>
           @endforeach
            </div> <!-- col md 10 closing -->
        </div> <!--col-sm-9 closing-->
    </div>
</div>
@endsection
