<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mileage extends MY_Controller {

	public function index($origin="",$origin_state="",$destination="",$destination_state=""){
		//
		// echo "YYYYYYYYYYYYYYYYY";
		// echo $origin;
		// echo $origin_state;
		// echo $destination;
		// echo $destination_state;
		// echo "XXXXXXXXXXXXXXXXX";

// rawurldecode
		$data['origin'] 						= rawurldecode($origin);
		$data['origin_state'] 			= rawurldecode($origin_state);
		$data['destination'] 				= rawurldecode($destination);
		$data['destination_state'] 	= rawurldecode($destination_state);
        // echo 'yamaaa';

			// if ($this->session->userdata('user_session')->user_type=="shipper") {
			// 	redirect('loads/view_loads');
			// }else if($this->session->userdata('user_session')->user_type=="carrier"){
			// 		redirect('trucks/view_trucks');
			// }else{
			// 		redirect('users/view_users');
			// }
        $this->load_page('index',$data,'footer_index.php');

		// $this->load->view('includes/header');
		// $this->load->view('mileage/index');
		// $this->load->view('includes/footer');
	}

	// public function logout(){ // LOGOUT
	// 	session_destroy();
	// 	redirect('login');
	// }
}
