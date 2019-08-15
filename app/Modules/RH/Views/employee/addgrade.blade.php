<div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">{{__('Ajouter un grade')}}</h4>
                                </div>
                                <div class="modal-body">

<form action="{{route('apiHandleAddGrade')}}" method="POST">
    {{ csrf_field() }}
    <div class="button-pane">
        <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label">Label</label>
            <div class="col-sm-6 col-md-9">
                <input id="grade-label" name="label" type="text" class="form-control" id="" placeholder="Nom du grade..."> @if($errors->first('label'))
                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label">salire minimum</label>
            <div class="col-sm-6 col-md-9">
                <input id="min_salary" type="number" class="form-control" id="" placeholder="salire minimum">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-3 control-label">salaire maximum</label>
            <div class="col-sm-6 col-md-9">
                <input id="max_salary" type="number" class="form-control" id="" placeholder="salaire maximum...">
            </div>
        </div>

    </div>
</form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary store-grade">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>