<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log in | Global Logistics Group Freight</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets')?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Swal2 CSS -->
    <link href="<?= base_url()."assets"; ?>/build/css/sweetalert2.min.css" rel="stylesheet">
    <style media="screen">
       /* for swal */
       .swal2-modal {
           display: block !important;
           width: 400px !important;
           height: 200px !important;
           font-size: 10px !important;
       }
      input, button {
         border-radius: 0px !important;
         border: 0 !important;
         font-size: 16px;
      }
       @media screen and (max-width: 1200px) {
          .loginform {
             padding: 0px 25px 30px 45px !important;
             margin: 0 auto;
          }
          .login-container{
             width: 60% !important;
          }

       }
       @media screen and (max-width: 995px) {
          .truck-img {
             display: none;
          }
          .loginform {
             float: none;
             padding: 0px !important;
          }
       }
       @media screen and (max-width: 625px) {
          .row {
             width: 100% !important;
          }
       }
       @media screen and (max-width: 425px) {
          .row {
             margin-top: 20% !important;
          }
          .row-mod{
              margin-top: 1% !important;
          }

          .loginform {
             padding: 10px !important;
          }
       }
       @media screen and (max-width: 320px) {
          .register {
             margin-left: 0px !important;
          }

          .container {
             padding: 0px !important;
          }
       }
    </style>
  </head>

  <body class="login" style="font-size: 16px;">
     <div class="container-fluid" style="margin-top: 8%;">
        <div style="text-align: center;">
           <img src="<?php echo base_url('assets')?>/images/logo.png" alt="GLG logo">
        </div>
        <div class="container">
           <div class="row login-container" style="margin: 0 auto; width: 52%; height: 265px; background: #0e7ccc; margin-top: 7%;">
              <div class="col-lg-4 col-md-4 col-sm-4 truck-img" style="padding-left: 0px;">
                 <img src="<?php echo base_url('assets')?>/images/truck-road.png" width="208" alt="Truck on road">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 loginform" style="padding: 0px 30px 30px 30px;">
                <form method="post">
                   <div class="form-group">
                     <h2 style="color: white; margin-bottom: 15px;">Login</h2>
                     <input type="text" name="username" class="form-control" style="font-size: 16px;" placeholder="Username" required>
                   </div>
                   <div class="form-group">
                     <input type="password" name="password" class="form-control" style="font-size: 16px;" placeholder="Password" required>
                   </div>
                   <div>
                      <button type="submit" name="login" style="font-size: 16px;" class="btn btn-warning">Log In</button>
                      <a href="<?php echo base_url()?>login/register" class="register" style="color: white; text-decoration: none; margin-left: 10px;">No Account? Register Here</a>
                   </div>
                   <br>
                   <div class="row row-mod">
                      <div class="col-md-12" style="text-align:center;">
                        <i class="fa fa-lock" style="color: white;"><a href="<?php echo base_url(); ?>login/forgot_password" style="text-decoration: none; color: white;"> Forgot Password?</a></i>
                      </div>
                   </div>

                </form>
              </div>
           </div>
        </div>
     </div>
  </body>
     <!-- jQuery -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
     <script src="<?= base_url()."assets"; ?>/build/js/jquery.min.js"></script>
     <!-- Swal2 js -->
     <script src="<?= base_url()."assets"; ?>/build/js/sweetalert2.min.js"></script>
     <!-- Bootstrap -->
     <script src="<?= base_url()."assets"; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>


     <?php

        if ($this->session->has_userdata('swal')) {
              $data['content']=$this->session->userdata('swal');
              $this->load->view('swal_common',$data);
         $this->session->unset_userdata('swal');
        }
        if ($this->session->has_userdata("email_sent")) {
         echo "<script>alert('".$this->session->userdata('email_sent')."');</script>";
         $this->session->unset_userdata('email_sent');
        }

         if($this->session->flashdata('swals')){
              $swal = $this->session->flashdata('swals');
              $this->load->view('swal_common',$swal);
         }
        //
        // if ($this->session->has_userdata('swal')) {
        //   $data['content']=$this->session->userdata('swal');
        //   // $this->load->view('swal_common',$data);
        //   echo "<script>alert('".$this->session->userdata('swal')."');</script>";
        //   $this->session->unset_userdata('swal');
        // }
     ?>
</html>
