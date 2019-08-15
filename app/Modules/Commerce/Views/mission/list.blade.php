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
   <style>
        .toolbar {
            float: right;
        }
        .dataTables_wrapper{
            text-align:center;
        }
        .dataTables_filter{
            display:inline-block;
            float:none!important;
        }
        .changeStatus{
            cursor:pointer;
        }
    </style>

        <div class="panel">

            <div class="panel-body">
          
                <h3 class="title-hero">List Des clients</h3>
                <div class="example-box-wrapper">
                    <div id="datatable-example_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <table class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Mission')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Site')}}</th>
                                <th>{{__('date de création')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($missions as $mission)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td title="{{ $mission->numero }}">{{ $mission->numero}}</td>
                                    <td>       
                           {{ date('d-M-y', strtotime($mission->date)) }}</td>
                                    <td title="{{$mission->customer->name }}">
                                      {{$mission->customer->name }}
                                    </td>
                                
                                    <td title="{{ $mission->telephone }}"> 
                           {{ date('d-M-y', strtotime($mission->created_at)) }}
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{Route('followMission', $mission->id ) }}">
                                          voir detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
 @section('footer')
     @include('plf.responsible.inc.footer')
 @endsection

 @section('scripts')
 @endsection