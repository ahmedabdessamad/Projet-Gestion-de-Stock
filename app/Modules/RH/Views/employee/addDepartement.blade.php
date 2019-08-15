<div class="modal fade" id="addDep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">{{__('Ajouter un département')}}</h4>
                                </div>
                                <div class="modal-body">
                                    
<form action="{{route('apiHandleAddDepartment')}}" method="POST" id="store-dep">
    {{ csrf_field() }}
    <div class="button-pane">
        <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label">Label</label>
            <div class="col-sm-6 col-md-9">
                <input name="label" type="text" class="form-control" id="dep-label" placeholder="Nom du departrment..."> @if($errors->first('label'))
                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
                @endif
            </div>
        </div>
    </div>
</form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary store-dep">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>