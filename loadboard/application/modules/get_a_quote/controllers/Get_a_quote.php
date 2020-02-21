<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_a_quote extends MY_Controller {


	public function index(){

		if (isset($_POST['submit_quote'])) {
			$html_content="<table>";
			foreach ($_POST as $key => $value) {
				if ($key=='submit_quote') continue;
				$html_content.="<tr><td>{$key}</td><td>{$value}</td></tr>";
			}
			$html_content.="</table>";
			// ec$html_content;
			if($this->sendmail("prospteam@gmail.com", "XD", 'New Account Registered', "XD")){
				$this->session->set_userdata('swal','The quote has been successfully sent.');
			}else{
				$this->session->set_userdata('swal','Failed in sending.');
			}
			// echo $this->sendmail("prospteam@gmail.com", "XD", 'New Account Registered', "$html_content");
		}
		$this->load_page('index');
		// $this->load->view('includes/header');
		// $this->load->view('blank_page');
		// $this->load->view('includes/footer');
	}

	//
	// public function logout(){ // LOGOUT
	// 	session_destroy();
	// 	redirect('login');
	// }
}
