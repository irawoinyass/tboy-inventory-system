$(document).ready(function(){


//This here The row will dispaly
AddNewRow();

//if click the add button AddNewRow function will run

	$("#add").click(function(){
		AddNewRow();
	})

	//AddNewRow validation

		function AddNewRow(){

			$.ajax({

				url: "include/sub.process.php",
				method: "POST",
				data: {getNewOrderItem:1},
				success: function(data){
					// alert(data);

					$("#invoice_item").append(data);

					var n = 0;

					$(".number").each(function(){

						$(this).html(++n);


					})

				}
				})
				}


//To remove a row buy clicking remove button

				$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();

		calculate(0,0);

		})



		$("#invoice_item").delegate(".pid","change",function(){

			var pid = $(this).val();
			var tr = $(this).parent().parent();
			$(".overlay").show();

			$.ajax({
				
				url : "include/sub.process.php",
				method : "POST",
				dataType : "json",
				data : {getPriceAndQty:1, id:pid},
				success: function(data){
					//console.log(data);
					tr.find(".tqty").val(data["product_stock"]);
					 tr.find(".pro_name").val(data["product_name"]);
					tr.find(".qty").val();
					 tr.find(".price").val(data["product_price"]);
					 tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
					 calculate(0,0);
				}



			})

		})	


		$("#invoice_item").delegate(".qty","keyup",function(){

			var qty = $(this);

			var tr = $(this).parent().parent();

			if (isNaN(qty.val())) {

				alert("Please enter a valid quantity");
				qty.val(1);
			}else {

				if ( (qty.val() - 0 ) > (tr.find(".tqty").val() - 0 )) {

					alert("Sorry !! This much of quantity is not available");
					qty.val(1);
				}else {

					tr.find(".amt").html(qty.val() * tr.find(".price").val());
					calculate(0,0);
				}

			}

	})



function calculate(dis,paid){

		var sub_total = 0;
		var gst = 0;
		var net_total = 0;
		var discount = dis;
		var paid_amt = paid;
		var due = 0;
		$(".amt").each(function(){

		sub_total = sub_total + ( $(this).html() * 1);

		})

		//gst = 0.18 * sub_total;
		//net_total = gst + sub_total;

		net_total = sub_total - discount;
		due = net_total - paid_amt;

		//$("#gst").val(gst);
		
	$("#sub_total").val(sub_total);
		
		$("#discount").val(discount);
		$("#net_total").val(net_total);
		// $("#paid")
		$("#due").val(due);
	}


	$("#discount").keyup(function(){
		var discount = $(this).val();
		calculate(discount,0);

	})

$("#paid").keyup(function(){
		var paid = $(this).val();
		var discount = $("#discount").val();
		calculate(discount, paid);

	})



//========================================================================
// ==================== Order Accepting =================================
//========================================================================


	$("#order_form").click(function(){
		var invoice = $("#get_order_data").serialize();

		if ($("#cust_name").val() == "") {

			alert("Please Enter Customer Name");
		}else if ($("#paid").val() == "") {
			alert("Please Enter Amount Paid");

		}else if($(".qty").val() == ""){

			alert("Please Choose a valid quantity");
		}else{


			$.ajax({

			url : "include/sub.process.php",
			method : "POST",
			data : $("#get_order_data").serialize(),
			success : function(data){
				
				
				// alert(data);
			
				if (data = "ORDER_COMPLETED") {
					 $("#get_order_data").trigger("reset");
					if (confirm("Do you want to make an invoice receipt")) {
					window.location.href = "sub.pos.php?"+invoice;
					}else{
						alert("ORDER_COMPLETED");
					}

				}else{

					alert("An Error just Occur");
				}

			}

			})
		}

		})





});