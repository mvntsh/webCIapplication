    <div class="row" style="margin-top: 4em;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="border-radius: 0px; background-color: transparent; border-color: transparent; backdrop-filter:blur(5px);">
                <div class="card-body">
                    <h1 id="spanHeader">Sign up</h1>
                    <form id="frmInputs" style="margin-top: 5em; margin-bottom: 2em; text-transform: uppercase;">
                        <div class="form-floating mb-3">
                            <input type="text" name="txtnmFullname" class="form-control form-control-lg" id="inputnmFullname" placeholder="Fullname">
                            <label for="inputnmFullname">Full name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="txtnmUsername" class="form-control form-control-lg" id="inputnmUsername" placeholder="Username">
                            <label for="inputnmUsername">User name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="txtnmPassword" class="form-control form-control-lg" id="inputnmPassword" placeholder="Password">
                            <label for="inputnmPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-lg" id="inputnmConfirmpass" placeholder="Confirm Pass">
                            <label for="inputnmConfirmpass">Confirm Pass</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="txtnmDivision"  id="inputnmDivision">
                                <option value="CAD">Accounting</option>
                                <option value="FD" selected>Finance</option>
                                <option value="MMD">Materials</option>
                            </select>
                            <label for="floatingSelect">Division</label>
                        </div>
                    </form>
                    <div class="d-grid">
                        <button class="btn btn-success btn-lg" id="btnSave">Submit</button>
                    </div>
                    <a href="Login" style="font-size: 8pt;">Proceeds to the Login page.</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnSave").click(function(){
                verifyPass();
            })

            function emptyField(){
                var inputnmFullname = $("#inputnmFullname").val();
                var inputnmUsername = $("#inputnmUsername").val();
                var inputnmPassword = $("#inputnmPassword").val();
                var inputnmConfirmpass = $("#inputnmConfirmpass").val();
                
                if(inputnmFullname==("")>0){
                    $("#inputnmFullname").focus();
                }else if(inputnmUsername==("")>0){
                    $("#inputnmUsername").focus();
                }else if(inputnmPassword==("")>0){
                    $("#inputnmPassword").focus();
                }else if(inputnmConfirmpass==("")>0){
                    $("#inputnmConfirmpass").focus();
                }else{
                    verifyPass();
                }
            }

            function verifyPass(){
                var inputnmPassword = $("#inputnmPassword").val();
                var inputnmConfirmpass = $("#inputnmConfirmpass").val();

                if(inputnmPassword===inputnmConfirmpass){
                    saveFile_v()
                }else{
                    alert("Password does not matched.");
                }
            }

            function saveFile_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Signup/saveFile_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            alert("Saved.");
                            $(".form-control").val("");
                        }else{

                        }
                    }
                })
            }
        })
    </script>