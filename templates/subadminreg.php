<!-- Modal -->
<div id="subModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
 
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">SUB-ADMIN FORM</h4>
   
        <button type="button" id="subupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
      <form action="subadminreg.php" method="POST" enctype="multipart/form-data" >

              <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Name</font></b></label>
           <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="Enter Sub-Admin Name">
            <small class="form-text text-muted" id="price_error"></small>
        </div>

              <div class="form-group">
        <label class="label label-success "><b><font color="steelblue">Email</font></b></label>
           <input type="email" name="sub_email" id="sub_email" class="form-control" placeholder="Enter Sub-Admin Email">
            <small class="form-text text-muted" id="price_error"></small>
        </div>

           <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Upload passport</font></b></label>
          <input type="file" name="file" id="file" accept="image/x-png, image/gif,image/jpeg,image/jpg" class="form-control" required >
          <small class="form-text text-muted" id="p_error"></small>
        </div>

         <div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Choose Sub-Admin Gender</font></b></label>
          <select name="sub_gender" id="sub_gender" class="form-control" required >
            <option value="">Choose Sub-Admin Gender</option>
            <option value="Male">Male</option>
              <option value="Female">Female</option>
            
              </select>

          <small class="form-text text-muted" id="pro_error"></small>
        </div>

   <div class="form-group">
       <label class="label label-success "><b><font color="steelblue">Password</font></b></label>
           <input type="text" name="sub_password" id="sub_password" class="form-control" placeholder="Enter Sub-Admin Password">
            <small class="form-text text-muted" id="price_error"></small>
        </div>

       
 <button type="submit" name="submit" class="btn btn-success">Submit</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="subdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
         	
      </div>
    </div>
  

  </div>
</div>


		</div>
	