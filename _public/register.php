<section class="mbr-section info3 cid-rqbZBUhita" id="info3-p">
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(23, 68, 51);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column title col-12 col-md-10">
            </div>
        </div>
    </div>
</section>


<section class="counters3 counters cid-rsMfxc7H9r" id="counters3-t" style="min-height: 700px;">

</section>

<!-- 
<section class="mbr-section article content11 cid-rpYHPjHWM0" id="content11-7">
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <ol>
                    <li>
                        <strong>නොමිලේ ලියාපදිංචි වන්න</strong> - රාජ්‍ය/අර්ධ රාජ්‍ය හා පුද්ගලික විවිධ රැකියාවල නියුතු පුද්ගලයන් හට විවිධ  සේවා ස්තාන අතර සුහද මාරු ලබා ගැනීම සදහා අප වෙබ් අඩවියෙහි (www.mtransfer.lk) නොමිලේ ලියාපදිංචි වන්න. <a class="link display-4" href="/register">Register</a>
                    </li>
                    <li>
                        <strong>දුරකතන අංකය</strong> - වැඩි විස්තර දැන ගැනීම සදහා පහත දුරකතන අංකය භාවිතා කරන්න. අපි පැය (24*365) පුරාම විවෘතයි. <a class="link display-4" href="tel:+94704008919">( +94 ) 070 400 8919</a>
                    </li>
                    <li>
                        <strong>පුද්ගලිකවම නිරීක්ශනය</strong> - ඔබ ලියාපදින්චි දත්ත සටහනට අනුව අවශ්‍ය වන සේවා හුවමාරු සම්බන්දයෙන් අප කාර්‍යම්න්ඩලය විසින් පුද්ගලිකවම නිරීක්ශනය කරනු ලබන අතර නිරතුරුව ඔබව දැනුවත් කරනු ලබයි.</a>
                    </li>
                    <li>
                        <strong>MOBILE මිතුරා</strong> - විශේෂ ක්‍රියාමාර්ග අවශ්‍ය නොවේ, ඔබේ ජංගම දුරකථනය සමඟ, අපගේ වෙබ් අඩවියට සම්බන්ධ විය හැකිය. තාක්ෂණික කුසලතා අවශ්‍ය නොවේ <a href="https://mtransfer.lk/">Try it now!</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
 -->

<script type="text/javascript">
$(document).ready(function() {
    register();
});


function selectJobCatagory(_catagory_) {
    if(_catagory_ == "Nurse" ){
        $('#catagoryNursePage').css('display','block');
        $('#catagoryTeacherPage').css('display','none');
        $('#catagoryOtherPage').css('display','none');
        $('#designationOtherPage').css('display','none');
    }
    else if(_catagory_ == "Teacher" ){
        $('#catagoryNursePage').css('display','none');
        $('#catagoryTeacherPage').css('display','block');
        $('#catagoryOtherPage').css('display','none');
        $('#designationOtherPage').css('display','none');
    }
    else if(_catagory_ == "Other" ){
        $('#catagoryNursePage').css('display','none');
        $('#catagoryTeacherPage').css('display','none');
        $('#catagoryOtherPage').css('display','block');
        $('#designationOtherPage').css('display','none');
    }
    else{
        $('#catagoryNursePage').css('display','none');
        $('#catagoryTeacherPage').css('display','none');
        $('#catagoryOtherPage').css('display','none');
        $('#designationOtherPage').css('display','none');
    }
}

function selectJobDesignation(_designation_) {
    if(_designation_ == "Other" ){
        $('#designationOtherPage').css('display','block');
    }
    else{
        $('#designationOtherPage').css('display','none');
    }
}

function register(_page_) {
    if(_page_==0){ sessionStorage.removeItem("REGISTER_PAGE"); }
    if(_page_==1){ sessionStorage.setItem('REGISTER_PAGE', 'NEXT'); }
    if(_page_==2){ sessionStorage.setItem('REGISTER_PAGE', 'SUBMIT'); }

    if (typeof(Storage) !== "undefined") {
        if((sessionStorage.getItem("REGISTER_PAGE")==null) || (sessionStorage.getItem("REGISTER_PAGE")=="START")){
            LOAD_SECTION('register', '', 'counters3-t');
        }
        else if((sessionStorage.getItem("NEW_USER_ID")!==null) && (sessionStorage.getItem("REGISTER_PAGE")=="NEXT")){
            var username = sessionStorage.getItem("NEW_USER_NAME");
            LOAD_SECTION('register_next', '&username='+username, 'counters3-t');
        }
        else if((sessionStorage.getItem("NEW_USER_ID")!==null) && (sessionStorage.getItem("REGISTER_PAGE")=="SUBMIT")){
            var usertype = sessionStorage.getItem("REGISTER_TYPE");
            LOAD_SECTION('register_submit', '&usertype='+usertype, 'counters3-t');
        }
        else{
            LOAD_SECTION('register', '', 'counters3-t');
        }
    }
}


</script>