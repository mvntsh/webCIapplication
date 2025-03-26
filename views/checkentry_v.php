	<div class="card" style="border-radius: 0px; background-color: transparent; border-color: transparent;">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-7">
							<h1 id="spanHeader">Check Entry</h1>
						</div>
						<div class="col-md-5">
							<form id="frmSearch" style="font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
								<div class="input-group mb-3">
								  	<input type="text" name="txtnmSearched" class="form-control" id="inputnmSearched" style="height: 75px; font-size: 20pt;">
								  	<button class="btn btn-primary" id="btnSearch">Search</button>
								</div>
							</form>
						</div>
					</div>
					<table class="table table-responsive table-hover table-primary" style="margin-top: 1em; margin-top: 1.3em; cursor: default; font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;" id="tblRequest">
						<thead class="align-middle">
							<tr style="border-color: #0292c7;">
								<td colspan="5" style="background-color: #0292c7; color: white; font-size: 25pt; text-align: center; text-transform: uppercase;">PROCESSING DRAWER</td>
							</tr>
							<tr style="height: 3.5em; text-align:center; text-transform: uppercase;">
								<td style="background-color: #0292c7; color: white;">Rfpno.</td>
								<td style="background-color: #0292c7; color: white;">Payee</td>
								<td style="background-color: #0292c7; color: white;">Date Requested</td>
								<td style="background-color: #0292c7; color: white;">Amount</td>
								<td style="background-color: #0292c7; color: white;">Description</td>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="col-md-4">
					<div class="card" style="border-color: white; box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12); font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
						<div class="card-body">
							<h1 id="spanHeader">Form</h1>
							<hr>
							<form id="frmCheckEntry">
								<div hidden>
									<input type="text" name="txtnmFormtype" value="1" id="inputnmFormtype">
									<input type="text" name="txtnmCheckstatus" value="On-hand" id="inputnmCheckstatus">
								</div>
								<div class="form-floating" style="margin-bottom: 1em;">
								  <select name="txtnmBank" class="form-select" id="inputnmBank">
								    <option value="1">BPI - #1301032729</option>
								    <option value="2">MBTC - #095465444446</option>
								    <option value="3">CBC - #1234564654</option>
								  </select>
								  <label for="inputnmBank">Bank & Account No.</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="text" class="form-control" id="inputnmConsumableamount" placeholder="Consumable amount" readonly>
								  <label for="inputnmConsumableamount">Consumable amount</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="date" name="txtnmCheckdate" class="form-control" id="inputnmCheckdate" placeholder="Check Date">
								  <label for="inputnmCheckdate">Check Date</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="text" name="txtnmCheckno" class="form-control" id="inputnmCheckno" placeholder="Check No.">
								  <label for="inputnmCheckno">Check No.</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="date" name="txtnmVoucherdate" class="form-control" id="inputnmVoucherdate" placeholder="Check Date">
								  <label for="inputnmVoucherdate">Voucher Date</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="text" name="txtnmVoucherno" class="form-control" id="inputnmVoucherno" placeholder="Voucher No.">
								  <label for="inputnmVoucherno">Voucher No.</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="text" name="txtnmCheckamount" class="form-control" id="inputnmCheckamount" placeholder="Check No.">
								  <label for="inputnmCheckamount">Check Amount</label>
								</div>
							</form>
							<div class="row">
								<div class="col-md-6"></div>
								<div class="col-md-6 d-grid">
									<button class="btn btn-success" id="btnSave">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btnOpenmodal" hidden>
		  open modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content" style="font-family: 'Montserrat',sans-serif;font-optical-sizing: auto; border-radius: 0px;">
		      	<div class="modal-header">
			        <h1 class="modal-title fs-5" id="staticBackdropLabel">Receiving Information</h1>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			    </div>
		      	<div class="modal-body" style="cursor: default;">
			      	<form id="formReceiving">
			      		<div class="form-floating mb-3">
						  	<input type="text" name="txtnmRfpno" class="form-control" id="inputnmRfpno" placeholder="RFP No." readonly>
						  	<label for="inputnmRfpno">RFP No.</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="text" name="txtnmPayee" class="form-control" id="inputnmPayee" placeholder="RFP No." readonly>
						  <label for="inputnmPayee">Payee</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="date" name="txtnmDaterequest" class="form-control" id="inputnmDaterequested" placeholder="Date Request" readonly>
						  <label for="inputnmDaterequested">Date Request</label>
						</div>
						<div class="form-floating mb-3">
						  <input type="text" name="txtnmReceivedamount" class="form-control" id="inputnmReceivedamount" placeholder="Received Amount" readonly>
						  <label for="inputnmReceivedamount">Received Amount</label>
						</div>
						<div class="form-floating">
						  <textarea class="form-control" name="txtnmDescription" placeholder="Description" id="inputnmDescription" style="height: 120px;"></textarea>
						  <label for="inputnmDescription">Description</label>
						</div>
						<div hidden>
							<input type="text" name="txtnmRequeststatus" value="Processing" id="inputnmRequeststatus">
							<input type="text" name="txtnmMarked" value="3" id="inputnmMarked">
						</div>
			      	</form>
		      	</div>
			    <div class="modal-footer">
			       <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Proceed</button>
			    </div>
		    </div>
		  </div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

			viewForprocess_v();
			function viewForprocess_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkentry/viewForprocess_c',
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr data-rfpno="${sqldata['rfpno']}" data-payee="${sqldata['payee']}" data-daterequested="${sqldata['daterequested']}" data-amountleft="${sqldata['amountleft']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" style="font-size: 12pt;" id="btnSelect">
										<td style="text-align: center;">${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td style="text-align: center;">${sqldata["daterequested"]}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata["description"]}</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}
					}
				})
			}

			$(document).on("click","#btnSearch",function(e){
				e.preventDefault();
				var inputnmSearched = $("#inputnmSearched").val();

				if(inputnmSearched==("")>0){
					viewForprocess_v();
				}else{
					searchForprocess_v();
				}
			})

			function searchForprocess_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkentry/searchForprocess_c',
					data:$("#inputnmSearched").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr data-rfpno="${sqldata['rfpno']}" data-payee="${sqldata['payee']}" data-daterequested="${sqldata['daterequested']}" data-amountleft="${sqldata['amountleft']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" style="font-size: 12pt;" id="btnSelect">
										<td style="text-align: center;">${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td style="text-align: center;">${sqldata["daterequested"]}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata["description"]}</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}else{
							console.log("No Records found.");
						}
					}
				})
			}

			$(document).on("click","#btnSelect",function(e){
				e.preventDefault();
				$("#inputnmRfpno").val($(this).attr("data-rfpno")); 
				$("#inputnmPayee").val($(this).attr("data-payee")); 
				$("#inputnmConsumableamount,#inputnmCheckamount").val($(this).attr("data-amountleft"));
				$("#inputnmReceivedamount").val($(this).attr("data-amount")); 
				$("#inputnmDescription").val($(this).attr("data-description"));
				$("#inputnmDaterequested").val($(this).attr("data-daterequested"));
				$("#btnOpenmodal").click(); 
			})

			$(document).on("click","#btnSave",function(e){
				e.preventDefault();
				restriction();
			})

			function restriction(){
				var inputnmCheckdate = $("#inputnmCheckdate").val();
				var inputnmCheckno = $("#inputnmCheckno").val();
				var inputnmVoucherdate = $("#inputnmVoucherdate").val();
				var inputnmVoucherno = $("#inputnmVoucherno").val();
				var inputnmCheckamount = $("#inputnmCheckamount").val();
				var inputnmDescription = $("#inputnmDescription").val();

				if(inputnmCheckdate==("")>0){
					$("#spanMessage").text("Pick a date");
					systemAlert();
					$("#inputnmCheckdate").focus();
				}else if(inputnmCheckno==("")>0){
					$("#spanMessage").text("Input Check No.");
					systemAlert();
					$("#inputnmCheckno").focus();
				}else if(inputnmVoucherdate==("")>0){
					$("#spanMessage").text("Pick a date");
					systemAlert();
					$("#inputnmCheckno").focus();
				}else if(inputnmVoucherno==("")>0){
					$("#spanMessage").text("Input voucher No.");
					systemAlert();
					$("#inputnmCheckno").focus();
				}else if(inputnmCheckamount==("")>0){
					$("#spanMessage").text("Input Check amount");
					systemAlert();
					$("#inputnmCheckno").focus();
				}else if(inputnmDescription==("")>0){
					$("#spanMessage").text("Input Description");
					systemAlert();
					$("#btnOpenmodal").click();
					$("#inputnmCheckno").focus();
				}else{
					saveData_c();
				}
			}

			function saveData_c(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkentry/saveData_c',
					data:$("#formReceiving,#frmCheckEntry").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							updateRS_v();
						}else{
							console.log("Failed to save");
						}
					}
				})
			}

			function updateRS_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkentry/updateRS_c',
					data:$("#inputnmRfpno,#inputnmRequeststatus,#inputnmMarked").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							$("#spanMessage").text("Information has been saved.");
							systemAlert();
							$(".form-control").val("");
						}else{
							console.log("Failed to update.");
						}
					}
				})
			}

			$('#inputnmCheckamount').keyup(function(event) {

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

			$('#inputnmCheckno,#inputnmVoucherno').keypress(function(e){    
	  
				var charCode = (e.which) ? e.which : event.keyCode    
				if (String.fromCharCode(charCode).match(/[^0-9]/g))
				return false;                        

			});
		})
	</script>