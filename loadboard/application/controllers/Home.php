<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		if ($this->session->userdata('user_session')->user_type=="admin") {
			redirect('loads/view_loads');
		}else if($this->session->userdata('user_session')->user_type=="shipper"){
			redirect('loads/add_load');
		}else{
			redirect('loads/view_loads');
		}
	}

	// public function check(){
	// 	echo "test check";
	// }

}
