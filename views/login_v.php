    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 100%; box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12); border-color: white; border-radius: 0px; backdrop-filter:blur(10px); background-color: transparent; border-color: transparent;">
            <div class="card-body" style="margin: 2em;">
                <h2 id="spanHeader" style="text-align: center;"><img src="../icons/programmer.png" alt=""> <?php echo $title; ?></h2>
                <form id="frmInputs" style="margin-top: 5em; text-transform: uppercase;">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-lg" id="inputnmUsername" placeholder="Username">
                        <label for="inputnmUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-control-lg" id="inputnmPassword" placeholder="Password">
                        <label for="inputnmPassword">Password</label>
                    </div>
                </form>
                <div class="d-grid">
                    <button class="btn btn-success" id="btnLogin">Proceed.</button>
                </div>
                <a href="Signup" style="font-size: 8pt;">Create an account.</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click","#btnLogin",function(e){
                e.preventDefault();
                alert("You clicked me.");
            })
        })
    </script>