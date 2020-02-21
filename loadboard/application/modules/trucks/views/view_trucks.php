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
                    <h2>Truck Search <small></small></h2>
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
                              <div class="col-md-10 col-sm-12 col-xs-12">
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

                            </p>
                          </div>
                          <div class="col-md-6 col-xs-12">

                            <div class="row">
                              <div class="col-md-10 col-sm-12 col-xs-12">
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
                            <div class="row">
                              <!-- <br> -->
                              <div class="col-md-12 col-sm-6 col-xs-12" style="margin-top: 15px; text-align: left;">
                                <!-- <button name="search_filter" type="button" class="btn btn-primary" style="font-size: 15px; padding: 12px 30px;">Search</button>
                                <button id="clearform" type="button" class="btn btn-Warning" style="font-size: 15px; padding: 12px 30px;">Clear Form</button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-xs-12" style="text-align: right;">
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
									<h2>Truck List <small></small></h2>
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
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
                                <th>Origin City</th>
                                <th>State</th>
                                <th>Destination City</th>
                      					<th>State</th>
                      					<th>Trip Miles</th>
                      					<th>Trailer Type</th>
                      					<!-- <th>Length</th>
                      					<th>Width</th>
                      					<th>Height</th>
                      					<th>Weight</th> -->
                      					<th>Ship Date</th>
                      					<th>Comments</th>
                      					<!-- <th>Category</th> -->
                      					<th>Actions</th>
                      					<!-- <th>Carrier</th> -->
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
     </div>
    </div>
