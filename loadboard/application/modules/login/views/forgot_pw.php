<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="images/favicon.ico" type="image/ico" />
      <title>Forgot Password | Change Health Systems, Inc.</title>
      <!-- Bootstrap -->
      <link href="<?= base_url()."assets"; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?= base_url()."assets"; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?= base_url()."assets"; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- Croppie CSS -->
      <link href="<?= base_url()."assets"; ?>/build/css/croppie.css" rel="stylesheet">
      <!-- cPager CSS -->
      <link href="<?= base_url()."assets"; ?>/build/css/cPager.css" rel="stylesheet">
      <!-- Swal2 CSS -->
      <link href="<?= base_url()."assets"; ?>/build/css/sweetalert2.min.css" rel="stylesheet">
      <style media="screen">
         .btn:hover {
            color: #acacac;
         }
         .col-6-custom {
            padding: 0px !important;
         }
         .btn-success:hover, .btn-warning:hover{
            color: white;
         }
         input {
            padding: 22px !important;
         }
         @media screen and (max-width: 768px) {
            .login-container {
               padding: 0px 150px 0px 150px !important;
            }
         }
         @media screen and (max-width: 425px) {
            .login-container {
                  padding: 0px !important;
            }
            .main-logo-container-custom {
               margin-bottom: 15% !important;
            }
         }
      </style>
   </head>
   <body style="background-color: #fff; height: 98.98%;">
      <!-- <div class="container">
         <div class="">
            <img src="</?php echo base_url('assets') ?>/images/main-logo.png" alt="CHS Logo" >
            <div class="">

            </div>
         </div>
      </div> -->
      <div class="container" style="margin-top: 8%;">
         <div class="main-logo-container-custom" style="text-align: center; margin-bottom: 4%;">
            <img src="<?php echo base_url('assets')?>/images/logo.png" alt="GLG logo">
         </div>
         <div class="col-custom" style="text-align: center;">
            <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6" style="background: #0e7ccc; padding: 0px 20px; overflow: auto; color: white;">
                  <div style="text-align: center; margin: 6% 0%;">
                     <h3><i class="fa fa-unlock-alt"></i> <strong> Forgot Password</strong></h3>
                     <h4 style="margin-top: 3%;">We will send an email for your new password</h4>
                     <hr style="border-top: 1px solid #b2b2b2;">
                  </div>
                  <form method="post">
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address Here" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required>
                          </div>
                        </div>
                     </div>
                     <div class="form-group form-check" style="text-align: center;">
                        <!-- <label class="form-check-label" for="exampleCheck1"><input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        You accept our <strong><a class="terms" href="#">Terms and Conditions and Privacy Policy</a></strong></label> -->
                        <div class="row">
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-weight: bold; margin-top: 3%;">Submit Email</button>
                           </div>
                           <div class="col-md-6">
                              <a class="btn btn-warning" href="<?php echo base_url('login') ?>" style="width: 100%; padding: 15px; font-weight: bold; margin-top: 3%;">Back to Login</a>
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="col-md-3">
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="<?= base_url()."assets"; ?>/build/js/jquery.min.js"></script>
      <!-- Swal2 js -->
      <script src="<?= base_url()."assets"; ?>/build/js/sweetalert2.min.js"></script>
      <!-- <script src="</?= base_url()."assets"; ?>/vendors/jquery/dist/jquery.min.js"></script> -->
      <!-- Bootstrap -->
      <script src="<?= base_url()."assets"; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="<?= base_url()."assets"; ?>/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="<?= base_url()."assets"; ?>/vendors/nprogress/nprogress.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="<?= base_url()."assets"; ?>/build/js/custom.min.js"></script>
      <!-- croppie -->
      <script src="<?= base_url()."assets"; ?>/build/js/croppie.min.js"></script>
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
      ?>
   </body>
</html>
