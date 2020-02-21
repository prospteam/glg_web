<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ada extends MY_Controller {


	public function index(){

		$data['users'] = $this->db->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

		$data['shippers'] = $this->db->
		where('user_type', 'shipper')->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

		$data['loads'] = $this->db->count_all('glg_loads');
		$data['trucks'] = $this->db->count_all('glg_trucks');

		$data['carriers'] = $this->db->
		where('user_type', 'carrier')->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

      $this->load_page('index2.php', $data,'index_footer');
			// if ($this->session->userdata('user_session')->user_type=="shipper") {
			// 	redirect('loads/view_loads');
			// }else if($this->session->userdata('user_session')->user_type=="carrier"){
			// 		redirect('trucks');
			// }else{
			// 		redirect('users/view_users');
			// }
		// $this->load->view('includes/header');
		// $this->load->view('blank_page');
		// $this->load->view('includes/footer');
	}

}
