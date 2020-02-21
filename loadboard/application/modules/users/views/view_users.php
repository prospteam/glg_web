
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

                      <form id="demo-form" data-parsley-validate method="post">
                        <div class="row">
                          <div class="col-md-6 col-xs-12">
                            <div class="row">
                              <div class="col-md-10">
                                <label for="fullname">Origin</label>
                                <input type="text" id="origin" class="form-control" name="origin" />
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5">
                                <label for="fullname">Trailer Type</label>
                                <input type="text" id="trailer_type" class="form-control" name="trailer_type" />
                              </div>
                              <div class="col-md-5">
                                <label for="fullname">Ship Date</label>
                                <input type="text" id="date_available" class="form-control" name="date_available" />
                              </div>
                            </div>

                            </p>
                          </div>
                          <div class="col-md-6 col-xs-12">

                            <div class="row">
                              <div class="col-md-10">
                                <label for="">Destination</label>
                                <input type="text" id="destination" class="form-control" name="destination" />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                                <label for=""></label>
                                <br><br>
                                <button name="search_filter" type="button" class="btn btn-primary" style="margin-top: 5px;">Search</button>
                              </div>
                            </div>
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
									<h2>Registered Users <small></small></h2>
									<div class="clearfix"></div>
								</div>

						<div class="x_content">
                     <div class="row">
                        <?php if($this->session->userdata('user_session')->user_type=="admin"){ ?>
                        <div class="col-xs-12">
                           <div class="pull-right" style="margin-top: -8px;">
                              <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#addBroker" name="button">Add New Broker</button>
                           </div>
                        </div>
                     <?php } ?>
                  <div class="col-xs-12">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    
                      <li role="presentation" class="active">
                        <a href="#tab_content1" class="datatable_dynamic_tabs" role="tab" id="all-tab" data-toggle="tab" data-user_type="all">All Users</a>
                      </li>

                      <?php if($this->session->userdata('user_session')->user_type=="admin"){ ?>
                        <li role="presentation" class="">
                          <a href="#tab_content3" class="datatable_dynamic_tabs" role="tab" id="bro-tab" data-toggle="tab" data-user_type="broker">Brokers</a>
                        </li>
                      <?php } ?>

                      <li role="presentation" class="">
                        <a href="#tab_content2" class="datatable_dynamic_tabs" role="tab" id="shi-tab" data-toggle="tab" data-user_type="shipper">Shippers</a>
                      </li>

                      <li role="presentation" class="">
                        <a href="#tab_content3" class="datatable_dynamic_tabs" role="tab" id="car-tab" data-toggle="tab" data-user_type="carrier">Carriers</a>
                      </li>

                    </ul>
                  </div>
									<div class="table-responsive">
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
										<table id="datatable_loadsx" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                        <thead>
  												<tr class="headings">
                      					<th>First Name</th>
                      					<th>Last Name</th>
                      					<th>Email</th>
                      					<th>Address</th>
                      					<th>Contact Number</th>
                      					<th>User Type</th>
                      					<th>Status</th>
                      					<th>Date Added</th>
                      					<th>Actions</th>
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
						</div>

            </div>

        <!-- /page content -->

        <!-- modal -->
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
               <button type="submit" name="appoint" style="background-color: #0e7ccc;" class="btn btn-primary">Appoint Carrier</button>
              </div>
              </form>
           </div>
          </div>
        </div>

        <!-- modal -->
      <div class="modal fade bs-example-modal-lg" id="addBroker" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content modal-content-custom">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                  <h5 class="modal-title" id="myModalLabel">New Broker Info</h5>
               </div>
               <form action="<?php echo base_url(); ?>/users/add_broker" method="post">
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 registerform">
                           <div class="row row-mod">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                                 <div class="form-group form-group-mod">
                                    <input type="text" tabindex="1" name="fname" class="form-control" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" placeholder="First Name" required>
                                 </div>
                                 <div class="form-group-mod">
                                    <input type="text" tabindex="3" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" class="form-control" placeholder="Username" required>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                                 <div class="form-group form-group-mod">
                                    <input type="text" tabindex="2" name="lname" class="form-control" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" placeholder="Last Name" required>
                                 </div>
                                 <div class="form-group form-group-mod">
                                    <input type="password" tabindex="4" name="password" class="form-control" placeholder="Password" required>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                                 <div class="form-group form-group-mod">
                                    <input type="text" tabindex="6" name="cnumber" value="<?php if(isset($_POST['cnumber'])){echo $_POST['cnumber'];} ?>" class="form-control" placeholder="Contact Number" required>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                                 <div class="form-group form-group-mod">
                                    <input type="email" tabindex="7" name="emailadd" value="<?php if(isset($_POST['emailadd'])){echo $_POST['emailadd'];}?>" class="form-control" placeholder="Email Address" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                     <button type="submit" name="add_broker" style="background-color: #0e7ccc;" class="btn btn-primary">Add New Broker</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
     </div>
   </div>
