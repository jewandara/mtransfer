<div class="row" style="padding:20px; min-height:550px">
    <div class="col-lg-2 tab-bar-block tab-dark-grey tab-padding">
        <h6 class="tab-bar-item" style="color:#343a40 !important;" >CUSTOMER BASE</h6>

        <a id="tab-cust-butn-customer-id" class="tab-bar-item tab-button tab-link-cust" onclick="loadSubTabViewEsdb(event, 'cust-tab-customer')">
            <b>CUSTOMERS</b><br>
        </a>
        <a id="tab-cust-butn-location-id"  class="tab-bar-item tab-button tab-link-cust" onclick="loadSubTabViewEsdb(event, 'cust-tab-location')">
            <b>LOCATIONS</b><br><!-- <i>099343234</i> -->
        </a>
        <a id="tab-cust-butn-solution-id"  class="tab-bar-item tab-button tab-link-cust" onclick="loadSubTabViewEsdb(event, 'cust-tab-solution')">
            <b>SOLUTIONS</b><br>
        </a>
        <a id="tab-cust-butn-diagram-id"  class="tab-bar-item tab-button tab-link-cust" onclick="loadSubTabViewEsdb(event, 'cust-tab-diagram')">
            <b>DIAGRAM</b><br><!-- <i>099343234</i> -->
        </a>
    </div>
    <div class="col-lg-10">
      <div class="tab-padding tab-light-blue" style="padding-left: 20px;">Enterprise Solution Customer Database</div>
      <div id="cust-tab-customer" class="tab-container customers tab-animate-opacity" style="display:none">
            <h4 style="padding:10px;">Customer Database</h4>
            <div class="dataTables-buttons">
                <a onclick="newCustomerTab()" class="dataTables-buttons-data dataTables-buttons-but btn-success text-center" style="color:#fff"><span>NEW CUSTOMER</span>
                </a>
                <select name="customer-base-select-active" class="dataTables-buttons-data dataTables-buttons-selet">
                    <option value="active">active</option>
                    <option value="de-active">de-active</option>
                </select>
            </div>
            <table id='customer-base-grid' class='table table-bordered table-hover table-sm' style="font-size: 14px" >
                <thead class="thead-dark" style="display:table-header-group; font-size:14px; height:42px;">
                    <tr>
                        <th class="small-th" >#CODE</th>
                        <th class="small-th" >#TAG</th>
                        <th class="small-th" >Customer Name</th>
                        <th class="small-th" >Customer Email</th>
                        <th class="small-th" >Customer Header</th>
                        <th class="small-th"  width="120px;">Actions</th>
                    </tr>
                </thead>
            </table>
      </div>
      <div id="cust-tab-location" class="tab-container customers tab-animate-opacity" style="display:none">
            <h4 style="padding:10px;">Customer Location Database</h4>
            <div class="dataTables-buttons">
                <a onclick="loadPopUp('bulk_upload')" class="dataTables-buttons-data dataTables-buttons-but btn-success text-center" style="color:#fff"><span> UPLOAD BULK </span>
                </a>
                <select name="location-base-select-active" class="dataTables-buttons-data dataTables-buttons-selet">
                    <option value="active">active</option>
                    <option value="de-active">de-active</option>
                </select>
            </div>
            <table id='location-base-grid' class='table table-bordered table-hover table-sm' style="font-size: 14px" >
                <thead class="thead-dark" style="display:table-header-group; font-size:14px; height:42px;">
                    <tr>
                        <th class="small-th" >#CODE</th>
                        <th class="small-th" >#TAG</th>
                        <th class="small-th" >Customer Name</th>
                        <th class="small-th" >Customer Email</th>
                        <th class="small-th" Customer Header</th>
                        <th width="120px;">Actions</th>
                    </tr>
                </thead>
            </table>
      </div>
      <div id="cust-tab-solution" class="tab-container customers tab-animate-zoom" style="display:none">
            <img src="http://sira.dialog.lk/api.sira/img/under_construction.png" alt="Call Me If You Can't Wait" style="display:block;margin-left:auto;margin-right:auto;width:50%;">
      </div>
      <div id="cust-tab-diagram" class="tab-container customers tab-animate-zoom" style="display:none">
            <img src="http://sira.dialog.lk/api.sira/img/under_construction.png" alt="Call Me If You Can't Wait" style="display:block;margin-left:auto;margin-right:auto;width:50%;">
      </div>
    </div>
</div>

