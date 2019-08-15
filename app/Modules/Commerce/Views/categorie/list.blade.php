
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
        .carousel-inner .item{
            height:300px;
            width:100%;
        }
        .mh-110{
            min-height:110px!important;
        }
        .toolbar {
            float: right;
        }
        .error-input {
            text-align: center;
            color: red;
        }.info-input {
             text-align: center;
             color: gray;
         }

    </style>
    <div class="container">

        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div class="form-wizard">
                        <div class="tab-content">
                            <div class="form-horizontal bordered-row">
                                <div class="tab-pane active" id="step-1">
                                    <div class="col-md-8">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">List des categories</h3>
                                            <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                                <table class="table mrg0B">
                                                	<thead>
                                                		<th>
                                                			name
                                                		</th>
                                                        <th>
                                                            réference
                                                        </th>
                                                        <th>Qte Min</th>
                                                        <th>Quantite</th>
                                                			<th>
                                                			<span class="pull-right">Action</span>
                                                		</th>
                                                	</thead>
                                                    <tbody>
                                                    @foreach($categories as $categorie)
                                                    <tr>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$categorie->name}}
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$categorie->reference}}
                                                        </td>
                                                        <td> {{$categorie->quantite}}</td>
                                                        <td> {{$categorie->quantite_min}}</td>
                                                        <td class="text-center">

                                                                                    <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="{{ $categorie->id }}">
                                            <i class="glyph-icon icon-close"></i>
                                        </button>
                                                            <a href="#" class="btn btn-default editCatBtn pull-right" data-id="{{$categorie->id}}" data-name="{{$categorie->name}}" data-ref="{{$categorie->reference}}"
                                                            data-qtemin="{{$categorie->quantite_min}}"
                                                            data-qte="{{$categorie->quantite}}"
                                                              data-toggle="modal" data-target="#AddCat" data-placement="top">
                                                                <i class="glyph-icon icon-edit"></i>
                                                            </a>
                                         
                                                        </td>
                                                    </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                 <form id="deleteform" action="{{ route('handleDeleteCategorie') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="deleteCatId">
                        </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">Ajouter categorie</h3>
                                            <form action="{{route('handleAddCategorie')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="button-pane">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Categorie</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="name" type="text" class="form-control" id="" placeholder="Nom du catgorie...">
                                                            @if($errors->first('name'))
                                                                <div class="error-input"><small>{{$errors->first('name')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Réference</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="reference" type="text" class="form-control" id="" placeholder="Code produit...">
                                                            @if($errors->first('reference'))
                                                                <div class="error-input"><small>{{$errors->first('reference')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>

<div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Qte Min</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="quantite_min" type="text" class="form-control" id="" placeholder="quantite minimum">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Quantite</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="quantite" type="text" class="form-control" id="" placeholder="quantite...">
                                                        </div>
                                                    </div>

                                                 
                                                    <button type="submit" class="btn btn-md btn-post float-right " style="background-color: #45abab;color: white;" title="">
                                                        Ajout
                                                    </button>

                                            </div>
                                            </form>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('Commerce::categorie.editModal')
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection
@section('scripts')

@if( !empty($errors->all() ))
  <script type="text/javascript">
      $('#AddCat').modal('show');
  </script>
@endif

<script type="text/javascript">
    $( document ).ready(function() {
      $('.editCatBtn').on('click', function(){
        $('#catName').val($(this).data('name'));
        $('#catRef').val($(this).data('ref'));
        $('#qtemin').val($(this).data('qtemin'));
        $('#qte').val($(this).data('qte'));
        $('#cat_id').val($(this).data('id'));
      });

      $('.table tbody').on('click', '.deletebtn',function(){
         $('#deleteCatId').val($(this).data('id'));
         $(".modalMsg").text("Voulez vous vraiment supprimer cette categorie ?");
         $("#confirmationModal").modal("show");
      });
    });
</script>
   
@endsection