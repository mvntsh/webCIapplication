	<form id="frmInputs">
		<input type="text" name="txtnmTitle" id="inputnmTitle">
		<input type="text" name="txtnmSlug" id="inputnmSlug" value="-" hidden>
		<input type="text" name="txtnmText" id="inputnmText">
	</form>
	<button id="btnSave">Submit</button>
	<button type="button" class="btn btn-secondary"
        data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="This top tooltip is themed via CSS variables.">
	  Custom tooltip
	</button>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnSave").click(function(e){
				e.preventDefault();
				$.ajax({
					type:'ajax',
					method:'POST',
					url:'Create/insertData_c',
					data:$("#frmInputs").serialize(),
					dataType:'json',
					success:function(response){
						if(response.success){
							alert("Success");
						}
					}
				})
			})
		})
	</script>