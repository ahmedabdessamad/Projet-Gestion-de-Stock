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
<style type="text/css">
    ul.list-group {
    position: absolute;
    z-index: 1;
    top: 34px;
    left: 10px;
}
</style>

<div id="page-title">
 	<h2>{{__("création des mission")}}</h2>
</div>
 <div class="panel" id="app">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleAddMission')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Numero mission')}}</label>
                            <div class="col-sm-6">
                                <input name="numero" type="text" placeholder="{{__('Numero Mission')}}" class="form-control @if ($errors->has('numero')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('numero'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('numero') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Date début')}}</label>
                            <div class="col-sm-6">
                              <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon">
                                     <i class="glyph-icon icon-calendar"></i>
                                  </span>
                                <input name="date" type="text" placeholder="{{__('Date début')}}" class="bootstrap-datepicker form-control">
                            </div>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('site')}}</label>
                            <div class="col-sm-6">
                            <select class="form-control site" name="site"></select>
                            </div>  
                        </div>
                 </div>
                 <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Intervenants')}}</label>
                            <div class="col-sm-6">

                            <select name="" multiple="" data-placeholder="Listes des Intervenants" class="chosen-select speakers" style="display: none;">
                               <optgroup>    
                                @foreach ($users as $user)
                                 <option value="{{$user->id}}">{{$user->first_name}}</option>
                                @endforeach
                               </optgroup>
                        </select>

                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Equipements')}}</label>
                            <div class="col-sm-6">
                            <select name="" multiple="" data-placeholder="Listes des équipements" class="chosen-select equipements" style="display: none;">
                               <optgroup>    
                                @foreach ($equipements as $equipement)
                                 <option value="{{$equipement->id}}">{{$equipement->n_serie}}</option>
                                @endforeach
                               </optgroup>
                        </select> 
                        <input type="hidden" id="speakers_ids" name="speakers">
                        <input type="hidden" id="equipement_ids" name="equipements">
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


@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $(function() { "use strict";
          $('.bootstrap-datepicker').bsdatepicker({
        format: 'mm-dd-yyyy'
        });
       }); 

       $.get("{{ route('missionGetSites')}}").done(function (res) {
          html = "<option  value=''>Choisir une un site</option>";
            $.each(res.customers, function(j, d) {
            html += '<option value="' + d.id + '">' + d.name + '</option>';
            });
            $('select.site').append(html);
       });

       $('.speakers').on('change', function(){
        $('#speakers_ids').val($(this).val());      
       });

       $('.equipements').on('change', function(){
        $('#equipement_ids').val($(this).val());
       });

    });
</script>                                

@endsection