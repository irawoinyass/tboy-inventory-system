<!-- Modal -->
<div id="recModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
  
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">EDIT RECORD</h4>
        <button type="button" id="recupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
       <form action="recordval.php" method="POST">
    <div class="form-group">
          <label for="">Customer Name</label>
          <input type="text" name="cus_name" id="cus_name" class="form-control">
          <input type="hidden" name="cus_id" id="cus_id">
          <small class="form-text text-muted" id="customer_error"></small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-pen"></i> Update</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="recdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
          
      </div>
    </div>
   

  </div>
</div>


    </div>
  