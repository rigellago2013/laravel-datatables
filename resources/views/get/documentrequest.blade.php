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
            <div class="card" style="padding-bottom: 2%;">
                <div class="card-header title m-b-md"> <h4> Form Management </h4> </div>
                    <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="/admin">Document Request</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orientation')}}">Orientation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('consultation')}}">Consultation</a>
                            </li>
                        </ul>
                    </div>
                @foreach($data as $docrequest)
                    <form method="POST" action="{{ url('admin/request/update') }}">
                        <div class="row">
                            <div class="col-sm-5 ml-3">
                            @method('PUT')
                            @csrf
                                <hr>
                                <div class="form-group">
                                    <label> First name kanji </label>
                                    <input type="text" name="first_name_kanji" class="form-control" placeholder="First name kanji" required value="{{ $docrequest->first_name_kanji }}">
                                </div>

                                <div class="form-group">
                                    <label> Last name kanji </label>
                                    <input type="text" name="last_name_kanji" class="form-control" placeholder="Last name kanji" required value="{{ $docrequest->last_name_kanji }}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label> First name kana (phoenetic) </label>
                                    <input type="text" name="first_name_kana" class="form-control"  placeholder="First name kana" required value="{{ $docrequest->first_name_kana }}">
                                </div>
                                <div class="form-group">
                                    <label> Last name kana (phoenetic) </label>
                                    <input type="text" name="last_name_kana" class="form-control"  placeholder="Last name kana" required value="{{ $docrequest->last_name_kana }}">
                                </div>
                                <hr>
                                <div class="form-group"><!--gender container-->
                                    <label class="input-label" for="gender"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gender </font></font><span class="req-container"><span class="req-field"><span class="req-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span></span></span></label>
                                    <div>
                                        <label class="radio-inline ml15">
                                        <input type="radio" name="gender" value="W" <?php echo ($docrequest->gender_cd == 'W' ? 'checked' : ''); ?><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Woman
                                        </font></font></label>
                                        <label class="radio-inline">
                                        <input type="radio" name="gender" value="M" <?php echo ($docrequest->gender_cd == 'M' ? 'checked' : ''); ?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">male
                                        </font></font></label>
                                    </div>
                                </div>
                               <hr>
                                <div class="form-group">
                                    <label>Age </label>
                                        <input type="text" name="age_name" class="form-control"  placeholder="Age" required value="{{ $docrequest->age_name }}">
                                    </div>
                                <hr>
                                </div>
                                <div class="col-sm-5 ml-3">
                                    <hr>
                          
                                    <div class="form-group">
                                        <label >Zip First </label>
                                        <input type="number" name="zip_first" class="form-control"  placeholder="Zip first" required value="{{ $docrequest->zip_first }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Zip Last </label>
                                        <input type="number" name="zip_last" class="form-control"  placeholder="Zip last" required value="{{ $docrequest->zip_last }}">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Address 1  </label>
                                        <input type="text" name="address_1" class="form-control"  placeholder="Address" required value="{{ $docrequest->address_1 }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Address 2 </label>
                                        <input type="text" name="address_2" class="form-control"  placeholder="Address" required  value="{{ $docrequest->address_2 }}">
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" name="phone" class="form-control"  placeholder="Phone number" required value="{{$docrequest->tel_area_no.$docrequest->tel_local_no.$docrequest->tel_entrant_no}}">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label >E-mail address </label>
                                        <input type="text" name="mail_address_pc" class="form-control" placeholder="Email address" required value="{{ $docrequest->mail_address_pc }}">
                                    </div>
                                    <hr>
                                    <input type="hidden" name="indexcode" value="{{ $docrequest->indexcode }}">
                                    <input type="hidden" name="formtype" value="request">
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
