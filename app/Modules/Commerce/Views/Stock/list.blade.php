
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
            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">
                        Responsive tabs
                    </h3>
                    <div class="example-box-wrapper">
                        <ul class="nav-responsive nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">En Stock</a></li>
                            <li><a href="#tab2" data-toggle="tab">Occupé</a></li>
                            <li><a href="#tab3" data-toggle="tab">Monté</a></li>
                            <li><a href="#tab4" data-toggle="tab">Démonté </a></li>
                            <li><a href="#tab5" data-toggle="tab">à Réparer</a></li>
                            <li><a href="#tab6" data-toggle="tab">Réparer</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <table id="d_table6" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($results as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>
                            <div class="tab-pane" id="tab2">

                                <table id="d_table5" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($resultsO as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <table id="d_table1" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($resultsM as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <table id="d_table2" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($resultsD as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <table id="d_table3" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($resultsAR as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>
                            <div class="tab-pane" id="tab6">
                                <table id="d_table4" class="table table-striped table-bordered  no-footer">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Réference')}}</th>
                                        <th>{{__('N serie')}}</th>

                                        <th>{{__('Qte')}}</th>

                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>

                                    </tr>
                                    @foreach($resultsR as  $lst)




                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td title="{{$lst->name }}">{{$lst->name }}</td>


                                            <td>
                                                {{ $lst->reference }}
                                            </td>
                                            <td>
                                                {{ $lst->n_serie }}
                                            </td>
                                            <td>
                                                55
                                            </td>
                                            <td>
                                                {{ $lst->status }}
                                            </td>
                                            <td>

                                                <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="">
                                                    <i class="glyph-icon icon-close"></i>
                                                </button>
                                                <a href="#" class="btn btn-default editCatBtn pull-right" data-id="" data-name="" data-ref=""
                                                   data-qtemin=""
                                                   data-qte=""
                                                   data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                    <i class="glyph-icon icon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach



                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection

