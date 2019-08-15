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
 	<h2>{{__("création d'employés")}}</h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleAddEmployee')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Prénom')}}</label>
                            <div class="col-sm-6">
                                <input name="first_name" type="text" placeholder="{{__('Prénom')}}" class="form-control @if ($errors->has('first_name')) parsley-error  @endif">
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
                                <input name="last_name" type="text" placeholder="{{__('nom')}}"  class="form-control @if ($errors->has('last_name')) parsley-error  @endif">
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
                                <input name="email" type="email" placeholder="{{__('email')}}"  class="form-control @if ($errors->has('email')) parsley-error  @endif">
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
                                <input name="birthday" type="text" placeholder="{{__('date de naissance')}}" class="bootstrap-datepicker form-control" ><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-sm-3">{{__('téléphone')}}</label>
                            <div class="col-sm-6">
                                <input name="phone" type="text" placeholder="{{__('téléphone')}}"  class="form-control" ><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3">{{__("date d'enregistrement")}}</label>
                            <div class="col-sm-6">
                            	<div class="input-prepend input-group">
                            	    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                <input name="eng_date" type="text" placeholder="{{__("date d'/enregistrement")}}"  class="form-control bootstrap-datepicker" ><ul class="parsley-errors-list"></ul>
                            </div>
                            </div>
                        </div>                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('fonction')}}</label>
                            <div class="col-sm-6">
                                <input type="text" data-parsley-type="url" placeholder="{{__('fonction')}}"  name="function" class="form-control"><ul class="parsley-errors-list"></ul>
                                 @if ($errors->first('function'))
 	                                      {{ $errors->first('function') }}
 	                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('salaire')}}</label>
                            <div class="col-sm-6">
                                <input type="text" data-parsley-type="url" placeholder="{{__('salaire')}}" name="salary" class="form-control"><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-sm-3">{{__('type de contrat
')}}</label>
                            <div class="col-sm-6">
                                <input type="text" data-parsley-type="url" placeholder="{{__('type de contrat')}}" name="contract_type" class="form-control"><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('qualité')}}</label>
                            <div class="col-sm-5">
                                <select class="grade form-control  @if ($errors->has('grade_id')) parsley-error  @endif" name="grade_id"></select>
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('grade_id'))
                                         <ul class="parsley-errors-list filled">
                                          <li class="parsley-required"> {{ $errors->first('grade_id') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-sm-1">
                               <a href="#" data-toggle="modal" data-target="#addgrade" class="btn btn-info float-right tooltip-button addgrade" title="" data-original-title="{{__('Ajouter un grade')}}">
                                 <i class="glyph-icon icon-plus"></i>
                               </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('département')}}</label>
                            <div class="col-sm-5">
                                <select class="departement form-control  @if ($errors->has('department_id')) parsley-error  @endif" name="department_id"></select>
                                   <div class="parsley-errors-list">
                                        @if ($errors->first('department_id'))
                                         <ul class="parsley-errors-list filled">
                                          <li class="parsley-required"> {{ $errors->first('department_id') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-sm-1">
                               <a data-toggle="modal" data-target="#addDep" href="#" class="btn btn-info float-right tooltip-button addDep" title="" data-original-title="{{__('Ajouter un département')}}">
                                 <i class="glyph-icon icon-plus"></i>
                               </a>
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
@include('RH::employee.addgrade')
@include('RH::employee.addDepartement')
@section('footer')
    @include('plf.responsible.inc.footer')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $.get("{{ route('getEmployeeGrade')}}").done(function (res) {
                html = "<option  value=''>Choisir une qualité</option>";
                $.each(res.grades, function(j, d) {
                html += '<option value="' + d.id + '">' + d.label + '</option>';
                });
                $('select.grade').append(html);
            });
            $.get("{{ route('getEmployeeDepartement')}}").done(function (res) {
                html = "<option  value=''>Choisir un département</option>";
                $.each(res.deps, function(j, d) {
                html += '<option value="' + d.id + '">' + d.label + '</option>';
                });
                $('select.departement').append(html);
            });
            
            $('.addgrade').on('click'),function(){
              $("#addgrade").modal("show");
            }; 
            $('.btn a').on('click', '.addDep',function(){
              $("#addDep").modal("show");
            });   

    $(".store-dep").click(function(e){
        e.preventDefault();
        var label = $("#dep-label").val();
         if($.trim(label) !== ''){
        $.ajax({
           type:'GET',
           url: "{{Route('apiHandleAddDepartment')}}",
           data:{'label':label},
           success:function(data){
              if(data.success == 1){
            $.get("{{ route('getEmployeeDepartement')}}").done(function (res) {
                html = "<option value=''>Choisir un département</option>";
                $('select.departement').empty();                
                $.each(res.deps, function(j, d) {
                html += '<option value="' + d.id + '">' + d.label + '</option>';
                });
                $('select.departement').append(html);
            });
                 $("#addDep").modal("hide");
              }
           }
        });
        }else{
            alert('label is required');
        }
        });

        $(".store-grade").click(function(e){
        e.preventDefault();
        var label = $("#grade-label").val();
        var min_salary = $("#min_salary").val() ;
        var max_salary = $("#max_salary").val() ;
        if($.trim(label) !== ''){
        $.ajax({
           type:'GET',
           url: "{{Route('apiHandleAddGrade')}}",
           data: {'label':label, 'min_salary':min_salary, 'max_salary':max_salary},
           success:function(data){
              if(data.success == 1){
              $.get("{{ route('getEmployeeGrade')}}").done(function (res) {
                $('select.grade').empty();
                html = "<option value=''>Choisir une qualité</option>";
                $.each(res.grades, function(j, d) {
                html += '<option value="' + d.id + '">' + d.label + '</option>';
                });
                $('select.grade').append(html);
            });
                 $("#addgrade").modal("hide");
              }
           }
        });
        }else{
            alert('label is required');
        }
        });
     });


    </script>

    @endsection

      

