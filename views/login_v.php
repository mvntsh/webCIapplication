    <style type="text/css">
        #btnLogin{
            animation: wobble-ver-right 0.8s both;
        }
        
        @keyframes wobble-ver-right {
            0%,
            100% {
                transform: translateY(0) rotate(0);
                transform-origin: 50% 50%;
            }
            15% {
                transform: translateY(-30px) rotate(6deg);
            }
            30% {
                transform: translateY(15px) rotate(-6deg);
            }
            45% {
                transform: translateY(-15px) rotate(3.6deg);
            }
            60% {
                transform: translateY(9px) rotate(-2.4deg);
            }
            75% {
                transform: translateY(-6px) rotate(1.2deg);
            }
        }

        .inputName {
            animation: tracking-in-expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        @keyframes tracking-in-expand {
            0% {
                letter-spacing: -0.5em;
                opacity: 0;
            }
            40% {
                opacity: 0.6;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
    <div class="position-absolute top-50 start-50 translate-middle" style="cursor: default;">
        <div class="card" style="width: 100%; box-shadow:
            0 2.8px 2.2px rgba(0, 0, 0, 0.034),
            0 6.7px 5.3px rgba(0, 0, 0, 0.048),
            0 12.5px 10px rgba(0, 0, 0, 0.06),
            0 22.3px 17.9px rgba(0, 0, 0, 0.072),
            0 41.8px 33.4px rgba(0, 0, 0, 0.086),
            0 100px 80px rgba(0, 0, 0, 0.12); border-color: white; border-radius: 0px; backdrop-filter:blur(10px); background-color: transparent; border-color: transparent;">
            <div class="card-body" style="margin: 3em;">
                <h2 id="spanHeader" style="text-align: center;"><img src="../icons/programmer.png" alt=""> <?php echo $title; ?></h2>
                <form id="frmInputs" style="text-transform: uppercase;">
                    <div class="form-floating mb-3">
                        <input type="text" name="txtnmUsername" class="form-control form-control-lg" id="inputnmUsername" placeholder="Username">
                        <label for="inputnmUsername" class="inputName">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="txtnmPassword" class="form-control form-control-lg" id="inputnmPassword" placeholder="Password">
                        <label for="inputnmPassword" class="inputName">Password</label>
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
                emptyField();
            })

            function emptyField(){
                var inputnmUsername = $("#inputnmUsername").val();
                var inputnmPassword = $("#inputnmPassword").val();

                if(inputnmUsername==("")>0){
                    $("#spanMessage").text("Input your Username.");
					systemAlert();
                    $("#inputnmUsername").focus();
                }else if(inputnmPassword==("")>0){
                    $("#spanMessage").text("Input your Password.");
					systemAlert();
                    $("#inputnmPassword").focus();
                }else{
                    userVerification_v();
                }
            }

            function userVerification_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Login/userVerification_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            location.replace("Requesterhome");
                        }else{
                            userVerificationapprvr_v();
                        }
                    }
                })
            }

            function userVerificationapprvr_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Login/userVerificationapprvr_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            location.replace("Receivedentry");
                        }else{
                            userVerificationexe_v();
                        }
                    }
                })
            }

            function userVerificationexe_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Login/userVerificationexe_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            location.replace("Receivedentry");
                        }else{
                            alert("Verify your account.");
                        }
                    }
                })
            }
        })
    </script>
