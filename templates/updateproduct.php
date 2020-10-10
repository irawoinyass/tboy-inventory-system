<!-- Modal -->
<div id="updateproModal" class="modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="documet">

    <!-- Modal content-->
 
    <div class="modal-content">
      <div class="modal-header">
  <h4 class="modal-title">UPDATE PRODUCT</h4>
   
        <button type="button" id="updateproupdis" class="close" data-dismiss="modal">&times;</button>
     
      </div>

      <div class="modal-body">
      <form action="updateproduct.php" method="POST" > 
        <div class="form-row">

          <div class="form-group col-md-6">
             <label class="label label-success "><b><font color="steelblue">Date</font></b></label>
           <input type="date" name="product_date" id="product_date" class="form-control" >
            <input type="hidden" name="product_id" id="product_id" class="form-control" >
          </div>
       <div class="form-group col-md-6">
             <label class="label label-success "><b><font color="steelblue">Product Name</font></b></label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name">
             <small class="form-text text-muted" id="name_error"></small>
          </div>
        </div>
<div class="form-group">
             <label class="label label-success "><b><font color="steelblue">Category</font></b></label>
          <select name="select_cat" id="select_cat" class="form-control" >
            
           
          </select>
            <small class="form-text text-muted" id="cat_error"></small>
        </div>
        <div class="form-group">
            <label class="label label-success "><b><font color="steelblue">Brand</font></b></label>
          <select name="select_brand" id="select_brand" class="form-control" >
            
           
          </select>
            <small class="form-text text-muted" id="brand_error"></small>
        </div>

        <div class="form-group">
          <label class="label label-success "><b><font color="steelblue">Product Price</font></b></label>
           <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price">
            <small class="form-text text-muted" id="price_error"></small>
        </div>


        <div class="form-group">
         <label class="label label-success "><b><font color="steelblue">Product Quantity</font></b></label>
           <input type="text" name="product_quantity" id="product_quantity" class="form-control" placeholder="Enter Product Quantity">
           <input type="hidden" name="user_name" id="user_name" class="form-control" value="<?php echo $user_id;?>">
      <small class="form-text text-muted" id="name_error"></small>
        </div>
 <button type="submit" name="submit" class="btn btn-success">Update Product</button>
        
      </form>
</div>
      <div class="modal-footer">

        <button type="button" id="updateprodowndis" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
         	
      </div>
    </div>
  

  </div>
</div>


		</div>
	