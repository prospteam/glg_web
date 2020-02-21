<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <?php
    // <meta charset="utf-8">
    // <meta http-equiv="X-UA-Compatible" content="IE=edge">

     ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Global Logistics Group - GLG</title>

    <!-- Bootstrap -->
    <link href="<?= base_url()."assets"; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()."assets"; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()."assets"; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="<?= base_url()."assets"; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()."assets"; ?>/build/css/custom.min.css" rel="stylesheet">
    <!-- Croppie CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/croppie.css" rel="stylesheet">
    <!-- cPager CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/cPager.css" rel="stylesheet">
    <!-- Swal2 CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/sweetalert2.min.css" rel="stylesheet">
    <!-- Datetimepicker CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/datetimepicker.css" rel="stylesheet">
    <!-- multi select checkbox dattable CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/dataTables.checkboxes.css" rel="stylesheet">

    <?php
    if (isset($add_to_header)) {
      $add_to_headerr_files = explode(',',$add_to_header);
      foreach ($add_to_headerr_files as $value) {
        $this->load->view($value);
      }
    }
    ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col sidebar-custom">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>home/index" class="site_title"><i>GLG</i><img src="<?= base_url(); ?>/assets/images/glg-logo.png" alt=""/></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  <?php if(empty($this->session->userdata('user_session')->profile_picture)) { ?>
                    <img src="<?= base_url()."assets"; ?>/images/user.png" alt="User Picture" class="img-circle profile_img">
                  <?php }else { ?>
                     <img src="<?php echo base_url(); ?>/assets/images/userpics/<?php echo $this->session->userdata('user_session')->profile_picture; ?>" alt="User Picture" class="img-circle profile_img">
                  <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('user_session')->first_name ." ". $this->session->userdata('user_session')->last_name; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>
                  General
                </h3>
                <ul class="nav side-menu">
                  <?php if ($this->session->userdata('user_session')->user_type=="shipper"): ?>
                    <li>
                      <a href="<?= base_url('loads/view_loads'); ?>">
                        <i class="fa fa-list"></i>
                        My Loads
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('loads/add_load'); ?>">
                        <i class="fa fa-plus"></i>
                        Add New Load
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('trucks/view_trucks'); ?>">
                        <i class="fa fa-truck"></i>
                        All Trucks
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('get_a_quote'); ?>">
                        <i class="fa fa-edit"></i>
                        Get A Quote
                      </a>
                    </li>
                  <?php endif; ?>

                  <?php if ($this->session->userdata('user_session')->user_type=="carrier"): ?>
                    <li class="<?php if(isset($ctab)){echo "current-page";} ?>">
                      <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-home"></i>
                        Dashboard
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('loads/view_loads'); ?>">
                        <i class="fa fa-inbox"></i>
                        Find Loads
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('loads/my_rates'); ?>">
                        <i class="fa fa-calculator"></i>
                        My Rates
                      </a>
                    </li>
                    <!-- <li>
                      <a href="</?= base_url('loads/view_my_rates'); ?>">
                        <i class="fa fa-calculator"></i>
                        My Rates
                      </a>
                    </li> -->
                    <li>
                      <a href="<?= base_url('loads/map'); ?>">
                        <i class="fa fa-map-marker"></i>
                        Load Map
                      </a>
                    </li>
                  </ul>
                </div>


                <div class="menu_section">
                  <ul class="nav side-menu">
                    <h3>
                      My Navigation as Carrier
                    </h3>
                    <li>
                      <a href="<?= base_url('trucks/add_truck'); ?>">
                        <i class="fa fa-plus"></i>
                        Add New Truck
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('trucks/view_trucks'); ?>">
                        <i class="fa fa-truck"></i>
                        My Trucks
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="menu_section">
                  <ul class="nav side-menu">
                  <?php endif; ?>

                  <?php if ($this->session->userdata('user_session')->user_type=="broker" || $this->session->userdata('user_session')->user_type=="admin"): ?>
                    <li>
                      <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                      </a>
                    </li>
                    <li>
                      <a><i class="fa fa-inbox"></i>Loads <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li>
                          <a href="<?= base_url('loads/add_load'); ?>">
                            Add New Load
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url('loads/view_loads'); ?>">
                            All Loads
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url('loads/my_loads'); ?>">
                           My Loads
                          </a>
                        </li>
                        <li>
                        <li>
                          <a href="<?= base_url('loads/map'); ?>">
                            Load Map
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a><i class="fa fa-truck"></i>Trucks <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li>
                          <a href="<?= base_url('trucks/view_trucks'); ?>">
                            Find a Truck
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url('trucks/map'); ?>">
                            Truck Map
                          </a>
                        </li>
                      </ul>
                    </li>
                     <?php if ($this->session->userdata('user_session')->user_type=="admin"){ ?>
                       <li>
                         <a href="<?= base_url('users/view_users'); ?>">
                           <i class="fa fa-users"></i>
                           Registered Users
                         </a>
                       </li>
                     <?php } ?>
                  <?php endif; ?>
                  <?php if($this->session->userdata('user_session')->user_type !='carrier'){ ?>
                  <br/>
                    <!-- <h3>
                      Other
                    </h3>
                  <br/>
                    <li>
                      <a href="<?= base_url('trackingsystem/dashboard'); ?>">
                        <i class="fa fa-list-alt"></i>
                          Tracking System
                      </a>
                    </li> -->
                    <!-- <li>
                      <a href="<?= base_url('trucks/view_trucks'); ?>">
                        <i class="fa fa-truck"></i>
                          My Trucks
                      </a>
                    </li> -->
                  <?php } ?>
                </ul>
              </div>
            </div>
          <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('assets/images/userpics/').$this->session->userdata('user_session')->profile_picture ?>" alt="User Picture">
                  <div class="profile-nav-text-custom">
                  <?= $this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name ?> 
                  </div>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?= base_url('profile') ?>"><i class="fa fa-user pull-right"></i> Profile</a></li>
                  <!-- <li>
                  <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                  </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li> -->
                  <li>
                    <a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <?php if(!empty($notifs)) echo "<span class='badge bg-red'>!</span>"; ?>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php if(empty($notifs)) { ?>
                     <li class="nav-item" style="width: 95%; text-align: center;">No new notifications.</li>
                  <?php } else { foreach($notifs as $notif => $value): ?>
                     <li class="nav-item">
                        <a class="dropdown-item" href="<?php  echo base_url('notifications'); ?>">
                           <span class="notif_title"><?php echo $value->title; ?></span>
                           <span class="time_header_custom">
                              <?php
                                 $datetime1 = strtotime($value->datetime_added);
                                 $today = strtotime(date('Y-m-d H:i:s'));
                                 $secs = $today - $datetime1;
                                 $days = $secs / 86400;
                                 $dt = new DateTime($value->datetime_added);
                                 if (floor($days)==1) {
                                    echo " Yesterday";
                                 }else if (floor($days)>1) {
                                    echo floor($days)." days ago";
                                 }else{
                                    echo "Today";
                                 }
                                 echo $date = ", ".$dt->format('M d, Y');
                                 echo "<br>";
                              ?>
                           </span>
                           <span class="message_custom"><?php echo $value->description; ?></span>
                        </a>
                     </li>
                  <?php endforeach; } ?>
                  <li style="width: 95%;">
                    <div class="text-center">
                    <a href="<?= base_url('notifications') ?>">
                      <strong>View All Notifications</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                  </li>
                  <li style="width: 95%;">
                    <div class="text-center">
                    <a href="<?= base_url('notifications/mark_all_as_read') ?>">
                      <strong>Mark All As Read</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
