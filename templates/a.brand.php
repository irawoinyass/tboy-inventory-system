<!-- Modal -->
<div id="branModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
  
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">ADD BRAND</h4>
        <button type="button" id="branupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
       <form id="brand_form" onsubmit="return false" autocomplete="off">
    <div class="form-group">
          <label for="">Brand Name</label>
          <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="Enter Brand Name">
          <small class="form-text text-muted" id="brand_error"></small>
        </div>
        
        <button type="submit" id="register" class="btn btn-primary"><i class="fa fa-pen"></i> Submit</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="brandowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
         	
      </div>
    </div>
   

  </div>
</div>


		</div>
	