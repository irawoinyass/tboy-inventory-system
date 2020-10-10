<!-- Modal -->
<div id="passModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
   
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">FORGET PASSWORD ?</h4>
        <button type="button" id="passupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
        <form id="forget_password_form" onsubmit="return false" autocomplete="off">
    <div class="form-group">
          <label for="">*Email*</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
          <small class="form-text text-muted" id="e_error">we'll never share your email with anybody</small>
        </div>

         <div class="form-group">
          <label for="">*New Password*</label>
          <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter New Password" required>
          <small class="form-text text-muted" id="p1_error"></small>
        </div>

         <div class="form-group">
          <label for="">*Confirm New Password*</label>
          <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Comfirm New Password" required>
          <small class="form-text text-muted" id="p2_error"></small>
        </div>
        
        <button type="submit" id="change" class="btn btn-primary"><i class="fa fa-user"></i> Submit</button>
        
      </form>
      </div>
      <div class="modal-footer">

        <button type="button" id="passdowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
   

  </div>
</div>


		</div>
	