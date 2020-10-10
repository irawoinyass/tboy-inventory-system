<!-- Modal -->
<div id="profileModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">
 
    <!-- Modal content-->
  
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title"><font color="blue">UPDATE YOUR PROFILE</font></h4>
        <button type="button" id="profileupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body" id="j">
  <form action="admin.updateprofile.php" method="POST" enctype="multipart/form-data" >
    
    <div class="form-group">
      <label for=""><font color="steelblue"> Change Your Profile Picture</font></label>
          <input type="file" name="file" id="file" accept="image/x-png, image/gif, image/jpeg,image/jpg" class="form-control" >
          <small class="form-text text-muted" id="au_error"></small>
        </div>
    <div class="form-group">
    <label for=""><font color="steelblue"> Name</font></label>
          <input type="text" name="a_username" id="a_username" value="<?php echo $name;?>" class="form-control" >
          <small class="form-text text-muted" id="au_error"></small>
        </div>

         <div class="form-group">
          <label for=""><font color="steelblue">Email</font></label>
          <input type="email" name="a_email" id="a_email" class="form-control" value="<?php echo $email;?>" >

          <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["Admin"];?>" >
          <small class="form-text text-muted" id="ae_error"></small>
        </div>


        
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
   
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="profiledowndis" class="btn btn-success" data-dismiss="modal">Close</button>
        
         	
      </div>
    </div>
    

  </div>
</div>


		</div>
	