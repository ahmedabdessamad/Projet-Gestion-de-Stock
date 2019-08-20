<div class="modal fade" id="editEq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditequipements')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier Equipement</h4>
            </div>
                <div class="button-pane">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">Status</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="number" id="EqStatus" name="status" class="form-control" placeholder="Status...">
                            <div class="info-input mrg10B"><small>concentre vous haha !!</small></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">Categorie</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="EqCategorie" name="categorie" class="form-control" placeholder="Categorie...">
                            <div class="info-input mrg10B"><small>Concentrez vous haha!!</small></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">Provider </label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="EqPro" name="provider" class="form-control" placeholder="Provider...">
                            <div class="info-input mrg10B"><small>Concentrez vous haha!!</small></div>
                    </div>
                </div>
            
                    <input type="hidden" name="id" id="eqId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>