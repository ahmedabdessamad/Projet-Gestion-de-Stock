<div class="modal fade" id="editgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditGrade')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier Grade</h4>
            </div>
                <div class="button-pane">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('Nom du grade...')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="label" name="label" class="form-control" placeholder="{{__('Nom du grade...')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('salire minimum')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="min_salary" name="min_salary" class="form-control" placeholder="{{__('salire minimum')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('salire maximum')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="max_salary" name="max_salary" class="form-control" placeholder="{{__('salire maximum')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>
            
                    <input type="hidden" name="id" id="grade_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>