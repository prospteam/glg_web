<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
        <div class="title_left">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>My Rates <small></small></h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="table-responsive" style="overflow: inherit;">
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
                                 <th>Trip Miles</th>
                                 <th>Trailer Type</th>
                                 <th>Ship Date</th>
                                 <th>Length</th>
                                 <th>Weight</th>
                                 <th>Rate</th>
                                 <th>Commodity</th>
                                 <th>Reference Number</th>
                                 <th>Comments</th>
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
                           <tbody></tbody>
                        </table>
                     </form>
                  </div>
               </div>
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
                                   <input id="rate" type="number" name="rate" step="any" class="form-control rate-input" value="" placeholder="Enter Your Rate" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="name" class="label-on-left-mod">Name:
                                   <input id="name" type="text" name="name" class="form-control rate-input" value="<?php echo $this->session->userdata('user_session')->username; ?>" readonly placeholder="Enter Your Name" required>
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="conname" class="label-on-left-mod">Contact Name:
                                   <input id="conname" type="text" name="contact_name" class="form-control rate-input"  value="" placeholder="Enter Your Contact Name" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="contact" class="label-on-left-mod">Contact Number:
                                   <input id="contact" type="number" name="contact" class="form-control rate-input"  value="" placeholder="Enter Your Contact Number" required>
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="form-group row">
                          <div class="col-md-12">
                             <button type="submit" class="btn-sm btn btn-primary send_edited_email" style="margin: 2% 0%;">Send Email</button>
                          </div>
                       </div>
                    </form>
                 </div>
           </div>
        </div>
     </div>
     <!-- end of send a rate modal -->

     <!-- edit a rate modal -->
     <div class="modal fade bs-example-modal-lg4 rate_modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
           <div class="modal-content modal-content-custom">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h5 class="modal-title" id="myModalLabel">Send A Rate To Broker </h5>
              </div>
                 <div class="modal-body info_rate" style="text-align: center;">
                    <form action="<?php echo base_url(); ?>loads/sendrate" method="post">
                       <input type="hidden" id="e_s_id" name="shipper_uid" value=""/>
                       <input type="hidden" id="e_load_id" name="load_id" value=""/>
                       <input type="hidden" id="e_rate_id" name="rate_id" value=""/>
                       <input type="hidden" id="edited" name="edited" value="1"/>
                       <!-- <input type="hidden" id="u_id" name="user_id" value="</?php echo $this->session->userdata('user_session')->user_id; ?>"/> -->
                       <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="e_rate" class="label-on-left-mod">Rate:
                                   <input id="e_rate" type="number" step="any" name="e_rate" class="form-control rate-input" value="" placeholder="Enter Your Rate" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="e_name" class="label-on-left-mod">Name:
                                   <input id="e_name" type="text" name="name" class="form-control rate-input" value="<?php echo $this->session->userdata('user_session')->username; ?>" readonly placeholder="Enter Your Name" required>
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="e_conname" class="label-on-left-mod">Contact Name:
                                   <input id="e_conname" type="text" name="e_contact_name" class="form-control rate-input"  value="" placeholder="Enter Your Contact Name" required>
                                </label>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label for="e_contact" class="label-on-left-mod">Contact Number:
                                   <input id="e_contact" type="number" name="e_contact" class="form-control rate-input"  value="" placeholder="Enter Your Contact Number" required>
                                </label>
                             </div>
                          </div>
                       </div>
                       <div class="form-group row">
                          <div class="col-md-12">
                             <button type="submit" class="btn-sm btn btn-primary send_email" style="margin: 2% 0%;">Update Email</button>
                          </div>
                       </div>
                    </form>
                 </div>
           </div>
        </div>
     </div>
   </div>
</div>
