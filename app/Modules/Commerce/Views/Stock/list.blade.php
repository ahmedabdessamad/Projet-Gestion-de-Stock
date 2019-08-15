
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

            <h3 class="title-hero">List Des Equipement</h3>

            <hr class="margin-bottom-1x">
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item active"><a class="nav-link active" href="#fade" data-toggle="tab" role="tab">Generale</a></li>
                <li class="nav-item"><a class="nav-link " href="#enstock" data-toggle="tab" role="tab">En Stock</a></li>
                <li class="nav-item"><a class="nav-link " href="#scaleup" data-toggle="tab" role="tab">Occupé</a></li>
                <li class="nav-item"><a class="nav-link " href="#scaledown" data-toggle="tab" role="tab">Monté</a></li>
                <li class="nav-item"><a class="nav-link  " href="#dm" data-toggle="tab" role="tab">Démonté</a></li>
                <li class="nav-item"><a class="nav-link  " href="#ar" data-toggle="tab" role="tab">à Réparer</a></li>
                <li class="nav-item"><a class="nav-link " href="#r" data-toggle="tab" role="tab">Réparer</a></li>
            </ul>
            <div class="tab-content active">
                <div class="tab-pane transition fade show  active" id="fade" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>

                            <th>{{__('Qte')}}</th>

                            <th>{{__('Status')}}</th>
                            <th>{{__('Action')}}</th>

                        </tr>
                        </thead>
                        <tbody>
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
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade show " id="enstock" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>
                            <th>{{__('Categorie id')}}</th>
                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listS as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>


                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade scale" id="scaleup" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>

                            <th>{{__('Categorie id')}}</th>
                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listO as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>


                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade scaledown" id="scaledown" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>

                            <th>{{__('Categorie id')}}</th>
                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listM as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>


                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade left" id="dm" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>
                            <th>{{__('Quantite')}}</th>

                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listDM as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>


                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade left" id="ar" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>

                            <th>{{__('Categorie id')}}</th>
                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listAR as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>


                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane transition fade left" id="r" role="tabpanel">
                    <table class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Product')}}</th>
                            <th>{{__('Réference')}}</th>
                            <th>{{__('N serie')}}</th>

                            <th>{{__('Categorie id')}}</th>
                            <th>{{__('Provider id')}}</th>
                            <th>{{__('Status')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listR as  $lst)




                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                            <td title="{{$lst->n_serie }}">{{$lst->n_serie }}</td>

                                        <td>
                                            {{ $lst->categorie_id }}
                                        </td>
                                        <td>
                                            {{ $lst->provider_id }}
                                        </td>
                                        <td>
                                            {{ $lst->status }}
                                        </td>

                                    </tr>
                                </div>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>



            <div class="example-box-wrapper">
                <div id="datatable-example_wrapper" class="dataTables_wrapper form-inline no-footer">


                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection

