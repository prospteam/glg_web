<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_Controller {


	public function index(){
		if(isset($_GET['notif'])){
			$notif_id = $_GET['notif'];
			$this->db->
			set('status', 'read')->
			where('notification_id', $notif_id)->
			update('glg_notifications');
		}
		$id = $this->session->userdata('user_session')->user_id;
		$data['notifications'] = $this->db->
		select('*')->
		where('fk_userid', $id)->
		order_by('status','DESC')->
		order_by('datetime_added','DESC')->
		limit(100)->
		from('glg_notifications')->
		get()->result();


		// echo "<pre>";
		// print_r($data);
		// exit();
    $this->load_page('index', $data, 'notif_footer.php');
	}
	public function mark_all_as_read(){
		$this->db->
		set('status','read')->
		where('fk_userid',$this->session->userdata('user_session')->user_id)->
		update('glg_notifications');
		redirect('notifications');
	}

}
