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
 	<h2>{{__("création des clients")}}</h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleEditCustomer')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('client')}}</label>
                            <div class="col-sm-6">
                                <input value="{{ $customer->name }}" name="name" type="text" placeholder="{{__('client')}}" class="form-control @if ($errors->has('name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('name'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('name') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Réference')}}</label>
                            <div class="col-sm-6">
                                <input value="{{ $customer->reference }}" name="reference" type="text" placeholder="{{__('Réference')}}"  class="form-control @if ($errors->has('reference')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                      	@if ($errors->first('reference'))
                                      	 <ul class="parsley-errors-list filled">
 	                            	      <li class="parsley-required"> {{ $errors->first('reference') }}</li>
 	                                     </ul>
 	                                    @endif
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Addresse')}}</label>
                            <div class="col-sm-6">
                                <input value="{{ $customer->addresse }}" name="addresse" type="text" placeholder="{{__('addresse')}}"  class="form-control">
                            </div>
                        </div>                                               
                        <div class="form-group">
                            <label class="col-sm-3">{{__('téléphone')}}</label>
                            <div class="col-sm-6">
                                <input value="{{ $customer->telephone }}" name="telephone" type="text" placeholder="{{__('téléphone')}}"  class="form-control" ><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-sm-3">{{__('E-mail')}}</label>
                            <div class="col-sm-6">
                                <input value="{{ $customer->mail }}" name="mail" type="text" placeholder="{{__('E-mail')}}"  class="form-control" ><ul class="parsley-errors-list"></ul>
                            </div>
                        </div>                   
                    </div>
                         <input type="hidden" name="id" value="{{ $customer->id }}">                                           
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

    @endsection

      

