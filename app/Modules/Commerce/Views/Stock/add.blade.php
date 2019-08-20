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
 	<h2>{{__("modifier un équipement")}}</h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleEditEq',$personne->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Status')}}</label>
                            <div class="col-sm-6">
                        <input type="text" id="EqStatus" value="{{$personne->status}}" name="Status" class="form-control" placeholder="Status...">
                            <div class="info-input "><small>concentre vous haha !!</small></div>
                            </div>
                        </div>                                               
                        
                        </div>   
                                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('categorie')}}</label>
                            <div class="col-sm-6">
                        <input type="text" id="EqStatus" value="{{$personne->categorie_id}}" name="Cat" class="form-control" placeholder="Status...">
                            <div class="info-input "><small>concentre vous haha !!</small></div>
                            </div>
                        </div>                                               
                        
                        </div>   
                                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Provider')}}</label>
                            <div class="col-sm-6">
                        <input type="text" id="EqStatus" value="{{$personne->provider_id}}" name="Pro" class="form-control" placeholder="Status...">
                            <div class="info-input "><small>concentre vous haha !!</small></div>
                            </div>
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


      






