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
                                    <div class="col-md-6">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">List des departements</h3>
                                            <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                                <table class="table mrg0B">
                                                	<thead>
                                                		<th>
                                                			Label
                                                		</th>
                                                			<th>
                                                			<span class="pull-right">Action</span>
                                                		</th>
                                                	</thead>
                                                    <tbody>
                                                    @foreach($departments as $department)
                                                    <tr>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$department->label}}
                                                        </td>
                                                        <td class="text-center">

                                                                                    <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="{{ $department->id }}">
                                            <i class="glyph-icon icon-close"></i>
                                        </button>
                                                            <a href="#" class="btn btn-default editDepBtn pull-right" data-id="{{$department->id}}" data-name="{{$department->label}}"  data-toggle="modal" data-target="#editDep" data-placement="top">
                                                                <i class="glyph-icon icon-edit"></i>
                                                            </a>
                                         
                                                        </td>
                                                    </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                 <form id="deleteform" action="{{ route('handleDeleteDepartment') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="dDepId">
                        </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">Ajouter department</h3>
                                            <form action="{{route('handleAddDepartment')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="button-pane">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Label</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="label" type="text" class="form-control" id="" placeholder="Nom du departrment...">
                                                            @if($errors->first('label'))
                                                                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
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
    @include('RH::departments.editModal')

@endsection
@section('footer')
    @include('plf.responsible.inc.footer')
@endsection
@section('scripts')
    <script>
 
    	   $('.table tbody').on('click', '.deletebtn',function(){
           $("#dDepId").val($(this).data("id"));
            $(".modalMsg").text("Voulez vous vraiment supprimer cette departement ?");
            $("#confirmationModal").modal("show");
        });

        $('.editDepBtn').on('click', function () {
            $("#depName").val( $(this).data('name') );
            $("#depId").val( $(this).data('id') );
        });
      
    </script>
@endsection