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
  @endsection @section('content')
     <div id="page-title">
  <h2>{{__("création de congées du groupe")}}</h2>
</div>
 <div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
        </h3>
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleaddGroupLeave')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('periode')}}</label>
                            <div class="col-sm-6">
                                <input name="period" type="text" placeholder="{{__('period')}}" class="form-control @if ($errors->has('period')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('period'))
                                         <ul class="parsley-errors-list filled">
                                      <li class="parsley-required"> {{ $errors->first('period') }}</li>
                                       </ul>
                                      @endif
                                    </div>
                            </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <input class="btn btn-success" type="submit" value="{{__('effectuer')}}">
                  </div>
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