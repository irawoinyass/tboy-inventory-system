<!-- Modal -->
<div id="AcatModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">ADD CATEGORY</h4>
        <button type="button" id="Acatupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
        <form id="category_form" onsubmit="return false" autocomplete="off">
    <div class="form-group">
          <label for="">Category Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
          <small class="form-text text-muted" id="n_error"></small>
        </div>
        <div class="form-group">
          <label for="usertype">Parent Category</label>
          <select name="parent_cat" id="parent_cat" class="form-control">

            
           
          </select>
            <small class="form-text text-muted" id="p_error"></small>
        </div>
      
        <button type="submit" id="register" class="btn btn-primary"><i class="fa fa-user"></i> Submit</button>
        
      </form>
      </div>
      <div class="modal-footer">

        <button type="button" id="Acatdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  

  </div>
</div>


		
	