
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <!-- <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
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
                    <h2>Get A Quote</h2>
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
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="first-name" required="required" name="first_name" class="form-control" value="<?= $this->session->userdata('user_session')->first_name ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="last-name" required="required" name="last_name" class="form-control" value="<?= $this->session->userdata('user_session')->last_name ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" required="required" name="email" class="form-control" value="<?= $this->session->userdata('user_session')->email ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text" id="phone" required="required" name="phone" class="form-control" value="<?= $this->session->userdata('user_session')->contact_number ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                          <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="resizable_textarea form-control" placeholder="Write something here.." style="height: 200px;max-height: 600px;min-height: 100px;max-width:100%;min-width:100%"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit_quote" class="btn btn-primary">Get A Quote</button>
                          <button class="btn btn-warning" type="button">Cancel</button>
                          <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
