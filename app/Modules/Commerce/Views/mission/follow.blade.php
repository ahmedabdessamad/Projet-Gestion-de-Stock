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
                    <input type="hidden" id="mission_number" value="{{ $mission->numero }}">

                   {{__("Mission")}} : {{$mission->numero}}
                </h3>
            	<div class="row">
            		<div class="col-md-4">
            			{{__('Date :')}} {{date('d-M-y', strtotime($mission->date))}}
            		</div>
            		<div class="col-md-4">
            			{{__('Client :')}} {{$mission->Customer->name}}
            		</div>
                    <div class="col-md-4">
                        {{__('Destination :')}} {{$mission->destination->name}}
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
                    <div class="row">
                        <div class="col-sm-12">
                             <a href="#" class="pull-right btn btn-danger" title="ajouter un éequipement demonté"  data-target="#addDsimount" data-toggle="modal">
                              <i class="glyph-icon  icon-level-down" title="" data-original-title=".icon-chevron-circle-down"></i>
                             </a>
                            <a href="#" class="pull-right btn btn-info" data-target="#AddEquip" data-toggle="modal" title="Ajouter Un equipement">
                                <i class="glyph-icon icon-level-up" title="" data-original-title=".icon-chevron-circle-up" aria-describedby="tooltip315190"></i>
                            </a>
                            <a class="btn pull-right bg-green" href="{{route('generateGoodOutput', $mission->id)}}" target="_blank">
                             <i class="glyph-icon icon-file-pdf-o" title="" data-original-title=".icon-file-pdf-o" aria-describedby="tooltip980638"></i>
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="pull-right btn btn-info "
                            data-target="#Addspeaker" data-toggle="modal">
                                <div class="glyph-icon icon-elusive-plus" title="" data-original-title=".icon-elusive-plus" aria-describedby="tooltip802591"></div>
                            </a>
                        </div>
                    </div>
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
<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Photo avant travail
        </h3>
                <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="pull-right btn btn-info "
                            data-target="#addMediaBefore" data-toggle="modal">
                                <div class="glyph-icon icon-elusive-plus" title="" data-original-title=".icon-elusive-plus" aria-describedby="tooltip802591"></div>
                            </a>
                        </div>
                </div>
        <div class="example-box-wrapper">
            <div class="row">
                @foreach ($medias as $media)
                @if ($media->etat == 1)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="thumbnail-box">
                        <div class="thumb-content">
                            <div class="center-vertical">
                                <div class="center-content">
                                    <div class="thumb-btn animated bounceInDown">
                                        <a href="#" class="btn btn-md btn-round btn-success" title=""><i class="glyph-icon icon-check"></i></a>
                                        <a href="#" class="btn btn-md btn-round btn-danger" title=""><i class="glyph-icon icon-remove"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-overlay bg-blue-alt"></div>
                        <img src="{{asset('storages/images/commerce/' . $media->image)}}" alt="">
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <h3 class="title-hero">
            Photo aprés travail
        </h3>
                <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class="pull-right btn btn-info "
                            data-target="#addMediaAfter" data-toggle="modal">
                                <div class="glyph-icon icon-elusive-plus" title="" data-original-title=".icon-elusive-plus" aria-describedby="tooltip802591"></div>
                            </a>
                        </div>
                </div>
        <div class="example-box-wrapper ">
            <div class="row">
                @foreach ($medias as $media)
                @if ($media->etat == 2)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="thumbnail-box">
                        <div class="thumb-content">
                            <div class="center-vertical">
                                <div class="center-content">
                                    <div class="thumb-btn animated bounceInDown">
                                        <a href="#" class="btn btn-md btn-round btn-success" title=""><i class="glyph-icon icon-check"></i></a>
                                        <a href="#" class="btn btn-md btn-round btn-danger" title=""><i class="glyph-icon icon-remove"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-overlay bg-blue-alt"></div>
                        <img src="{{asset('storages/images/commerce/' . $media->image)}}" alt="">
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('Commerce::mission.Modals')
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

   $('a.pull-right.btn').on('click', function(){
     $('.mission-name').text($('#mission_number').val());
     $('.mission').val($('#mission_id').val());
   });
   $('.equipements').on('change', function(){
      $('#equipement_ids').val($(this).val());
   });
   $('.speakers').on('change', function(){
        $('#speakers_ids').val($(this).val());      
   });
   $.get("{{ route('getCategorie_id')}}").done(function (res) {
                html = "<option  value=''>Choisir une cetegorie</option>";
                $.each(res.cats, function(j, d) {
                html += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                $('select.catgorie').append(html);
            });
         
            $.get("{{ route('getProvider_id')}}").done(function (res) {
                html = "<option  value=''>Choisir un fournisseur</option>";
                $.each(res.provider, function(j, d) {
                html += '<option value="' + d.id + '">' + d.name + '</option>';
                });
                $('select.Provider').append(html);
            });
 });
 </script>
 
 @endsection