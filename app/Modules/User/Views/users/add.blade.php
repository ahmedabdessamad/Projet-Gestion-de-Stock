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
    <div id="page-title">
        <h2>{{__("Ajouter Utilisateur")}}</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="" action="{{ Route('handleAddUser')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3">{{__('Prénom')}}</label>
                                <div class="col-sm-6">
                                    <input name="first_name" type="text" placeholder="{{__('Prénom')}}" class="form-control @if ($errors->has('first_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('first_name'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                                <li class="parsley-required"> {{ $errors->first('first_name') }}</li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3">{{__('Nom')}}</label>
                                <div class="col-sm-6">
                                    <input name="last_name" type="text" placeholder="{{__('Nom')}}"  class="form-control @if ($errors->has('last_name')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('last_name'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                                <li class="parsley-required"> {{ $errors->first('last_name') }}</li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3">{{__('Email')}}</label>
                                <div class="col-sm-6">
                                    <input name="email" type="email" placeholder="{{__('Email')}}"  class="form-control @if ($errors->has('email')) parsley-error  @endif">
                                    <div class="parsley-errors-list">
                                        @if ($errors->first('email'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                                <li class="parsley-required"> {{ $errors->first('email') }}</li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3">{{__('Mot de passe')}}</label>
                                <div class="col-sm-6">
                                    <div class="input-prepend input-group">
                                        <input name="password" type="password" placeholder="{{__('Mot de passe')}}" class="form-control" data-parsley-id="0868"><ul class="parsley-errors-list" id="parsley-id-0868"></ul>
                                    </div>
                                    @if ($errors->first('password'))
                                        <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                            <li class="parsley-required"> {{ $errors->first('password') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3">{{__('Téléphone')}}</label>
                                <div class="col-sm-6">
                                    <input name="phone" type="text" placeholder="{{__('Téléphone')}}"  class="form-control" data-parsley-id="0868"><ul class="parsley-errors-list" id="parsley-id-0868"></ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3">Status</label>
                                <div class="col-sm-6">
                                        <select class="form-control" name="status" >
                                            <option value="1">Active</option>
                                            <option value="0">Disactive</option>
                                        </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3">Role</label>
                                <div class="col-sm-6">
                                    <select class="form-control roles"  name="role" >
                                    </select>
                                </div>
                                @if ($errors->first('role'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-7101">
                                        <li class="parsley-required"> {{ $errors->first('role') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3">{{__('image')}}</label>
                                <div class="col-sm-6">
                                    <input type="file" data-parsley-type="url" placeholder="{{__('image')}}" name="image" class="form-control" data-parsley-id="8592"><ul class="parsley-errors-list" id="parsley-id-8592"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-default content-box text-center pad20A mrg25T">
                        <button class="btn btn-lg btn-primary">{{__('Enregistrer')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('footer')
    @include('plf.admin.inc.footer')
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {


            $.get("{{ route('apiGetRoles')}}").done(function (res) {

                $.each(res.roles, function(j, d) {

                    $('select.roles').append('<option value="' + d.id + '">' + d.title + '</option>');
                });

            });
        });
    </script>

    @endsection