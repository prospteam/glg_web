<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function index(){

			if ($this->session->userdata('user_session')->user_type=="shipper") {
				redirect('loads/view_loads');
			}else if($this->session->userdata('user_session')->user_type=="carrier"){
					redirect('dashboard');
			}else{
					redirect('dashboard');
			}
		// $this->load->view('includes/header');
		// $this->load->view('blank_page');
		// $this->load->view('includes/footer');
	}

	public function logout(){ // LOGOUT
		session_destroy();
		redirect('login');
	}

}
