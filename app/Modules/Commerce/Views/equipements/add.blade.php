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
 	<h2>{{__("Ajouter un équipement")}}</h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleAddequipements')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Numero serie')}}</label>
                            <div class="col-sm-6">
                                <input name="n_serie" type="text" placeholder="{{__('Numero serie')}}"  class="form-control @if ($errors->has('n_serie')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('n_serie'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('n_serie') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div>                                               
                        
                        </div>   
                                   
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('catégorie')}}</label>
                            <div class="col-sm-6">
                                <select class="catgorie form-control  @if ($errors->has('categorie_id')) parsley-error  @endif" name="categorie_id"></select>
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('catégorie'))
                                         <ul class="parsley-errors-list filled">
                                          <li class="parsley-required"> {{ $errors->first('catégorie_id') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('provider')}}</label>
                            <div class="col-sm-6">
                                <select class="Provider form-control  @if ($errors->has('provider_id')) parsley-error  @endif" name="provider_id"></select>
                                   <div class="parsley-errors-list">
                                        @if ($errors->first('Provider_id'))
                                         <ul class="parsley-errors-list filled">
                                          <li class="parsley-required"> {{ $errors->first('Provider_id') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                        </div>


                      </div>                                    
                    </div>
                </div>
                <div class="bg-default content-box text-center pad20A mrg25T">
                    <button type="submit" class="btn btn-lg btn-primary">{{__('enregistrer')}}</button>
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

            $.get("{{ route('getCategorie_id')}}").done(function (res) {
                html = "<option  value=''>Choisir une cetegorie</option>";
                $.each(res.cats, function(j, d) {
                html += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                $('select.catgorie').append(html);
            });
         
            $.get("{{ route('getProvider_id')}}").done(function (res) {
                html = "<option  value=''>Choisir un fournisseur</option>";
                $.each(res.provider, function(j, d) {
                html += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                $('select.Provider').append(html);
            });
        });

    </script>


    @endsection

      

