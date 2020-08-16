/*
    |--------------------------------|
    |          +`--                  |
    |                                |
    |       ``                       |
    |      /:.                       |
    |                                |
    |       ./     -`                |
    |        /h/   .`        +       |
    |        .-.    -s:      `+      |
    |               ./-      /o      |
    |                        `       |
    |             ..      `/o        |
    |           ++-`                 |
    |                                |
    |                                |
    |       .:-     `//              |
    |       .y/     `o+              |
    |--------------------------------|
    * Created By J.R.M. Jeewandara
    * +94 77 363 2682 / +94 77 733 2829
    * jewandara@gmail.com / jewandara@hotmail.com
    * ---------------------------------------------
*/

var _protocol_ = window.location.protocol;
var _hostname_ = window.location.hostname;
var _urlPathArry_ = window.location.pathname.split("/");
var _urlGetPera_ = window.location.search.substr(1);
var _urlGetPeraArry_  = {};
_urlGetPera_.split("&").forEach(function(item) { 
    _urlGetPeraArry_[item.split("=")[0]] = item.split("=")[1] 
});
var _now_ = new Date();
var _nowDateArry_ = DATE_FORMAT(_now_).split("-");
var _nowDateString_ = DATE_TO_STRING(_nowDateArry_);
var _URL_SCRIPT_ = _protocol_+"//"+_hostname_+"/api/";
var _URL_WEBPAGE_ = _protocol_+"//"+_hostname_+"/";
var _URL_WEBPAGE_IMG_ = _protocol_+"//"+_hostname_+"/img/";
var _session_ = "NEW_USER";

function DATE_FORMAT(_date_) {
  console.log("APP.JS : DATE_FORMAT\n");
  var d = new Date(_date_),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();
  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;
  return [year, month, day].join('-');
}

function DATE_TO_STRING(_date_) {
    console.log("APP.JS : DATE_TO_STRING\n");
    const monthName=["NaN", "January","February","March","April","May","June","July","August","September","October","November","December"];
    return  monthName[parseInt(_date_[1])]+" "+_date_[2]+", "+_date_[0];
}

function CREATE_UUIDV() {
  return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
    (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
  )
}

function SET_SESSION(_sessionKey_, _sessionValue_, _catagory_ = 'S') {
  if (typeof(Storage) !== "undefined") {
    console.log("APP.JS : SET_SESSION : " + _sessionKey_ + " : " + _sessionValue_ + " : " + _catagory_ + "\n");
    (_catagory_ === 'S') ? sessionStorage.setItem(_sessionKey_, _sessionValue_) : localStorage.setItem(_sessionKey_, _sessionValue_)
    return 1;
  }else { 
    console.log("APP.JS : SET_SESSION : FALSE");
    return 0;
  }
}

function GET_SESSION(_sessionKey_, _catagory_ = 'S') {
  if (typeof(Storage) !== "undefined") {
    console.log("APP.JS : GET_SESSION : " + _sessionKey_ + " : " + _catagory_ + "\n");
    var result = ( _catagory_ === 'S' ? sessionStorage.getItem(_sessionKey_) : localStorage.getItem(_sessionKey_, _sessionValue_) );
    return result;
  } else { 
    console.log("APP.JS : GET_SESSION : NULL");
    return null; 
  }
}

function SET_COOKIE(_cookieName_, _cookieValue_, _cookieExpireDay_, _cookieExpireType_="D") {
  console.log("APP.JS : SET_COOKIE : "+_cookieName_ + " : "+ _cookieValue_ + " : "+ _cookieExpireDay_ + " : "+ _cookieExpireType_ + "\n");
  var cookieDateTime = _now_;
  switch (_cookieExpireType_) {
    case "D": cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_*24*60*60*1000)); break;
    case "H": cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_*60*60*1000)); break;
    case "M": cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_*60*1000)); break;
    case "S": cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_*1000)); break;
    case "L": cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_)); break;
    default: cookieDateTime.setTime(cookieDateTime.getTime() + (_cookieExpireDay_*24*60*60*1000)); break;
  }
  document.cookie = _cookieName_+"="+_cookieValue_+"; expires="+cookieDateTime+"; path=/";
}

function CALL_COOKIE(_cookieName_) {
  console.log("APP.JS : CALL_COOKIE : "+_cookieName_ + "\n");
  var name = _cookieName_ + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  console.log(decodedCookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {  c = c.substring(1); }
    if (c.indexOf(name) == 0) { return c.substring(name.length, c.length); }
  }
  return null;
}

function GET_COOKIE() {
  console.log("APP.JS : GET_COOKIE\n");
  var cookieResult = document.cookie.split(';');
  return cookieResult;
}



//console.log(_protocol_);
//console.log(_hostname_);
//console.log(_urlPathArry_);
//console.log(_urlGetPeraArry_);
//console.log(_now_);
//console.log(_nowDateArry_);
//console.log(_nowDateString_);


$(document).ready(function() {
 
});

$( window ).on("load", function() {

});


function SEND_BACKEND(){

}

function SEND_HASHTAG(){

}

function SEND_URL(){

}

var RUN_THREAD_FUNCTION = function(_threadName_, _threadArry_, _threadInputArry_=null){
    var defFunThread = window[_threadName_];
    defFunThread(_threadArry_, _threadInputArry_);
};

function LOAD_SESSION() {
  var user = CALL_COOKIE("USER_LOGIN_COOKIE");
  var pass = CALL_COOKIE("PASS_LOGIN_COOKIE");
  if(SET_SESSION("SERVER_SESSION", user+":"+pass, "S")){ return 1; }
  else{ return 0; }
}

function LOAD_JSON( _fun_, _data_) {
  var _url_ = _URL_SCRIPT_+'json/'+_fun_+'/?session='+_session_+'&'+_data_;
  console.log(encodeURI(_url_));
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = encodeURI(_url_);
  document.getElementsByTagName("head")[0].appendChild(script);
}

function LOAD_AJAX( _fun_, _data_, _element_, _callFun_) {
  if(LOAD_SESSION()){
    var sessionKey = GET_SESSION("SERVER_SESSION", "S");
    var _url_ = _URL_SCRIPT_+'ajax/'+_fun_+'/?session='+sessionKey+'&'+_data_;
    $('#'+_element_+'-loading').css('display','block');
    console.log(encodeURI(_url_));
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          $('#'+_element_+'-loading').css('display','none');
          RUN_THREAD_FUNCTION(_callFun_, this.responseText, _data_); 
        }
    };
    xhttp.open("GET", _url_, true);
    xhttp.send();
  }
}

function LOAD_SECTION( _fun_, _data_, _element_, _callFun_=null) {
  var _url_ = _URL_SCRIPT_+'section/'+_fun_+'/?&'+_data_;
  $('#'+_element_).html("<div class='loading_section'></div>");
  console.log(encodeURI(_url_));
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#'+_element_).html(this.responseText);
      if(_callFun_!=null) RUN_THREAD_FUNCTION(_callFun_, this.responseText, _data_); 
    }
  };
  xhttp.open("GET", _url_, true);
  xhttp.send();
}

function LOAD_GRID( _fun_, _data_, _grid_) {
  if(LOAD_SESSION()){
    var sessionKey = GET_SESSION("SERVER_SESSION", "S");
    var _url_ = _URL_SCRIPT_+'grid/'+_fun_+'/?session='+sessionKey+'&'+_data_;
    $('#'+_grid_).DataTable().destroy();
    console.log(encodeURI(_url_));
    var dataTable = $('#'+_grid_).DataTable( {
      'order': [[0,'desc']],
      'lengthMenu': [[10, 50, 100, 500], [10, 50, 100, 500]],
      'processing': true,
      'serverSide': true,
      'ajax':{
        url : _URL_SCRIPT_+'grid/'+_name_+'/?session='+_session_+'&'+_data_,
        type: 'GET',
        error: function(){
          $('#'+_grid_+'-error').html('Error Foun on Loading on Grid.');
          $('#'+_grid_).append('<tbody class=\"table-grid-error\"><tr><th colspan=\"10\">No data found in the server</th></tr></tbody>');
          $('#'+_grid_+'-processing').css('display','none');  
        }
      }
    });
  }
}

function LOAD_EXCEL( _fun_, _data_, _excel_, _callFun_) {
  if(LOAD_SESSION()){
    var sessionKey = GET_SESSION("SERVER_SESSION", "S");
    var _url_ = _URL_SCRIPT_+'excel/'+_fun_+'/?session='+sessionKey+'&'+_data_;
    $('#'+_excel_+'-loading').css('display','block');
    console.log(encodeURI(_url_));
    var fileData = $('#'+_excel_).prop('files')[0];
    if(fileData != undefined) {
      var formData = new FormData();                  
      formData.append('file', fileData);
      $.ajax({
        type: 'POST',
        url: _url_,
        contentType: false,
        processData: false,
        data: formData,
        success:function(response) {
          $('#'+_excel_+'-loading').css('display','none');
          RUN_THREAD_FUNCTION(_callFun_, response, _data_);
          }
      });
    }
  }
}

function LOAD_POPUP(_fun_, _data_, _callFun_) { 
  if(LOAD_SESSION()){
    var sessionKey = GET_SESSION("SERVER_SESSION", "S");
    var _url_ = _URL_SCRIPT_+'popup/'+_fun_+'/?session='+sessionKey+'&'+_data_;
    console.log(_url_);
    var xhttp = new XMLHttpRequest();
    var popupForm = document.getElementById('popup');
    popupForm.innerHTML = "<div class='loading-window'><img src='"+_URL_WEBPAGE_IMG_+"loading.gif' alt='Loading' class='loading-img'><h1 class='loading-wait-text'>PLEASE WAIT, PAGE IS LOADING</h1></div>";
    popupForm.style.display = "block";
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          popupForm.innerHTML = this.responseText; 
          RUN_THREAD_FUNCTION(_callFun_, this.responseText, _data_);
        }
    };
    xhttp.open("GET", _url_, true);
    xhttp.send();
  }
}

function CLOASE_POPUP() { 
    document.getElementById("popup").style.display = "none"; 
}

function ON_SELECT_ONE_DATE(_is_, _element_, _callFun_=null, _data_=""){
    $('#'+_element_).daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        timePickerSeconds: false
    }, function(_selectdate_) {
      console.log(_selectdate_);
        //var _URL_  = _data_+"&date="+_selectdate_.format('YYYY-MM-DD');
        //if(_is_){ window.location.href = _URL_WEBPAGE_+_callFun_+"/?"+_URL_; }
        //else{
        //    $('#'+_element_).html('TODAY REPORT : '+_selectdate_.format('MMMM D, YYYY').toUpperCase());
        //    if(_callFun_!=null){ 
        //        console.log("BACKEND CALL "+_URL_);
       //         RUN_THREAD_FUNCTION(_callFun_, _selectdate_.format('YYYY-MM-DD'), _data_);
       //     }
        //    else{ console.log("NO FUNCTION DEFIND FOR DATE TIME RANGE BUTTONS"); }
        //}
    });

   // var urlDate = DATE_FORMAT(url_data_get['date']).split("-");
    //if((urlDate[0]!="NaN"||urlDate[1]!="NaN"||urlDate[2]!="NaN")&&(isUrl)){ 
    //    $('#'+_messageElement_).html('TODAY REPORT : '+dateToString(urlDate).toUpperCase());
   // }
}

function ON_SELECT_DATE_RANGE(_is_, _element_, _callFun_=null, _data_=""){
    var start = moment().subtract(15, 'days');
    var end = moment();
    var d = new Date();
    var sd = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 00:00:00";
    var ed = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 23:59:59";
    var x = Number(new Date(sd));
    var y = Number(new Date(ed));

    $('#'+_element_).daterangepicker({
        startDate: x,
        endDate: y,
        timePicker: true,
        timePickerSeconds: true
    }, function(start, end, label) {
        //var _URL_  = _data_+"&datefrom="+start.format('YYYY-MM-DD')+"&dateto="+end.format('YYYY-MM-DD');
        //if(_is_){ window.location.href = _URL_WEBPAGE_+_callFun_+"/?"+_URL_; }
        //else{
        //    $('#'+_element_).html('From '+start.format('MMMM D, YYYY hh:mm:ss a')+' - To '+end.format('MMMM D, YYYY hh:mm:ss a')
        //    +' <a id="imsRangeDatePickerClear" style="padding:5px;background-color:#f06595;color:white" type="button" onclick="onClearDateTime(\''+_messageElement_+'\')" ><i class="fa fa-close"></i></a>');
        //    if(_onloadFunctionCall_!=null){
        //        console.log("BACKEND CALL "+_SELECTED_DATERANGE_URL_);
        //        defineOnLoadFunctionCall(_onloadFunctionCall_, _SELECTED_DATERANGE_URL_); 
        //    }
        //    else{ console.log("NO FUNCTION DEFIND FOR DATE TIME RANGE BUTTONS"); }
        //}
    });

    //var urlDateFrom = formatDate(url_data_get['datefrom']).split("-");
    //var urlDateTo = formatDate(url_data_get['dateto']).split("-");
    //if((urlDateFrom[0]!="NaN"||urlDateFrom[1]!="NaN"||urlDateFrom[2]!="NaN"||urlDateTo[0]!="NaN"||urlDateTo[1]!="NaN"||urlDateTo[2]!="NaN")&&(_onloadFunctionCall_=="URL")){
    //    $('#'+_messageElement_).html('From '+dateToString(urlDateFrom).toUpperCase()+' - To '+dateToString(urlDateTo).toUpperCase());
    //}
}




//----------------------//
//---COMMON FUNCTIONS---//
//----------------------//

function IsNumeric(_input_)
{  return (_input_ - 0) == _input_ && (''+_input_).trim().length > 0; }

function IsLength(input, min, max){
  if( (input.length>min) && (input.length<max) ){ return true; }
  else return false;
}

function IsEmail(_emailAddress_) {
  if( _emailAddress_ !== "" ){
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(_emailAddress_)) { return [ true, "'"+_emailAddress_+"' is a valid email address." ]; }
    else{ return [false, "'"+_emailAddress_+"' is an invalid email address."]; }
  }
  else { return [false, "Your email is an empty email address."]; }
}

function IsContact(_contactNumber_) {
  if( _contactNumber_ !== "" ){
    if(IsNumeric(_contactNumber_)){
      if( (_contactNumber_.length == 10) && (_contactNumber_.charAt(0)=="0") ) { return [true, "'"+_contactNumber_+"' is a valid contact number."]; }
      else if( (_contactNumber_.length == 9) && (_contactNumber_.charAt(0)!=="0") ) { return [true, "'"+_contactNumber_+"' is a valid contact number."]; }
      else{ return [false, "'"+_contactNumber_+"' is an invalid contact number."]; }
    } else { return [false, "'"+_contactNumber_+"' is not a numeric contact number."]; }
  } else { return [false, "Your contact is an empty contact number."]; }
}

class nic {
    constructor(_nic_) { this.nic = _nic_; }

    findDayANDGender(days, d_array) {
      var dayList = days;
      var month = '';
      var result = { day: '', month: '', gender: '' };
      if (dayList < 500) { result.gender = 'Male'; } 
      else { result.gender = 'Female'; dayList = dayList - 500; }
      for (var i = 0; i < d_array.length; i++) {
          if (d_array[i]['days'] < dayList) { dayList = dayList - d_array[i]['days']; } 
          else { month = d_array[i]['month']; break; }
      }
      result.day = dayList;
      result.month = month;
      return result;
    }
    extractData(nicNumber) {
      var nicNumber = nicNumber;
      var result = { year: '', dayList: '', character: '' };
      if (nicNumber.length === 10) {
          result.year = nicNumber.substr(0, 2);
          result.dayList = nicNumber.substr(2, 3);
          result.character = nicNumber.substr(9, 10);
      } else if (nicNumber.length === 12) {
          result.year = nicNumber.substr(0, 4);
          result.dayList = nicNumber.substr(4, 3);
          result.character = 'no';
      }
      return result;
    }
    validation(nicNumber) {
      var result = false;
      if (nicNumber.length === 10 && !isNaN(nicNumber.substr(0, 9)) && isNaN(nicNumber.substr(9, 1).toLowerCase()) && ['x', 'v'].includes(nicNumber.substr(9, 1).toLowerCase())) { result = true; } 
      else if (nicNumber.length === 12 && !isNaN(nicNumber)) { result = true; } 
      else { result = false; }
      return result;
    }
    getFormattedDate(date) {
      var year = date.getFullYear();
      var month = (1 + date.getMonth()).toString();
      month = month.length > 1 ? month : '0' + month;
      var day = date.getDate().toString();
      day = day.length > 1 ? day : '0' + day;
      return month + '/' + day + '/' + year;
    }
    check(){
      var d_array = [
        { month: 'January', days: 31 },
        { month: 'Febr0ary', days: 29 },
        { month: 'March', days: 31 },
        { month: 'April', days: 30 },
        { month: 'May', days: 31 },
        { month: 'June', days: 30 },
        { month: 'July', days: 31 },
        { month: 'August', days: 31 },
        { month: 'Septhember', days: 30 },
        { month: 'October', days: 31 },
        { month: 'November', days: 30 },
        { month: 'December', days: 31 },
      ];
      var nicNumber = this.nic;
      if (this.validation(nicNumber)) {
          var extracttedData = this.extractData(nicNumber);
          var days = extracttedData.dayList;
          var findedData = this.findDayANDGender(days, d_array);
          var month = findedData.month;
          var year = extracttedData.year;
          var day = findedData.day;
          var gender = findedData.gender;
          var bday = day + '-' + month + '-' + year;
          var birthday = new Date(bday.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
          var birthday = this.getFormattedDate(birthday);
          return [true, "BirthDay: " + birthday + " | Gender: "+ gender];
      } else { return [false, "You entered NIC number is wrong.<br>කරුණාකර ඔබේ ජාතික හැඳුනුම්පත් අංකය නිවැරදිව ඇතුළත් කරන්න."]; }
    }
}

function SelectDateRange(isUrl, _messageElement_, _onloadFunctionCall_=null, _onloadFunctionArry_=""){
    var start = moment().subtract(15, 'days');
    var end = moment();
    var d = new Date();
    var sd = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 00:00:00";
    var ed = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 23:59:59";
    var x = Number(new Date(sd));
    var y = Number(new Date(ed));

    $('#'+_messageElement_).daterangepicker({
        startDate: x,
        endDate: y,
        timePicker: true,
        timePickerSeconds: true
    }, function(start, end, label) {
      console.log(start.format('MMMM D, YYYY hh:mm:ss a'));
      console.log(end.format('MMMM D, YYYY hh:mm:ss a'));
      console.log(label);


    /*
    
    var _SELECTED_DATERANGE_URL_  = _onloadFunctionArry_+"&datefrom="+start.format('YYYY-MM-DD')+"&dateto="+end.format('YYYY-MM-DD');
      if(isUrl){ window.location.href = _GUI_LINK_+_onloadFunctionCall_+"/?"+_SELECTED_DATERANGE_URL_; }
      else{
          $('#'+_messageElement_).html('From '+start.format('MMMM D, YYYY hh:mm:ss a')+' - To '+end.format('MMMM D, YYYY hh:mm:ss a')
          +' <a id="imsRangeDatePickerClear" style="padding:5px;background-color:#f06595;color:white" type="button" onclick="onClearDateTime(\''+_messageElement_+'\')" ><i class="fa fa-close"></i></a>');
          if(_onloadFunctionCall_!=null){
              console.log("BACKEND CALL "+_SELECTED_DATERANGE_URL_);
              defineOnLoadFunctionCall(_onloadFunctionCall_, _SELECTED_DATERANGE_URL_); 
          }
          else{ console.log("NO FUNCTION DEFIND FOR DATE TIME RANGE BUTTONS"); }
    }

        */

    });
}






function SelectMonthYear(isUrl, _messageElement_, _onloadFunctionCall_=null, _onloadFunctionArry_=""){
    var start = moment();
    var d = new Date();
    var sd = d.getFullYear() + "-" + d.getMonth();
    var x = Number(new Date(sd));

    $('#'+_messageElement_).daterangepicker({
        startDate: x,
        datePicker: false,
        timePicker: false,
        timePickerSeconds: false
    }, function(start, end, label) {
      console.log(start.format('MMMM D, YYYY hh:mm:ss a'));
      console.log(label);

    });
}












/*

function removeOptions(selectbox) {
  var i;
  for(i=selectbox.options.length-1; i>=0 ; i--) { selectbox.remove(i); }
}

function tabButtonClick(_tabButtonClassName_, _tabContainerClassName_, _clickButtonEventArry_, _clickContainerElementName_, _onloadFunctionCall_=null, _onloadFunctionArry_=[]) {
  var i, x, tablinks;
  x = document.getElementsByClassName(_tabContainerClassName_);
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName(_tabButtonClassName_);
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" tab-blue-grey", "");
  }
  document.getElementById(_clickContainerElementName_).style.display = "block";
  _clickButtonEventArry_.currentTarget.className += " tab-blue-grey";
  if(_onloadFunctionCall_!=null){ defineOnLoadFunctionCall(_onloadFunctionCall_, _onloadFunctionArry_); }
}


//----------------------//
//---JAVA VALIDATIONS---//
//----------------------//

function validateAddress(_messageElement_, _locationAddress_) {
  if( _locationAddress_ !== "" ){
    if(stingLength(add, 7, 250)){
            document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>This is a valid address location.</p>"; 
            return true;
        }
      else{
            document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_locationAddress_+"' is an invalid address location. Address needs more than 8 letters and less than 150 letters.</p>"; 
            return false;
        }
    }
    else {
    document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_locationAddress_+"' is an empty location address.</p>";
    return false;
  }
}

function validateEmail(_messageElement_, _emailAddress_) {
  if( _emailAddress_ !== "" ){
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(_emailAddress_)) {
      document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is a valid email address.</p>";
      return true;
    }
    else{
      document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is an invalid email address.</p>";
      return false;
    }
  }
  else {
    document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is an empty email address.</p>";
    return false;
  }
}

function validateWebLink(_messageElement_, _webLink_) {
    if(_webLink_ !== "") {
        if (link.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g) !== null){
          document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is a valid web link.</p>";
          return true;
        }
        else {
          document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is not a valid web link. </p>";
          return false;
        }
    }
  else {
    document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_emailAddress_+"' is an empty web link.</p>";
    return false;
  }
}

function validatePostCode(_messageElement_, _postalCode_) {
  if (_postalCode_!="") { 
    if(isNumeric(_postalCode_)){
        if(stingLength(_postalCode_, 2, 7)){
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>'"+_postalCode_+"' is a valid postal-code.</p>";
              return true;
          }
          else{
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#ff9800;font-weight:bold;margin-bottom:-10px;'>'"+_postalCode_+"' is out of range in numbers.</p>";
              return false;
            }
    }
    else{
            document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_postalCode_+"' is not a numeric postal-code.</p>";
            return false;
        }
    }
  else{
            document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_postalCode_+"' is an invalid postal-code.</p>";
            return false;
    }
}

function validateLatitude(_messageElement_, _latitude_) {
  if (_latitude_!=""){
    if(isNumeric(_latitude_)){
            if (_latitude_ < 10.050 || _latitude_ > 5.714) { 
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_latitude_+"' is an invalid out range latitude location for Sri Lanka.</p>";
              return false; 
            }
            else{ 
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>'"+_latitude_+"' is a valid latitude location for Sri Lanka.</p>";
              return true; 
            }
        }
      else{
        document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_latitude_+"' is not a numeric latitude location.</p>"; 
        return false;
        }
    }
  else{
    document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_latitude_+"' is an empty latitude location.</p>"; 
    return false;
    }
}

function validateLongitude(_messageElement_, _longitude_) {
  if (_longitude_!=""){
    if(isNumeric(_longitude_)){
            if (_longitude_ < 79.393 || _longitude_ > 82.095) { 
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_longitude_+"' is an invalid out range longitude location for Sri Lanka.</p>";
              return false; 
            }
            else{ 
              document.getElementById(_messageElement_).innerHTML = "<p style='color:#4CAF50;font-weight:bold;margin-bottom:-10px;'>'"+_longitude_+"' is a valid longitude location for Sri Lanka.</p>";
              return true; 
            }
        }
      else{
        document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_longitude_+"' is not a numeric longitude location.</p>"; 
        return false;
        }
    }
  else{
    document.getElementById(_messageElement_).innerHTML = "<p style='color:#f44336;font-weight:bold;margin-bottom:-10px;'>'"+_longitude_+"' is an empty longitude location.</p>"; 
    return false;
    }
}


//------------------------//
//---SERVER VALIDATIONS---//
//------------------------//
function selectOneDateOption(isUrl, _messageElement_, _onloadFunctionCall_=null, _onloadFunctionArry_=""){
    $('#'+_messageElement_).daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        timePickerSeconds: false
    }, function(_selectdate_) {
        var _SELECTED_DATE_URL_  = _onloadFunctionArry_+"&date="+_selectdate_.format('YYYY-MM-DD');
        if(isUrl){ window.location.href = _GUI_LINK_+_onloadFunctionCall_+"/?"+_SELECTED_DATE_URL_; }
        else{
            $('#'+_messageElement_).html('TODAY REPORT : '+_selectdate_.format('MMMM D, YYYY').toUpperCase());
            if(_onloadFunctionCall_!=null){ 
                console.log("BACKEND CALL "+_SELECTED_DATE_URL_);
                defineOnLoadFunctionCall(_onloadFunctionCall_, _SELECTED_DATE_URL_); 
            }
            else{ console.log("NO FUNCTION DEFIND FOR DATE TIME RANGE BUTTONS"); }
        }
    });

    var urlDate = formatDate(url_data_get['date']).split("-");
    if((urlDate[0]!="NaN"||urlDate[1]!="NaN"||urlDate[2]!="NaN")&&(isUrl)){ 
        $('#'+_messageElement_).html('TODAY REPORT : '+dateToString(urlDate).toUpperCase());
    }
}


function selectDateRangeOption(isUrl, _messageElement_, _onloadFunctionCall_=null, _onloadFunctionArry_=""){
    
    var start = moment().subtract(15, 'days');
    var end = moment();
    var d = new Date();
    var sd = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 00:00:00";
    var ed = d.getFullYear() + "-" + d.getMonth()+ "-" + d.getDate() + " 23:59:59";
    var x = Number(new Date(sd));
    var y = Number(new Date(ed));

    $('#'+_messageElement_).daterangepicker({
        startDate: x,
        endDate: y,
        timePicker: true,
        timePickerSeconds: true
    }, function(start, end, label) {
        var _SELECTED_DATERANGE_URL_  = _onloadFunctionArry_+"&datefrom="+start.format('YYYY-MM-DD')+"&dateto="+end.format('YYYY-MM-DD');
        if(isUrl){ window.location.href = _GUI_LINK_+_onloadFunctionCall_+"/?"+_SELECTED_DATERANGE_URL_; }
        else{
            $('#'+_messageElement_).html('From '+start.format('MMMM D, YYYY hh:mm:ss a')+' - To '+end.format('MMMM D, YYYY hh:mm:ss a')
            +' <a id="imsRangeDatePickerClear" style="padding:5px;background-color:#f06595;color:white" type="button" onclick="onClearDateTime(\''+_messageElement_+'\')" ><i class="fa fa-close"></i></a>');
            if(_onloadFunctionCall_!=null){
                console.log("BACKEND CALL "+_SELECTED_DATERANGE_URL_);
                defineOnLoadFunctionCall(_onloadFunctionCall_, _SELECTED_DATERANGE_URL_); 
            }
            else{ console.log("NO FUNCTION DEFIND FOR DATE TIME RANGE BUTTONS"); }
        }
    });

    var urlDateFrom = formatDate(url_data_get['datefrom']).split("-");
    var urlDateTo = formatDate(url_data_get['dateto']).split("-");
    if((urlDateFrom[0]!="NaN"||urlDateFrom[1]!="NaN"||urlDateFrom[2]!="NaN"||urlDateTo[0]!="NaN"||urlDateTo[1]!="NaN"||urlDateTo[2]!="NaN")&&(_onloadFunctionCall_=="URL")){
        $('#'+_messageElement_).html('From '+dateToString(urlDateFrom).toUpperCase()+' - To '+dateToString(urlDateTo).toUpperCase());
    }
}


function onClearDateTime(_messageElement_){
     //defineOnLoadFunctionCall(_onloadFunctionCall_, _onloadFunctionArry_
    $('#'+_messageElement_).html('SEARCH BY DATE RANGE');
}

 
function searchCities(input) {
  var selectList = document.getElementById("selectList");
  removeOptions(selectList);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var city = JSON.parse(this.responseText);
          city.forEach(function(element){       
              var option = document.createElement("option");
              option.value = element.id; option.text = element.name;
              selectList.add(option)
          });
          selectList.style.display ="block";
      }
  }
  xmlhttp.open("GET", "http://10.62.96.6/esdb/ajax/func/search.city.name.php?name="+input.value, true);
  xmlhttp.send();
}

function validateCityID(val) {
  console.log("http://10.62.96.6/esdb/ajax/func/validate.city.name.php?id="+val);
  var city_msg = document.getElementById("city_message");
  var sel_view = document.getElementById("selectList");
  sel_view.style.display ="none";
  if(sel_view.options[sel_view.selectedIndex] !== undefined){
    document.getElementById("selectText").value = sel_view.options[sel_view.selectedIndex].text;
  }
  if(isNumeric(val)){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var msg = JSON.parse(this.responseText);
        city_msg.innerHTML = msg["1"];
      }
    };
    xhttp.open("GET", "http://10.62.96.6/esdb/ajax/func/validate.city.name.php?id="+val, true);
    xhttp.send();
  }
}
*/


function scrollTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}