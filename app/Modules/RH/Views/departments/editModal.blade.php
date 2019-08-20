<div class="modal fade" id="editDep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditDepartment')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier Departement</h4>
            </div>
                <div class="button-pane">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">Nom du departement</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="depName" name="label" class="form-control" placeholder="Nom du departement...">
                            <div class="info-input mrg10B"><small>Si vous ne specifier un nouveaux nom, on va guardé l'ancien</small></div>
                    </div>
                </div>
                
            
                    <input type="hidden" name="id" id="depId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>