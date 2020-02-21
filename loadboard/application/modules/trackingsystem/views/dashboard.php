        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>Plain Page</h3> -->
              </div>
              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tracking System</h2>
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
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dashboard</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Loadboards</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab_content1" aria-labelledby="home-tab">
                          <p>Under Development </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        