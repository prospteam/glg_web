<?php
   (defined('BASEPATH')) OR exit('No direct script access allowed');

   class Profile extends MY_Controller {

      function __construct(){
      parent::__construct();
      $this->load->helper('url');
   }

   public function index($id=""){
      if($id==""){
        $id = $this->session->userdata('user_session')->user_id;
        $mine=true;
      }else{
        $mine=false;
      }


      $profile = $data['result']= $this->db->
      select('*')->
      from('glg_userdata')->
      where('fk_userid', $id)->
      join('glg_users', 'glg_users.user_id = glg_userdata.fk_userid')->
      get()->result();

      if(!empty($profile[0]->credentials)){
         $data['files'] = $files = explode('|', $profile[0]->credentials);
         $data['files_count'] = count($files) - 1;
      }

      if(isset($_POST['firstname'])){

         $fn = $this->input->post('firstname');
         $ln = $this->input->post('lastname');
         $ad = $this->input->post('address');
         $ct = $this->input->post('contact');
         $em = $this->input->post('email');

         $validity = $this->db->
         select('*')->
         from('glg_users')->
         where('email', $em)->
         where('user_id !=', $id)->
         count_all_results();

         if($validity > 0) {
            $this->session->set_userdata('swal','Email already taken. Please use another one.');
            redirect($this->uri->uri_string());
         }else {
            $this->db->
            set('email', $em)->
            where('user_id', $id)->
            update('glg_users');

            if(isset($_POST['mc_number'])){
               $success = $this->db->
               set('first_name', $fn)->
               set('last_name', $ln)->
               set('contact_number', $ct)->
               set('address', $ad)->
   				set('mc_number', $_POST['mc_number'])->
   				set('tax_id', $_POST['tax_id'])->
   				set('company', $_POST['company'])->
               where('fk_userid', $id)->
               update('glg_userdata');
            } else {
               $success = $this->db->
               set('first_name', $fn)->
               set('last_name', $ln)->
               set('contact_number', $ct)->
               set('address', $ad)->
               where('fk_userid', $id)->
               update('glg_userdata');
            }



            $userdata = $this->db->
            select('*')->
            where('fk_userid', $id)->
            from('glg_userdata')->
            join('glg_users', 'glg_users.user_id = glg_userdata.fk_userid')->
            get()->row();

            $this->session->set_userdata('user_session',$userdata);

            if ($success) {
               $this->session->set_userdata('swal','Profile updated successfully.');
               redirect($this->uri->uri_string());
            }
         }

      }

      if(isset($_POST['password'])){
         $pw = $this->input->post('password');
         $pw2 = password_hash($pw, PASSWORD_DEFAULT);

         $success2 = $this->db->
         set('password', $pw2)->
         set('other_password', $pw)->
         where('user_id', $id)->
         update('glg_users');

         if ($success2) {
            $this->session->set_userdata('swal','Password updated successfully.');
            redirect($this->uri->uri_string());
         }
      }

      if(isset($_POST['imagebase64'])){
         $data1 = $_POST['imagebase64'];

         list($type, $data1) = explode(';', $data1);
         list(, $data1)      = explode(',', $data1);
         $data5 = base64_decode($data1);
         $imgname = "image64".md5(rand()).".png";
         $test = file_put_contents("assets/images/userpics/$imgname", $data5);

         $filename = $filetmpname = $imgname;
         // folder where images will be uploaded
         $folder = 'assets/images/userpics/';
         //function for saving the uploaded images in a specific folder
         move_uploaded_file($filetmpname, $folder.$filename);
         //inserting image details (ie image name) in the database

         $ppic = array(
            'profile_picture' => $filename
         );
         $this->db->where('fk_userid', $id);
         $this->db->update('glg_userdata', $ppic);

         $userdata = $this->db->
         select('*')->
         where('fk_userid', $id)->
         from('glg_userdata')->
         join('glg_users', 'glg_users.user_id = glg_userdata.fk_userid')->
         get()->row();

         $this->session->set_userdata('user_session',$userdata);

         redirect('profile');
      }
      $data['mine'] = $mine;
      $this->load_page('index', $data, 'profile_footer.php');
   }

   public function submit_files(){
      $files = $_FILES['myfile']['name'];
      $numfiles = count($files) - 1;
      $folder = 'assets/credentials/';
      for($i=0; $i<=$numfiles; $i++){
         $name = $_FILES['myfile']['tmp_name'][$i];
         $othername = $_FILES['myfile']['name'][$i];
         move_uploaded_file($name, $folder.$othername);
      }

      $files = implode("|", $_FILES['myfile']['name']);
      $result = $this->db->
      set('credentials', $files)->
      where('fk_userid', $this->session->userdata('user_session')->user_id)->
      update('glg_userdata');

      if($result) {
         $this->session->set_userdata('swal', 'Files submitted successfully.');

         redirect('profile');
      } else{
         $this->session->set_userdata('swal', 'An error occured. Please try again.');
      }
   }

   public function remove_picture($uid=""){
      $this->db->
      set('profile_picture', 'user1.png')->
      where('fk_userid', $uid)->
      update('glg_userdata');

      $container = $this->session->userdata('user_session');
      $container->profile_picture= "user1.png";
      $this->session->set_userdata('user_session', $container);
      $this->session->set_userdata('swal', 'Profile picture removed successfully.');
      redirect('profile');
   }

}
