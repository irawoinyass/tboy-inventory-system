<!-- Modal -->
<div id="updatecatModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">UPDATE CATEGORY</h4>
        <button type="button" id="updatecatupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
        <form action="admin.updatecat.php" method="POST">
    <div class="form-group">
          <label for="">Category Name</label>
          <input type="text" name="upcat_name" id="upcat_name" class="form-control" placeholder="Enter Category Name">
          <input type="hidden" name="upcat_id" id="upcat_id" class="form-control" placeholder="Enter Category Name">
          <small class="form-text text-muted" id="n_error"></small>
        </div>
        <div class="form-group">
          <label for="usertype">Parent Category</label>
          <select name="upparent_cat" id="upparent_cat" class="form-control">

            
           
          </select>
            <small class="form-text text-muted" id="p_error"></small>
        </div>
      
        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user"> </i> Update</button>
        
      </form>
      </div>
      <div class="modal-footer">

        <button type="button" id="updatecatdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  

  </div>
</div>


		
	