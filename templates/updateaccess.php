<!-- Modal -->
<div id="updateaccessModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
 
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">UPDATE SUB-ADMIN INFO </h4>
   
     <button type="button" id="updateaccessupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
      <form action="updatesubadminreg.php" method="POST" enctype="multipart/form-data" >

              <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Name</font></b></label>
           <input type="text" name="updatesub_name" id="updatesub_name" class="form-control" placeholder="Enter Sub-Admin Name">

          <input type="hidden" name="updatesub_id" id="updatesub_id" class="form-control" placeholder="Enter Sub-Admin Name">
            <small class="form-text text-muted" id="price_error"></small>
        </div>

              <div class="form-group">
        <label class="label label-success "><b><font color="steelblue">Email</font></b></label>
           <input type="email" name="updatesub_email" id="updatesub_email" class="form-control" placeholder="Enter Sub-Admin Email">
            <small class="form-text text-muted" id="price_error"></small>
        </div>

           <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Upload passport</font></b></label>
          <input type="file" name="file" id="file" accept="image/x-png, image/gif,image/jpeg,image/jpg" class="form-control" >
          <small class="form-text text-muted" id="p_error"></small>
        </div>

         <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Choose Sub-Admin Gender</font></b></label>
          <select name="updatesub_gender" id="updatesub_gender" class="form-control" required >
            <option value="">Choose Sub-Admin Gender</option>
            <option value="Male">Male</option>
              <option value="Female">Female</option>
            
              </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>

  

       
 <button type="submit" name="submit" class="btn btn-success">Update</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="updateaccessdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
         	
      </div>
    </div>
  

  </div>
</div>


		</div>
	