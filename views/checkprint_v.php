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
				font-optical-sizing: auto;
			}
		}
	</style>
	<div class="card" id="screenArea" style="border-radius: 0px; cursor: default;">
		<div class="card-body">
			<form id="frmData" hidden>
				<input type="text" id="inputnmVoucherid" name="txtnmVoucherid">
				<input type="text" name="txtnmRfpno" id="inputnmRfpno">
				<input type="text" id="inputnmPayee">
				<input type="date" id="inputnmCheckdate" name="txtnmCheckdate">
				<input type="text" id="inputnmCheckno">
				<input type="date" id="inputnmVoucherdate" name="txtnmVoucherdate">
				<input type="text" id="inputnmVoucherno">
				<input type="text" id="inputnmAmount">
				<input type="text" id="inputnmDescription">
				<div id="placeDate"></div>
				<input type="text" name="txtnmRequeststatus" value="On-hand" id="inputnmRequeststatus">
				<input type="text" name="txtnmMarked" value="4" id="inputnmMarked">
			</form>
			<div class="row">
				<div class="col-md-8">
					<h1 id="spanHeader"><?php echo $title; ?></h1>
				</div>
				<div class="col-md-4">
					<form id="frmSearch">
						<div class="input-group">
							<input type="text" name="txtnmSearched" class="form-control" id="inputnmSearched" style="height: 50pt;" placeholder="Search"><button class="btn btn-success" id="btnSearch">Go</button>
						</div>
					</form>
				</div>
			</div>
			<table class="table table-responsive table-hover table-primary" style="margin-top: 1em; margin-top: 1.3em; cursor: default; font-family: 'Montserrat',sans-serif;font-optical-sizing: auto;" id="tblVouchers">
				<thead>
					<tr>
						<td colspan="9" style="background-color: #0292c7; color: white; text-transform: uppercase; text-align: center; font-size: 25pt; border-color: #0292c7;">cheque details</td>
					</tr>
					<tr style="text-align: center;">
						<td style="background-color: #0292c7; color: white; width:8%;">RFPNO.</td>
						<td style="background-color: #0292c7; color: white;">PAYEE</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">CHECKDATE</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">CHECKNO.</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">VOUCHERDATE</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">VOUCHERNO</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">AMOUNT</td>
						<td style="background-color: #0292c7; color: white;">DESCRIPTION</td>
						<td style="background-color: #0292c7; color: white; width: 10%;">ACTION</td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	<div id="printArea">
		<table style="width: 100%;">
			<tbody>
				<tr>
					<td style="width: 10%;"></td>
					<td style="width: 80%; text-align: right; font-size: 11pt;" id="tdnmCheckdate">Check Date</td>
					<td style="width: 10%;"></td>
				</tr>
			</tbody>
		</table>
		<table style="width: 100%;">
			<tbody>
				<tr>
					<td style="width: 50%; font-size: 11pt;" id="tdnmPayee">Payee</td>
					<td style="width: 40%; text-align: right; font-weight: bolder;" id="tdnmCheckamount">Check amount</td>
					<td style="width: 10%;"></td>
				</tr>
				<tr>
					<td colspan="4" id="tdnmAmount" style="font-size: 11pt;"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			viewProcessed_v();
			function viewProcessed_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkprint/viewProcessed_c',
					dataType:'json',
					success:function(response){
						if(response.success){
							var tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td style="text-align: center;">${sqldata['checkdate']}</td>
										<td style="text-align: center;">${sqldata['checkno']}</td>
										<td style="text-align: center;">${sqldata['voucherdate']}</td>
										<td style="text-align: center;">${sqldata['voucherno']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td><button data-voucherid="${sqldata['voucher_id']}" data-rfpno="${sqldata['rfpno']}" data-payee="${sqldata['payee']}" data-checkdate="${sqldata['checkdate']}" data-checkno="${sqldata['checkno']}" data-voucherdate="${sqldata['voucherdate']}" data-voucherno="${sqldata['voucherno']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" class="btn btn-primary" style="font-size: 9pt;" id="btnPreview" ${sqldata['disabledButton']}>Print Preview</button></td>
									</tr>
								`;
							})
							$("#tblVouchers tbody").html(tbody);
						}
					}
				})
			}

			$("#btnSearch").click(function(e){
				e.preventDefault();

				var inputnmSearched = $("#inputnmSearched").val();

				if(inputnmSearched==("")>0){
					viewProcessed_v();
				}else{
					viewSearched_v();
				}
			})

			function viewSearched_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkprint/viewSearched_c',
					data:$("#inputnmSearched").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							tbody = '';

							response.data.forEach(function(sqldata){
								tbody += `
									<tr style="font-size: 12pt;">
										<td style="text-align: center;">${sqldata["rfpno"]}</td>
										<td>${sqldata["payee"]}</td>
										<td style="text-align: center;">${sqldata['checkdate']}</td>
										<td style="text-align: center;">${sqldata['checkno']}</td>
										<td style="text-align: center;">${sqldata['voucherdate']}</td>
										<td style="text-align: center;">${sqldata['voucherno']}</td>
										<td style="text-align: right;">${sqldata['amount']}</td>
										<td>${sqldata['description']}</td>
										<td><button data-voucherid="${sqldata['voucher_id']}" data-rfpno="${sqldata['rfpno']}" data-payee="${sqldata['payee']}" data-checkdate="${sqldata['checkdate']}" data-checkno="${sqldata['checkno']}" data-voucherdate="${sqldata['voucherdate']}" data-voucherno="${sqldata['voucherno']}" data-amount="${sqldata['amount']}" data-description="${sqldata['description']}" class="btn btn-primary" style="font-size: 9pt;" id="btnPreview" ${sqldata['disabledButton']}>Print Preview</button></td>
									</tr>
								`;
							})
							$("#tblVouchers tbody").html(tbody);
						}else{
							tbody = '';

							tbody +=`
								<tr>
									<td colspan="9" style="text-align: center; font-weight: bolder;"><i class="fa-solid fa-skull fa-spin" style="color: #0942a5; font-size: 20pt;"></i> Ops! No Records found. <i class="fa-solid fa-skull fa-spin fa-spin-reverse" style="color: #0942a5; font-size: 20pt;"></i></td>
								</tr>
							`;
							$("#tblVouchers tbody").html(tbody);
						}
					}
				})
			}

			$(document).on("click","#btnPreview",function(e){
				e.preventDefault();

				$("#inputnmVoucherid").val($(this).attr("data-voucherid"));
				$("#inputnmRfpno").val($(this).attr("data-rfpno"));
				$("#inputnmPayee").val($(this).attr("data-payee"));
				$("#inputnmCheckdate").val($(this).attr("data-checkdate"));
				$("#inputnmCheckno").val($(this).attr("data-checkno"));
				$("#inputnmVoucherdate").val($(this).attr("data-voucherdate"));
				$("#inputnmVoucherno").val($(this).attr("data-voucherno"));
				$("#inputnmAmount").val($(this).attr("data-amount"));
				$("#inputnmDescription").val($(this).attr("data-description"));
				spellVoucherdate_v();
			})

			function spellVoucherdate_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkprint/spellVoucherdate_c',
					data:$("#frmData").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							div = '';

							response.data.forEach(function(sqldata){
								div += `
									<input type="text" id="spellVoucherdate" value="${sqldata['spellDate']}">
									<input type="text" id="arrangeCheckdate" value="${sqldata['arrangeDate']}">
								`;
							})
							$("#placeDate").html(div);
							var arrangeCheckdate = $("#arrangeCheckdate").val();
							var inputnmPayee = $("#inputnmPayee").val();
							var inputnmAmount = $("#inputnmAmount").val();
							$("#tdnmCheckdate").text(arrangeCheckdate);
							$("#tdnmPayee").text(inputnmPayee);
							$("#tdnmCheckamount").text(inputnmAmount);
							updateRS_c();
							wholeNumber_v();
						}
					}
				})
			}

			function updateRS_c(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkprint/updateRS_c',
					data:$("#frmData").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							console.log("4");
						}else{
							console.log("5");
						}
					}
				})
			}

			function wholeNumber_v(){
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Checkprint/wholeNumber_c',
					data:$("#frmData").serialize(),
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
				$("#tdnmAmount").text(Inwords+ " ONLY");
				print();
			}

			function amountinwordswithcents(){
				var number = $("#inputnmAmount").val();
				var Inwords = toWordsconver(number);
				$("#tdnmAmount").text(Inwords+ "/100 ONLY");
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