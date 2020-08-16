
    <div class="modal-popup-body tab-animate-top">
        <div class="modal-popup-head">
            <p class="modal-popup-close" onclick="closePopUp()">X</p>
            <p>Validate the Interface and Subinterface Description</p>
        </div>
        <div class="modal-popup-content">
            <p id="ims_add_new_incident_header_massage"></p>
            <div class="modal-form-body" id="map_incident_add_new_form">
                <form class="modal-form" name="map_incident">
                    <h3>Validate the Interface and Subinterface Description ( Please fill the form )</h3>
                    <table width="96%" border="0" style="margin-top:28px;">
                        <tbody>                            
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;">
                                    <p style="margin-top:-16px;float: left;">Select the Validation Type : <i id="in_cx_ref"></i></p><br>
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Network Node Format :</option>
                                            <option value="SUB_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB Interface (L2/L3)</option>
                                            <option value="MGT_INT_CX_P2P">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer ( P2P )</option>
                                            <option value="MGT_INT_BASE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Base Station ( P2MP )</option>
                                            <option value="MGT_INT_CX_LOC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer Location Device</option>
                                            <option value="CSR_SW_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Directly Connected ( P2P/P2MP )</option>
                                            <option value="CSR_SW_INT_TX_NODE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Connected to TX Node ( Site Backhauling )</option>
                                            <option value="TX_NODE_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TX Node Interface</option>
                                            <option value="CSR_SER_INT_BE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on BE ( P2P/P2MP )</option>
                                            <option value="CSR_SER_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on CSR ( P2P/P2MP )</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface ( Redundant )</option>
                                            <option value="AGG_SER_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG Service Instance (L2/L3)</option>
                                            <option value="AGG_XC_GROUP_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG XC Group Name</option>
                                            <option value="AGG_P2P_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG P2P Name</option>
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Customer Router Format :</option>
                                            <option value="UPLINK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router UPLINK</option>
                                            <option value="WAN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router WAN</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>  
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;">
                                    <p style="margin-top:-16px;float: left;">Select the Validation Type : <i id="in_cx_ref"></i></p><br>
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Network Node Format :</option>
                                            <option value="SUB_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB Interface (L2/L3)</option>
                                            <option value="MGT_INT_CX_P2P">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer ( P2P )</option>
                                            <option value="MGT_INT_BASE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Base Station ( P2MP )</option>
                                            <option value="MGT_INT_CX_LOC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer Location Device</option>
                                            <option value="CSR_SW_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Directly Connected ( P2P/P2MP )</option>
                                            <option value="CSR_SW_INT_TX_NODE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Connected to TX Node ( Site Backhauling )</option>
                                            <option value="TX_NODE_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TX Node Interface</option>
                                            <option value="CSR_SER_INT_BE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on BE ( P2P/P2MP )</option>
                                            <option value="CSR_SER_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on CSR ( P2P/P2MP )</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface ( Redundant )</option>
                                            <option value="AGG_SER_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG Service Instance (L2/L3)</option>
                                            <option value="AGG_XC_GROUP_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG XC Group Name</option>
                                            <option value="AGG_P2P_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG P2P Name</option>
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Customer Router Format :</option>
                                            <option value="UPLINK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router UPLINK</option>
                                            <option value="WAN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router WAN</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>                            
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;">
                                    <p style="margin-top:-16px;float: left;">Select the Validation Type : <i id="in_cx_ref"></i></p><br>
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Network Node Format :</option>
                                            <option value="SUB_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUB Interface (L2/L3)</option>
                                            <option value="MGT_INT_CX_P2P">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer ( P2P )</option>
                                            <option value="MGT_INT_BASE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Base Station ( P2MP )</option>
                                            <option value="MGT_INT_CX_LOC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management Interface for Customer Location Device</option>
                                            <option value="CSR_SW_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Directly Connected ( P2P/P2MP )</option>
                                            <option value="CSR_SW_INT_TX_NODE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR/SW Interface CSR Connected to TX Node ( Site Backhauling )</option>
                                            <option value="TX_NODE_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TX Node Interface</option>
                                            <option value="CSR_SER_INT_BE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on BE ( P2P/P2MP )</option>
                                            <option value="CSR_SER_INT_CSR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CSR Service Instance Terminated on CSR ( P2P/P2MP )</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface</option>
                                            <option value="COM_INT" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Common Interface ( Redundant )</option>
                                            <option value="AGG_SER_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG Service Instance (L2/L3)</option>
                                            <option value="AGG_XC_GROUP_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG XC Group Name</option>
                                            <option value="AGG_P2P_INT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGG P2P Name</option>
                                            <option value="-1" disabled="true" style="color:#000; font-weight:bolder;">Customer Router Format :</option>
                                            <option value="UPLINK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router UPLINK</option>
                                            <option value="WAN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer Router WAN</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" oninput="onTypeCustomerReference()" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Name : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" oninput="onTypeCustomerReference()" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border-style: none !important; padding: 10px;"></td>
                                <td width="25%" style="border-style: none !important; padding: 10px;"></td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <table width="96%" border="0" style="margin-top:10px;">
                        <tbody>
                            <tr>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" oninput="onTypeCustomerReference()" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" oninput="onTypeCustomerReference()" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Name : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" oninput="onTypeCustomerReference()" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <p style="padding-bottom:15px;float: left;">Customer Reference : <i id="in_cx_ref"></i></p>
                                        <input class="form-control" name="in_cx_ref" type="text">
                                    </fieldset>
                                </td>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset>
                                        <select class="form-control" id="dashboard-report-date" >
                                            <option value="-1">- SELECT -</option>
                                        </select>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <td width="25%" style="border-style: none !important; padding: 10px;">
                                    <fieldset><a class="btn btn-info" id="in_add_order_button" onclick="onSubmitnEWIncidenForm()" style="display: none;">Add New Incident</a></fieldset>
                                </td>
                                <td style="border-style: none !important; padding: 10px;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="btn btn-info" style="padding:15px; margin-left:15px;margin-top:25px;" onclick="closePopUp()"> Close Window </p>
                    <br>
                </form>
            </div>
        </div>
    </div>