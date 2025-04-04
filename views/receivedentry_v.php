	<style type="text/css">
		#inputnmAlphacheck{
			display: none;
		}
	</style>
	<div class="card" style="margin: 1em;">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<h1 id="spanHeader"><?php echo $title; ?></h1>
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
			<div class="row" style="margin-top: 4em;">
				<div class="col-md-4">
					<div class="input-group">
						<div class="form-floating">
							<input type="date" name="txtnmSearchdate" class="form-control" id="inputnmSearchdate" placeholder="Requested Date">
							<label for="inputnmSearchdate">Requested date</label>
						</div>
						<button class="btn btn-success" id="btnFilter">Go</button>
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<input type="text" name="txtnmSearched" class="form-control" id="inputnmSearched" style="height: 50pt;" placeholder="Search" autocomplete="off">
					<form id="frmInputs" hidden>
						<input type="text" name="txtnmRequestid" id="inputnmRequestid">
						<input type="text" name="txtnmMarked" id="inputnmMarked">
						<input type="text" name="txtnmRequeststatus" id="inputnmRequeststatus">
					</form>
				</div>
			</div>
			<table class="table table-responsive table-hover table-primary" id="tblReceived" style="margin-top: 1em; margin-top: 1.3em; cursor: default; font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
				<thead class="align-middle">
					<tr style="height: 3.5em; text-align: center; text-transform: uppercase;">
						<th style="width: 8%;background-color: #0292c7; color: white;"><span id="spanAction">Action</span> <input type="checkbox" class="form-check-input mt-2"  style="border-color: #0292c7; color: #0292c7; cursor:pointer;" id="inputnmAlphacheck"></th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Rfpno.</th>
						<th style="width: 27%;background-color: #0292c7; color: white;">Payee</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Date Requested</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Amount</th>
						<th style="width: 25%; background-color: #0292c7; color: white;">Description</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Requester</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="card-footer" style="border-color: transparent;">
			<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-3 d-grid">
					<button class="btn btn-success btn-lg" id="btnSave">Mark as Received & File</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			viewRequest_v();
			function viewRequest_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/viewRequest_c',
					data:$("#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">
											<input data-requestid="${sqldata['request_id']}" type="checkbox" class="form-check-input mt-2" id="inputnmAction" style="border-color: #0292c7; color: #0292c7; cursor:pointer;" ${sqldata['modifyCheck']}>
										</td>
										<td style="text-align: center;">${sqldata['rfpno']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['sender']}-${sqldata['division']} ${sqldata['region']}</td>
									</tr>
								`;
							})
							$("#tblReceived tbody").html(tbody);
						}else{
							viewRequestexe_v();
						}
					}
				})
			}

			function viewRequestexe_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/viewRequestexe_c',
					data:$("#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">
											<input data-requestid="${sqldata['request_id']}" type="checkbox" class="form-check-input mt-2" id="inputnmAction" style="border-color: #0292c7; color: #0292c7; cursor:pointer;" ${sqldata['modifyCheck']}>
										</td>
										<td style="text-align: center;">${sqldata['rfpno']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['sender']}-${sqldata['division']} ${sqldata['region']}</td>
									</tr>
								`;
							})
							$("#tblReceived tbody").html(tbody);
						}
					}
				})
			}

			$("#btnFilter").click(function(e){
				e.preventDefault();
				var inputnmSearchdate = $("#inputnmSearchdate").val();

				if(inputnmSearchdate==("")>0){
					$("#spanMessage").text("Pick a date.");
					systemAlert();
				}else{
					viewRequestdate_v();

				}
			})


			function viewRequestdate_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/viewRequestdate_c',
					data:$("#inputnmSearchdate,#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">
											<input data-requestid="${sqldata['request_id']}" type="checkbox" class="form-check-input mt-2" id="inputnmAction" style="border-color: #0292c7; color: #0292c7; cursor:pointer;" ${sqldata['modifyCheck']}>
										</td>
										<td style="text-align: center;">${sqldata['rfpno']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['sender']}-${sqldata['division']} ${sqldata['region']}</td>
									</tr>
								`;
							})
							$("#tblReceived tbody").html(tbody);
							$("#spanAction").css("display","none");
							$("#inputnmAlphacheck").css("display","inline");
						}else{
							tbody = '';

							tbody +=`
								<tr>
									<td colspan="8" style="text-align: center; font-weight: bolder;">
										<i class="fa-solid fa-skull fa-spin" style="color: #0942a5; font-size: 20pt;"></i> Ops! No Records found. <i class="fa-solid fa-skull fa-spin fa-spin-reverse" style="color: #0942a5; font-size: 20pt;"></i>
									</td>
								</tr>
							`;
							$("#tblReceived tbody").html(tbody);
						}
					}
				})
			}

			$("#inputnmSearched").keyup(function(e){
				e.preventDefault();
				var inputnmSearched = $("#inputnmSearched").val();

				if(inputnmSearched==("")>0){
					viewRequest_v();
				}else{
					searchData_v();
				}
			})

			function searchData_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/searchData_c',
					data:$("#inputnmSearched,#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">
											<input data-requestid="${sqldata['request_id']}" type="checkbox" class="form-check-input mt-2" id="inputnmAction" style="border-color: #0292c7; color: #0292c7; cursor:pointer;" ${sqldata['modifyCheck']}>
										</td>
										<td style="text-align: center;">${sqldata['rfpno']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['sender']}-${sqldata['division']} ${sqldata['region']}</td>
									</tr>
								`;
							})
							$("#tblReceived tbody").html(tbody);
							$("#inputnmAlphacheck").css("display","none");
							$("#spanAction").css("display","inline");
						}else{
							tbody = '';

							tbody +=`
								<tr>
									<td colspan="8" style="text-align: center; font-weight: bolder;">
										<i class="fa-solid fa-skull fa-spin" style="color: #0942a5; font-size: 20pt;"></i> Ops! No Records found. <i class="fa-solid fa-skull fa-spin fa-spin-reverse" style="color: #0942a5; font-size: 20pt;"></i>
									</td>
								</tr>
							`;
							$("#tblReceived tbody").html(tbody);
						}
					}
				})
			}

			$("#inputnmAlphacheck").click(function () {
			    $('input:checkbox').not(this).prop('checked', this.checked);

			    $("#inputnmMarked").val("2");
			    updateMarkedbydate_v();
			});

			function updateMarkedbydate_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/updateMarkedbydate_c',
					data:$("#inputnmSearchdate,#inputnmMarked").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							console.log("Updated.");
						}else{
							console.log("Failed to update.");
						}
					}
				})
			}

			$(document).on("change","#inputnmAction",function(e){
				e.preventDefault();
				var inputnmAction = $("#inputnmAction").val();
				checked = $("#inputnmAction").prop("checked");

				if(this.checked){
					$("#inputnmRequestid").val($(this).attr("data-requestid"));
					$("#inputnmMarked").val("2");
					updateMarked_v();
			    }else{
			        $("#inputnmRequestid").val($(this).attr("data-requestid"));
			        $("#inputnmMarked").val("1");
			        updateMarked_v();
			    }
			})

			function updateMarked_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/updateMarked_c',
					data:$("#inputnmRequestid,#inputnmMarked").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							console.log("Updated.");
						}else{
							console.log("Failed to update.");
						}
					}
				})
			}

			$(document).on("click","#btnSave",function(e){
				e.preventDefault();
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/verifyMark_c',
					dataType:'json',
					success:function(response){
						if(response.success){
							var inputnmUser = $("#inputnmUser").val();
							$("#inputnmRequeststatus").val("Received/Approved by "+inputnmUser);
							updateStatus_c();
						}else{

						}
					}
				})
			})
			

			function updateStatus_c(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Receivedentry/updateStatus_c',
					data:$("#inputnmRequeststatus").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							$("#spanMessage").text("Approve/Received & File.");
							systemAlert();
							viewRequest_v();
						}else{

						}
					}
				})
			}
		})
	</script>
