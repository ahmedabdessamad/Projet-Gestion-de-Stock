<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Demande de congées</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                	<div class="col-sm-1"></div>
                	 <div class="col-sm-5">
                	 	<div class="form-group">
                          <input type="text" id="emp" class="form-control">
                        </div> 
                	 </div>
                	 <div class="col-sm-4">
                	   <div class="form-group">
                          <input type="text" id="date-req" class="form-control">                       </div> 
                	 </div>
                	 <div class="col-sm-2">
                	   <div class="form-group">
                          <input type="text" id="period" class="form-control">
                       </div>
                	 </div>
                </div>  
                <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                	<div class="form-group">
                	 <textarea rows="10" id="reason" class="form-control">
                		
                	 </textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                   	 <textarea rows="10" id="manager-reason" class="form-control" placeholder="tapez votre raison ici ...">
                		
                	 </textarea>
                	</div>
                </div>
                </div>  
                <input type="hidden" id="emp-id">  
                <input type="hidden" id="leaveid">          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary approuver">approuver</button>
                <button type="button" class="btn btn-danger refuser">réfuser</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>