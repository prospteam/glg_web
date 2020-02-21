
        <!-- footer content -->
        <footer>
          <div class="pull-right">
					  © Copyright
							2019					  <span class="footer_comp">Global Logistics Group - GLG</span>
					  : <a href="http://proweaver.com" target="_blank" rel="nofollow">Proweaver</a>
					</div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
    </div>
    <!-- jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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


    <!-- croppie -->
    <script src="<?= base_url()."assets"; ?>/build/js/croppie.min.js"></script>

    <!-- moment JS -->
    <script src="<?= base_url()."assets"; ?>/build/js/moment.js"></script>

    <!-- datetimepicker JS -->
    <script src="<?= base_url()."assets"; ?>/build/js/datetimepicker.js"></script>
    <!-- datetimepicker JS -->
    <script src="<?= base_url()."assets"; ?>/build/js/chart.min.js"></script>
    <script>
      //minDate and minTime option Example
      $('#datepicker').datetimepicker({
         format: 'YYYY-MM-DD',
          minDate: new Date()
      });
      $('#ddatepicker').datetimepicker({
         format: 'YYYY-MM-DD',
      });
    </script>

    <?php
    if ($this->session->has_userdata('modal')) {
          $data['content']=$this->session->userdata('modal');
          $this->load->view('swal_common',$data);
          // $this->load->view('modal_common',$data);

      // echo "<script>alert('".$this->session->userdata('alert')."');</script>";
      $this->session->unset_userdata('modal');
    }

    if ($this->session->has_userdata('swal')) {
          // $data['content']=$this->session->userdata('swal');
          $this->load->view('swal_common', array('content' => $this->session->userdata('swal')));
      $this->session->unset_userdata('swal');
    }

    if ($this->session->has_userdata('pop_over_alert')) {
          $this->load->view('pop_over_alert_common', array('content' => $this->session->userdata('pop_over_alert')));
      $this->session->unset_userdata('pop_over_alert');
    }

    if ($this->session->has_userdata('popup_over_alert') && FALSE) { // UNDER MAINTENANCE, SOON BE USEFULL

        $data['content']=$this->session->userdata('swal');
        // $this->load->view('swal_common',$data);
        $this->session->unset_userdata('swal');

        ?>

        <script>

            $(document).ready(function(){
              $('.right_col .page-title')
              .after(`
            <div class="row">
             <div class="col-md-12">
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                 </button>
                 <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
               </div>
             </div>
           </div>`);
            });
        </script>
        <?php

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
   <?php
 		if (isset($add_to_footer)) {
      $add_to_footer_files = explode(',',$add_to_footer);
      foreach ($add_to_footer_files as $value) {
        $this->load->view($value);
      }
 		}
    ?>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url()."assets"; ?>/build/js/custom.min.js"></script>

  </body>
</html>
