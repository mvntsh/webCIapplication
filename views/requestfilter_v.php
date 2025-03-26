	<style type="text/css">
		@media screen{
			#printArea{
				display: none;
			}
		}

		@media print{
			
			#screenArea{
				display: none;
			}

			#printArea{
				font-family: 'Montserrat',sans-serif;
			}

			.navbar{
				display: none;
			}
		}
	</style>
	<div class="row" style="margin: 1em;" id="screenArea">
		<div class="col-md-12" style="margin-top: 5em;">
			<div class="row">
				<div class="col-md-8">
					<h2 style="font-size: 40pt;" id="spanHeader"><?php echo $title ?></h2>
				</div>
				<div class="col-md-4">
					<input type="text" name="txtnmSearched" class="form-control" style="margin-bottom:1em; border-radius:0px; height: 50pt; box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12);
            transform: scale(1.1);" placeholder="Search" id="inputnmSearched">
				</div>
			</div>
			<table class="table table-responsive table-hover" id="tblRequest" style="margin-top: 1.3em; cursor: default; font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;">
				<thead class="align-middle">
					<tr style="height: 3.5em; text-align:center; text-transform: uppercase;">
						<th style="width: 10%; background-color: #0292c7; color: white;">RFP NO.</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Transaction</th>
						<th style="width: 15%; background-color: #0292c7; color: white;">Date</th>
						<th style="width: 20%; background-color: #0292c7; color: white;">Payee</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Amount</th>
						<th style="width: 15%; background-color: #0292c7; color: white;">Description</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Status</th>
						<th style="width: 10%; background-color: #0292c7; color: white;">Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			<input type="text" name="txtnmRequestid" id="inputnmRequestid" hidden>
			<input type="text" name="txtnmAmount" id="inputnmAmount" hidden>
		</div>
	</div>
	<div id="printArea" style="font-size: 12pt;"></div>
	<script type="text/javascript">
		$(document).ready(function(){
			viewRequest_v();
			function viewRequest_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Requestfilter/viewRequest_c',
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;"><i class="fa-solid fa-circle fa-beat" style="font-size: 3pt; color: pink;"></i> ${sqldata['rfpno']}
				        				</td>
										<td>${sqldata['trxntype']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['requeststatus']}</td>
										<td style="text-align: center;">
											<button data-requestid="${sqldata['request_id']}" data-payee="${sqldata['payee']}" data-requested="${sqldata['requested']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" class="btn btn-primary" id="btnSelect" style="font-size: 9pt;" ${sqldata['disabledButton']}>Print Request</button>
										</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}
					}
				})
			}

			$(document).on("keyup","#inputnmSearched",function(e){
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
					url:'Requestfilter/searchData_c',
					data:$("#inputnmSearched").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">${sqldata['rfpno']}
				        				</td>
										<td>${sqldata['trxntype']}</td>
										<td style="text-align: center;">${sqldata['daterequested']}</td>
										<td>${sqldata['payee']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td>${sqldata['requeststatus']}</td>
										<td style="text-align: center;">
											<button data-requestid="${sqldata['request_id']}" data-payee="${sqldata['payee']}" data-daterequested="${sqldata['daterequested']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" class="btn btn-primary" id="btnSelect" style="font-size: 9pt;" ${sqldata['disabledButton']}>Print Request</button>
										</td>
									</tr>
								`;
							})
							$("#tblRequest tbody").html(tbody);
						}else{
							tbody = '';

							tbody += `
								<tr>
									<td colspan="8" style="text-align: center; font-weight: bolder;">
										<i class="fa-solid fa-skull fa-spin" style="color: #0942a5; font-size: 20pt;"></i> Ops! No Records found. <i class="fa-solid fa-skull fa-spin fa-spin-reverse" style="color: #0942a5; font-size: 20pt;"></i>
									</td>
								</tr>
							`;
							$("#tblRequest tbody").html(tbody);
						}
					}
				})
			}

			$(document).on("click","#btnSelect",function(e){
				e.preventDefault();
				$("#inputnmRequestid").val($(this).attr("data-requestid"));
				$("#inputnmAmount").val($(this).attr("data-amount"));
				getData_v();
			})

			function getData_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Requestfilter/getData_c',
					data:$("#inputnmRequestid").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							div = '';

							response.data.forEach(function(sqldata){
								div += `
									<table style="width: 100%;">
										<tbody>
											<tr>
												<td style="width: 80%; font-size: 7pt;">RFP#${sqldata['rfpno']}</td>
												<td style="text-align: center; width: 20%">${sqldata['daterequested']}${sqldata['division']}-${sqldata['request_id']}</td>
											</tr>
											<tr>
												<td colspan="2" style="height: 2em;"></td>
											</tr>
										</tbody>
									</table>
									<table style="width: 100%;">
										<tbody>
											<tr>
												<td style="width: 5%;"></td>
												<td style="width: 60%;">Finance Division</td>
												<td style="width: 20%;">${sqldata['daterequested']}</td>
												<td style="width: 5%;"></td>
											</tr>
											<tr>
												<td style="width: 5%;"></td>
												<td style="width: 60%;">${sqldata['division']}</td>
												<td style="width: 20%;">${sqldata['daterequested']}</td>
												<td style="width: 5%;"></td>
											</tr>
											<tr>
												<td style="height: 3em;"></td>
											</tr>
										</tbody>
									</table>
									<table style="width: 100%;">
										<tr>
											<td style="width: 60%;"></td>
											<td style="width: 40%; font-size: 10pt;" id="cellnmAmountnWords"></td>
										</tr>
										<tr>
											<td style="width: 60%; text-align: center; font-weight: bolder;">${sqldata['amount']}</td>
											<td style="width: 40%;"></td>
										</tr>
									</table>
									<table style="width: 100%;">
										<tr>
											<td style="width: 10%;"></td>
											<td>${sqldata['description']}</td>
										</tr>
										<tr>
											<td colspan="2" style="height: 1em;"></td>
										</tr>
										<tr>
											<td colspan="2" style="height: 1em;"></td>
										</tr>
										<tr>
											<td style="width: 10%;"></td>
											<td>${sqldata['payee']}</td>
										</tr>
										<tr>
											<td colspan="2" style="height: 7em;"></td>
										</tr>
									</table>
									<table style="width: 100%; text-transform: uppercase;">
										<tr>
											<td style="width: 5%;"></td>
											<td style="width: 20%">${sqldata['sender']}</td>
											<td style="width: 5%;"></td>
											<td style="width: 25%">Sheila Lynn Cordero</td>
											<td style="width: 45%;"></td>
										</tr>
									</table>
								`;
							})
							$("#printArea").html(div);
							exactAmount_v();
						}
					}
				})
			}

			function exactAmount_v(){
		    	$.ajax({
		    		type:'ajax',
		    		method:'POST',
		    		url:'Requestfilter/exactAmount_c',
		    		data:$("#inputnmRequestid").serialize(),
		    		dataType:'json',
		    		success:function(response){
		    			if(response.success){
		    				exactmountinwords();
		    			}else{
		    				amountinwordswithcents();
		    			}
		    		}
		    	})
		    }

		    function exactmountinwords(){
				var number = parseFloat($("#inputnmAmount").val().replace(/[\, ]/g, ''));
				var Inwords = toWordsconver(number);
				$("#cellnmAmountnWords").text(Inwords+ " PESO ONLY");
				print();
			}

			function amountinwordswithcents(){
				var number = $("#inputnmAmount").val();
				var Inwords = toWordsconver(number);
				$("#cellnmAmountnWords").text(Inwords+ "/100 PESO ONLY");
				print();
			}

			// System for American Numbering 
			var th_val = ['', 'THOUSAND', 'MILLION', 'BILLION', 'TRILLION'];
			// System for uncomment this line for Number of English 
			// var th_val = ['','thousand','million', 'milliard','billion'];
			// var cents = ['','1','2','3','4','5','6','7','8','9'];
			 
			var dg_val = ['ZERO', 'ONE', 'TWO', 'THREE', 'FOUR', 'FIVE', 'SIX', 'SEVEN', 'EIGHT', 'NINE'];
			var tn_val = ['TEN', 'ELEVEN', 'TWELVE', 'THIRTEEN', 'FOURTEEN', 'FIFTEEN', 'SIXTEEN', 'SEVENTEEN', 'EIGHTEEN', 'NINETEEN'];
			var tw_val = ['TWENTY', 'THIRTY', 'FORTY', 'FIFTY', 'SIXTY', 'SEVENTY', 'EIGHTY', 'NINETY'];
			var cents = ['0','1','2','3','4','5','6','7','8','9'];
			function toWordsconver(s) {
			  s = s.toString();
			    s = s.replace(/[\, ]/g, '');
			    if (s != parseFloat(s))
			        return 'not a number ';
			    var x_val = s.indexOf('.');
			    if (x_val == -1)
			        x_val = s.length;
			    if (x_val > 15)
			        return 'too big';
			    var n_val = s.split('');
			    var str_val = '';
			    var sk_val = 0;
			    for (var i = 0; i < x_val; i++) {
			        if ((x_val - i) % 3 == 2) {
			            if (n_val[i] == '1') {
			                str_val += tn_val[Number(n_val[i + 1])] + ' ';
			                i++;
			                sk_val = 1;
			            } else if (n_val[i] != 0) {
			                str_val += tw_val[n_val[i] - 2] + ' ';
			                sk_val = 1;
			            }
			        } else if (n_val[i] != 0) {
			            str_val += dg_val[n_val[i]] + ' ';
			            if ((x_val - i) % 3 == 0)
			                str_val += 'HUNDRED ';
			            sk_val = 1;
			        }
			        if ((x_val - i) % 3 == 1) {
			            if (sk_val)
			                str_val += th_val[(x_val - i - 1) / 3] + ' ';
			            sk_val = 0;
			        }
			    }
			    if (x_val != s.length) {
			        var y_val = s.length;
			        str_val += '& ';
			        for (var i = x_val + 1; i < y_val; i++)
			        str_val += cents[n_val[i]] + '';  
			    }

			    return str_val.replace(/\s+/g, ' ');
			}
		})
	</script>