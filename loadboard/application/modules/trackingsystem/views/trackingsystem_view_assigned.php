<!-- page content -->
<div class="right_col" role="main">
  <div class="">
     <div class="page-title">
        <div class="title_left">
         <!-- <h3>Load Search</h3> -->
        </div>
     </div>
     <!-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
              <div class="x_title">
                 <h2>Load Search <small></small></h2>
                 <div class="clearfix"></div>
              </div>
              <div class="x_content">
                 <form id="search_form" data-parsley-validate method="post">
                    <div class="row">
                       <div class="col-md-6 col-xs-12">
                          <div class="row">
                             <div class="col-md-10">
                                <input type="hidden" name="uid" value="<?php if(!empty($uid)) {echo $uid;} ?>" >
                               <label class="label_custom" for="fullname">Origin</label>
                               <input type="text" id="origin" class="form-control" name="origin" value="<?php if(!empty($origin)) {echo $origin.", USA";} ?>" />
                             </div>
                          </div>
                          <br>
                          <div class="row">
                             <div class="col-md-5">
                                <label class="label_custom" for="fullname">Trailer Type</label>
                                <select id="trailer_type" class="form-control" name="trailer_type">
                                 <option value="">Choose type...</option>
                                 <option value="V">V (Dry Van)</option>
                                 <option value="MX">MX (Maxi Flat)</option>
                                 <option value="LB">LB (Lowboy)</option>
                                 <option value="FINT">FINT (Flat-Intermodal)</option>
                                 <option value="VA">VA (Van+Airride)</option>
                                 <option value="LA">LA (Landal)</option>
                                 <option value="RINT">RINT (Reefer-Intermodal)</option>
                                 <option value="DT">DT (Dump Trailer)</option>
                                 <option value="CONT">CONT (Container)</option>
                                 <option value="VINT">VINT (Van-Intermodal)</option>
                                 <option value="HS">HS (Hotshot)</option>
                                 <option value="FT">FT (Flat+Tarp)</option>
                                 <option value="DD">DD (Double Drop)</option>
                                 <option value="CRG">CRG (Cargo Van)</option>
                                 <option value="PO">PO (Power Only)</option>
                                 <option value="RGN">RGN (Removable Gooseneck)</option>
                                 <option value="TNK">TNK (Tanker)</option>
                                 <option value="PNEU">PNEU (Pneumatic)</option>
                                 <option value="SD">SD (Step Deck/Single Drop)</option>
                                 <option value="AC">AC (Auto Carrier)</option>
                                 <option value="F">F (Flatbed)</option>
                                 <option value="VV">VV (Van+Vented)</option>
                                 <option value="HB">HB (Hopper-Bottom)</option>
                                 <option value="R">R (Reefer)</option>
                                 <option value="CV">CV (Curtain Van)</option>
                                 <option value="FS">FS (Flat+Sides)</option>
                                 <option value="Other">Other</option>
                               </select>
                             </div
                             </div>
                             <div class="col-md-5">
                                <label class="label_custom" for="fullname">Date Available</label>
                                <input type="date" id="ddatepicker" class="form-control" name="date_available" />
                             </div>
                          </div>
                       </div>
                          <div class="col-md-6 col-xs-12">
                             <div class="row">
                                <div class="col-md-10">
                                   <label class="label_custom" for="">Destination</label>
                                   <input type="text" id="destination" class="form-control" name="destination" />
                                </div>
                             </div>
                             <br>
                             <div class="row">
                                <div class="col-md-5">
                                   <label class="label_custom" for="commodity">Commodity:</label>
                                   <input type="text" id="commodity" class="form-control" name="commodity" />
                                </div>
                                <div class="col-md-5">
                                   <label class="label_custom" for="reference">Reference Number:</label>
                                   <input type="text" id="reference" class="form-control" name="reference" />
                             </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12" style="text-align: right;">
                        <hr>
                          <button name="search_filter" type="button" class="btn btn-primary" style="font-size: 15px; padding: 8px 30px;">Search</button>
                          <button id="clearform" type="button" class="btn btn-Warning" style="font-size: 15px; padding: 8px 30px;">Clear</button>
                      </div>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div> -->
     <div class="clearfix"></div>
        <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
           <div class="x_title">
             <h2>Loads <small></small></h2>
             <div class="clearfix"></div>
           </div>
           <div class="x_content">
              <div class="table-responsive">

                <table id="datatable_loadsx" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                          <thead>
                            <tr class="headings">
                                  <th>Origin City</th>
                                  <th>State</th>
                                  <th>Destination City</th>
                                 <th>State</th>
                                 <th>Trailer Type</th>
                                 <th>Ship Date</th>
                                 <th>Length</th>
                                      <th>Weight</th>
                                 <!-- <th>Width</th>
                                 <th>Height</th> -->
                                 <th>Rate</th>
                                 <th>Commodity</th>
                                 <th>Reference Number</th>
                                 <th>Comments</th>
                                 <!-- <th>Category</th> -->
                                  <?php if(empty($this->session->userdata('carrier_status'))){ ?>
                                     <th>Carrier</th>
                                  <?php }?>

                                  <?php if(!empty($this->session->userdata('carrier_status'))){?>
                                  <th>Contact</th>
                                  <?php } else{?>
                                  <th>Actions</th>
                                  <?php } ?>
                             </tr>
                          </thead>
                         <tbody>
                         </tbody>
                       </table>
             </div>
            </div>
         </div>
       </div>
        </div>
       <!-- /page content -->
     <!-- select carrier modal -->
     <div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content modal-content-custom">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h5 class="modal-title" id="myModalLabel">Carrier Selection</h5>
              </div>
              <form method="post">
                 <div class="modal-body">
                    <div class="row">
                       <div class="col-md-offset-3 col-md-6">
                          <!-- <div class="select2-wrapper"> -->
                          <input type="hidden" name="load_id_row" value="">
                          <label> Carrier</label>
                          <select class="form-control input-lg select_shipper" name="carrier_id">
                          </select>
                          <!-- </div> -->
                       </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    <button type="submit" name="appoint" style="background-color: #0e7ccc;" class="btn btn-primary appoint_carrier">Appoint Carrier</button>
                 </div>
              </form>
           </div>
        </div>
     </div>
     <!-- broker info -->
     <div class="modal fade bs-example-modal-lg2 shipper_info" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content modal-content-custom">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h5 class="modal-title" id="myModalLabel">Broker info</h5>
              </div>
                 <div class="modal-body info_shipper" style="text-align: center;">
                 </div>
           </div>
        </div>
     </div>
     <!-- end of broker info modal -->

     <!-- send a rate modal -->
     <div class="modal fade bs-example-modal-lg3 rate_modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content modal-content-custom">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h5 class="modal-title" id="myModalLabel">Send A Rate To Broker </h5>
              </div>
                 <div class="modal-body info_rate" style="text-align: center;">
                    <form action="<?php echo base_url(); ?>loads/sendrate" method="post">
                       <input type="hidden" id="s_id" name="shipper_uid" value=""/>
                       <input type="hidden" id="load_id" name="load_id" value=""/>
                       <!-- <input type="hidden" id="u_id" name="user_id" value="</?php echo $this->session->userdata('user_session')->user_id; ?>"/> -->
                       <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="rate" class="label-on-left-mod">Rate:
                                   <input id="rate" type="text" name="rate" class="form-control rate-input" value="" placeholder="Enter Your Rate" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="name" class="label-on-left-mod">Name:
                                   <input id="name" type="text" name="name" class="form-control rate-input" value="" placeholder="Enter Your Name" required>
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="contact" class="label-on-left-mod">Contact Number:
                                   <input id="contact" type="text" name="contact" class="form-control rate-input"  value="" placeholder="Enter Your Contact Number" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="load_info" class="label-on-left-mod">Target Load:
                                   <input id="load_info" type="text" name="target_load" class="form-control rate-input" placeholder="Enter The Load">
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="form-group row">
                          <div class="col-md-12">
                             <button type="submit" class="btn-sm btn btn-primary send_email" style="margin: 2% 0%;">Send Email</button>
                          </div>
                       </div>
                    </form>
                 </div>
           </div>
        </div>
     </div>
  </div>
</div>