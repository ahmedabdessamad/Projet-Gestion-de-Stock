
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
                                            <h3 class="content-box-header bg-white">List des destination</h3>
                                            <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                                <table class="table mrg0B">
                                                	<thead>
                                                		<th>
                                                			destination
                                                		</th>
                                                			<th>
                                                			<span class="pull-right">Action</span>
                                                		</th>
                                                	</thead>
                                                    <tbody>
                                                    @foreach($destinations as $destination)
                                                    <tr>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$destination->name}}
                                                        </td>
                                                        <td>
                                                                                                                   <td class="text-center">

                                                                                    <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="{{ $destination->id }}">
                                            <i class="glyph-icon icon-close"></i>
                                        </button>
                                                            <a href="#" class="btn btn-default editCusBtn pull-right" data-id="{{$destination->id}}" data-name="{{$destination->name}}"
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
                                            <h3 class="content-box-header bg-white">Ajouter destination</h3>
                                            <form action="{{route('handleAddDestination')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="button-pane">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Destination</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="name" type="text" class="form-control" id="" placeholder="Nom du catgorie...">
                                                            @if($errors->first('name'))
                                                                <div class="error-input"><small>{{$errors->first('name')}}</small></div>
                                                            @endif
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

@include('Commerce::customer.editDestinationModal')
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection
@section('scripts')
<script>
	$(document).ready(function(){
		$('.editCusBtn').on('click', function(){
			$('#customerName').val($(this).data('name'));
			$('#customer_id').val($(this).data('id'));
		});
	});
</script>   
@endsection