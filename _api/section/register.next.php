    <div class="container pt-4 mt-2 tab-animate-right">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-5">Register At MTransfer<br>ලියාපදිංචි වන්න</h2>
        <div class="media-container-row">
            <div class="media-block m-auto" style="width: 35%;">
                <div class="mbr-figure">
                    <img src="/img/mbr-602x402.jpg" alt="" title="" id="img-register" >
                </div>
            </div>
            <div class="cards-block content-register">
                <div class="cards-container">
                    <div class="col-12">
                        <p style=" font-size: 16px;font-weight: bold; color:red; padding:10px; color: #f44336; margin-bottom:-20px;" id="errorMessage"></p>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="nic" class="form-control-label mbr-fonts-style display-7">NIC Number /හැඳුනුම්පත් අංකය :<b style="font-size:14px;padding:10px;color:#28a745;" id="nicMessage"></b></label>
                            <input type="text" name="nic" id="nic" data-form-field="nic" class="form-control display-7" placeholder="කරුණාකර ඔබේ හැඳුනුම්පත් අංකය ටයිප් කරන්න">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="address" class="form-control-label mbr-fonts-style display-7">Home Address /&nbsp;නිවසේ ලිපිනය :</label>
                            <input type="text" name="address" id="address" data-form-field="address" class="form-control display-7" placeholder="කරුණාකර ඔබේ නිවසේ ලිපිනය ටයිප් කරන්න">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="catagory" class="form-control-label mbr-fonts-style display-7">Job Category / රැකියාව :</label>
                            <select name="catagory" id="catagory" onchange="selectJobCatagory(this.value)" data-form-field="catagory" class="form-control display-7" placeholder="කරුණාකර ඔබේ රැකියාව තෝරන්න">
                                <option value="-1"> - ඔබේ රැකියාව තෝරන්න - </option>
                                <option value="Nurse">Nurse</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>



                    <div class="col-12">
                        <br>
                        <div class="card-texts col-md-12" id="catagoryNursePage" style="display:none;">
                            <label for="catagoryNurse" class="form-control-label mbr-fonts-style display-7">Designation /&nbsp;තනතුර :</label>
                            <select name="catagoryNurse" id="catagoryNurse" onchange="selectJobDesignation(this.value)" data-form-field="catagoryNurse" class="form-control display-7" placeholder="කරුණාකර ඔබේ තනතුර තෝරන්න">
                                <option value="-1"> - කරුණාකර ඔබේ තනතුර තෝරන්න - </option>
                                <option value="Nursing Officer">Nursing Officer</option>
                                <option value="Nursing Sister">Nursing Sister</option>
                                <option value="Special Grade Nursing Officer">Special Grade Nursing Officer</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="card-texts col-md-12" id="catagoryTeacherPage" style="display:none;">
                            <label for="catagoryTeacher" class="form-control-label mbr-fonts-style display-7">Designation /&nbsp;තනතුර :</label>
                            <select name="catagoryTeacher" id="catagoryTeacher" onchange="selectJobDesignation(this.value)" data-form-field="catagoryTeacher" class="form-control display-7" placeholder="කරුණාකර ඔබේ තනතුර තෝරන්න">
                                <option value="-1"> - කරුණාකර ඔබේ තනතුර තෝරන්න - </option>
                                <option value="Teacher">Teacher</option>
                                <option value="Principal">Principal</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Coach">Coach</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Adviser">Adviser</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="card-texts col-md-12" id="catagoryOtherPage" style="display:none;">
                            <label for="catagoryOther" class="form-control-label mbr-fonts-style display-7">Job Category / රැකියාව :</label>
                            <input type="text" name="catagoryOther" id="catagoryOther" data-form-field="catagoryOther" class="form-control display-7" placeholder="කරුණාකර ඔබේ රැකියාව ටයිප් කරන්න">
                            <br>
                            <label for="designationOther" class="form-control-label mbr-fonts-style display-7">Designation /&nbsp;තනතුර :</label>
                            <input type="text" name="designationOther" id="designationOther" data-form-field="designationOther" class="form-control display-7" placeholder="කරුණාකර ඔබේ තනතුර ටයිප් කරන්න">
                        </div>
                    </div>

                    <div class="col-12">
                        <br>
                        <div class="card-texts col-md-12" id="designationOtherPage" style="display:none;">
                            <label for="designation" class="form-control-label mbr-fonts-style display-7">Designation /&nbsp;තනතුර :</label>
                            <input type="text" name="designation" id="designation" data-form-field="designation" class="form-control display-7" placeholder="කරුණාකර ඔබේ තනතුර ටයිප් කරන්න">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="container pt-4 mt-2 tab-animate-opacity">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-primary-outline display-4" id="submitNextRegister">NEXT &gt;&gt;</a>
            </div>
        </div>
    </div>




<script type="text/javascript">
    $(document).ready(function() {
        $("#submitNextRegister").click(function(){
            validateFormNext();
        });
    });

    function validateFormNext() { 
        var errorMessage = document.getElementById("errorMessage");
        var nicNumber = document.getElementById("nic").value;
        var address = document.getElementById("address").value;
        var catagory = document.getElementById("catagory").value;

        var catagoryNurse = document.getElementById("catagoryNurse").value;
        var catagoryTeacher = document.getElementById("catagoryTeacher").value;
        var designation = document.getElementById("designation").value;

        var catagoryOther = document.getElementById("catagoryOther").value;
        var designationOther = document.getElementById("designationOther").value;

        const nicValidate = new nic(nicNumber);
        var msg = nicValidate.check();

        if(msg[0]){
            document.getElementById("nicMessage").innerHTML=msg[1];
            if(IsLength(address, 5, 150)){
                if(catagory=="Nurse"){
                    if(catagoryNurse=="Other"){
                        if(IsLength(designation, 3, 20)){ submitFormRegisterNext(nicNumber, address, catagory, designation); }
                        else{ errorMessage.innerHTML = "Please type your designation.<br>කරුණාකර ඔබේ තනතුර ටයිප් කරන්න."; }
                    }
                    else if(catagoryNurse!=="-1"){ submitFormRegisterNext(nicNumber, address, catagory, catagoryNurse); }
                    else{ errorMessage.innerHTML = "Please select your designation.<br>කරුණාකර ඔබේ තනතුර තෝරන්න."; }
                }
                else if(catagory=="Teacher"){
                    if(catagoryTeacher=="Other"){
                        if(IsLength(designation, 3, 20)){ submitFormRegisterNext(nicNumber, address, catagory, designation); }
                        else{ errorMessage.innerHTML = "Please type your designation.<br>කරුණාකර ඔබේ තනතුර ටයිප් කරන්න."; }
                    }
                    else if(catagoryTeacher!=="-1"){ submitFormRegisterNext(nicNumber, address, catagory, catagoryTeacher); }
                    else{ errorMessage.innerHTML = "Please select your designation.<br>කරුණාකර ඔබේ තනතුර තෝරන්න."; }
                }
                else if(catagory=="Other"){
                    if(IsLength(catagoryOther, 3, 20)){
                        if(IsLength(designationOther, 3, 20)){ 
                            submitFormRegisterNext(nicNumber, address, catagoryOther, designationOther); 
                        }
                        else{ errorMessage.innerHTML = "Please select your designation.<br>කරුණාකර ඔබේ තනතුර තෝරන්න."; }
                    }
                    else{ 
                        errorMessage.innerHTML = "Please type your job type.<br>කරුණාකර ඔබේ රැකියාව ටයිප් කරන්න.";
                    }
                }
                else{ 
                    errorMessage.innerHTML = "Please select your job type.<br>කරුණාකර ඔබේ රැකියාව තෝරන්න."; 
                }
            }
            else{ 
                errorMessage.innerHTML = "Please type address correctly.<br>කරුණාකර ලිපිනය නිවැරදිව ටයිප් කරන්න."; 
            }
        }else{ errorMessage.innerHTML = msg[1]; }
        scrollTop();
    }


    function submitFormRegisterNext(_nic_, _address_, _catagory_, _designation_) {
        if (typeof(Storage) !== "undefined") {
            var _uid_ = sessionStorage.getItem("NEW_USER_ID");
            sessionStorage.setItem('REGISTER_TYPE', _catagory_);
            LOAD_JSON("submit_new_user_next", "&uid="+_uid_+"&nic="+_nic_+"&address="+_address_+"&catagory="+_catagory_+"&designation="+_designation_);
        }
    }


</script>