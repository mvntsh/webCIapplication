  <style type="text/css">
  	@media screen{
  		.main-card{
  			margin: 1em; 
  			border-radius: 0px;
  		}

  		.form-floating{
  			margin-bottom: 1em;
  			color:  #4f9cc7;
  		}

  		.btn:hover{
  			box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
            transform: scale(1.1);
  		}
  	}
  </style>
  <div class="row" style="cursor: default; font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
  	<div class="col-md-2"></div>
  	<div class="col-md-8" style="margin-top: 5em;">
  		<h1 class="text-center" id="spanHeader"><?php echo $title ?> Form</h1>
  		<div class="card main-card" style="box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);">
		  	<div class="card-body" style="background-color: white;">
		  		<div style="margin-top: 2em;">
		  			<span>Enter your request here</span>
		  			<div class="card border border-success p-2 mb-2 border-opacity-25" style="margin-top: .5em;">
		  				<div class="card-body">
		  					<form id="frmInputs">
		  						<div class="form-floating">
		  							<input type="text" name="txtnmRfpno" class="form-control" id="inputnmRfpno" placeholder="RFP No." autocomplete="off">
							  		<label for="inputnmRfpno">RFP No.</label>
		  						</div>
							  	<div class="form-floating">
		  							<input type="text" name="txtnmPayee" class="form-control" id="inputnmPayee" placeholder="Payee" autocomplete="off">
							  		<label for="inputnmPayee">Payee</label>
		  						</div>
		  						<div class="form-floating">
								  <select name="txtnmTrxntype" class="form-select" id="inputnmTrxntype">
								    <option value="Cash Advance">Cash Advance</option>
								    <option value="Funding">Funding</option>
								    <option value="Replenishment">Replenishment</option>
								  </select>
								  <label for="inputnmTrxntype" style="color:  #4f9cc7;">Transaction type</label>
								</div>
								<div class="form-floating">
		  							<input type="date" name="txtnmDaterequest" class="form-control" id="inputnmDaterequest" placeholder="Date Request">
							  		<label for="inputnmDaterequest" style="color:  #4f9cc7;">Date Request</label>
		  						</div>
		  						<div class="form-floating">
		  							<input type="text" name="txtnmAmount" class="form-control" id="inputnmAmount" placeholder="Amount" autocomplete="off">
							  		<label for="inputnmAmount">Amount</label>
		  						</div>
		  						<div class="form-floating">
								  <textarea name="txtnmDescription" class="form-control" placeholder="Leave a comment here" id="inputnmDescription" style="height: 250px" autocomplete="off"></textarea>
								  <label for="inputnmDescription">Description</label>
								</div>
								<div hidden>
									<input type="text" id="inputnmDuplicateamount">
									<input type="text" name="txtnmRecipient" id="inputnmRecipient">
									<input type="text" name="txtnmRequeststatus" id="inputnmRequeststatus">
									<input type="text" name="txtnmMarked" id="inputnmMarked" value="1">
								</div>
							</form>
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-4 d-grid">
									<button class="btn btn-md" style="background-color: #3567b0; border-color: #3567b0; color: white; font-family: 'Sigmar', serif;" id="btnSave">Submit</button>
								</div>
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>
  	</div>
  	<div class="col-md-2"></div>
  </div>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#inputnmRfpno").focus();

		$("#btnSave").click(function(e){
			e.preventDefault();
			var inputnmAmount = $("#inputnmAmount").val();
			$("#inputnmDuplicateamount").val(inputnmAmount);
			$("#inputnmDuplicateamount").keyup();
			validation();
		})

		function validation(){
			var inputnmRfpno  = $("#inputnmRfpno").val();
			var inputnmPayee  = $("#inputnmPayee").val();
			var inputnmDaterequest  = $("#inputnmDaterequest").val();
			var inputnmAmount  = $("#inputnmAmount").val();
			var inputnmDescription  = $("#inputnmDescription").val();

			if(inputnmRfpno==("")>0){
				$("#spanMessage").text("Please input RFP No.");
				systemAlert();
				$("#inputnmRfpno").focus();
			}else if(inputnmPayee==("")>0){
				$("#spanMessage").text("Please input Payee");
				systemAlert();
				$("#inputnmPayee").focus();
			}else if(inputnmDaterequest==("")>0){
				$("#spanMessage").text("Please select a Date request");
				systemAlert();
				$("#inputnmDaterequest").focus();
			}else if(inputnmAmount==("")>0){
				$("#spanMessage").text("Please input Amount");
				systemAlert();
				$("#inputnmAmount").focus();
			}else if(inputnmDescription==("")>0){
				$("#spanMessage").text("Please input Description");
				systemAlert();
				$("#inputnmDescription").focus();
			}else{
				capAmount();	
			}
		}


		function capAmount(){
			var inputnmDuplicateamount = $("#inputnmDuplicateamount").val();

			if(inputnmDuplicateamount>=15001){
				$("#inputnmRequeststatus").val("Request sent to Sir Michael");
				$("#inputnmRecipient").val("EXECUTIVE");
				checkRfpno_v();
			}else{
				$("#inputnmRequeststatus").val("Sent to FD receiving");
				$("#inputnmRecipient").val("FD");
				checkRfpno_v();
			}
		}

		function checkRfpno_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'Requestentry/checkRfpno_c',
				data:$("#frmInputs").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						var inputnmRfpno = $("#inputnmRfpno").val();
						$("#spanMessage").text("Ops! looks like RFP No. '"+inputnmRfpno+"' is already exist.");
					}else{
						insert_v();
					}
				}
			})
		}

		

		function insert_v(){
			$.ajax({
				type:'ajax',
				method:'POST',
				url:'Requestentry/insert_c',
				data:$("#frmInputs,#inputnmUser,#inputnmUserdivision,#inputnmUseregion").serialize(),
				dataType:'json',
				success:function(response){
					if(response.success){
						$("#spanMessage").text("Request has been sent.");
						clearData();
					}
				}
			})
		}

		function clearData(){
			$("#inputnmPayee,#inputnmAmount,#inputnmDescription").val("");
			$("#inputnmRfpno").val("").focus();
		}

		$('#inputnmAmount').keyup(function(event) {

	  	$(this).val(function(index, value) {
	      	value = value.replace(/,/g,'');
	      	return numberWithCommas(value);
	  	});
		});

		function numberWithCommas(x){
		    var parts = x.toString().split(".");
		    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		    return parts.join(".");
		}

		$('#inputnmDuplicateamount').keyup(function(event) {

	  	$(this).val(function(index, value) {
	      	value = value.replace(/,/g,'');
	      	return removeCommas(value);
	  	});
		});

		function removeCommas(x){
	    var parts = x.toString().split(".");
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, "");
	    return parts.join(".");
		}

		$('#inputnmAmount').keypress(function(e){    
	  
			var charCode = (e.which) ? e.which : event.keyCode    
			if (String.fromCharCode(charCode).match(/[^0-9],./g))
			return false;                        

		});

		$('#inputnmRfpno').keypress(function(e){    
	  
			var charCode = (e.which) ? e.which : event.keyCode    
			if (String.fromCharCode(charCode).match(/[^0-9]/g))
			return false;                        

		});
	})
	</script>