<div class="modal fade" id="AddCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('handleEditDestination')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier</h4>
            </div>
                <div class="button-pane">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 ">{{__('destination')}}</label>
                    <div class="col-sm-6 col-md-9">
                        <input type="text" id="customerName" name="name" class="form-control" placeholder="{{__('destination')}}">
                            <div class="info-input mrg10B"></div>
                    </div>
                </div>
            
                    <input type="hidden" name="id" id="customer_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary editCat">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>