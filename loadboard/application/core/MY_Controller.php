<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {
		public function __construct(){
			parent::__construct();

			$test = true;
			if($test){
				$config['base_url'] = 'http://192.168.20.29/Projects/globallogisticsgroup/Loadboard_Website/loadboard/';
			}else{
				$config['base_url'] = 'https://glgfreight.com/loadboard/';
			}

			
			if(empty($this->session->userdata('user_session'))){
				if (!($this->router->fetch_class()=="login" || $this->router->fetch_class()=="api")) {
					redirect('login');
				}
			}

			if(!empty($this->session->userdata('user_session'))){
				if ($this->router->fetch_class()=="login") {
					redirect('home');
					exit;
				}
			}

			if(isset($_GET['notif'])){
				$notif_id = $_GET['notif'];
				$this->db->
				set('status', 'read')->
				where('notification_id', $notif_id)->
				update('glg_notifications');
			}
			// echo "<pre>";
			// print_r($this->session->userdata());
			// echo "</pre>";
			// exit();


		}
		public function send_notification($to_id='',$title='',$desc='',$notif_type='')
		{
			if (empty($to_id)) {
				$to_id=1;
			}
			$this->db
			->set('fk_userid',$to_id)
			->set('title',$title)
			->set('description',$desc)
			->set('status','unread')
			->set('notif_type',$notif_type)
			->insert('glg_notifications');
		}

	public function load_page($page,$data = array(), $add_to_footer="",$add_to_header=""){
		$id = $this->session->userdata('user_session')->user_id;

		$test = $data["notifs"] = $this->db->
		select('*')->
		where('fk_userid', $id)->
		where('status', 'unread')->
		limit(3)->
		order_by('datetime_added', 'DESC')->
		from('glg_notifications')->
		get()->result();

		// $data["notif_count"] =
		// $this->db->
		// select('status')->
		// where('fk_userid', $id)->
		// where('status', 'unread')->
		// from('glg_notifications')->
		// get()->result();

		if (!empty($add_to_footer)) {
			$data["add_to_footer"]=$add_to_footer;
		}
		if (!empty($add_to_header)) {
			$data["add_to_header"]=$add_to_header;
		}
		$this->load->view('includes/header',$data);
		$this->load->view($page);
		$this->load->view('includes/footer');
	}
	public function basic(){
		$this->load->view('includes/header');
		$this->load->view("blank_page");
		$this->load->view('includes/footer');
	}

	public function sendmail($to_email='prospteam@gmail.com',$from_name='Global Logistics Group',$subject='Email Notification',$message='',$use_html_template=true){

		// $to_email="";



		$this->load->library('email');
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'secure.emailsrvr.com',
			'smtp_port' => 587,
			// 'smtp_user' => 'onlineform15@proweaver.net',
			// 'smtp_pass' => 'Pr0s3H1TforR#',
			'smtp_user' => 'onlineform12@proweaver.net',
			'smtp_pass' => 'i@mRoF3uL7f0RqR',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->to($to_email);
		$this->email->from('noreply@glg.com',$from_name);
		$this->email->subject($subject);

		if ($use_html_template) {
			$messageData['title'] =$subject;
			$messageData['content'] =$message;
			$message = $this->load->view('mail_template',$messageData,true);
			$this->email->message($message);
		}else{
			$this->email->message($message);
		}

		return $this->email->send();
		 // $this->email->send();
		 //
			// 		echo $this->email->print_debugger();
	}

	public function setSwal($icon='warning',$msg=''){
		$load = array('icon' => $icon, 'content' => $msg);
		$this->session->set_flashdata('swals', $load);
	}

	public function getState(){
		return array(
			'AL'=>'ALABAMA',
			'AK'=>'ALASKA',
			'AS'=>'AMERICAN SAMOA',
			'AZ'=>'ARIZONA',
			'AR'=>'ARKANSAS',
			'CA'=>'CALIFORNIA',
			'CO'=>'COLORADO',
			'CT'=>'CONNECTICUT',
			'DE'=>'DELAWARE',
			'DC'=>'DISTRICT OF COLUMBIA',
			'FM'=>'FEDERATED STATES OF MICRONESIA',
			'FL'=>'FLORIDA',
			'GA'=>'GEORGIA',
			'GU'=>'GUAM GU',
			'HI'=>'HAWAII',
			'ID'=>'IDAHO',
			'IL'=>'ILLINOIS',
			'IN'=>'INDIANA',
			'IA'=>'IOWA',
			'KS'=>'KANSAS',
			'KY'=>'KENTUCKY',
			'LA'=>'LOUISIANA',
			'ME'=>'MAINE',
			'MH'=>'MARSHALL ISLANDS',
			'MD'=>'MARYLAND',
			'MA'=>'MASSACHUSETTS',
			'MI'=>'MICHIGAN',
			'MN'=>'MINNESOTA',
			'MS'=>'MISSISSIPPI',
			'MO'=>'MISSOURI',
			'MT'=>'MONTANA',
			'NE'=>'NEBRASKA',
			'NV'=>'NEVADA',
			'NH'=>'NEW HAMPSHIRE',
			'NJ'=>'NEW JERSEY',
			'NM'=>'NEW MEXICO',
			'NY'=>'NEW YORK',
			'NC'=>'NORTH CAROLINA',
			'ND'=>'NORTH DAKOTA',
			'MP'=>'NORTHERN MARIANA ISLANDS',
			'OH'=>'OHIO',
			'OK'=>'OKLAHOMA',
			'OR'=>'OREGON',
			'PW'=>'PALAU',
			'PA'=>'PENNSYLVANIA',
			'PR'=>'PUERTO RICO',
			'RI'=>'RHODE ISLAND',
			'SC'=>'SOUTH CAROLINA',
			'SD'=>'SOUTH DAKOTA',
			'TN'=>'TENNESSEE',
			'TX'=>'TEXAS',
			'UT'=>'UTAH',
			'VT'=>'VERMONT',
			'VI'=>'VIRGIN ISLANDS',
			'VA'=>'VIRGINIA',
			'WA'=>'WASHINGTON',
			'WV'=>'WEST VIRGINIA',
			'WI'=>'WISCONSIN',
			'WY'=>'WYOMING'
		);
	}

}
