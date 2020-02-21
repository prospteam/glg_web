
<script src="<?= base_url()."assets"; ?>/build/js/d3.v3.min.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/topojson.v1.min.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/datamaps.usa.min.js"></script>

  <script>
      var USdata = {
          'AK': 'Alaska',
          'AL': '123',
          'AR': '7576',
          'AZ': '345',
          'CA': '453',
          'CO': '453',
          'CT': '765',
          'DC': '234',
          'DE': '35434',
          'FL': 'Florida', //Simulate a missing value defaults to 2 letter abbr
          'GA': '',
          'HI': '234',
          'IA': '234',
          'ID': 'Idaho',
          'IL': '234',
          'IN': '234',
          'KS': '234',
          'KY': '234',
          'LA': '234',
          'MA': '234',
          'MD': '7566',
          'ME': '567',
          'MI': '567',
          'MN': '46',
          'MO': '456',
          'MS': '567',
          'MT': '345',
          'NC': '456',
          'ND': '345',
          'NE': '65',
          'NH': '356',
          'NJ': '54',
          'NM': '4356',
          'NV': '5463',
          'NY': '3456',
          'OH': '2345',
          'OK': '2345',
          'OR': '564',
          'PA': '456',
          'RI': '234',
          'SC': '234',
          'SD': '5467',
          'TN': '5467',
          'TX': '2345',
          'UT': '345',
          'VA': '432',
          'VT': '654',
          'WA': '456',
          'WI': '543',
          'WV': '345',
          'WY': '1234'
        };
      var USmap = new Datamap({
          element: document.getElementById("container1"),
          scope: 'usa', //currently supports 'usa' and 'world', however with custom map data you can specify your own
          projection: 'equirectangular', //style of projection to be used. try "mercator"
          // height: 520, //if not null, datamaps will grab the height of 'element'
          fills: {
              defaultFill: '#0e7ccc'
          },
          // arcConfig: {
          //   strokeColor: '#022d4c',
          //   strokeWidth: 2,
          // },
          geographyConfig: {
              highlightBorderColor: '#bada55',
              popupTemplate: function (geography, data) {
                  return '<div class="hoverinfo">' + geography.properties.name + '</div>';
              },
              highlightBorderWidth: 2
          }
      });
      // USmap.bubbles([])
      USmap.labels({
        "customLabelText": USdata,
        "labelColor": "black"
      });
      // USmap.updateChoropleth({
      //    TX: 'black'
      // });
  </script>

<script>
    $(document).ready(function(){


      <?php
         //     error_reporting(E_ALL);
         // ini_set('display_errors', 1);
         // echo "<pre>";
         // print_r($result);
         foreach ($result as $value) {
            if (isset($origin_state)) {
      ?>
            $('text:contains("<?= $value->origin_state ?>")').text('<?= $value->count ?>');
            $('.load_count_custom').find('tbody').append("<tr <?php if(@$origin_state==$value->origin_state){echo "style='background-color: #e6e6e6;'";} ?> ><td><?= $states[$value->origin_state] ?></td><td><?= $value->count ?></td><td><a href=\"<?php echo base_url(); ?>loads/view_loads/<?php echo $value->origin_state; ?>\" class=\"btn btn-warning\"><i class=\"fa fa-eye\"></i></a></td></tr>");
      <?php
            }else if(isset($destination_state)){
      ?>
            $('text:contains("<?= $value->destination_state ?>")').text('<?= $value->count ?>');
            $('.load_count_custom').find('tbody').append("<tr <?php if(@$destination_state==$value->destination_state){echo "style='background-color: #e6e6e6;'";} ?> ><td><?= $states[$value->destination_state] ?></td><td><?= $value->count ?></td><td><a href=\"<?php echo base_url(); ?>loads/view_loads/<?php echo $value->destination_state; ?>\" class=\"btn btn-warning\"><i class=\"fa fa-eye\"></i></a></td></tr>");
      <?php
            }else{
      ?>
               $('text:contains("<?= $value->origin_state ?>")').text('<?= $value->count ?>');
               $('.load_count_custom').find('tbody').append("<tr <?php if(@$origin_state==$value->origin_state){echo "style='background-color: #e6e6e6;'";} ?> ><td><?= $states[$value->origin_state] ?></td><td><?= $value->count ?></td><td><a href=\"<?php echo base_url(); ?>loads/view_loads/<?php echo $value->origin_state; ?>\" class=\"btn btn-warning\"><i class=\"fa fa-eye\"></i></a></td></tr>");
      <?php
            }
         }

           // echo "</pre>";
           // exit();
      ?>


$('text:contains("AK")').text('0');
$('text:contains("AL")').text('0');
$('text:contains("AR")').text('0');
$('text:contains("AZ")').text('0');
$('text:contains("CA")').text('0');
$('text:contains("CO")').text('0');
$('text:contains("CT")').text('0');
$('text:contains("DC")').text('0');
$('text:contains("DE")').text('0');
$('text:contains("FL")').text('0');
$('text:contains("GA")').text('0');
$('text:contains("HI")').text('0');
$('text:contains("IA")').text('0');
$('text:contains("ID")').text('0');
$('text:contains("IL")').text('0');
$('text:contains("IN")').text('0');
$('text:contains("KS")').text('0');
$('text:contains("KY")').text('0');
$('text:contains("LA")').text('0');
$('text:contains("MA")').text('0');
$('text:contains("MD")').text('0');
$('text:contains("ME")').text('0');
$('text:contains("MI")').text('0');
$('text:contains("MN")').text('0');
$('text:contains("MO")').text('0');
$('text:contains("MS")').text('0');
$('text:contains("MT")').text('0');
$('text:contains("NC")').text('0');
$('text:contains("ND")').text('0');
$('text:contains("NE")').text('0');
$('text:contains("NH")').text('0');
$('text:contains("NJ")').text('0');
$('text:contains("NM")').text('0');
$('text:contains("NV")').text('0');
$('text:contains("NY")').text('0');
$('text:contains("OH")').text('0');
$('text:contains("OK")').text('0');
$('text:contains("OR")').text('0');
$('text:contains("PA")').text('0');
$('text:contains("RI")').text('0');
$('text:contains("SC")').text('0');
$('text:contains("SD")').text('0');
$('text:contains("TN")').text('0');
$('text:contains("TX")').text('0');
$('text:contains("UT")').text('0');
$('text:contains("VA")').text('0');
$('text:contains("VT")').text('0');
$('text:contains("WA")').text('0');
$('text:contains("WI")').text('0');
$('text:contains("WV")').text('0');
$('text:contains("WY")').text('0');

    $('div#container1 svg g.datamaps-subunits path').on('click',function(){
      var res = $(this).attr('class').split(" ");
      window.location.href = "<?= base_url('loads/view_loads'); ?>/"+res[res.length-1];
    });
        });
</script>
