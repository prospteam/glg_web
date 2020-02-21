<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trackingsystem extends MY_Controller {

	function __construct(){
		parent::__construct();
		// $this->load->helper('url');
		$ip = $_SERVER['REMOTE_ADDR'];
		if(!$ip=="115.85.4.122")
		die("<br><h1><center>Under Development</center></h1>");
	}

	public function dashboard(){
		// echo "XDXDDXD";
		$this->load_page('dashboard');
		// echo "<pre>";
		// print_r($ip = $_SERVER['REMOTE_ADDR']);
	}

	public function index(){
		// echo "XDXDDXD";
  		$this->load_page('dashboard',null,'trackingsystem_view_assigned_footer.php','trackingsystem_view_assigned_header.php');
	}

  	public function view_assigned($origin='',$owner_whole_name_url_encoded="")
  	{
  		// if(is_numeric($origin)){
  		// 	$data['uid'] = $origin;
  		// 	$this->session->set_userdata('pop_over_alert','Viewing loads of '.urldecode($owner_whole_name_url_encoded).'.');
  		// }else{
  		// 	$data['origin'] = $origin;
  		// }
  		// if(isset($_POST['carrier_id'])){
  		// 	$this->db->
  		// 	set('carrier_id', $_POST['carrier_id'])->
  		// 	where('load_id', $_POST['load_id_row'])->
  		// 	update('glg_loads');
  		// }
  		// $data[''] = "view_loads_footer.php";
  		$this->load_page('trackingsystem_view_assigned',null,'trackingsystem_view_assigned_footer.php','trackingsystem_view_assigned_header.php');
  		// $this->load_page('view_loads',$data,'view_loads_footer.php','view_loads_header.php');
  	}

	public function add_load(){
		if (isset($_POST['destination'])) {
			$origin = $_POST['origin'];
			$arr1 = explode(",", $origin);
			$origin_city = $arr1[0];
			$origin_state = $arr1[1];

			$orig = trim(strtoupper($origin_state));

			$state = $this->getState();
			$origin_state_min = array_search($orig, $state);
			if($origin_state_min){
				$origin_state = $origin_state_min;
			}else {
				$origin_state = $orig;
			}

			$destination = $_POST['destination'];
			$arr2 = explode(",", $destination);
			$destination_city = $arr2[0];
			$destination_state = $arr2[1];

			$dest = trim(strtoupper($destination_state));
			$destination_state_min = array_search($dest, $state);
			if($destination_state_min){
				$destination_state = $destination_state_min;
			}else{
				$destination_state = $dest;
			}

			if(isset($_POST['trailer_type'])){
				$result=$this->db->
				set('origin', $origin_city)->
				set('origin_state', $origin_state)->
				set('shipper_id', $this->session->userdata('user_session')->user_id)->
				set('trailer_type', $_POST['trailer_type'])->
				set('destination', $destination_city)->
				set('destination_state', $destination_state)->
				set('length', $_POST['length'])->
				set('rate', $_POST['rate'])->
				// set('width', $_POST['width'])->
				// set('height', $_POST['height'])->
				set('weight', $_POST['weight'])->
				set('date_available', $_POST['date'])->
				set('commodity', $_POST['commodity'])->
				set('reference_number', $_POST['reference'])->
				// set('delivery_date', $_POST['delivery_date'])->
				set('comments', $_POST['comments'])->
				insert('glg_loads');

				// echo $this->db->last_query();
				// echo $result;
				if ($result) {
					$message = "<h1>A new load has been added:</h1>";
					$message .= "<p>Origin: ".$origin_city.", ".$origin_state."</p>";
					$message .= "<p>Destination: ".$destination_city.", ".$destination_state."</p>";
					$message .= "<p>Trailer type: ".$_POST['trailer_type']."</p>";
					$message .= "<p>Ship Date: ".$_POST['date']."</p>";
					$message .= "<p>Shipper: ".$this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name."</p>";
					$message .= "<p>Contact Number: ".$this->session->userdata('user_session')->contact_number."</p>";
					$message .= "<p>Email Address: ".$this->session->userdata('user_session')->email."</p>";
					$message .= "<h3>For more information, please visit the website: <a href='https://glgfreight.com/loadboard'>Global Logistics Group</a></h3>";
						$this->sendmail("prospteam@gmail.com", null, 'New Load Added', $message, true);
						$this->send_notification('','New Load',''.$this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name.' has added a new load.',2);
						$this->session->set_userdata('swal','New load added successfully.');
					}else {
						$this->session->set_userdata('swal','Select your Trailer Type.');
					}
			} else{
				$this->session->set_userdata('swal','Select your Trailer Type.');
			}

		// $this->db->insert('mytable', $data);
		}
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();
		$this->load_page('add_load', NULL,'add_load_footer.php', 'view_loads_header.php');
		// $this->load->view('includes/header');
		// $this->load->view('add_load');
		// $this->load->view('includes/footer');
	}

	public function map($view_origin_state='')
	{

		$data['result'] = $this->db->select('origin_state, COUNT(origin_state) AS count', false)
											->where('deleted_status !=',1)
		                  ->from('glg_loads')
		                  ->group_by('origin_state')
		                  ->get()->result();

		if ($view_origin_state!='') {
			$data['origin_state']=$view_origin_state;
			$this->db->select('*')->from('glg_loads');
			$this->db->where('deleted_status !=',1);
			$this->db->where('origin_state',$view_origin_state);
			$this->db->where('date_added >=', "(CURDATE() - INTERVAL 7 DAY)");
			$result = $this->db->get()->num_rows();
			// $data['view_origin_state_load_count_within_7_days'] = $result;
			// echo $this->db->last_query();
			// echo "<pre>";
			// print_r($data['result']);
			// echo "</pre>";
			// exit();
			$this->session->set_userdata('pop_over_alert','Highlighting '.$view_origin_state.'. There are '.$result.' number of loads added from the last 7 days');
		}

		$data['states']=$this->getState();
		$this->load_page('map',$data,"map_footer.php");
	}

	public function view_assigned_loads($origin='',$owner_whole_name_url_encoded="")
	{
		// echo "<pre>";print_r($this->session->userdata('user_session'));exit;
		if(is_numeric($origin)){
			$data['uid'] = $origin;
			// $data['owner_whole_name']=urldecode($owner_whole_name_url_encoded);
			// owner_whole_name
			$this->session->set_userdata('pop_over_alert','Viewing loads of '.urldecode($owner_whole_name_url_encoded).'.');
		}else{
			$data['origin'] = $origin;
		}
		// echo "<script>alert('".$origin."');</script>";
		// if(empty($origin)){
		// 	$data['result'] = $this->db->
		// 	select('*')->
		// 	from('glg_loads')->
		// 	get()->
		// 	result_array();
		// 	// echo "<pre>";
		// 	// print_r($this->db->last_query());
      //    //  exit();
		//
		// }else {
		// 	$data['result'] = $this->db->
		// 	select('*')->
		// 	where('origin_state', $origin)->
		// 	from('glg_loads')->
		// 	get()->
		// 	result_array();
		// 	// echo "<pre>";
		// 	// print_r($this->db->last_query());
      //    //  exit();
		//
		// }

		if(isset($_POST['carrier_id'])){
			$this->db->
			set('carrier_id', $_POST['carrier_id'])->
			where('load_id', $_POST['load_id_row'])->
			update('glg_loads');
		}

		// $data[''] = "view_loads_footer.php";
		$this->load_page('view_loads',$data,'view_loads_footer.php','view_loads_header.php');
		// $this->load->view('includes/head');
		// $this->load->view('view_loads', $data);
		// $this->load->view('includes/footer');
	}

	public function my_loads($origin='',$owner_whole_name_url_encoded="")
	{
		// echo "<pre>";print_r($this->session->userdata('user_session'));exit;
		if(is_numeric($origin)){
			$data['uid'] = $origin;
			// $data['owner_whole_name']=urldecode($owner_whole_name_url_encoded);
			// owner_whole_name
			$this->session->set_userdata('pop_over_alert','Viewing loads of '.urldecode($owner_whole_name_url_encoded).'.');
		}else{
			$data['origin'] = $origin;
		}
		// echo "<script>alert('".$origin."');</script>";
		// if(empty($origin)){
		// 	$data['result'] = $this->db->
		// 	select('*')->
		// 	from('glg_loads')->
		// 	get()->
		// 	result_array();
		// 	// echo "<pre>";
		// 	// print_r($this->db->last_query());
      //    //  exit();
		//
		// }else {
		// 	$data['result'] = $this->db->
		// 	select('*')->
		// 	where('origin_state', $origin)->
		// 	from('glg_loads')->
		// 	get()->
		// 	result_array();
		// 	// echo "<pre>";
		// 	// print_r($this->db->last_query());
      //    //  exit();
		//
		// }

		if(isset($_POST['carrier_id'])){
			$this->db->
			set('carrier_id', $_POST['carrier_id'])->
			where('load_id', $_POST['load_id_row'])->
			update('glg_loads');
		}

		// $data[''] = "view_loads_footer.php";
		$this->load_page('my_loads',$data,'my_loads_footer.php','view_loads_header.php');
		// $this->load->view('includes/head');
		// $this->load->view('view_loads', $data);
		// $this->load->view('includes/footer');


	}

	public function view_load($origin_state='')
	{
		$res = $this->db->
		select('*')->
		from('glg_trucks')->
		join('glg_userdata', 'glg_userdata.fk_userid = glg_trucks.carrier_id')->
		where('origin_state', $origin_state)->
		get()->
		result_array();
		if (!empty($res)) {
			echo json_encode($res);
		}else{
			$this->session->set_userdata('swal', 'No available carrier at the moment within the state.');
		}
	}

	public function loads_pagination()
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
				0=>'load_id',
				1=>'origin',
				2=>'origin_state',
				3=>'destination',
				4=>'destination_state',
				5=>'trailer_type',
				6=>'date_available',
				7=>'length',
				8=>'weight',
				9=>'rate',
				// 8=>'height',
				10=>'commodity',
				11=>'reference_number',
				// 10=>'delivery_date',
				12=>'comments',
				// 12=>'contact_number',
				13=>'carrier_id'
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

			$x=0;
			if(!empty($search))
			{
				foreach($valid_columns as $sterm)
				{
					if($x==0){
						$this->db->like($sterm,$search);
					}else{
						$this->db->or_like($sterm,$search);
					}
					$x++;
				}
			}

		// if ($x<=0) {
			$this->db->like("shipper_id",$this->input->post("uid"));
			$this->db->like("origin", "");
			$this->db->like("destination","");

			$origin = $this->input->post("origin");
			$arr1 = explode(",", $origin);
			if(!empty($arr1[2])){
				$origin_city = $arr1[0];
				$orig = trim(strtoupper($arr1[1]));
				$state = $this->getState();
				$origin_state_min = array_search($orig, $state);
				if($origin_state_min){
					$origin_state = $origin_state_min;
				}else {
					$origin_state = $orig;
				}
				$this->db->like("origin",$origin_city);
				$this->db->like("origin_state",$origin_state);
			}else{
				$origin = $arr1[0];
				$state = $this->getState();
				$origin_state_min = array_search($origin, $state);
				if(!empty($origin_state_min)){
					$this->db->like("origin",$origin);
				}else{
					$this->db->like("origin_state",$origin);
				}
			}

			$dest = $this->input->post("destination");
			$arr1 = explode(",", $dest);
			if(!empty($arr1[2])){
				$destination_city = $arr1[0];
				$dest = trim(strtoupper($arr1[1]));
				$destination_state_min = array_search($dest, $state);
				if($destination_state_min){
					$destination_state = $destination_state_min;
				}else{
					$destination_state = $dest;
				}
				$this->db->like("destination",$destination_city);
				$this->db->like("destination_state",$destination_state);
			}else{
				$dest = $arr1[0];
				$state = $this->getState();
				$dest_state_min = array_search($dest, $state);
				if(!empty($dest_state_min)){
					$this->db->like("destination",$dest);
				}else{
					$this->db->like("destination_state",$dest);
				}
			}

			$this->db->like("trailer_type",$this->input->post("trailer_type"));
			$this->db->like("date_available",$this->input->post("date_available"));
			$this->db->like("shipper_id",$this->input->post("uid"));
			$this->db->like("commodity",$this->input->post("commodity"));
			$this->db->like("reference_number",$this->input->post("reference"));

			// $destination = $_POST['destination'];
			// $arr2 = explode(",", $destination);
			// $destination_city = $arr2[0];
			// $destination_state = $arr2[1];


		// }else{
		// 	$this->db->like("origin",$this->input->post("origin"));
		// 	$this->db->like("destination",$this->input->post("destination"));
		// 	$this->db->like("date_available",$this->input->post("date_available"));
		// }

		$this->db->join("glg_users","glg_users.user_id = glg_loads.carrier_id","left");
		$this->db->join("glg_userdata","glg_userdata.fk_userid = glg_loads.shipper_id","left");

		// ## Custom Field value
		// $searchByName = $_POST['custom_length'];
		// $searchByGender = $_POST['searchByGender'];
		// ## Search
		// $searchQuery = " ";
		// if($searchByName != ''){
		// 	 $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
		// }
		// if($searchByGender != ''){
		// 	 $searchQuery .= " and (gender='".$searchByGender."') ";
		// }

		$this->db->limit($length,$start);

		if (false) {
		// if (!empty($this->session->userdata('shipper_status'))) {
			$this->db->where("shipper_id",$this->session->userdata('user_session')->user_id);
		}else if ($this->session->userdata('user_session')->user_type == "carrier") {
			$this->db->where("carrier_id",$this->session->userdata('user_session')->user_id);
		}

		$this->db->where("deleted_status", 0);

		$employees = $this->db->get("glg_loads");

		echo $this->db->last_query();
		echo "<pre>";print_r($employees);exit;
		// print_r($this->db->last_query());
		//  exit();
		// echo "<pre>";
		// print_r($employees->result());
		// exit();
		$data = array();
		foreach($employees->result() as $rows){
			if(($rows->carrier_id) == 0 && (empty($this->session->userdata('shipper_status')))){
				$carrier_display = '<a href="javascript:void(0);" data-id="'.$rows->load_id.'" data-origin="'.$rows->origin_state.'" class="select_shipper_btn btn btn-primary mr-1 btn-xs">Select Carrier</a>';
		}else {
				$carrier_display = $rows->username;
			}
			//onclick="return confirm(\'Delete this load?\')"
			if(($rows->carrier_id) == 0) {
				$carrier_action = '<a href="'.base_url('loads') .'/edit_load/'.$rows->load_id.'" class="btn btn-warning btn-xs mr-1" style="">Edit Load</a>';
				if($this->session->userdata('user_session')->user_type == 'broker' && $this->session->userdata('user_session')->fk_userid == $rows->shipper_id){
					$carrier_action .= '<a href="'.base_url('loads') .'/delete_load/'.$rows->load_id.'" class="btn btn-default mr-1 btn-xs delete_load" >Delete My Load</a>';
				}else if($this->session->userdata('user_session')->user_type == 'admin' || $this->session->userdata('user_session')->user_type == 'shipper' ){
					$carrier_action .= '<a href="'.base_url('loads') .'/delete_load/'.$rows->load_id.'" class="btn btn-default mr-1 btn-xs delete_load" >Delete Load</a>';
				}
			} else {
				// $carrier_action = '<a href="javascript:void(0);" class="btn btn-default btn-xs">Buttons Disabled</a>';
				$carrier_action = '<a href="'.base_url('loads') .'/remove_carrier/'.$rows->load_id.'" class="btn btn-warning btn-xs mr-1 remove_carrier" style="">Remove Carrier</a>';
			}

			if(!empty($this->session->userdata('carrier_status'))){
				$carrier_display = '<a href="javascript:void(0);" data-id="'.$rows->fk_userid.'" class="view_info btn-sm btn btn-primary">Broker Info</a>';
				$carrier_display .= '<a href="javascript:void(0);" data-id="'.$rows->fk_userid.'" data-loadid="'.$rows->load_id.'" class="rate_info btn-sm btn btn-warning">Send A Rate</a>';
			}

			$data[]= array(
				$rows->load_id,
				$rows->origin,
				'<a href="'.base_url('trucks/map/').$rows->origin_state.'" class="btn btn-warning btn-xs mr-1">'.$rows->origin_state.'</a>',
				$rows->destination,
				$rows->destination_state,
				$rows->trailer_type,
				$rows->date_available,
				$rows->length,
				$rows->weight,
				$rows->rate,
				// $rows->height,
				$rows->commodity,
				$rows->reference_number,
				// $rows->delivery_date,
				$rows->comments,
				$carrier_display,
				$carrier_action
			);
		}

		// $totaLoads = $this->totaLoads();
		$totaLoads=$this->db->query(explode("LIMIT ",$this->db->last_query())[0])->num_rows();

		$output = array(
				"draw" => $draw,
				"recordsTotal" => $totaLoads,
				"recordsFiltered" => $totaLoads,
				"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function loads_pagination2()
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
				0=>'load_id',
				1=>'origin',
				2=>'origin_state',
				3=>'destination',
				4=>'destination_state',
				5=>'trailer_type',
				6=>'date_available',
				7=>'length',
				8=>'weight',
				// 8=>'height',
				9=>'rate',
				10=>'commodity',
				11=>'reference_number',
				// 10=>'delivery_date',
				12=>'comments',
				// 12=>'contact_number',
				13=>'carrier_id'
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

			$x=0;
			if(!empty($search))
			{
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
			}



		// if ($x<=0) {
			$this->db->like("shipper_id",$this->input->post("uid"));
			$this->db->like("origin", "");
			$this->db->like("destination","");

			$origin = $this->input->post("origin");
			$arr1 = explode(",", $origin);
			if(!empty($arr1[2])){
				$origin_city = $arr1[0];
				$orig = trim(strtoupper($arr1[1]));
				$state = $this->getState();
				$origin_state_min = array_search($orig, $state);
				if($origin_state_min){
					$origin_state = $origin_state_min;
				}else {
					$origin_state = $orig;
				}
				$this->db->like("origin",$origin_city);
				$this->db->like("origin_state",$origin_state);
			}else{
				$origin = $arr1[0];
				$state = $this->getState();
				$origin_state_min = array_search($origin, $state);
				if(!empty($origin_state_min)){
					$this->db->like("origin",$origin);
				}else{
					$this->db->like("origin_state",$origin);
				}
			}

			$dest = $this->input->post("destination");
			$arr1 = explode(",", $dest);
			if(!empty($arr1[2])){
				$destination_city = $arr1[0];
				$dest = trim(strtoupper($arr1[1]));
				$destination_state_min = array_search($dest, $state);
				if($destination_state_min){
					$destination_state = $destination_state_min;
				}else{
					$destination_state = $dest;
				}
				$this->db->like("destination",$destination_city);
				$this->db->like("destination_state",$destination_state);
			}else{
				$dest = $arr1[0];
				$state = $this->getState();
				$dest_state_min = array_search($dest, $state);
				if(!empty($dest_state_min)){
					$this->db->like("destination",$dest);
				}else{
					$this->db->like("destination_state",$dest);
				}
			}

			$this->db->like("trailer_type",$this->input->post("trailer_type"));
			$this->db->like("date_available",$this->input->post("date_available"));
			$this->db->like("shipper_id",$this->input->post("uid"));
			$this->db->like("commodity",$this->input->post("commodity"));
			$this->db->like("reference_number",$this->input->post("reference"));

			// $destination = $_POST['destination'];
			// $arr2 = explode(",", $destination);
			// $destination_city = $arr2[0];
			// $destination_state = $arr2[1];


		// }else{
		// 	$this->db->like("origin",$this->input->post("origin"));
		// 	$this->db->like("destination",$this->input->post("destination"));
		// 	$this->db->like("date_available",$this->input->post("date_available"));
		// }

		$this->db->join("glg_users","glg_users.user_id = glg_loads.carrier_id","left");
		$this->db->join("glg_userdata","glg_userdata.fk_userid = glg_loads.shipper_id","left");

			// ## Custom Field value
			// $searchByName = $_POST['custom_length'];
			// $searchByGender = $_POST['searchByGender'];
			// ## Search
			// $searchQuery = " ";
			// if($searchByName != ''){
			// 	 $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
			// }
			// if($searchByGender != ''){
			// 	 $searchQuery .= " and (gender='".$searchByGender."') ";
			// }

			$this->db->limit($length,$start);

			$this->db->where("shipper_id",$this->session->userdata('user_session')->user_id);


			$this->db->where("deleted_status", 0);
			$test = $employees = $this->db->get("glg_loads");
			// echo "<pre>";print_r($test);exit;
			// print_r($this->db->last_query());
			//  exit();

			// echo "<pre>";
			// print_r($employees->result());
			// exit();
			$data = array();
			foreach($employees->result() as $rows){
				if(($rows->carrier_id) == 0 && (empty($this->session->userdata('shipper_status')))){
					$carrier_display = '<a href="javascript:void(0);" data-id="'.$rows->load_id.'" data-origin="'.$rows->origin_state.'" class="select_shipper_btn btn btn-primary mr-1 btn-xs">Select Carrier</a>';
			}else {
					$carrier_display = $rows->username;
				}
				//onclick="return confirm(\'Delete this load?\')"
				if(($rows->carrier_id) == 0) {
					$carrier_action = '<a href="'.base_url('loads') .'/edit_load/'.$rows->load_id.'" class="btn btn-warning btn-xs mr-1" style="">Edit Load</a>';
					if($this->session->userdata('user_session')->user_type == 'broker' && $this->session->userdata('user_session')->fk_userid == $rows->shipper_id){
						$carrier_action .= '<a href="'.base_url('loads') .'/delete_load/'.$rows->load_id.'" class="btn btn-default mr-1 btn-xs delete_load" >Delete My Load</a>';
					}else if($this->session->userdata('user_session')->user_type == 'admin' || $this->session->userdata('user_session')->user_type == 'shipper' ){
						$carrier_action .= '<a href="'.base_url('loads') .'/delete_load/'.$rows->load_id.'" class="btn btn-default mr-1 btn-xs delete_load" >Delete Load</a>';
					}
				} else {
					// $carrier_action = '<a href="javascript:void(0);" class="btn btn-default btn-xs">Buttons Disabled</a>';
					$carrier_action = '<a href="'.base_url('loads') .'/remove_carrier/'.$rows->load_id.'" class="btn btn-warning btn-xs mr-1 remove_carrier" style="">Remove Carrier</a>';
				}

				if(!empty($this->session->userdata('carrier_status'))){
					$carrier_display = '<a href="javascript:void(0);" data-id="'.$rows->fk_userid.'" class="view_info btn-sm btn btn-primary">Broker Info</a>';
					$carrier_display .= '<a href="javascript:void(0);" data-id="'.$rows->fk_userid.'" data-loadid="'.$rows->load_id.'" class="rate_info btn-sm btn btn-warning">Send A Rate</a>';
				}

				$data[]= array(
					$rows->load_id,
					$rows->origin,
					'<a href="'.base_url('trucks/map/').$rows->origin_state.'" class="btn btn-warning btn-xs mr-1">'.$rows->origin_state.'</a>',
					$rows->destination,
					$rows->destination_state,
					$rows->trailer_type,
					$rows->date_available,
					$rows->length,
					$rows->width,
					$rows->height,
					$rows->weight,
					$rows->commodity,
					$rows->reference_number,
					// $rows->delivery_date,
					$rows->comments,
					$carrier_display,
					$carrier_action
				);
			}

			// $totaLoads = $this->totaLoads();
			$totaLoads=$this->db->query(explode(" LIMIT ",$this->db->last_query())[0])->num_rows();

			$output = array(
					"draw" => $draw,
					"recordsTotal" => $totaLoads,
					"recordsFiltered" => $totaLoads,
					"data" => $data
			);

			echo json_encode($output);
			exit();
	}

	public function totaLoads()
	{
		if (!empty($this->session->userdata('shipper_status'))) {
			$query = $this->db->select("COUNT(*) as num")->where("shipper_id",$this->session->userdata('user_session')->user_id)->where("deleted_status", 0)->get("glg_loads");
		} else {
			$query = $this->db->select("COUNT(*) as num")->where("deleted_status", 0)->get("glg_loads");
		}
			$result = $query->row();
			if(isset($result)) return $result->num;
			return 0;
	}

	public function edit_load($id=''){

		$data['load'] = $this->db->
		select('*')->
		where('load_id', $id)->
		from('glg_loads')->
		get()->row();



		if(isset($_POST['origin'])){

			$origin = $_POST['origin'];
			$arr1 = explode(",", $origin);
			$origin_city = $arr1[0];
			$origin_state = $arr1[1];

			$orig = trim(strtoupper($origin_state));

			$state = $this->getState();
			$origin_state_min = array_search($orig, $state);
			if($origin_state_min){
				$origin_state = $origin_state_min;
			}else {
				$origin_state = $orig;
			}

			$destination = $_POST['destination'];
			$arr2 = explode(",", $destination);
			$destination_city = $arr2[0];
			$destination_state = $arr2[1];

			$dest = trim(strtoupper($destination_state));
			$destination_state_min = array_search($dest, $state);
			if($destination_state_min){
				$destination_state = $destination_state_min;
			}else{
				$destination_state = $dest;
			}

			$result=$this->db->
			set('origin', $origin_city )->
			set('origin_state', $origin_state)->
			set('trailer_type', $_POST['trailer_type'])->
			set('destination', $destination_city)->
			set('destination_state', $destination_state)->
			set('length', $_POST['length'])->
			set('rate', $_POST['rate'])->
			set('width', $_POST['weight'])->
			// set('height', $_POST['height'])->
			// set('weight', $_POST['weight'])->
			set('commodity', $_POST['commodity'])->
			set('reference_number', $_POST['reference'])->
			set('date_available', $_POST['date'])->
			// set('delivery_date', $_POST['delivery_date'])->
			set('comments', $_POST['comments'])->
			where('load_id', $_POST['load_id'])->
			update('glg_loads');

			if ($result) {
				$this->session->set_userdata('swal','Load updated successfully.');
			}
			redirect('loads/view_loads');
		}

		$this->load_page('edit_load', $data, 'edit_load_footer.php', 'view_loads_header.php');
	}

	public function delete_load($id=''){
		$result=$this->db->
		set('deleted_status', 1)->
		where('load_id', $id)->
		update('glg_loads');

		redirect('loads/view_loads');
	}

	public function remove_carrier($id=''){
		$result=$this->db->
		set('carrier_id', 0)->
		where('load_id', $id)->
		update('glg_loads');

		redirect('loads/view_loads');
	}

	public function view_info($uid=""){
		$res = $this->db->
		select('*')->
		from('glg_userdata')->
		where('fk_userid', $uid)->
		join('glg_users', 'glg_users.user_id = glg_userdata.fk_userid')->
		get()->
		result_array();
		if (!empty($res)) {
			echo json_encode($res);
		}
	}

	public function sendrate($id=""){
		$load =	$this->db->
		select('*')->
		from('glg_loads')->
		where('load_id', $_POST['load_id'])->
		join('glg_userdata', 'glg_userdata.fk_userid = glg_loads.shipper_id')->
		get()->result('array');

		$email =	$this->db->
		select('email')->
		from('glg_users')->
		where('user_id', $_POST['shipper_uid'])->
		get()->result('array');
		$email = $email[0]['email'];

		$message = "<h1>A Carrier has sent a rate for your load: </h1>";
		$message .= "<p>Carrier Name: ".$_POST['name']."</p>";
		$message .= "<p>Rate: ".$_POST['rate']."</p>";
		$message .= "<p>Contact Number: ".$_POST['contact']."</p>";
		$message .= "<p>Target Load: ".$_POST['target_load']."</p>";
		$message .= "<h3>Rated Load:</h3>";
		$message .= "<p>Load Origin: ".$load[0]['origin'].", ".$load[0]['origin_state']."</p>";
		$message .= "<p>Load Destination: ".$load[0]['destination'].", ".$load[0]['destination_state']."</p>";
		$message .= "<p>Commodity: ".$load[0]['commodity']."</p>";
		$message .= "<p>Trailer Type: ".$load[0]['trailer_type']."</p>";
		$this->sendmail($email, null, 'New Notification', $message, true);
		$this->send_notification('','Rate Sent',''.$this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name.' has sent a rate to '. $load[0]['first_name']. " ". $load[0]['last_name']. '\'s load.',2);
		$this->session->set_userdata('swal','Email sent successfully.');
		redirect('loads/view_loads');
	}

	public function delete_loads(){
		$loads = explode(',', $_POST['data']);
		$load_count = count($loads) - 1;

		for($i= 0; $i<=$load_count; $i++){
		 $output = $this->db->
			set('deleted_status', 1)->
			where('load_id', $loads[$i])->
			update('glg_loads');
		}
		echo json_encode($output);

	}
}
