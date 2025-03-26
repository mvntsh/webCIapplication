	<style type="text/css">
		
	</style>
	<div class="parent">
		
		<div class="div2">
			
		</div>
	</div>
	<div class="row" style="font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
		<div class="col-md-9">
			<div class="card" style="border-radius: 0px; margin-top: .5em; margin-left: .5em;">
				<div class="card-body">
					<div class="row" style="margin-top: 3em;">
						<div class="col-md-6">
							<h1 id="spanHeader">Inquiry</h1>
						</div>
						<div class="col-md-6">
							<form id="frmSearch">
								<div class="input-group">
									<input type="text" name="txtnmSearch" class="form-control form-control-lg" id="inputnmSearch" placeholder="Search" autocomplete="off">
									<button class="btn btn-success" id="btnSearch" style="height: 50pt;">Go</button>
								</div>
							</form>
						</div>
					</div>
					<table style="width: 100%; margin-top: 2em; cursor: default;" class="table table-responsive table-hover" id="tblRequest">
						<thead>
							<tr>
								<th colspan="5" style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; font-size: 25pt; border-color: #0292c7;">Data Drawer</th>
							</tr>
							<tr>
								<td style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; width: 10%;">rfpno.</td>
								<td style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; width: 20%;">payee</td>
								<td style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; width: 30%;">description</td>
								<td style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; width: 10%;">amount</td>
								<td style="text-align: center; background-color: #0292c7; color: white; text-transform: uppercase; width: 10%;">status</td>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div id="divSummary"></div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			viewRequest_v();
			viewSummary_v();
			function viewRequest_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Requesterhome/viewRequest_c',
					data:$("#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody +=`
									<tr>
										<td>${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td>${sqldata["description"]}</td>
										<td>${sqldata["amount"]}</td>
										<td>${sqldata["requeststatus"]}</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}
					}
				})
			}

			$("#btnSearch").click(function(e){
				e.preventDefault();

				var inputnmSearch = $("#inputnmSearch").val();
				if(inputnmSearch==("")>0){
					viewRequest_v();
				}else{
					searchData_v();
				}
			})

			function searchData_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Requesterhome/searchData_c',
					data:$("#inputnmUserdivision,#inputnmSearch").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';
							response.data.forEach(function(sqldata){
								tbody +=`
									<tr>
										<td>${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td>${sqldata["description"]}</td>
										<td>${sqldata["amount"]}</td>
										<td>${sqldata["requeststatus"]}</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}
					}
				})
			}

			function viewSummary_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Requesterhome/viewSummary_c',
					data:$("#inputnmUserdivision").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							var div = '';

							response.data.forEach(function(sqldata){
								div += `
									<div class="card" style="margin: .5em;">
										<div class="card-body text-center">
											<span style="text-transform: uppercase; color: #aac8fa;">${sqldata['requeststatus']} request</span>
											<div class="card rounded-circle" style="border-color: #003180;">
												<div class="card-body">
													<label style="font-size: 50pt; font-weight: bolder; color: #003180;">${sqldata['trxnCount']}</label><span style="font-size: 9pt;">Counts</span>
												</div>
											</div>
										</div>
									</div>
								`;
							})

							$("#divSummary").html(div);
						}else{
							console.log("failed to view summary");
						}
					}
				})
			}
		})
	</script>