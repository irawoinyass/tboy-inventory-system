<!-- Modal -->
<div id="updatebranModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
  
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">UPDATE BRAND</h4>
        <button type="button" id="updatebranupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
       <form action="updatebrand.php" method="POST" >
    <div class="form-group">
          <label for="">Brand Name</label>
          <input type="text" name="updatebrand_name" id="updatebrand_name" class="form-control" placeholder="Enter Brand Name">
          <input type="hidden" name="updatebrand_id" id="updatebrand_id" class="form-control" placeholder="Enter Brand Name">
          <small class="form-text text-muted" id="brand_error"></small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-pen"></i> Update</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="updatebrandowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
         	
      </div>
    </div>
   

  </div>
</div>


		</div>
	