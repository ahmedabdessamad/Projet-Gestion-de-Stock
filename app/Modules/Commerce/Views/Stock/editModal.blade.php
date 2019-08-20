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
                            <label class="col-sm-3">{{__('Status')}}</label>
                            <div class="col-sm-6">
                                <input name="n_serie" type="text" placeholder="{{__('status')}}"  class="form-control @if ($errors->has('n_serie')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('Status'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('Status') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div>                                               
                        
                        </div>   
                                   
                    </div>
                    <div class="col-md-6">
                      
                        <div class="form-group">
                            <label class="col-sm-3">{{__('catégorie')}}</label>
                            <div class="col-sm-5">
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
                        <div class="form-group">
                            <label class="col-sm-3">{{__('provider')}}</label>
                            <div class="col-sm-5">
                                <select class="Provider form-control  @if ($errors->has('provider_id')) parsley-error  @endif" name="provider_id"></select>
                                   <div class="parsley-errors-list">
                                        @if ($errors->first('Provider'))
                                         <ul class="parsley-errors-list filled">
                                          <li class="parsley-required"> {{ $errors->first('Provider') }}</li>
                                         </ul>
                                        @endif
                                    </div>
                            </div>
                            >
                        </div>


                                                          
                    </div>
                </div>
               
                <input type="hidden" name="id" id="eqId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@include('Commerce::categorie.addcategorie')
@section('footer')
    @include('plf.responsible.inc.footer')
@endsection


      






