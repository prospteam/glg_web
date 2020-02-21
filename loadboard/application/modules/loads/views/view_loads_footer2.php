<script src="<?= base_url()."assets"; ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/select2.js"></script>
<script type="text/javascript">
// oTable = $('#datatable_loads').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#myInputTextField').keyup(function(){
//   oTable.search($(this).val()).draw() ;
// })

$(document).ready(function(e){
  // alert(1);
  var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
  var data_table = $('#datatable_loadsx').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              // url :  'https://glgfreight.com/loadboard/loads/view_loads',
              url :  base_url+'loads/loads2/loads_pagination',
              type : 'POST',
              data: function(data){
                // Read values
                // var length = "50";
                data.origin = $('[name="origin"]').val();
                data.destination = $('[name="destination"]').val();
                data.trailer_type = $('[name="trailer_type"]').val();
                data.date_available = $('[name="date_available"]').val();

                // Append to data
                // data.custom_length = length;
                // data.searchByName = name;
             }
            },
  }); // End of DataTable

  $('[name="search_filter"]').on('click',function(){
      data_table.draw();
    });
  // data_table.draw();
}); // End Document Ready Function
</script>

<!-- for select2 -->
<script>
   $( ".select2" ).select2( { placeholder: "Select a State"} );
   $( ".select3" ).select2( { placeholder: "Select the Shipper"} );

   $( ":checkbox" ).on( "click", function() {
      $( this ).parent().nextAll( "select" ).select2( "enable", this.checked );
   });

   $( "#demonstrations" ).select2( { placeholder: "Select2 version", minimumResultsForSearch: -1 } ).on( "change", function() {
      document.location = $( this ).find( ":selected" ).val();
   } );

   $( "button[data-select2-open]" ).click( function() {
      $( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
   });
</script>
