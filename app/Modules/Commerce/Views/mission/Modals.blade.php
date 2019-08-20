<div class="modal fade" id="AddEquip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form action="{{route('handleAddEquipement')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Mission: <span class="mission-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="col-sm-3">{{__('Equipements')}}</label>
                            <div class="col-sm-6">
                                <select name="" multiple="" data-placeholder="Listes des équipements" class="chosen-select equipements" style="display: none;">
                                    <optgroup>@foreach ($available_equipement as $equipement)
                                        <option value="{{$equipement->id}}">{{$equipement->n_serie}}</option>@endforeach</optgroup>
                                </select>
                                <input type="hidden" class="mission" name="mission">
                                <input type="hidden" name="status" value="0">
                                <input type="hidden" name="equipments" id="equipement_ids">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="Addspeaker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form action="{{route('handleAddSpeaker')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Mission: <span class="mission-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3">{{__('Intervenants')}}</label>
                            <div class="col-sm-6">
                                <select name="" multiple="" data-placeholder="Listes des Intervenants" class="chosen-select speakers" style="display: none;">
                                    <optgroup>@foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}}</option>@endforeach</optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="speakers_ids" name="speakers">
                    <input type="hidden" class="mission" name="mission">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="addDsimount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form data-parsley-validate="" novalidate="" action="{{ Route('handleAddEquipement')}}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Mission: <span class="mission-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-3">{{__('Numero serie')}}</label>
                                    <div class="col-sm-6">
                                        <input name="n_serie" type="text" placeholder="{{__('Numero serie')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-3">{{__('catégorie')}}</label>
                                    <div class="col-sm-6">
                                        <select class="catgorie form-control" name="categorie_id"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-3">{{__('provider')}}</label>
                                    <div class="col-sm-6">
                                        <select class="Provider form-control" name="provider_id"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="mission" name="mission">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="status" value="4">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="addMediaAfter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <form action="{{route('addMedia')}}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Mission: <span class="mission-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h3>Ajouter une photo aprés travail</h3>
                        <div class="col-md-12">
                               <div class="form-group">
                                    <label class="col-sm-5">{{__('Selectionner une image')}}</label>
                                    <div class="col-sm-6">
                                        <input name="image" type="file" placeholder="{{__('Selectionner une image')}}" class="form-control">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="mission" name="mission">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="status" value="2">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="addMediaBefore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form action="{{route('addMedia')}}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Mission: <span class="mission-name"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                               <div class="form-group">
                                    <label class="col-sm-5">{{__('Selectionner une image')}}</label>
                                    <div class="col-sm-6">
                                        <input name="image" type="file" placeholder="{{__('Selectionner une image')}}" class="form-control">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="mission" name="mission">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="status" value="1">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>