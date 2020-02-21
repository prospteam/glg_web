
<script>
   $(document).ready(function(){

      $(document).on('submit','#files-form',function(e){
         let base_url = '<?php echo base_url('profile/submit_files'); ?>';
         let redirect = '<?php echo base_url('profile'); ?>';
         e.preventDefault();
         Swal.fire({
            title: 'Are you sure to submit the credentials?',
            // text: "You can only submit this once.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
         }).then((result) => {
            if (result.value) {
               let formData = new FormData(this);
               $('.loader').show();
               $.ajax({
                  url: base_url,
                  processData: false,
                  contentType: false,
                  data: formData,
                  method: 'POST',
                  success:function(data){
                     // console.log(data);
                     window.location.href = redirect;
                  }
               });

            }
         });
      });

      $(document).on('click','.save_pw',function(e){
         e.preventDefault();
         Swal.fire({
         title: 'Are you sure?',
         text: "Password will be updated.",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, update it!'
         }).then((result) => {
         if (result.value) {
            $('#password-form').submit();
         }
         });

      });

      $(document).on('click','.remove_pic',function(e){
         e.preventDefault();
         Swal.fire({
            title: 'Are you sure to remove profile picture?',
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

      $(document).on('click','.save_info',function(e){
         e.preventDefault();
         Swal.fire({
         title: 'Are you sure?',
         text: "Profile information will be updated.",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, update it!'
         }).then((result) => {
         if (result.value) {
            $('#profile-form').submit();
         }
         });

      });

      $(document).on('click','.upload-result',function(e){
         e.preventDefault();
         Swal.fire({
         title: 'Are you sure?',
         text: "Profile picture will be updated.",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, update it!'
         }).then((result) => {
         if (result.value) {
            $('#imgform').submit();
         }
         });

      });

      $('input[name="pic"]').click(function(){
         $('#upload-demo').show();
         $('#img').hide();
         $('#cancel').show();
         $('.remove_pic').hide();
      });

      $('input[name="cancel"]').click(function(){
         location.reload();
      });

      $('button[name="edit"]').on('click', function(){
         var state = $(this).data('state');

         switch(state){
            case 1: $(".in-field1").css("display", "block"); $(".in-field1").show(); $('.fn').show(); $('.info_text').hide(); $(".in-field1").attr("readonly", false); $(this).data('state', 2); $('.hid3').show(); $(this).html('Cancel');  break;
            case 2: $(".in-field1").hide(); $('.info_text').show();$('.fn').hide(); $(".in-field1").attr("readonly", true); $(this).data('state', 1); location.reload(); break;
         }
      });

      $('input[name="pic"]').change(function () {
         if($(this).val() != ""){
            $('input[name="uploadpic"]').show();
         }
        var val = $(this).val().toLowerCase(),
            regex = new RegExp("(.*?)\.(jpeg|jpg|png)$");

        if (!(regex.test(val))) {
            $(this).val('');
            $('input[name="uploadpic"]').hide();
            $('#blah').attr('src', base+'/assets/images/user_default.png').width(440).height(200);
             $('.alerter').html('<strong>Inputted file format is not allowed!</strong>').addClass('alert-danger').fadeIn();
        }
      });

      $('#pw, #conpw').on('keyup', function () {
        if ($('#pw').val() == $('#conpw').val()) {
          $('.hid2').show(); $('#message').hide();
       } else{
          $('#message').show();
          $('#message').html('Passwords do not match.').css('color', 'red'); $('.hid2').hide();
         }
       });
      $('#pw, #conpw').on('keyup', function () {
        if ($('#pw').val() == $('#conpw').val()) {
          $('.hid2').show();
       } else{
          $('#message2').show();
          $('#message2').html('Wrong Password.').css('color', 'red'); $('.hid2').hide();
         }
      if ($('#pw').val() == "" && $('#conpw').val() == "" ) {$('.hid2').hide();}
       });

       $uploadCrop = $('#upload-demo').croppie({
           enableExif: true,
           viewport: {
               width: 200,
               height: 200,
               type: 'circle'
           },
           boundary: {
               width: 300,
               height: 300
           }
       });

   });

   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
   }

   function readFile(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
         $('#upload-demo').croppie('bind', {
           url: e.target.result
         });
         $('.actionUpload').toggle();
      }

      reader.readAsDataURL(input.files[0]);
      }
   }

   $('.actionUpload').on('change', function () { readFile(this); });

   $('.upload-result').on('click', function (ev) {
      $uploadCrop.croppie('result', {
           type: 'canvas',
           size: 'original'
      }).then(function (resp) {
           $('#imagebase64').val(resp);
           $('#imgform').submit();
      });
   });

</script>
