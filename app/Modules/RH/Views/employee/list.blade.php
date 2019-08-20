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
          
                <h3 class="title-hero">List Des Employées</h3>
                <div class="example-box-wrapper">
                    <div id="datatable-example_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <table class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('image')}}</th>
                                <th>{{__('Nom et Prénom')}}</th>
                                <th>{{__('Téléphone')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><img class="jcrop-preview" style="width: 50px;" src="{{asset('storages/images/employee/'.$user->user()->first()->image)}}"></td>
                                    <td title="{{ $user->user()->first()->first_name }} 
                                        {{$user->user()->first()->last_name }}">{{ $user->user()->first()->first_name }} 
                                        {{$user->user()->first()->last_name }}</td>
                                    <td>{{$user->user()->first()->phone }}</td>
                                    <td title="{{$user->user()->first()->email }}">{{$user->user()->first()->email }}</td>
                                
                                    <td data-user="{{ $user->user()->first()->id}}" title="Cliquer pour changer le status de compte">{!! ($user->user->first()->status!=0)?'<span class="bs-label label-primary changeStatus">Actif</span>':'<span class="bs-label label-warning changeStatus">Inactif</span>' !!}</td>
                                    <td>
                                        <a disabled="" class="btn btn-default" href="#" title="Visualisation">
                                            <i class="glyph-icon icon-eye"></i>
                                        </a>
                                     
                                        <a class="btn btn-default" href="{{ route('showEditEmployee', $user->user()->first()->id) }}" title="Mettre à jour">
                                            <i class="glyph-icon icon-pencil"></i>
                                        </a>
                                        <button class="btn btn-default deletebtn" title="Suppression" data-id="{{ $user->user()->first()->id}}">
                                            <i class="glyph-icon icon-close"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form id="deleteform" action="{{ route('handleDeleteEmployee') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="userId" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('plf.responsible.inc.footer')
@endsection
@section('scripts')

<script>
    $(document).ready(function()
    {
        $('.dataTable tbody').on('click', '.deletebtn',function(){
            $("#userId").val($(this).data("id"));
            $(".modalMsg").text("Voulez vous vraiment supprimer cette utilisateur ?");
            $("#confirmationModal").modal("show");
        });


        $('.dataTable tbody').on('click', '.changeStatus',function(){
            id = $(this).parent().data('user');
            selector = $(this);
            $.get("{{ route('apiChangeEmloyeeStatus')}}?userId="+id).done(function (res) {
                    swal({
                        "title":"Succés",
                        "text":"L'utilisateur a été modifié!",
                        "showConfirmButton":true,
                        "type":"success",
                        "confirmButtonText":"Ok",
                        "allowOutsideClick":false
                    });
                    if(selector.hasClass('label-primary')){
                        selector.removeClass('label-primary').addClass('label-warning').text('Inactif');
                    }
                    else{
                        selector.removeClass('label-warning').addClass('label-primary').text('Actif');
                    }
                });
        });

 $("div.toolbar").html('<a class="btn btn-default pull-right mb-20" href="{{ route('showAddEmployee')}}" role="button">Ajouter</a>');
    });

</script>
@endsection
