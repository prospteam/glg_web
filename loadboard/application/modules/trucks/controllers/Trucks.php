<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trucks extends MY_Controller {

	public function index(){
		$data['ctab'] = 1;
		$this->load_page('index', $data);
	}

	public function map($view_origin_state='')
	{

		$this->db->select('origin_state, COUNT(origin_state) AS count', false)->from('glg_trucks')->where('deleted_status !=',1);
		$this->db->group_by('origin_state');

		$data['result'] = $this->db->get()->result();

		if ($view_origin_state!='') {

			$data['origin_state']=$view_origin_state;
			$this->db->select('*')->from('glg_trucks');
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
			$this->session->set_userdata('pop_over_alert','Highlighting '.$view_origin_state.'. There are '.$result.' number of trucks added from the last 7 days');
		}
		$data['states']=$this->getState();
		$this->load_page('map',$data,'map_footer.php');
	}

	public function destmap($view_destination_state='')
	{

		$this->db->select('destination_state, COUNT(destination_state) AS count', false)->from('glg_trucks')->where('deleted_status !=',1);
		$this->db->group_by('origin_state');

		$data['result'] = $this->db->get()->result();

		if ($view_destination_state!='') {

			$data['destination_state']=$view_destination_state;
			$this->db->select('*')->from('glg_trucks');
			$this->db->where('deleted_status !=',1);
			$this->db->where('destination_state',$view_destination_state);
			$this->db->where('date_added >=', "(CURDATE() - INTERVAL 7 DAY)");
			$result = $this->db->get()->num_rows();
			// $data['view_origin_state_load_count_within_7_days'] = $result;
			// echo $this->db->last_query();
			// echo "<pre>";
			// print_r($data['result']);
			// echo "</pre>";
			// exit();
			$this->session->set_userdata('pop_over_alert','Highlighting '.$view_destination_state.'. There are '.$result.' number of trucks added from the last 7 days');
		}
		$data['states']=$this->getState();
		$this->load_page('map',$data,'map_footer.php');
	}

	public function add_truck(){

				if (isset($_POST['truck_submit'])) {
					if (!isset($_POST['trailer_type'])) {
						$this->session->set_userdata('swal','Select your Trailer Type.');
						redirect('trucks/add_truck');
					}

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
					set('origin', $origin_city)->
					set('origin_state', $origin_state)->
					set('trailer_type', $_POST['trailer_type'])->
					set('destination', $destination_city)->
					set('destination_state', $destination_state)->
					set('carrier_id', $this->session->userdata('user_session')->user_id)->
					// set('length', $_POST['length'])->
					// set('width', $_POST['width'])->
					// set('height', $_POST['origin'])->
					// set('weight', $_POST['weight'])->
					set('date_available', $_POST['date'])->
					set('comments', $_POST['comments'])->
					insert('glg_trucks');

					// echo $this->db->last_query();
					// echo $result;
					if ($result) {
						$message = "<h1>A new truck has been added:</h1>";
						$message .= "<p>Origin: ".$origin_city.", ".$origin_state."</p>";
						$message .= "<p>Destination: ".$destination_city.", ".$destination_state."</p>";
						$message .= "<p>Trailer type: ".$_POST['trailer_type']."</p>";
						$message .= "<p>Ship Date: ".$_POST['date']."</p>";
						$message .= "<p>Shipper: ".$this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name."</p>";
						$message .= "<p>Contact Number: ".$this->session->userdata('user_session')->contact_number."</p>";
						$message .= "<p>Email Address: ".$this->session->userdata('user_session')->email."</p>";
						$message .= "<h3>For more information, please visit the website: <a href='https://glgfreight.com/loadboard'>Global Logistics Group</a></h3>";
						$this->sendmail("prospteam@gmail.com", null, 'New Truck Added', $message, true);
						$this->send_notification('','New Truck',''.$this->session->userdata('user_session')->first_name." ".$this->session->userdata('user_session')->last_name.' has added a new truck.',3);

						$this->session->set_userdata('swal','Truck added successfully.');
						$this->session->set_userdata('pop_over_alert','Viewing loads nearby.');
						redirect('loads/view_loads/'.$origin_state);
					}
		// $this->db->insert('mytable', $data);
			}
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();
		$this->load_page('add_truck', NULL,'add_truck_footer.php', 'view_trucks_header.php');
		// $this->load->view('includes/header');
		// $this->load->view('add_load');
		// $this->load->view('includes/footer');
	}

	public function view_trucks($origin='')
	{
		$data['origin'] = $origin;
		// $data['result'] = $this->db->
		// select('*')->
		// from('glg_trucks')->
		// get()->
		// result_array();
		//
		// if(isset($_POST['appoint'])){
		// 	$this->db->
		// 	set('carrier_id', $_POST['carrier_id'])->
		// 	where('load_id', $_POST['load_id_row'])->
		// 	update('glg_loads');
		// }

		// $data[''] = "view_loads_footer.php";
		$this->load_page('view_trucks',$data,'view_trucks_footer.php','view_trucks_header.php');
		// $this->load->view('includes/head');
		// $this->load->view('view_loads', $data);
		// $this->load->view('includes/footer');

	}


		public function trucks_pagination()
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
					0=>'origin',
					1=>'origin_state',
					2=>'destination',
					3=>'destination_state',
					4=>'trailer_type',
					5=>'date_available',
					// 4=>'length',
					// 5=>'width',
					// 6=>'height',
					// 7=>'weight',
					6=>'comments',
					// 7=>'category',
					8=>'carrier_id'
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

			// $this->db->join("glg_users","glg_users.user_id = glg_loads.carrier_id","left");

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

				// $totaLoads = $this->db->get("glg_trucks")->num_rows();

				if (!empty($this->session->userdata('carrier_status'))) {
					$this->db->where("carrier_id",$this->session->userdata('user_session')->user_id);
					$admin=false;
				}else{
					$admin=true;
				}

				$this->db->where("deleted_status", 0);

				// $count_without_limit = $this->db; // REMEBER THIS QUERY
				// echo "<pre>";
				// print_r($count_without_limit);
				// echo "</pre>";
				$this->db->limit($length,$start);

				$employees = $this->db->get("glg_trucks");

				$data = array();
				foreach($employees->result() as $rows){
					$carrier_actions="";
					if ($this->session->userdata('user_session')->user_type == 'admin' || $this->session->userdata('user_session')->user_type == 'carrier') {
						$carrier_actions = '<a href="'.base_url('trucks') .'/edit_truck/'.$rows->truck_id.'" class="btn btn-primary btn-xs mr-1"">Edit Truck</a> <a href="'.base_url('trucks') .'/delete_truck/'.$rows->truck_id.'" class="btn btn-default btn-xs mr-1 delete_truck">Delete Truck</a>';
					}

					if ($admin) {
						$carrier_actions .= '<a href="'.base_url('profile/index/').$rows->carrier_id.'" class="btn btn-info btn-xs mr-1">View User</a>';
					}

					$trip_miles_link = '<a href="'.base_url("mileage/index/$rows->origin/$rows->origin_state/$rows->destination/$rows->destination_state").'" class="btn btn-warning btn-xs mr-1"">View Trip Miles</a>';

					// if(($rows->carrier_id) == 0){
					// 	$carrier_display = '<a href="#" data-id="'.$rows->load_id.'" data-origin="'.$rows->origin.'" class="select_shipper_btn btn btn-warning mr-1">Select Carrier</a>';
					// }else {
					// 	$carrier_display = $rows->username;
					// }

					$data[]= array(
						$rows->origin,
						'<a href="'.base_url('trucks/map/').$rows->origin_state.'" class="btn btn-warning btn-xs mr-1">'.$rows->origin_state.'</a>',
						$rows->destination,
						'<a href="'.base_url('trucks/destmap/').$rows->destination_state.'" class="btn btn-warning btn-xs mr-1">'.$rows->destination_state.'</a>',
						$trip_miles_link,
						$rows->trailer_type,
						$rows->date_available,
						// $rows->length,
						// $rows->width,
						// $rows->height,
						// $rows->weight,
						$rows->comments,
						// $rows->category,
						$carrier_actions,
					);
				}

								// echo "<pre>";
				$count_without_limit=$this->db->query(explode(" LIMIT ",$this->db->last_query())[0])->num_rows();
				// $totaLoads = $this->totaLoads();
				// echo "<pre>";
				// print_r($count_without_limit);
				// echo "</pre>";
				// exit();
				// $count_without_limit = $count_without_limit->where("deleted_status", 0)->get("glg_trucks")->num_rows(); // TO GET RESULT

				$output = array(
						"draw" => $draw,
						"recordsTotal" => ($count_without_limit),
						"recordsFiltered" => ($count_without_limit),
						// "recordsTotal" => count($data),
						// "recordsFiltered" => count($data),
						"data" => $data
				);

				echo json_encode($output);
				exit();
			}

			public function totaLoads() {

				if (!empty($this->session->userdata('carrier_status'))) {
					$this->db->where("carrier_id",$this->session->userdata('user_session')->user_id);
				}
				if (!empty($this->session->userdata('carrier_status'))) {
					$query = $this->db->select("COUNT(*) as num")->where("carrier_id",$this->session->userdata('user_session')->user_id)->where("deleted_status", 0)->get("glg_trucks");
				} else {
					$query = $this->db->select("COUNT(*) as num")->get("glg_trucks");
				}
					$result = $query->row();
					if(isset($result)) return $result->num;
					return 0;
			}

			public function edit_truck($id=''){

				$data['truck'] = $this->db->
				select('*')->
				where('truck_id', $id)->
				from('glg_trucks')->
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
					set('origin', $origin_city)->
					set('origin_state', $origin_state)->
					set('trailer_type', $_POST['trailer_type'])->
					set('destination', $destination_city)->
					set('destination_state', $destination_state)->
					set('date_available', $_POST['date'])->
					set('comments', $_POST['comments'])->
					where('truck_id', $_POST['truck_id'])->
					update('glg_trucks');

					if ($result) {
						$this->session->set_userdata('swal','Truck info updated successfully.');
						redirect('trucks/view_trucks');
					}
				}

				$this->load_page('edit_truck', $data,'edit_truck_footer.php', 'view_trucks_header.php');
			}

			public function delete_truck($id=''){
				$result=$this->db->
				set('deleted_status', 1)->
				where('truck_id', $id)->
				update('glg_trucks');

				redirect('trucks/view_trucks');
			}
}
