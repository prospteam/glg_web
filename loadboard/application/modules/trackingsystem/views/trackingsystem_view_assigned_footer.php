<script src="<?= base_url()."assets"; ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/select2.js"></script>
<script src="<?= base_url()."assets"; ?>/build/js/responsive.dataTables.js"></script>
<!-- multi select checkbox dattable JS -->
<script src="<?= base_url()."assets"; ?>/build/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript">
// oTable = $('#datatable_loads').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#myInputTextField').keyup(function(){
//   oTable.search($(this).val()).draw() ;
// })

$(document).ready(function(e){



   $(document).on('change', '.dt-checkboxes-select-all input[type="checkbox"]', function(){
      if($(this).is(':checked')){
         $('input[type="checkbox"].dt-checkboxes:checked').each(function(id, val){
            id = id + 1;
            $('.delete_loads').show();
            $('#load_count').html(id + ' loads selected.');
            $('#load_count').show();
         });
      }else{
         $('.delete_loads').hide();
         $('#load_count').hide();
      }
   });

   $(document).on('click', '.paginate_button', function(){
      if($('input[type="checkbox"].dt-checkboxes:checked').length > 0){
         $('.dt-checkboxes-select-all input[type="checkbox"]').trigger('click');
      }
   });

   $(document).on('change', 'input[type="checkbox"].dt-checkboxes', function(){
         $('input[type="checkbox"].dt-checkboxes:checked').each(function(id, val){
            if(id > 0){
               $('.delete_loads').show();
               id2 = id + 1;
               $('#load_count').html(id2 + ' loads selected.');
               $('#load_count').show();
            }else{
               $('.delete_loads').hide();
               $('#load_count').hide();
            }
            console.log(id + " " + val);
         });
   });


   var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
   var data_table = $('#datatable_loadsx').DataTable({
      "pageLength" : 10,
      "serverSide": true,
      "columnDefs": [
         {
            "targets": 0,
            "checkboxes": {
               "selectRow": true
            }
         },
         // {
         //    "targets": 1,
         //    "visible": false,
         //    "searchable": false
         //  }
      ],
      // "columnDefs": [
      //       {
      //           "targets": [ 1 ],
      //           "visible": false,
      //           "searchable": false
      //       }
      //   ]
      
      "select": {
         "style": 'multi'
      },
      "order": [[0, 'asc']],
      "ajax":{
         // url :  'https://glgfreight.com/loadboard/loads/view_loads',
         // url :  base_url+'loads/loads_pagination',
         url :  base_url+'trackingsystem/loads_pagination',
         type : 'POST',
         data: function(data){
            // data.load_id = $('[name="load_id"]').val();
            data.origin = $('[name="origin"]').val();
            data.destination = $('[name="destination"]').val();
            data.trailer_type = $('[name="trailer_type"]').val();
            data.date_available = $('[name="date_available"]').val();
            data.uid = $('[name="uid"]').val();
            data.commodity = $('[name="commodity"]').val();
            data.reference = $('[name="reference"]').val();
         }
      },
   }); // End of DataTable

   $('#frm-example').on('submit', function(e){
      e.preventDefault();
      var form = $(this);

      var rows_selected = data_table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
         // console.log(rowId);
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production

      // Output form data to a console
      $('#example-console-rows').val(rows_selected.join(","));

      // Output form data to a console
      $('#example-console-form').text($(form).serialize());
      //
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();

      // var gotit = serialize();
      // Prevent actual form submission
      var values = $('input#example-console-rows').val();
      Swal.fire({
     title: 'Are you sure you want to delete selected loads?',
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Yes'
     }).then((result) => {
     if (result.value) {
console.log(values);
// console.log(gotit.value);
        $.ajax({
            url     : <?php base_url('loads'); ?>'loads/delete_loads',
            data: {data:values},
            // data: {data:gotit.value},
            type    : 'POST',
            dataType: 'json',
            success : function(data){
               location.reload();

               // Swal.fire({
               //   type: 'success',
               //   title: 'Selected loads deleted successfully.',
               //   showConfirmButton: true,
               // })
             },
            error: function(error) {
               // Swal.fire({
               //   type: 'error',
               //   title: 'Something error occured. Please try again.',
               //   showConfirmButton: true,
               // })
               location.reload();
            }
         });
         }

      });
   });

   $('button#clearform').on('click',function(){
  	   $('#search_form input').val(""); $('#search_form select').val("");
      $('button[name="search_filter"]').trigger('click');
   });


   $('[name="search_filter"]').on('click',function(){
      data_table.draw();
   });
  // data_table.draw();

//select shipper button
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
                     <option value="${data[i].fk_userid}">${data[i].first_name} ${data[i].last_name} ${data[i].origin_state}, ${data[i].origin}, ${data[i].trailer_type}</option>
                  `;
               }
               $('input[name="load_id_row"]').val(data_id);
               $('.select_shipper').html(txt);
               $('.bs-example-modal-lg').modal('show');
            }
         },
         error: function() {
            location.reload();
         }
      });
   });

   $(document).on('click','.view_info',function(e){
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      $.ajax({
         url     : <?php base_url(); ?>'/loadboard/loads/view_info/'+data_id,
         type    : 'POST',
         dataType: 'json',
         success : function(data){
            var txt = '';
            if(data != ''){
               $('.info_shipper').empty();
               var whole_name_url_encode = encodeURIComponent(data[0].first_name+" "+data[0].last_name);
               txt = ` <div class="form-group">
               <p><strong>First Name: </strong>${data[0].first_name}</p>
               </div>
               <div class="form-group">
                  <p><strong>Last Name: </strong>${data[0].last_name}</p>
               </div>
               <div class="form-group">
                  <p><strong>Address: </strong>${data[0].address}</p>
               </div>
               <div class="form-group">
                  <p><strong>Contact Number: </strong>${data[0].contact_number}</p>
               </div>
               <div class="form-group">
                  <p><strong>Email: </strong>${data[0].email}</p>
               </div>
               <div class="form-group row">
                  <div class="col-md-12">
                     <a class="btn-sm  btn btn-primary" style="margin: 2% 0%;" href="<?php echo base_url(); ?>loads/view_loads/${data[0].user_id}/${whole_name_url_encode}">View Broker's Loads</a>
                  </div>
               </div>
               `;
            // <div class="col-md-6">
            //    <a class="btn-sm btn btn-primary" style="margin: 2% 0%;" href="</?php echo base_url(); ?>profile/index/${data[0].user_id}">View Profile</a>
            // </div>
            //    for (var i = 0; i < data.length; i++) {
            //       txt += `
            //          <option value="${data[i].fk_userid}">${data[i].first_name} ${data[i].last_name} ${data[i].origin_state}, ${data[i].origin}, ${data[i].trailer_type}</option>
            //       `;
            //    }
            //    $('input[name="load_id_row"]').val(data_id);
               $('.info_shipper').html(txt);
               $('.bs-example-modal-lg2').modal('show');
            }
         },
         error: function() {
            location.reload();
         }
      });
   });

   $(document).on('click','.rate_info',function(e){
      e.preventDefault();
         var data_id = $(this).attr('data-id');
         var data_loadid = $(this).attr('data-loadid');
        $.ajax({
            url     : <?php base_url(); ?>'/loadboard/loads/view_info/'+data_id,
            type    : 'POST',
            dataType: 'json',
            success : function(data){
               var txt = '';
               if(data != ''){
                  $('#s_id').val(data[0].user_id);
                  $('#load_id').val(data_loadid);
                  var whole_name_url_encode = encodeURIComponent(data[0].first_name+" "+data[0].last_name);
                  $('.bs-example-modal-lg3').modal('show');
               }
            },
            error: function() {
               location.reload();
            }
       });
   });

   //edit load button
   // $(document).on('click','.edit_load_btn',function(e){
      // e.preventDefault();
      //    var status = $(this).attr('data-origin');
      //    var data_id = $(this).attr('data-id');
      //   $.ajax({
      //       url     : </?php base_url(); ?>'/loadboard/loads/view_load/'+status,
      //       type    : 'POST',
      //       dataType: 'json',
      //       success : function(data){
      //          var txt = '';
      //          $('.select_shipper').empty();
      //          if(data != ''){
      //             for (var i = 0; i < data.length; i++) {
      //                txt += `
      //                   <option value="${data[i].user_id}">${data[i].username}</option>
      //                `;
      //             }
      //             $('input[name="load_id_row"]').val(data_id);
      //             $('.select_shipper').html(txt);
                  // $('.bs-example-modal-load').modal('show');
       //         }
       //      }
       // });
   // });
}); // End Document Ready Function
</script>

<!-- for swal2 confirm -->
<script>
$(document).on('click','.delete_load',function(e){
   e.preventDefault();
   Swal.fire({
   title: 'Are you sure?',
   text: "You won't be able to revert this!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes'
   }).then((result) => {
   if (result.value) {
      window.location.replace($(this).attr('href'));
   }
   });

});

// $(document).on('click','.delete_loads',function(e){
//    e.preventDefault();
//    Swal.fire({
//    title: 'Are you sure you want to delete selected loads?',
//    type: 'warning',
//    showCancelButton: true,
//    confirmButtonColor: '#3085d6',
//    cancelButtonColor: '#d33',
//    confirmButtonText: 'Yes'
//    }).then((result) => {
//    if (result.value) {
//       window.location.replace($(this).attr('href'));
//    }
//    });
//
// });

$(document).on('click','.remove_carrier',function(e){
   e.preventDefault();
   Swal.fire({
   title: 'Are you sure?',
   text: "This will remove the assigned carrier for this load.",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes'
   }).then((result) => {
   if (result.value) {
      window.location.replace($(this).attr('href'));
   }
   });

});

// $(document).on('click','.send_email',function(e){
//    e.preventDefault();
//    Swal.fire({
//    title: 'Are you sure?',
//    text: "This will send the information to the broker.",
//    type: 'warning',
//    showCancelButton: true,
//    confirmButtonColor: '#3085d6',
//    cancelButtonColor: '#d33',
//    confirmButtonText: 'Yes'
//    }).then((result) => {
//    if (result.value) {
//       window.location.replace($(this).attr('href'));
//    }
//    });
//
// });
// $(document).on('click','.appoint_carrier',function(e){
//    e.preventDefault();
//    Swal.fire({
//    title: 'Are you sure?',
//    text: "You won't be able to revert this!",
//    type: 'warning',
//    showCancelButton: true,
//    confirmButtonColor: '#3085d6',
//    cancelButtonColor: '#d33',
//    confirmButtonText: 'Yes, appoint this carrier.'
//    }).then((result) => {
//    if (result.value) {
//       location.reload();
//    }
//    });
//
// });

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

      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM5OUCsOfjNDSdym5Mpv2TbbOAejmLGEo&libraries=places"></script>

<!-- for select2 -->
<script>

var options = {
 types: ['(regions)'],
 componentRestrictions: {country: "us"}
};
new google.maps.places.Autocomplete(document.getElementById('origin'),options);
new google.maps.places.Autocomplete(document.getElementById('destination'),options);
</script>
