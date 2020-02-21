<?php

// echo "<pre>";
// print_r($loads_past_6_months_values);
// print_r($trucks_past_6_months_values);
// echo "</pre>";
// exit();

 ?>
<script src="<?= base_url()."assets"; ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>


<!-- Flot -->
<script src="<?= base_url()."assets"; ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url()."assets"; ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url()."assets"; ?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url()."assets"; ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url()."assets"; ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url()."assets"; ?>/vendors/moment/min/moment.min.js"></script>


<script src="<?= base_url()."assets"; ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<script>
$(function(){

  		// $data['past_6_months']=$past_6_months;
  		// $data['past_6_months_numeric']=$past_6_months_numeric;
  		// $data['past_6_months_values']=$past_6_months_values;
  if ($("#lineChart_loads").length) {

      var months_abbr = [<?php foreach ($past_6_months_no_this_month as $value) {
                  echo '"'.substr($value,0,3).'", ';
                } ?>]
      var months = [<?php foreach ($loads_past_6_months as $value) {
                  echo '"'.$value.'", ';
                } ?>]

      var months_will_use = (Number($(window).width())>1024)?months:months_abbr;

      var e = document.getElementById("lineChart_loads");
      new Chart(e,{
          type: "line",
          data: {
              labels: months_will_use,
              datasets: [{
                  label: "Number of Loads posted in the previous months",
                  backgroundColor: "rgba(3, 88, 106, 0.3)",
                  borderColor: "rgba(3, 88, 106, 0.70)",
                  pointBorderColor: "rgba(3, 88, 106, 0.70)",
                  pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgba(151,187,205,1)",
                  pointBorderWidth: 1,
                  data: [
                    // 82, 23, 66, 9, 99, 4, 2, 2, 2, 2, 2, 1000
                    <?php foreach ($loads_past_6_months_values as $value) {
                      echo $value.', ';
                    } ?>
                  ]
              }]
              // datasets: [{
              //     label: "My First dataset",
              //     backgroundColor: "rgba(38, 185, 154, 0.31)",
              //     borderColor: "rgba(38, 185, 154, 0.7)",
              //     pointBorderColor: "rgba(38, 185, 154, 0.7)",
              //     pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              //     pointHoverBackgroundColor: "#fff",
              //     pointHoverBorderColor: "rgba(220,220,220,1)",
              //     pointBorderWidth: 1,
              //     data: [31, 74, 6, 39, 20, 85, 7]
              // }, {
              //     label: "My Second dataset",
              //     backgroundColor: "rgba(3, 88, 106, 0.3)",
              //     borderColor: "rgba(3, 88, 106, 0.70)",
              //     pointBorderColor: "rgba(3, 88, 106, 0.70)",
              //     pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              //     pointHoverBackgroundColor: "#fff",
              //     pointHoverBorderColor: "rgba(151,187,205,1)",
              //     pointBorderWidth: 1,
              //     data: [82, 23, 66, 9, 99, 4, 2]
              // }]
          }
      })
  }
  if ($("#lineChart_trucks").length) {

    

      var months_abbr = [<?php foreach ($past_6_months_no_this_month as $value) {
                  echo '"'.substr($value,0,3).'", ';
                } ?>]
      var months = [<?php foreach ($trucks_past_6_months as $value) {
                  echo '"'.$value.'", ';
                } ?>]

      var months_will_use = (Number($(window).width())>1024)?months:months_abbr;

      var e = document.getElementById("lineChart_trucks");
      new Chart(e,{
          type: "line",
          data: {
              labels: months_will_use,
              datasets: [{
                  label: "Number of Trucks posted in the previous months",
                  backgroundColor: "rgba(3, 88, 106, 0.3)",
                  borderColor: "rgba(3, 88, 106, 0.70)",
                  pointBorderColor: "rgba(3, 88, 106, 0.70)",
                  pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgba(151,187,205,1)",
                  pointBorderWidth: 1,
                  data: [
                    <?php foreach ($trucks_past_6_months_values as $value) {
                      echo $value.', ';
                    } ?>
                  ]
              }]
          }
      })
  }

});

</script>
