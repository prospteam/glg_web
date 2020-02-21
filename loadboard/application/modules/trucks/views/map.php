

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <!-- <div class="title_left"> -->
                <!-- <h3>Plain Page</h3> -->
              <!-- </div> -->

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

            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>
                    <?php if (isset($origin_state)){ ?>
                      Total Truck Posted on <?php echo $origin_state ?>.
                   <?php }else if(isset($destination_state)){ ?>
                        Total Trucks travel to <?php echo $destination_state ?>.
                   <?php }else{ ?>
                        Truck Number per State
                    <?php }?>
                    <small></small>
                  </h2>
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
                  <table class="table table-hover load_count_custom">
                    <thead>
                      <tr>
                        <th>State</th>
                        <th>Truck Count</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
              <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Trucks Map</h2>
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
                    <?php
                    //
                    // echo "<pre>";
                    // print_r($result);
                    // echo "</pre>";
                    // // exit();
                    ?>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div id="container1" style="position: relative; width: 100%; height: 35vw ;max-height: 80vh;margin:auto;"></div>
                        </div>
                      </div>
                    </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->
