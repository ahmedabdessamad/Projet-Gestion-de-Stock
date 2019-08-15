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
<div class="row">
	<div class="col-md-12">
		<div class="panel">
            <div class="panel-body">
            	<h3 class="title-hero">
                    <input type="hidden" id="mission_id" value="{{ $mission->id }}">
                   {{__("Mission")}} : {{$mission->numero}}
                </h3>
            	<div class="row">
            		<div class="col-md-6">
            			{{__('Date :')}} {{date('d-M-y', strtotime($mission->date))}}
            		</div>
            		<div class="col-md-6">
            			{{__('Client :')}} {{$mission->Customer->name}}
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-7">
		<div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">
                    Listes des equipements
                </h3>
                <div class="example-box-wrapper">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>N série</th>
                            <th>réference</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($equipements as $equipement)
                        <tr>                        
                            <td>{{$equipement->n_serie}}</td>
                            <td>{{$equipement->n_serie}}</td>
                            <td>{{$equipement->n_serie}}</td>
                            <td>
                            	<div class="input-group-btn">
                                        <button type="button" class="btn btn-primary" tabindex="-1">
                                            @if ($equipement->status == 1)
                                             En stock
                                            @elseif ($equipement->status == 2)
                                             occupée
                                            @elseif ($equipement->status == 3)
                                             Montée
                                            @elseif ($equipement->status == 4)
                                             demontée
                                            @elseif ($equipement->status == 5)
                                             a reparée
                                            @else
                                             reparée
                                            @endif
                                        </button>
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="change-status" href="#" data-status="3" data-id="{{$equipement->id}}">Monté</a></li>
                                            
                                            <li><a data-status="1" class="change-status" data-id="{{$equipement->id}}" href="#">retour en stock</li>                           
                                        </ul>
                                    </div>
                            </td>
                        </tr>                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-5">
		<div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">
                    listes des intervenants
                </h3>
                <div class="example-box-wrapper">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>employee</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($speakers as $speaker)
                        <tr>                        
                            <td><img src="{{asset('storages/images/users/'.Auth::user()->image)}}" style=" width: 40px;"></td>
                            <td>{{$speaker->first_name}} {{$speaker->last_name}}</td>
                            <td>
                            	<a href="#" class="btn btn-danger remove_speaker" data-id="{{$speaker->id}}">Retirer</a>
                            </td>
                        </tr>                            
                        @endforeach
                        </tbody>
                    </table>
                        <form id="deleteform" action="{{ route('removeSpeaker') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            @include('User::modals.confirmationModal')
                            <input type="hidden" name="id" id="speaker_id">
                        </form>                
                    </div>
            </div>
        </div>
	</div>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="panel">
            <div class="panel-body">
                <h3 class="title-hero">
                    Listes des equipements Demonté
                </h3>
                <div class="example-box-wrapper">
                    <table class="table">
                    </table>
                </div>
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
    $('.remove_speaker').on('click', function(){
         $('#speaker_id').val($(this).data('id'));
         $(".modalMsg").text("Voulez vous vraiment supprimer le collaborateur ?");
         $('#confirmationModal').modal('show');
   });
   $('.change-status').on('click', function(){
   	 status = $(this).data('status');
     mission_id = $('#mission_id').val();
     id = $(this).data('id');
     $.ajax({
               type:'GET',
               url:'{{Route('ApiChangeProductStatus')}}',
               data:{'status':status, 'mission_id':mission_id, 'id':id},
               success:function(data) {
                  location.reload();
               }
            });
   });
 });
 </script>
 
 @endsection