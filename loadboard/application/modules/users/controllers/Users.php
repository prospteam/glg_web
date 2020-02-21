<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	// public function add_truck(){
  //
	// 	if (isset($_POST['truck_submit'])) {
	// 		$result=$this->db->
	// 		set('origin', $_POST['origin'])->
	// 		set('trailer_type', $_POST['trailer_type'])->
	// 		set('destination', $_POST['destination'])->
	// 		// set('length', $_POST['length'])->
	// 		// set('width', $_POST['width'])->
	// 		// set('height', $_POST['origin'])->
	// 		// set('weight', $_POST['weight'])->
	// 		set('date_available', $_POST['date'])->
	// 		set('comments', $_POST['comments'])->
	// 		insert('glg_trucks');
  //
	// 		// echo $this->db->last_query();
	// 		// echo $result;
	// 		if ($result) {
	// 			// $this->session->set_userdata('notify_user','Heyyyy ');
	// 			$this->session->set_userdata('swal','success');
	// 		}
	// 	// $this->db->insert('mytable', $data);
	// 	}
	// 	// echo "<pre>";
	// 	// print_r($_POST);
	// 	// echo "</pre>";
	// 	// exit();
	// 	$this->load_page('add_truck');
	// 	// $this->load->view('includes/header');
	// 	// $this->load->view('add_load');
	// 	// $this->load->view('includes/footer');
	// }

	public function view_users($string_to_search="",$tab_to_select="")
	{
		// $data['result'] = $this->db->
		// select('*')->
		// from('glg_users')->
		// get()->
		// result_array();

		// if(isset($_POST['appoint'])){
		// 	$this->db->
		// 	set('carrier_id', $_POST['carrier_id'])->
		// 	where('load_id', $_POST['load_id_row'])->
		// 	update('glg_loads');
		// }
		// $data[''] = "view_loads_footer.php";
		$data['string_to_search'] = $string_to_search;
		$data['tab_to_select'] = $tab_to_select;
		$this->load_page('view_users',$data,'view_users_footer.php','view_users_header.php');
	}

	public function activate_user($id='')
	{
		$res=$this->db
		->set('status','active')
		->where('user_id',$id)
		->update('glg_users');

		$this->session->set_userdata('swal','User activated successfully.');
		redirect('users/view_users');
	}
	public function deactivate_user($id='')
	{
		$res=$this->db
		->set('status','inactive')
		->where('user_id',$id)
		->update('glg_users');

		$this->session->set_userdata('swal','User inactivated successfully.');
		redirect('users/view_users');
	}

	public function users_pagination()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search= $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if(!empty($order))
		{
			foreach($order as $o)
			{
				$col = $o['column'];
				$dir= $o['dir'];
			}
		}

		if($dir != "asc" && $dir != "desc")
		{
				$dir = "desc";
		}

		$valid_columns = array(
			0=>'first_name',
			1=>'last_name',
			2=>'email',
			3=>'address',
			4=>'contact_number',
			5=>'user_type',
			6=>'status',
			// 7=>'weight',
			8=>'date_added',
		);
		if(!isset($valid_columns[$col]))
		{
			$order = null;
		}
		else
		{
			$order = $valid_columns[$col];
		}
		if($order !=null)
		{
			$this->db->order_by($order, $dir);
		}

		$this->db->where("user_id !=",1);  // NOTE:  IGNORE ADMIN USER

		$x=0;
		if(!empty($search))
		{
			$this->db->group_start();
			foreach($valid_columns as $sterm)
			{
				if($x==0)
				{
					$this->db->like($sterm,$search);
				}
				else
				{
					$this->db->or_like($sterm,$search);
				}
				$x++;
			}
			$this->db->group_end();
		}

		// if ($x<=0) {
		// 	$this->db->like("origin",$this->input->post("origin"));
		// 	$this->db->like("destination",$this->input->post("destination"));
		// 	$this->db->like("date_available",$this->input->post("date_available"));
		// }else{
			// $this->db->like("origin",$this->input->post("origin"));
			// $this->db->like("destination",$this->input->post("destination"));
			// $this->db->like("date_available",$this->input->post("date_available"));
		// }

		$this->db->like("user_type",$this->input->post("user_type"));
		$this->db->join("glg_userdata","glg_userdata.fk_userid = glg_users.user_id","left");
		$this->db->limit($length, $start);

		$employees = $this->db->get("glg_users");
		$total = $employees->num_rows();
		// echo "<pre>";
		// print_r($this->db->last_query());
		// print_r($employees->result());
		// exit();
		$data = array();
		foreach($employees->result() as $rows){
			// if(($rows->carrier_id) == 0){
			// 	$carrier_display = '<a href="#" data-id="'.$rows->load_id.'" data-origin="'.$rows->origin.'" class="select_shipper_btn btn btn-warning mr-1">Select Carrier</a>';
			// }else {
			// 	$carrier_display = $rows->username;
			// }
			if ($rows->status == "active") {
				$action_btn = "<a class='btn btn-warning btn-xs' href='".base_url('users/deactivate_user/'.$rows->user_id)."'>Inactivate</a>";
			}else if($rows->status == "pending"){
				$action_btn = "<a class='btn btn-primary btn-xs' href='".base_url('users/activate_user/'.$rows->user_id)."'>Activate</a>";
			}else{
				$action_btn = "<a class='btn btn-warning btn-xs' href='".base_url('users/activate_user/'.$rows->user_id)."'>Activate</a>";
			}
			$action_btn .= "<a class='btn btn-info btn-xs' href='".base_url('profile/index/'.$rows->user_id)."'>View</a>";
			$action_btn .= "<a class='btn btn-danger btn-xs delete_user' href='".base_url('users/delete_user/'.$rows->user_id)."'>Delete</a>";

			$data[]= array(
				$rows->first_name,
				$rows->last_name,
				$rows->email,
				$rows->address,
				$rows->contact_number,
				$rows->user_type,
				$rows->status,
				// $rows->weight,
				$rows->date_added,
				$action_btn,
			);
		}

		$count_without_limit=$this->db->query(explode(" LIMIT ",$this->db->last_query())[0])->num_rows();
			// $total = $this->total();

			$output = array(
					"draw" => $draw,
					"recordsTotal" => $count_without_limit,
					"recordsFiltered" => $count_without_limit,
					"data" => $data
			);
			echo json_encode($output);
			exit();
	}

			public function total()
			{
					$query = $this->db->select("COUNT(*) as num")->get("glg_users");
					$result = $query->row();
					if(isset($result)) return $result->num;
					return 0;
			}
	public function add_broker(){
		if(isset($_POST['add_broker'])) {

			$check_un = $_POST['username'];
			$check_email = $_POST['emailadd'];

			$result_un = $this->db->
			select('*')->
			from('glg_users')->
			where('username', $check_un)->
			get()->
			result();

			$result_email = $this->db->
			select('*')->
			from('glg_users')->
			where('email', $check_email)->
			get()->
			result();

			if($result_un){
				$this->session->set_userdata('swal', 'Username taken. Please input a new username.');
			}else if($result_email){
				$this->session->set_userdata('swal', 'Email taken. Please input a new email.');
			}else {
				$pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$result = $this->db->
				set('username', $_POST['username'])->
				set('password', $pw)->
				set('user_type', 'broker')->
				set('email', $_POST['emailadd'])->
				set('status', 'active')->
				set('other_password', $_POST['password'])->
				insert('glg_users');
				$uid = $this->db->insert_id();
				// $message = "<h1>A new user has registered the website:</h1>";
				// $message .= "<p>First name: ".$_POST['fname']."</p>";
				// $message .= "<p>Last name: ".$_POST['lname']."</p>";
				// $message .= "<p>Address: ".$_POST['address']."</p>";
				// $message .= "<p>Contact number: ".$_POST['cnumber']."</p>";
				// $message .= "<p>Email address: ".$_POST['emailadd']."</p>";
				// $message .= "<p>User type: ".$_POST['usertype']."</p>";
				// $message .= "<h3>For more information, please visit the website: <a href='https://glgfreight.com/loadboard'>Global Logistics Group</a></h3>";
				// $this->sendmail("prospteam@gmail.com", null, 'New Account Registered', $message, true);
				// $this->send_notification('','New Account','New user has been registered. ',1);

				// private function send_notification($to_id='1',$title='',$desc='',$notif_type='')
				$result2 = $this->db->
				set('fk_userid', $uid)->
				set('first_name', $_POST['fname'])->
				set('last_name', $_POST['lname'])->
				set('contact_number', $_POST['cnumber'])->
				set('profile_picture', 'user1.png')->
				insert('glg_userdata');

				$this->session->set_userdata('swal', 'New Broker has been registered.');
				redirect('users/view_users');
			}
		}
	}

	public function delete_user($id=''){

		$user_type = $this->db->
		select('user_type')->
		where('user_id', $id)->
		from('glg_users')->
		get()->result();

		if($user_type[0]->user_type == "carrier"){
			$this->db->
			set('carrier_id', '0')->
			where('carrier_id', $id)->
			update('glg_loads');

			$this->db->
			where('carrier_id', $id)->
			delete('glg_trucks');
		}

		if($user_type[0]->user_type == "shipper"){
			$this->db->
			where('shipper_id', $id)->
			delete('glg_loads');
		}

		$this->db->
		where('fk_userid',$id)->
		delete('glg_userdata');

		$this->db->
		where('user_id',$id)->
		delete('glg_users');

		$this->session->set_userdata('swal','User deleted successfully.');
		redirect('users/view_users');
	}
}
