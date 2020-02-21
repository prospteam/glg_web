<!-- page content -->
<div class="right_col" role="main">
  <div class="">
     <div class="page-title">
        <div class="title_left">
         <!-- <h3>Load Search</h3> -->
        </div>
     </div>
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
              <div class="x_title">
                 <h2>Load Search <small></small></h2>
                   <!-- <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                       </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                   </ul> -->
                 <div class="clearfix"></div>
              </div>
              <div class="x_content">
                 <form id="search_form" data-parsley-validate method="post">
                    <div class="row">
                       <div class="col-md-6 col-xs-12">
                          <div class="row">
                             <div class="col-md-10 col-sm-6 col-xs-12">
                                <input type="hidden" name="uid" value="<?php if(!empty($uid)) {echo $uid;} ?>" >
                              <label class="label_custom" for="fullname">Origin</label>
                              <input type="text" id="origin" class="form-control" name="origin" value="<?php if(!empty($origin)) {echo $origin.", USA";} ?>" />
                             </div>
                             <!-- <div class="col-md-2">
                              <label for="fullname">Radius</label>
                              <input type="text" id="fullname" class="form-control" name="origin" required />
                             </div> -->
                          </div>
                          <br>
                          <div class="row">
                             <div class="col-md-5 col-sm-6 col-xs-12">
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
                              <!-- <input type="text" id="trailer_type" class="form-control" name="trailer_type" /> -->
                             </div>
                             <!-- <div class="col-md-4">
                              <label for="fullname">Load Size</label>
                              <select class="form-control" name="">
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                              </select>
                             </div> -->
                             <div class="col-md-5 col-sm-6 col-xs-12">
                                <label class="label_custom" for="fullname">Date Available</label>
                                <!-- <select class="form-control" name="">
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                </select> -->
                                <input type="date" id="ddatepicker" class="form-control" name="date_available" />
                             </div>
                          </div>
                       </div>
                          <div class="col-md-6 col-xs-12">
                             <div class="row">
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                   <label class="label_custom" for="">Destination</label>
                                   <input type="text" id="destination" class="form-control" name="destination" />
                                </div>
                                <!-- <div class="col-md-2">
                                <label for="fullname">Radius</label>
                                <select class="form-control" name="">
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                </select>
                                </div> -->
                             </div>
                             <br>
                             <div class="row">
                                <!-- <div class="col-md-6">
                              <label for="">Sort By</label>
                              <select class="form-control" name="">
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                                 <option value="">ASD</option>
                              </select>
                                </div> -->
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                   <label class="label_custom" for="commodity">Commodity:</label>
                                   <input type="text" id="commodity" class="form-control" name="commodity" />
                                 <!-- <br>
                                   <button name="search_filter" type="button" class="btn btn-primary" style="font-size: 15px; padding: 12px 30px;">Search</button> -->
                                </div>
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                   <label class="label_custom" for="reference">Reference Number:</label>
                                   <input type="text" id="reference" class="form-control" name="reference" />
                                 <!-- <br>
                                   <button name="search_filter" type="button" class="btn btn-primary" style="font-size: 15px; padding: 12px 30px;">Search</button> -->
                                </div>
                                <!-- <div class="col-md-2">
                                <label for=""></label>
                                <button name="load_submit" class="btn btn-primary">Validate form</button>
                                </div>
                                <div class="col-md-2">
                                <label for=""></label>
                                <button name="load_submit" class="btn btn-primary">Validate form</button>
                                </div> -->
                             </div>
                          </div>
                        <!-- <div class="col-md-6 col-offset-md-6 col-xs-12">
                           <button name="load_submit" class="btn btn-primary">Validate form</button>
                        </div> -->
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
     </div>
     <div class="clearfix"></div>
        <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                 <div class="x_title">
                    <h2>Loads <small></small></h2>
                    <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                    <div class="table-responsive" style="overflow: inherit;">
                             <!-- <table id="datatable_loads" class="table table-striped jambo_table bulk_action">
                                <thead>
                                   <tr class="headings">
                                      <th>
                                         <input type="checkbox" id="check-all" class="flat">
                                      </th>
                                      <th class="column-title">Origin</th>
                                      <th class="column-title">Destination</th>
                                      <th class="column-title">Trailer Type</th>
                                      <th class="column-title">Length</th>
                                      <th class="column-title">Width</th>
                                      <th class="column-title">Height</th>
                                      <th class="column-title">Weight</th>
                                      <th class="column-title">Date Available</th>
                                      <th class="column-title last">Comments</th>
                                      <th class="column-title last">Category</th>
                                      </th>
                                      <th class="bulk-actions" colspan="7">
                                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                   </tr>
                                </thead>

                                <tbody>
                                   <?php foreach($result as $key => $value): ?>
                                   <tr class="even pointer">
                                      <td class="a-center ">
                                         <input type="checkbox" class="flat" name="table_records">
                                      </td>
                                      <td class=" "><?php echo $value['origin']; ?></td>
                                      <td class=" "><?php echo $value['destination']; ?></td>
                                      <td class=" "><?php echo $value['trailer_type']; ?></td>
                                      <td class=" "><?php echo $value['length']; ?></td>
                                      <td class=" "><?php echo $value['width']; ?></td>
                                      <td class=" "><?php echo $value['height']; ?></td>
                                      <td class=" "><?php echo $value['weight']; ?></td>
                                      <td class=" "><?php echo $value['date_available']; ?></td>
                                      <td class=" "><?php echo $value['comments']; ?></td>
                                      <td class=" "><?php echo $value['category']; ?></td>
                                      </td>
                                   </tr>
                                <?php endforeach;?>
                                </tbody>
                             </table> -->
                       <form id="frm-example">
                         <button type="submit" class="btn btn-warning mr-1 btn-xs delete_loads" style="margin: 15px 0px; display: none;">Delete Selected Loads</button>
                         <span id="load_count"></span>
                         <input id="example-console-rows" type="hidden" name="dl_loads" value="">
                         <pre id="example-console-form" style="display: none;"></pre>
                       <table id="datatable_loadsx" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                          <thead>
                                   <tr class="headings">
                                  <th></th>
                                  <th>Origin City</th>
                                  <th>State</th>
                                  <th>Destination City</th>
                                      <th>State</th>
                                      <th>Trailer Type</th>
                                      <th>Ship Date</th>
                                      <th>Length</th>
                                      <th>Width</th>
                                      <th>Height</th>
                                      <th>Weight</th>
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
                       </form>
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
     <!-- end of send a rate modal -->

     <!-- edit load modal -->
     <!-- <div class="modal fade bs-example-modal-load" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content modal-content-custom">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h5 class="modal-title" id="myModalLabel">Edit Load</h5>
              </div>
              <form id="edit-load-form" data-parsley-validate method="post">
                 <div class="modal-body">
                    <div class="row">
                       <div class="col-md-6 col-xs-12">
                          <label for="fullname">Origin</label>
                          <input type="text" id="fullname" class="form-control" name="origin" required />
                          <br>
                          <label>Trailer Type</label>
                          <p>
                             <div class="row">
                             <div class="col-md-4 col-sm-4 col-xs-12">

                                <input id="V" type="radio" class="flat" name="trailer_type" value="v"/><label for="V">V (Dry Van)</label> <br>
                                <input id="MX" type="radio" class="flat" name="trailer_type" value="MX" /><label for="MX">MX (Maxi Flat)</label> <br>
                                <input id="LB" type="radio" class="flat" name="trailer_type" value="Lowboy" /><label for="LB">LB (Lowboy)</label> <br>
                                <input id="FINT" type="radio" class="flat" name="trailer_type" value="FINT" /><label for="FINT">FINT (Flat-Intermodal)</label> <br>
                                <input id="VA" type="radio" class="flat" name="trailer_type" value="VA" /><label for="VA">VA (Van+Airride)</label> <br>
                                <input id="LA" type="radio" class="flat" name="trailer_type" value="LA" /><label for="LA">LA (Landal)</label> <br>
                                <input id="RINT" type="radio" class="flat" name="trailer_type" value="RINT" /><label for="RINT">RINT (Reefer-Intermodal)</label> <br>
                                <input id="DT" type="radio" class="flat" name="trailer_type" value="DT" /><label for="DT">DT (Dump Trailer)</label> <br>
                                <input id="CONT" type="radio" class="flat" name="trailer_type" value="CONT" /><label for="CONT">CONT (Container)</label> <br>
                             </div>
                             <div class="col-md-4 col-sm-4 col-xs-12">
                                <input id="VINT" type="radio" class="flat" name="trailer_type" value="VINT"/><label for="VINT">VINT (Van-Intermodal)</label> <br>
                                <input id="HS" type="radio" class="flat" name="trailer_type" value="HS" /><label for="HS">HS (Hotshot)</label> <br>
                                <input id="FT" type="radio" class="flat" name="trailer_type" value="FT" /><label for="FT">FT (Flat+Tarp)</label> <br>
                                <input id="DD" type="radio" class="flat" name="trailer_type" value="DD" /><label for="DD">DD (Double Drop)</label> <br>
                                <input id="CRG" type="radio" class="flat" name="trailer_type" value="CRG" /><label for="CRG">CRG (Cargo Van)</label> <br>
                                <input id="PO" type="radio" class="flat" name="trailer_type" value="PO" /><label for="PO">PO (Power Only)</label> <br>
                                <input id="RGN" type="radio" class="flat" name="trailer_type" value="RGN" /><label for="RGN">RGN (Removable Gooseneck)</label> <br>
                                <input id="Tanker" type="radio" class="flat" name="trailer_type" value="TNK" /> <label for="Tanker">Tanker</label> <br>
                                <input id="PNEU" type="radio" class="flat" name="trailer_type" value="PNEU" /><label for="PNEU">PNEU (Pneumatic)</label> <br>
                             </div>
                             <div class="col-md-4 col-sm-4 col-xs-12">
                                <input id="SD" type="radio" class="flat" name="trailer_type" value="SD"/> <label for="SD">SD (Step Deck/Single Drop)</label> <br>
                                <input id="AC" type="radio" class="flat" name="trailer_type" value="AC" /><label for="AC">AC (Auto Carrier)</label> <br>
                                <input id="F" type="radio" class="flat" name="trailer_type" value="F" /><label for="F">F (Flatbed)</label> <br>
                                <input id="W" type="radio" class="flat" name="trailer_type" value="VV" /><label for="W">VV (Van+Vented)</label> <br>
                                <input id="HB" type="radio" class="flat" name="trailer_type" value="HB" /><label for="HB">HB (Hopper Bottom)</label> <br>
                                <input id="R" type="radio" class="flat" name="trailer_type" value="R" /><label for="R">R (Reefer)</label> <br>
                                <input id="CV" type="radio" class="flat" name="trailer_type" value="CV" /><label for="CV">Curtain Van</label> <br>
                                <input id="FS" type="radio" class="flat" name="trailer_type" value="FS" /><label for="FS">FS (Flat+Sides)</label> <br>
                                <input id="Other" type="radio" class="flat" name="trailer_type" value="Other" /> <label for="Other">Other</label> <br>
                             </div>
                           </div>
                          </p>
                       </div>
                       <div class="col-md-6 col-xs-12">
                          <label for="">Destination</label>
                          <input type="text" class="form-control" name="destination" required />
                          <br>
                          <label for="fullname">Size</label>
                          <div class="form-group">
                             <div class="col-md-3 col-xs-12 col-sm-12">
                                <div class="form-group">
                                   <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12 ">Length: </label>
                                   <div class="col-md-6 col-sm-12 col-xs-12">
                                      <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="length">
                                  </div>
                                </div>
                             </div>
                             <div class="col-md-3 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12">Width: </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="width">
                                  </div>
                                </div>
                             </div>
                             <div class="col-md-3 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12">Height: </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="height">
                                  </div>
                                </div>
                             </div>
                             <div class="col-md-3 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12">Weight: </label>
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="weight">
                                  </div>
                                </div>
                             </div>
                             <br><br><br>
                             <label for="fullname">Date</label>
                             <input type="date" id="fullname" class="form-control" name="date" required />
                             <br>
                             <label for="fullname">Comments</label>
                             <textarea id="fullname" class="form-control" name="comments" required ></textarea>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                    <button type="submit" name="edit_load_submit" style="background-color: #0e7ccc;" class="btn btn-primary">Appoint Carrier</button>
                 </div>
              </form>
           </div>
        </div>
     </div>-->
  </div>
</div>
