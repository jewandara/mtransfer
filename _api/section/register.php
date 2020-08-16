    <div class="container pt-4 mt-2 tab-animate-opacity">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-5">Register At MTransfer
            <div>ලියාපදිංචි වන්න</div>
        </h2>
        <div class="media-container-row">
            <div class="media-block m-auto" style="width: 36%;">
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
                            <label for="firstname" class="form-control-label mbr-fonts-style display-7">First Name /&nbsp;මුල් නම :</label>
                            <input type="text" id="firstname" data-form-field="firstname" class="form-control display-7" placeholder="කරුණාකර ඔබේ මුල් නම ටයිප් කරන්න">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="lastname" class="form-control-label mbr-fonts-style display-7">Last Name /&nbsp;අවසන් නම :</label>
                            <input type="text" id="lastname" data-form-field="lastname" class="form-control display-7" placeholder="කරුණාකර ඔබේ අවසන් නම ටයිප් කරන්න">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-text col-md-12">
                            <label for="gender" class="form-control-label mbr-fonts-style display-7">Gender / ස්ත්රී පුරුෂ භාවය :</label>
                            <select id="gender" data-form-field="gender" class="form-control display-7" placeholder="කරුණාකර ඔබේ ස්ත්රී පුරුෂ භාවය තෝරන්න">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-texts col-md-12">
                            <label for="contact" class="form-control-label mbr-fonts-style display-7">Contact Number (Mobile) / ඇමතුම් අංකය (ජංගම) :&nbsp;</label><div class="countrycode"> (+94)</div>
                            <input type="number" id="contact"  maxlength="10" data-form-field="contact" class="form-control display-7" placeholder="කරුණාකර ඔබේ ඇමතුම් අංකය (ජංගම) ටයිප් කරන්න" style="padding-left:75px;">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-texts col-md-12">
                            <label for="email" class="form-control-label mbr-fonts-style display-7">Email Address / විද්යුත් තැපැල් ලිපිනය</label>
                            <input type="email" id="email" data-form-field="email" class="form-control display-7" placeholder="තිබේ නම් කරුණාකර ඔබේ විද්යුත් තැපැල් ලිපිනය ටයිප් කරන්න">
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <div class="card-texts col-md-12">
                            <a class="link display-4" href="/terms_and_conditions">
                                <img src="/img/AGREE.png" alt="I agree" title="I agree" width="40px" >
                            </a>
                            By clicking the next button, I agree the 
                            <a class="link display-4" href="/terms_and_conditions">terms and conditions</a> of transfer.<br>
                            ඊළඟ බොත්තම ක්ලික් කිරීමෙන්, MTransfer සමාගමේ 
                            <a class="link display-4" href="/terms_and_conditions">නියමයන් සහ කොන්දේසි</a> මම එකඟ වෙමි.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-4 mt-2 tab-animate-opacity">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center" id="submitRegister"><a class="btn btn-primary display-4">NEXT &gt;&gt;</a></div>
            </div>
        </div>
    </div>




<script type="text/javascript">
$(document).ready(function() {
    $("#submitRegister").click(function(){
        validateFormUser();
    });
});

function validateFormUser() {
    var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var gender = document.getElementById("gender").value;
    var contact = document.getElementById("contact").value;
    var email = document.getElementById("email").value;
    if(IsLength(fname, 2, 50)){
        if(!IsNumeric(fname)){
            if(IsLength(lname, 2, 50)){
                if(!IsNumeric(lname)){
                    var msgContact = IsContact(contact);
                    if(msgContact[0]){
                        var msgEmail = IsEmail(email);
                        if(email==""){ submitFormRegisterUser(fname, lname, gender, contact); }
                        else{
                            var msgEmail = IsEmail(email);
                            if(msgEmail[0]){ submitFormRegisterUser(fname, lname, gender, contact, email); }
                            else{
                                document.getElementById("errorMessage").innerHTML = 
                                msgEmail[1]+"<br>තිබේ නම් ඔබේ විද්යුත් තැපැල් ලිපිනය, නිවැරදිව ටයිප් කරන්න.";
                            }
                        }
                    }else{
                        document.getElementById("errorMessage").innerHTML = 
                        msgContact[1]+"<br>ඔබේ ඇමතුම් අංකය, නිවැරදිව ටයිප් කරන්න.";
                    }
                }else{
                    document.getElementById("errorMessage").innerHTML = 
                    "Do not use numeric letters for your last name.<br>ඔබේ අවසන් නම සඳහා සංඛ්‍යාත්මක අකුරු භාවිතා නොකරන්න.";
                }
            }else{
                document.getElementById("errorMessage").innerHTML = 
                "Your last name should be between 3 and 50 characters.<br>ඔබේ අවසන් නම නම සඳහා අකුරු 3 ත් 50 ත් අතර විය යුතුය.";
            }
        }else{
            document.getElementById("errorMessage").innerHTML = 
            "Do not use numeric letters for your first name.<br>ඔබේ මුල් නම සඳහා සංඛ්‍යාත්මක අකුරු භාවිතා නොකරන්න.";
        }
    }else{
        document.getElementById("errorMessage").innerHTML = 
        "Your first name should be between 3 and 50 characters.<br>ඔබේ මුල් නම සඳහා අකුරු 3 ත් 50 ත් අතර විය යුතුය.";
    }
    scrollTop();
}

function submitFormRegisterUser(_fname_, _lname_, _gender_, _contact_, _email_= null) {
    if (typeof(Storage) !== "undefined") {
        var uid = CREATE_UUIDV();
        sessionStorage.setItem("NEW_USER_ID", uid);
        sessionStorage.setItem("NEW_USER_NAME", _fname_+" "+_lname_);
        LOAD_JSON("submit_new_user", "&uid="+uid+"&fname="+_fname_+"&lname="+_lname_+"&gender="+_gender_+"&contact="+_contact_+"&email="+_email_);
    }
}

  
</script>