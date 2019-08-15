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
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleEditEmployee')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Prénom')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->first_name}}" name="first_name" type="text" placeholder="{{__('Prénom')}}" class="form-control @if ($errors->has('first_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('first_name'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('first_name') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('nom')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->last_name}}" name="last_name" type="text" placeholder="{{__('nom')}}"  class="form-control @if ($errors->has('last_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('last_name'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('last_name') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3">{{__('email')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->email}}" name="email" type="email" placeholder="{{__('email')}}"  class="form-control @if ($errors->has('email')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('email'))
                                      	 <ul class="parsley-errors-list filled">
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
                                <input value="{{ date('d-m-Y', strtotime($user->birthday)) }}" name="birthday" type="text" placeholder="{{__('date de naissance')}}" class="bootstrap-datepicker form-control"><ul class="parsley-errors-list" ></ul>
                            </div>
                        </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-sm-3">{{__('téléphone')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->phone}}" name="phone" type="text" placeholder="{{__('téléphone')}}"  class="form-control"><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3">{{__("date d'enregistrement")}}</label>
                            <div class="col-sm-6">
                            	<div class="input-prepend input-group">
                            	    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                <input value="{{ date('d-m-Y', strtotime($user->eng_date)) }}" name="eng_date" type="text" placeholder="{{__("date d'enregistrement")}}"  class="form-control bootstrap-datepicker"><ul class="parsley-errors-list"></ul>
                            </div>
                            </div>
                        </div>                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('fonction')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->employee->function}}" type="text" data-parsley-type="url" placeholder="{{__('fonction')}}"  name="function" class="form-control"><ul class="parsley-errors-list"></ul>
                                 @if ($errors->first('function'))
 	                                      {{ $errors->first('function') }}
 	                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('salaire')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->employee->salaire}}" type="text" data-parsley-type="url" placeholder="{{__('salaire')}}" name="salary" class="form-control"><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3">{{__('type de contrat
')}}</label>
                            <div class="col-sm-6">
                                <input value="{{$user->employee->contract_type}}"  type="text" data-parsley-type="url" placeholder="{{__('type de contrat')}}" name="contract_type" class="form-control"><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('qualité')}}</label>
                            <div class="col-sm-6">
                            <input type="hidden" value="{{$user->employee->grade_id}}" id="hidden-grade">
                                <select class="grade form-control" name="grade_id"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('département')}}</label>
                            <div class="col-sm-6">
                            <input type="hidden" value="{{$user->employee->department_id}}" id="hidden-dep">                              
                                <select class="departement form-control" name="department_id"></select>
                            </div>
                        </div>                                                                     
                        <div class="form-group">
                            <label class="col-sm-3">{{__('image')}}</label>
                            <div class="col-sm-6">
                                <input type="file" data-parsley-type="url" placeholder="{{__('image')}}" name="image" class="form-control"><ul class="parsley-errors-list"></ul>
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

            html = "<option  value=''>Choisir une qualité</option>";
            $.each(res.grades, function(j, d) {
                if(d.id == $('#hidden-grade').val()){
                 html += '<option value="' + d.id + '" selected>' + d.label + '</option>';
                }else {
                 html += '<option value="' + d.id + '">' + d.label + '</option>';
                }
            });
            $('select.grade').append(html);
            });

            $.get("{{ route('getEmployeeDepartement')}}").done(function (res) {
                html = "<option  value=''>Choisir un département</option>";
                $.each(res.deps, function(j, d) {
                     if(d.id == $('#hidden-dep').val()){
                       html += '<option value="' + d.id + '" selected>' + d.label + '</option>';
                     }else{
                      html += '<option value="' + d.id + '">' + d.label + '</option>';

                     }
                });
                $('select.departement').append(html);
            });
        });
    </script>

    @endsection
