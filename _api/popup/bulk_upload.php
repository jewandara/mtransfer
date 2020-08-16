<div class="modal-popup-body tab-animate-top">
    <div class="modal-popup-head">
        <p class="modal-popup-close" onclick="closePopUp()">X</p>
        <p> <i class="fa fa-file-excel-o"></i> Bulk Upload Customer Locations</p>
    </div>
    <div class="modal-popup-content">
        <p></p>
        <div class="modal-form-body" >



        <form class="modal-form" name="bulk_upload_excel">
            <h3> Please select to upload excel sheet of customer locations ( Please follow the below steps. )</h3>

            <ul>
              <li>Please check the bellow <u>standard address</u>
                <table style="font-size:11px; width:450px;">
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">33/A ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Address number )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">2nd Floor ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Floor number of the building )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">Parkland Building ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Building name )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">Park Street ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Street name )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">Gangarama ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( First city name )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">Colombo 2 ,</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Second city name or district name if has any )</font></th>
                    </tr>
                    <tr>
                        <th><i style="text-align:left;float:left;padding-left:10px;">00200</i></th>
                        <th><font style="color:#3565b2;text-align:left;float:left;padding-left:10px;">( Post code number )</font></th>
                    </tr>
                </table>
              </li>
              <li>Download the example of the bellow sample excel file. <a  href="http://sira.dialog.lk/API.SIRA/files/sample.xlsx" class="btn-success" style="padding:2px;border-radius:4px;">Download Sample Excel File</a></li>
              <li>Delete First example row given in the downloaded sample excel file.</li>
              <li>Fill the excel file with customer location details.</li>
              <li>Select the bellow dropdown box to choose the right customer.</li>
              <li>Upload the excel file by clicking the <img src="http://sira.dialog.lk/API.SIRA/img/upload_button_view.png"> button bellow.</li>
              <li>Click the submit button to upload the excel file data.</li>
              <li>The system will check the excel data and give you the location report.</li>
            </ul>



            <hr>
            <h4><b>Please select to upload</b></h4>
            <div id="esdb-excel-out-message"></div>
            <select name="customer-names" class="NumberSelect form-control" style="width:50%">
                <option value="-1" selected disabled> - CUSTOMER NAME - </option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select>
            <br>
            <br>
            <input type="file" name="excel" class="excel" id="esdb-excel" required>
            <br>
            <a onclick="loadExcel('esdb', 'esdb-excel-out-message')" class="btn btn-info" style="padding:10px;margin-top:20px;" >
                UPLOAD EXCEL
            </a>
        </form>






        </div>
    </div>
</div>