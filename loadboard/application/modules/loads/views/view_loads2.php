
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Load Search</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Load Search <small></small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
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
                    </ul>
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
                              <!-- <div class="col-md-2">
                                <label for="fullname">Radius</label>
                                <input type="text" id="fullname" class="form-control" name="origin" required />
                              </div> -->
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label for="fullname">Trailer Type</label>
                                <!-- <select class="form-control" name="">
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                </select> -->
                                <input type="text" id="trailer_type" class="form-control" name="trailer_type" />
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
                              <div class="col-md-4">
                                <label for="fullname">Ship Date</label>
                                <!-- <select class="form-control" name="">
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                  <option value="">ASD</option>
                                </select> -->
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
                              <div class="col-md-2">
                                <label for=""></label>
                                <br>
                                <button name="search_filter" type="button" class="btn btn-primary">Search</button>
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
										<table id="datatable_loadsx" class="table table-striped jambo_table bulk_action">
                        <thead>
  												<tr class="headings">
                      					<th>Origin</th>
                      					<th>Destination</th>
                      					<th>Trailer_type</th>
                      					<th>Date available</th>
                      					<th>Length</th>
                      					<th>Width</th>
                      					<th>Height</th>
                      					<th>Weight</th>
                      					<th>Date available</th>
                      					<th>Comments</th>
                      					<th>Category</th>
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
