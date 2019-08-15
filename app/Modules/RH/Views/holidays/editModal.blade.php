<div class="modal fade" id="editDay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditHoliday')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modifier Jour Férié</h4>
                </div>
                <div class="button-pane">
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">Date</label>
                        <div class="col-sm-6 col-md-9">
                            <input id="date" name="date" type="text" class="bootstrap-datepicker form-control" value="2019-07-19" data-date-format="mm/dd/yy">
                            @if($errors->first('date'))
                                <div class="error-input"><small>{{$errors->first('date')}}</small></div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">Label</label>
                        <div class="col-sm-6 col-md-9">
                            <input name="label" type="text" class="form-control" id="label" placeholder="Nom du jour...">
                            @if($errors->first('label'))
                                <div class="error-input"><small>{{$errors->first('label')}}</small></div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">type</label>
                        <div class="col-sm-6 col-md-9">
                            <select class="form-control" id="type" name="type">
                                <option value="0">Chaumé payé</option>
                                <option value="1">Chaumé non payé</option>

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">Recovrable ?</label>

                                <input  type="checkbox" name="recoverable" id="recoverableCb">
                    </div>

                    <input type="hidden" name="id" id="id">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
