<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register | Global Logistics Group Freight</title>

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
         font-size: 16px !important;
      }

      .form-group-mod {
         margin-bottom: 10px;
      }
       .col-mod {
          padding: 0px 10px 0px 0px;
       }
       .no-p-col {
          padding: 0px !important;
       }

       @media screen and (max-width: 1200px) {
          .row-mod {
            padding: 10px 15px 0px 55px !important;
          }
          .logintext-mod {
            margin-top: 6px !important;
          }
          .regtext-mod {
            padding-left: 37px !important;
            margin-top: 13px !important;
          }
          .first-row {
             width: 70% !important;
          }
       }

       @media screen and (max-width: 995px) {
          .row {
            width: 90% !important;
          }
          .row-mod {
            padding: 10px 0px 0px 20px !important;
            margin-left: 18px;
          }
       }
       @media screen and (max-width: 769px) {
          .row-mod {
            margin-left: 30px !important;
          }
          .regtext-mod {
             padding-left: 47px !important;
          }
       }
       @media screen and (max-width: 767px) {
          .truck-img {
            display: none;
          }
          .row-mod {
            margin-left: 0px !important;
          }
       }
       @media screen and (max-width: 425px) {
          .regtext-mod {
            padding: 0px !important;
            text-align: center !important;
            margin-top: 25px !important;
          }
          .row-mod {
            padding: 10px 0px 0px 5px !important;
            margin-left: 0px;
          }
          .first-row, .row-mod {
            width: 100% !important;
           }
          .first-row {
             margin-top: 20% !important;
          }
       }

        @media screen and (max-width: 375px) {
          .logintext-mod {
             margin-top: 0px !important;
          }
        }
        @media screen and (max-width: 320px) {
            .registerform {
               padding-left: 1px;
               padding-right: 0px;
            }
            .regtext-mod {
               text-align: center;
            }
         }
    </style>
  </head>

  <body class="register">
     <div class="container-fluid" style="margin-top: 8%;">
        <div style="text-align: center;">
           <img src="<?php echo base_url('assets')?>/images/logo.png" alt="GLG logo">
        </div>
        <div class="container">
           <div class="row first-row" style="margin: 0 auto; width: 65%; height: 300px; background: #0e7ccc; margin-top: 7%;">
              <div id="div-truckimg" class="col-lg-4 col-md-4 col-sm-4 truck-img" style="padding-left: 0px;">
                 <img src="<?php echo base_url('assets')?>/images/truck-road.png" width="236" alt="Truck on road">
              </div>
              <div id="div-regform" class="col-lg-8 col-md-8 col-sm-8 registerform" style="padding: 0px;">
                   <h2 class="regtext-mod" style="color: white; padding-left: 5px; margin-top: 18px;">Register</h2>
                <form method="post">
                   <div class="row row-mod" style="padding: 10px 20px 20px 20px;">
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
                        <div class="form-group-mod">
                          <input type="password" tabindex="4" name="password" class="form-control" placeholder="Password" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                        <div class="form-group-mod">
                          <input type="text" tabindex="5" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" class="form-control" placeholder="Address" required>
                        </div>
                        <div class="form-group-mod">
                          <input type="email" tabindex="7" name="emailadd" value="<?php if(isset($_POST['emailadd'])){echo $_POST['emailadd'];}?>" class="form-control" placeholder="Email Address" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod">
                        <div class="form-group-mod">
                          <input type="text" tabindex="6" name="cnumber" value="<?php if(isset($_POST['cnumber'])){echo $_POST['cnumber'];} ?>" class="form-control" placeholder="Contact Number" required>
                        </div>
                        <div class="form-group-mod">
                          <select id="utype" name="usertype" tabindex="8" class="form-control" title="User Type" required>
            					  <option value="shipper">As Shipper</option>
            					  <option value="carrier">As Carrier</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod for_carrier" style="display: none;">
                        <div class="form-group-mod">
                          <input type="text" tabindex="9" name="mc_number" value="<?php if(isset($_POST['mc_number'])){echo $_POST['mc_number'];} ?>" class="form-control" placeholder="MC Number" >
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-mod for_carrier" style="display: none;">
                        <div class="form-group-mod">
                          <input type="text" tabindex="10" name="tax_id" value="<?php if(isset($_POST['tax_id'])){echo $_POST['tax_id'];} ?>" class="form-control" placeholder="Tax ID" >
                        </div>
                      </div>
                      <div class="form-group-mod for_carrier" style="display: none; width: 97.5%; margin: auto; margin-bottom: 10px; margin-right: 10px;">
                        <input type="text" tabindex="11" name="company" value="<?php if(isset($_POST['company'])){echo $_POST['company'];} ?>" class="form-control" placeholder="Company" >
                      </div>


                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-p-col" style="text-align: center;">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 no-p-col">
                           <button type="submit" name="register" class="btn btn-warning" style="width: 85px;">Register</button>
                        </div>
                        <div class="col-lg-7 col-md-9 col-sm-9 col-xs-8 no-p-col logintext-mod" style="margin-top: 6px;">
                           <a href="<?php echo base_url()?>login" class="register" style="color: white; font-size: 16px; text-decoration: none;">Already a Member? Login Here</a>
                        </div>
                      </div>
                   </div>
                </form>
              </div>
           </div>
        </div>
     </div>
  </body>

     <!-- jQuery -->
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

      <script>
      $(document).ready(function(){
         $("#utype").change(function () {
            var selected_option = $(this).val();

            if (selected_option === 'carrier') {
            $('#div-truckimg').removeClass("col-lg-4 col-md-4 col-sm-4").addClass("col-lg-5 col-md-5 col-sm-5");
            $('#div-regform').removeClass("col-lg-8 col-md-8 col-sm-8").addClass("col-lg-7 col-md-7 col-sm-7");
            $('.for_carrier').show();
            $('.first-row').css('height', '385px');
            $('.truck-img img').css('width', '302px');
            }else{
            $('#div-truckimg').removeClass("col-lg-5 col-md-5 col-sm-5").addClass("col-lg-4 col-md-4 col-sm-4");
            $('#div-regform').removeClass("col-lg-7 col-md-7 col-sm-7").addClass("col-lg-8 col-md-8 col-sm-8");
            $('.for_carrier').hide();
            $('.first-row').css('height', '300px');
            $('.truck-img img').css('width', '236px');
            }
         });
      });
          // function yesnoCheck(that) {
          //    if (that.value == "carrier") {
          //      document.getElementsByClassName("for_carrier").style.display = "block";
          //    } else {
          //      document.getElementsByClassName("for_carrier").style.display = "none";
          //    }
          // }
      </script>
</html>
