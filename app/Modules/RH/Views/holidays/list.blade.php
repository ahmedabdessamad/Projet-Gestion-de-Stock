
@extends('plf.admin.layout')

@section('head')
    @include('plf.admin.inc.head')
@endsection

@section('slideBar')
    @include('plf.admin.inc.slideBar')
@endsection

@section('header')
    @include('plf.admin.inc.header')
@endsection

@section('sidebar')
    @include('plf.admin.inc.sideBar')
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
                                    <div class="col-md-7">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">List des jours</h3>
                                            <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                                <table class="table mrg0B">
                                                	<thead>
                                                		<th>
                                                			Date
                                                		</th>
                                                        <th>
                                                            Label
                                                        </th>
                                                        <th>
                                                            Type
                                                        </th>
                                                        <th>
                                                            Recoverable ?
                                                        </th>
                                                			<th>
                                                			<span class="pull-right">Action</span>
                                                		</th>
                                                	</thead>
                                                    <tbody>
                                                    @foreach($holidays as $holiday)
                                                    <tr>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$holiday->date->format('Y/m/d')}}
                                                        </td>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                            {{$holiday->label}}
                                                        </td>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                            {{$holiday->type == 0 ? 'Chaumé payé' : 'Chaumé non payé' }}
                                                        </td>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                            {{$holiday->recoverable == 0 ? 'Non' : 'Oui' }}
                                                        </td>
                                                        <td class="text-center">

                                                                                    <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="{{ $holiday->id }}">
                                            <i class="glyph-icon icon-close"></i>
                                        </button>
                                                            <a href="#" class="btn btn-default editDayBtn pull-right" data-id="{{$holiday->id}}" data-date="{{$holiday->date}}" data-label="{{$holiday->label}}" data-type="{{$holiday->type}}" data-recoverable="{{$holiday->recoverable}}"  data-toggle="modal" data-target="#editDay" data-placement="top">
                                                                <i class="glyph-icon icon-edit"></i>
                                                            </a>
                                         
                                                        </td>
                                                    </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                 <form id="deleteform" action="{{ route('handleDeleteHoliday') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="dDayId">
                        </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">Ajouter jour férié</h3>
                                            <form action="{{route('handleAddHoliday')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="button-pane">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Date</label>
                                                        <div class="col-sm-6 col-md-9">
                                                           <input name="date" type="text" class="bootstrap-datepicker form-control" value="2019-07-19" data-date-format="mm/dd/yy">
                                                            @if($errors->first('date'))
                                                                <div class="error-input"><small>{{$errors->first('date')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Label</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="label" type="text" class="form-control" id="" placeholder="Nom du jour...">
                                                            @if($errors->first('label'))
                                                                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">type</label>
                                                        <div class="col-sm-6 col-md-9">
                                                           <select class="form-control" name="type">
                            <option value="0">Chaumé payé</option>
                            <option value="1">Chaumé non payé</option>
                   
                        </select>
                                                        
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">Recovrable ?</label>
                                                         <div class="checker" id="uniform-inlineCheckbox110"><span class=""><input type="checkbox" name="recoverable" id="inlineCheckbox110" class="custom-checkbox"><i class="glyph-icon icon-check"></i></span></div>
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


@endsection
@include('RH::holidays.editModal')

@section('footer')
    @include('plf.admin.inc.footer')
@endsection
@section('scripts')
    <script>
 
    	   $('.table tbody').on('click', '.deletebtn',function(){
           $("#dDayId").val($(this).data("id"));
            $(".modalMsg").text("Voulez vous vraiment supprimer cette jour ?");
            $("#confirmationModal").modal("show");
        });

        $('.editDayBtn').on('click', function () {
            $("#id").val( $(this).data('id') );
            $("#date").val( $(this).data('date') );
            $("#label").val( $(this).data('label') );

            if($(this).data('recoverable') == 1 ){
                $('#recoverableCb').prop('checked', true);
            }

           if($(this).data('type') == 0){
               $("#type option[value='0']").attr("selected","selected");
           }else {
               $("#type option[value='1']").attr("selected","selected");
           }

        });
      
    </script>
@endsection