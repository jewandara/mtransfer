    <div class="container pt-4 mt-2 tab-animate-right">
        <h2 id="submitHeaderRequest" class="mbr-section-title pb-3 align-center mbr-fonts-style display-5"></h2>  
        <div class="media-container-row">
            <div class="media-block m-auto" style="width: 20%;">
                <div class="mbr-figure">
                    <img src="/img/mbr-714x536.jpg" alt="" title="" id="img-register" >
                </div>
            </div>
            <div class="cards-block">
                <div class="cards-container content-register" id="content-register-form">
                    <div class="col-12">
                        <p style=" font-size: 16px;font-weight: bold; color:red; padding:10px; color: #f44336; margin-bottom:-20px;" id="errorMessage"></p>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="currentWorkingLocation" class="form-control-label mbr-fonts-style display-7">District of present workplace / වර්තමාන සේවා ස්ථානය පිහිටී දිස්ත්රික්කය: </label>
                            <select name="currentWorkingLocation" id="currentWorkingLocation" data-form-field="currentWorkingLocation" class="form-control display-7" placeholder="කරුණාකර ඔබගේ වර්තමාන සේවා ස්ථානය පිහිටී දිස්ත්රික්කය තෝරන්න">
                            </select>                          
                        </div>
                    </div>
                    <div class="col-12" id="currentWorkingPlaceView">
                        <br><div class='card-text col-md-12'>
                            <label for='currentWorkingPlace' class='form-control-label mbr-fonts-style display-7'>Name of the current workplace / වර්තමාන සේවා ස්ථානයේ නම:<br></label>
                            <input id='currentWorkingPlace' name='currentWorkingPlace' data-form-field='currentWorkingPlace' class='form-control display-7' placeholder='කරුණාකර ඔබගේ වර්තමාන සේවා ස්ථානයේ නම ටයිප් කරන්න'>
                        </div>
                    </div>
                    <div class="col-12" style="border: 2px solid #000; border-radius: 5px 5px 5px 5px; margin-top: 30px; padding-bottom: 30px;" id="requestingExpectingWorkingLocation">
                        <h5 style="padding: 20px">Requesting New Working Location / නව සේවා ස්ථානයක් ඉල්ලා සිටීම</h5>

                        <div class="col-12" id="expectingWorkingLocationView">
                            <br>
                            <div class="card-text col-md-12">
                                <label for="expectingWorkingLocation" class="form-control-label mbr-fonts-style display-7">District where the desired workplace is located / අපේක්ෂිත සේවා ස්ථානය පිහිටී දිස්ත්රික්කය: &nbsp;</label>
                                <select id="expectingWorkingLocation" name="expectingWorkingLocation" data-form-field="expectingWorkingLocation" class="form-control display-7" placeholder="කරුණාකර ඔබගේ අපේක්ෂිත  සේවා ස්ථානය පිහිටී දිස්ත්රික්කය තෝරන්න"/>
                                </select>
                            </div>
                        </div>
                        <div class="col-12" id="expectingTransferPlaceView">
                            <br><div class='card-text col-md-12'>
                                <label for='expectingTransferPlace' class='form-control-label mbr-fonts-style display-7'>Name of the intended workplace / අපේක්ෂිත සේවා ස්ථානයේ නම:<br></label>
                                <input id='expectingTransferPlace' name='expectingTransferPlace' data-form-field='expectingTransferPlace' class='form-control display-7' placeholder='කරුණාකර ඔබගේ අපේක්ෂිත සේවා ස්ථානයේ නම ටයිප් කරන්න'>
                            </div>
                        </div>
                        <div class="col-12">
                            <br>
                            <div class="card-text col-md-12">
                                <label for="requestingTimePeriod" class="form-control-label mbr-fonts-style display-7">Time required to change your position / ඔබගේ ස්ථානය මාරුව අවශ්ය කාලය : <br>
                                <input type="text" id="requestingTimePeriod" name="requestingTimePeriod" data-form-field="Date" class="form-control display-7" placeholder="ඔබගේ ස්ථානය මාරුව අවශ්ය කාල සීමාව තෝරන්න" readonly>
                                <div class="mpicker"></div>
                            </div>
                        </div>
                        
                        <div class="col-12" style="padding-top: 20px;">
                            <div class="mbr-section-btn">
                                <a class="btn btn-primary display-4" id="submitRegisterSubmit">SEND REQUEST</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" id="submitSuccessMessage" style="display: none"></div>
            </div>
        </div>
    </div>    



<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
          var d = new Date();
          var n = d.getFullYear();
          var yearArry = [];
          for (i = n; i < (n+10); i++) {
            yearArry.push(i);
          }
          $('#requestingTimePeriod').monthpicker({
            years: yearArry,
            topOffset: 6,
            onMonthSelect: function(m, mm, y) {
                document.getElementById("requestingTimePeriod").value = mm+' '+y;
                //console.log('Month: ' + mm + ', year: ' + y);
            }
          });
        });

        $("#submitRegisterSubmit").click(function(){
            validateFormSubmit();
        });

        var usertype = sessionStorage.getItem("REGISTER_TYPE");
        document.getElementById("currentWorkingPlaceView").style.display = "none";
        document.getElementById("expectingWorkingLocationView").style.display = "none";
        document.getElementById("expectingTransferPlaceView").style.display = "none";
        document.getElementById("requestingExpectingWorkingLocation").style.display = "none";
        if(usertype == "Nurse"){
            document.getElementById("submitHeaderRequest").innerHTML = "Transfer Request Form For Nurses<br><div>හෙදියන් සඳහා සුහද මාරු ඉල්ලුම් පත්රය</div>";
        }
        else if(usertype == "Teacher"){
            document.getElementById("submitHeaderRequest").innerHTML = "Transfer Request Form For Teachers<br><div>ගුරුවරුන් සඳහා සුහද මාරු ඉල්ලුම් පත්රය</div>";
        }else{
            document.getElementById("submitHeaderRequest").innerHTML = "Transfer Request Form For Other Users<br><div>වෙනත් පරිශීලකයින් සඳහා සුහද මාරු ඉල්ලුම් පත්රය</div>";
        }

        $("#currentWorkingLocation").on('change', function() {
            if(document.getElementById("currentWorkingLocation").value!=="-1"){
                document.getElementById("currentWorkingPlaceView").style.display = "block";
                document.getElementById("expectingWorkingLocationView").style.display = "block";
                document.getElementById("requestingExpectingWorkingLocation").style.display = "block";
                //LOAD_JSON("current_working_place_view", "&usertype="+usertype);
            }else{
                document.getElementById("currentWorkingPlaceView").style.display = "none";
                document.getElementById("expectingWorkingLocationView").style.display = "none";
                document.getElementById("expectingTransferPlaceView").style.display = "none";
                document.getElementById("requestingExpectingWorkingLocation").style.display = "none";
            }
        });

        $("#expectingWorkingLocation").on('change', function() {
            if(document.getElementById("expectingWorkingLocation").value!=="-1"){
                document.getElementById("expectingTransferPlaceView").style.display = "block";
                //LOAD_JSON("expecting_working_place_view", "&usertype="+usertype);
            }else{
                document.getElementById("expectingTransferPlaceView").style.display = "none";
            }
        });

        LOAD_JSON("view_total_district", "");
    });

    function validateFormSubmit() { 
        var errorMessage = document.getElementById("errorMessage");
        var currentWorkingLocation = document.getElementById("currentWorkingLocation").value;
        var currentWorkingPlace = document.getElementById("currentWorkingPlace").value;
        var requestingTimePeriod = document.getElementById("requestingTimePeriod").value;
        var expectingWorkingLocation = document.getElementById("expectingWorkingLocation").value;
        var expectingTransferPlace = document.getElementById("expectingTransferPlace").value;
        if(currentWorkingLocation != "-1"){
            if(IsLength(currentWorkingPlace, 5, 150)){
                if(requestingTimePeriod != ""){
                    if(expectingWorkingLocation != "-1"){
                        if(IsLength(expectingTransferPlace, 5, 150)){
                            submitFormRegister(currentWorkingLocation, currentWorkingPlace, requestingTimePeriod, expectingWorkingLocation, expectingTransferPlace);
                        }
                        else{ 
                            errorMessage.innerHTML = "Please type the name of your expecting transferring place.<br>( which must be more than five letters. )<br>කරුණාකර ඔබ අපේක්ෂා කරන ස්ථාන මාරු කිරීමේ ස්ථානය ටයිප් කරන්න.<br>( අකුරු පහකට වඩා වැඩි විය යුතුය. )"; 
                        }
                    }
                    else{ 
                        errorMessage.innerHTML = "Please select your expecting working district.<br>කරුණාකර ඔබ අපේක්ෂා කරන වැඩ කරන දිස්ත්‍රික්කය තෝරන්න."; 
                    }
                }
                else{ 
                    errorMessage.innerHTML = "Please select your requesting time period in Months.<br>කරුණාකර ඔබගේ ඉල්ලීම් කාලය, මාස වලින් තෝරන්න."; 
                }
            }
            else{ 
                errorMessage.innerHTML = "Please type the name of your current working place.<br>( which must be more than five letters. )<br>කරුණාකර ඔබගේ වර්තමාන සේවා ස්ථානයේ නම ටයිප් කරන්න.<br>( අකුරු පහකට වඩා වැඩි විය යුතුය. )"; 
            }
        }else{
            errorMessage.innerHTML = "Please select your current working district.<br>කරුණාකර ඔබගේ වර්තමාන වැඩ කරන දිස්ත්‍රික්කය තෝරන්න."; 
        }
        scrollTop();
    }

    function submitFormRegister(_crDistrict_, _crPlace_, _period_, _exDistrict_, _exPlace_) {
        if (typeof(Storage) !== "undefined") {
            var _uid_ = sessionStorage.getItem("NEW_USER_ID");
/*            var _uname_ = sessionStorage.getItem("NEW_USER_NAME");
            document.getElementById("submitSuccessMessage").style.display = "block";
            document.getElementById("submitSuccessMessage").innerHTML = "<div class='alert alert-success'><h5>Hi "+_uname_+",</h5><br><strong>Your form has been submitted successfully !<br>ඔබගේ පෝරමය සාර්ථකව ඉදිරිපත් කර ඇත !</strong><br><br>Our agent will contact you soon to schedule your mutual transfer.<br>ඔබගේ අන්‍යෝන්‍ය මාරුව උපලේඛනගත කිරීම සඳහා අපගේ නියෝජිතයා ඉක්මනින් ඔබ හා සම්බන්ධ වනු ඇත.<br>For More, Please call us : ( +94 ) 070 400 8919</div>";*/
            //document.getElementById("content-register-form").style.display = "none";
            LOAD_JSON("submit_new_user_submit", "&uid="+_uid_+"&crdid="+_crDistrict_+"&crp="+_crPlace_+"&period="+_period_+"&exdid="+_exDistrict_+"&exp="+_exPlace_);
        }
    }
</script>