<div class="modal fade" id="AddCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditCategorie')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier</h4>
            </div>
                <div class="button-pane">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('Nom du catgorie...')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="catName" name="name" class="form-control" placeholder="{{__('Nom du categorie...')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('Réference')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="catRef" name="reference" class="form-control" placeholder="{{__('Code de produit')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('Quantite Mininmum')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="qtemin" name="quantite_min" class="form-control" placeholder="{{__('Code de produit')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>      
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('Quantite')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="qte" name="quantite" class="form-control" placeholder="{{__('Code de produit')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>                         
            
                    <input type="hidden" name="id" id="cat_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary editCat">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>