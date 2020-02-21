<script src="<?= base_url()."assets"; ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/select2.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/responsive.dataTables.js"></script>
<script type="text/javascript">
// oTable = $('#datatable_loads').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#myInputTextField').keyup(function(){
//   oTable.search($(this).val()).draw() ;
// })

$(document).ready(function(e){

  $('button#clearform').on('click',function(){
  	$('#search_form input').val(""); $('#search_form select').val("");
  });
  // alert(1);
  var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
  var data_table = $('#datatable_loadsx').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              // url :  'https://glgfreight.com/loadboard/loads/view_loads',
              url :  base_url+'trucks/trucks_pagination',
              type : 'POST',
              data: function(data){
              data.origin = $('[name="origin"]').val();
              data.destination = $('[name="destination"]').val();
              data.trailer_type = $('[name="trailer_type"]').val();
              data.date_available = $('[name="date_available"]').val();

             }
            },
  }); // End of DataTable


    $('[name="search_filter"]').on('click',function(){
        data_table.draw();
      });
  // data_table.draw();
$(document).on('click','.select_shipper_btn',function(e){
   e.preventDefault();
      var status = $(this).attr('data-origin');
      var data_id = $(this).attr('data-id');
     $.ajax({
         url     : <?php base_url(); ?>'/loadboard/loads/view_load/'+status,
         type    : 'POST',
         dataType: 'json',
         success : function(data){
            var txt = '';
            $('.select_shipper').empty();
            if(data != ''){
               for (var i = 0; i < data.length; i++) {
                  txt += `
                     <option value="${data[i].user_id}">${data[i].username}</option>
                  `;
               }
               $('input[name="load_id_row"]').val(data_id);
               $('.select_shipper').html(txt);
               $('.bs-example-modal-lg').modal('show');
            }
         }
    });
});





}); // End Document Ready Function
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM5OUCsOfjNDSdym5Mpv2TbbOAejmLGEo&libraries=places"></script>

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

// swal2 confirm

   $(document).on('click','.delete_truck',function(e){
      e.preventDefault();
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.value) {
         window.location.replace($(this).attr('href'));
      }
      });

   });


   // var options = {
   //    types: ['(regions)'],
   //    componentRestrictions: {country: "us"} // 2-letters code
   // };
   //
   // var autocomplete = new google.maps.places.Autocomplete(inputObject, options);

// $(document).on('ready',function(){
  // alert();

  var options = {
   types: ['(regions)'],
   componentRestrictions: {country: "us"}
  };
  new google.maps.places.Autocomplete(document.getElementById('origin'),options);
  new google.maps.places.Autocomplete(document.getElementById('destination'),options);

// });
</script>
