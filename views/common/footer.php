	
	<div class="toast-container position-fixed bottom-0 end-0 p-3" style="cursor: default; font-family: 'Sigmar', serif; text-transform: uppercase;">
	  <div id="messageAlert" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-image: url('../bgimage/blue-and-white-abstract-geometric-background-with-copy-space-vector.jpg');">
	    <div class="toast-header">
	      <strong class="me-auto">System Alert</strong>
	      <small>CIS</small>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	    	<span id="spanMessage" style="font-family: 'Montserrat',sans-serif; font-weight: bolder;"></span>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		function systemAlert(){
			const toastMessage = document.getElementById('messageAlert')
			const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastMessage)
		 	toastBootstrap.show();
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>