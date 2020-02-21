<script src="<?= base_url()."assets"; ?>/build/js/select2.js"></script>


<script>
   $(document).on('click','.edit_load',function(e){
      e.preventDefault();
      Swal.fire({
      title: 'Are you sure?',
      text: "Load information will be updated.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, update it!'
      }).then((result) => {
      if (result.value) {
         $('#edit-load-form').submit();
      }
      });

   });

</script>

<!-- for select2 -->
<script>
$('#trailer_type').select2({
    placeholder: 'Select Trailer Type'
});
$('.select2-container').css({'font-weight':'normal', 'margin-top':'2px'});
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM5OUCsOfjNDSdym5Mpv2TbbOAejmLGEo&libraries=places"></script>

<!-- for select2 -->
<script>

var options = {
 types: ['(cities)'],
 componentRestrictions: {country: "us"}
};
new google.maps.places.Autocomplete(document.getElementById('origin'),options);
new google.maps.places.Autocomplete(document.getElementById('destination'),options);
</script>
