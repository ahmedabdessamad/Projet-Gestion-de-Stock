
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
                                    <div class="col-md-7">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">List des grades</h3>
                                            <div style="overflow-y: scroll; height:400px;" class="content-box-wrapper">
                                                <table class="table mrg0B">
                                                  <thead>
                                                    <th>
                                                      grade
                                                    </th>
                                                      <th>
                                                      salaire minimum
                                                    </th>
                                                       <th>
                                                      salaire maximum
                                                    </th>
                                                      <th>
                                                      <span class="pull-right">Action</span>
                                                    </th>
                                                  </thead>
                                                    <tbody>
                                                    @foreach($grades as $grade)
                                                    <tr>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$grade->label}}
                                                        </td>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$grade->min_salary}}
                                                        </td>
                                                        <td class="text-left size-sm">
                                                            <div class="badge badge-small mrg5R bg-azure"></div>
                                                           {{$grade->max_salary}}
                                                        </td>
                                                        <td class="text-center">

             <button class="btn btn-default deletebtn pull-right" title="Suppression" data-id="{{ $grade->id }}">
              <i class="glyph-icon icon-close"></i>
             </button></td><td>
             <a href="#" class="btn btn-default editGradeBtn pull-right" data-id="{{$grade->id}}" data-min_salary="{{$grade->min_salary}}" data-label="{{$grade->label}}" data-max_salary="{{$grade->max_salary}}"  data-toggle="modal" data-target="#editgrade" data-placement="top">
               <i class="glyph-icon icon-edit"></i>
                                  </a>
                                        
                               </td>
                           </tr>
                              @endforeach
                            </tbody>
                                                </table>
                     <form id="deleteform" action="{{ route('handleDeletGrade') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="GradeId">
                        </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="content-box">
                                            <h3 class="content-box-header bg-white">Ajouter grade</h3>
                         <form action="{{route('handleAddgrade')}}" method="POST">
                                            {{ csrf_field() }}
                                              <div class="button-pane">
                                          <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">grade</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="label" type="text" class="form-control" id="" placeholder="grade">
                                                            @if($errors->first('label'))
                                                                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                          <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">salaire minimum</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="min_salary" type="text" class="form-control" id="" placeholder="salaire minimum">
                                                            @if($errors->first('min_salary'))
                                                                <div class="error-input"><small>{{$errors->first('min_salary')}}</small></div>
                                                            @endif
                                                        </div>
                                                    </div>                                                                    <div class="form-group">
                                                        <label class="col-sm-3 col-md-3 control-label">salaire maximum</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input name="max_salary" type="text" class="form-control" id="" placeholder="salaire maximum">
                                                            @if($errors->first('max_salary'))
                                                                <div class="error-input"><small>{{$errors->first('max_salary')}}</small></div>
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

@include('RH::grade.editModal')

@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection
@section('scripts')
    <script>
 
         $('.table tbody').on('click', '.deletebtn',function(){
           $("#GradeId").val($(this).data("id"));
            $(".modalMsg").text("Voulez vous vraiment supprimer cette grade ?");
            $("#confirmationModal").modal("show");
        });

        $('.editGradeBtn').on('click', function () {
            $("#label").val( $(this).data('label') );
            $("#min_salary").val( $(this).data('min_salary') );
            $("#max_salary").val( $(this).data('max_salary') );
            $("#grade_id").val( $(this).data('id') );
        });
      
    </script>
@endsection