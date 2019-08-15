@extends('plf.responsible.layout')

@section('head')
    @include('plf.responsible.inc.head')
@endsection

@section('slideBar')
    @include('plf.responsible.inc.slideBar')
@endsection

@section('header')
    @include('plf.responsible.inc.header')
@endsection

@section('sidebar')
    @include('plf.responsible.inc.sideBar')
@endsection

@section('content')
 <div id="page-title">
    <h2></h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            {{__("modifier un employee")}}
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleResponsibleEditProfile')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ Auth::user()->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Prénom')}}</label>
                            <div class="col-sm-6">
                                <input value="{{Auth::user()->first_name}}" name="first_name" type="text" placeholder="{{__('Prénom')}}" class="form-control @if ($errors->has('first_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('first_name'))
                                         <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                          <li class="parsley-required"> {{ $errors->first('first_name') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('nom')}}</label>
                            <div class="col-sm-6">
                                <input value="{{Auth::user()->last_name}}" name="last_name" type="text" placeholder="{{__('nom')}}"  class="form-control @if ($errors->has('last_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('last_name'))
                                         <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                          <li class="parsley-required"> {{ $errors->first('last_name') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3">{{__('email')}}</label>
                            <div class="col-sm-6">
                                <input value="{{Auth::user()->email}}" name="email" type="email" placeholder="{{__('email')}}"  class="form-control @if ($errors->has('email')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('email'))
                                         <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                          <li class="parsley-required"> {{ $errors->first('email') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                        </div>                                               
                        <div class="form-group">
                            <label class="col-sm-3">{{__('date de naissance')}}</label>
                            <div class="col-sm-6">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                <input value="{{ date('d-m-Y', strtotime(Auth::user()->birthday)) }}" name="birthday" type="text" placeholder="{{__('date de naissance')}}" class="bootstrap-datepicker form-control" data-parsley-id="0868"><ul class="parsley-errors-list" id="parsley-id-0868"></ul>
                            </div>
                        </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-sm-3">{{__('téléphone')}}</label>
                            <div class="col-sm-6">
                                <input value="{{Auth::user()->phone}}" name="phone" type="text" placeholder="{{__('téléphone')}}"  class="form-control" data-parsley-id="0868"><ul class="parsley-errors-list" id="parsley-id-0868"></ul>
                            </div>
                        </div>  
                                          
                    </div>
                    <div class="col-md-6">
                        <div class="col-sm-12">
                        <div id="preview-pane">
                            <div class="preview-container">
                            <img class="jcrop-preview" style="width: 142px;" src="{{asset('storages/images/users/'.Auth::user()->image)}}">
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__("photo de profil")}}</label>
                            <div class="col-sm-6">
                                <input value="{{ Auth::user()->image }}" name="image" type="file"  class="form-control" data-parsley-id="0868"><ul class="parsley-errors-list" id="parsley-id-0868"></ul>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button class="btn btn-lg btn-primary">{{__('enregistrer')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
       $(function() { "use strict";
        $('.bootstrap-datepicker').bsdatepicker({
            format: 'mm-dd-yyyy'
        });
    });
</script>
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {


            $.get("{{ route('getEmployeeGrade')}}").done(function (res) {

                $.each(res.grades, function(j, d) {

                    $('select.grade').append('<option value="' + d.id + '">' + d.label + '</option>');
                });

            });
            $.get("{{ route('getEmployeeDepartement')}}").done(function (res) {

                $.each(res.deps, function(j, d) {

                    $('select.departement').append('<option value="' + d.id + '">' + d.label + '</option>');
                });

            });
        });
    </script>

    @endsection
