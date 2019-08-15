
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
                                <th>{{__('nome')}}</th>
                                <th>{{__('Réference')}}</th>
                                <th>{{__('addresse')}}</th>
                                <th>{{__('telephone')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td title="{{ $provider->name }}">{{ $provider->name}}</td>
                                    <td>{{ $provider->reference }}</td>
                                    <td title="{{$provider->addresse }}">{{$provider->addresse }}</td>
                                
                                    <td title="{{ $provider->telephone }}"> 
                                    {{ $provider->telephone }}</td>
                                    <td>
                                        {{ $provider->mail }}
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{Route('showEditProvider', $provider->id ) }}">
                                          <i class="glyph-icon icon-edit"></i>
                                        </a>
                                        <a class="btn btn-danger provider-delete" href="#" data-id="{{$provider->id}}">
                                          <i class="glyph-icon icon-close "></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form id="deleteform" action="{{ route('handleDeleteProvider') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="providerId" >
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
    <script type="text/javascript">
        $(document).ready(function(){
             $("div.toolbar").html('<a class="btn btn-default pull-right mb-20" href="{{ route('showAddProvider') }}" role="button">Ajouter</a>');
         });
        
        $('.provider-delete').on('click', function(){
            $('#providerId').val($(this).data('id'));
            $(".modalMsg").text("Voulez vous vraiment supprimer ce founisseur ?");
            $('#confirmationModal').modal('show');
        });
    </script>
    @endsection