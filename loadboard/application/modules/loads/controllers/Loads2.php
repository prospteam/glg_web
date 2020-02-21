<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loads2 extends MY_Controller {
	public function add_load(){

				if (isset($_POST['load_submit'])) {
					$result=$this->db->
					set('origin', $_POST['origin'])->
					set('trailer_type', $_POST['trailer_type'])->
					set('destination', $_POST['destination'])->
					set('length', $_POST['length'])->
					set('width', $_POST['width'])->
					set('height', $_POST['origin'])->
					set('weight', $_POST['weight'])->
					set('date_available', $_POST['date'])->
					set('comments', $_POST['comments'])->
					insert('glg_loads');

					// echo $this->db->last_query();
					// echo $result;
					if ($result) {
						$this->session->set_userdata('swal','success');
					}
		// $this->db->insert('mytable', $data);
				}
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();
		$this->load_page('add_load');
		// $this->load->view('includes/header');
		// $this->load->view('add_load');
		// $this->load->view('includes/footer');

	}

	public function map($value='')
	{
		$this->load_page('map');
	}

	public function view_loads()
	{

		$data['result'] = $this->db->
		select('*')->
		from('glg_loads')->
		get()->
		result_array();
		// $data[''] = "view_loads_footer.php";
		$this->load_page('view_loads2',$data,'view_loads_footer2.php','view_loads_header.php');
		// $this->load->view('includes/head');
		// $this->load->view('view_loads', $data);
		// $this->load->view('includes/footer');
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
				0=>'origin',
				1=>'destination',
				2=>'trailer_type',
				3=>'date_available',
				4=>'length',
				5=>'width',
				6=>'height',
				7=>'weight',
				8=>'date_available',
				9=>'comments',
				10=>'category',
				11=>'carrier_id',
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


			if ($x<=0) {
				$this->db->like("origin",$this->input->post("origin"));
				$this->db->like("destination",$this->input->post("destination"));
				$this->db->like("date_available",$this->input->post("date_available"));
			}else{
				$this->db->like("origin",$this->input->post("origin"));
				$this->db->like("destination",$this->input->post("destination"));
				$this->db->like("date_available",$this->input->post("date_available"));
			}

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
			$employees = $this->db->get("glg_loads");

			// echo "<pre>";
			// print_r($employees->result());
			// echo "</pre>";
			// exit();
			$data = array();
			foreach($employees->result() as $rows)
			{
				if(($rows->carrier_id) == 0){
					$carrier_display = '<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-warning mr-1">Select Shipper</a>';
				}else {
					$carrier_display = $rows->carrier_id;
				}
				$data[]= array(
					$rows->origin,
					$rows->destination,
					$rows->trailer_type,
					$rows->date_available,
					$rows->length,
					$rows->width,
					$rows->height,
					$rows->weight,
					$rows->date_available,
					$rows->comments,
					$rows->category,
					$carrier_display
				);
			}

			$total_employees = $this->totalEmployees();
			$output = array(
					"draw" => $draw,
					"recordsTotal" => $total_employees,
					"recordsFiltered" => $total_employees,
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
				0=>'origin',
				1=>'destination',
				2=>'trailer_type',
				3=>'date_available',
				4=>'length',
				5=>'width',
				6=>'height',
				7=>'weight',
				8=>'date_available',
				9=>'comments',
				10=>'category',
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

			if ($x<=0) {
				$this->db->like("origin",$this->input->post("origin"));
				$this->db->like("destination",$this->input->post("destination"));
				$this->db->like("date_available",$this->input->post("date_available"));
			}else{
				$this->db->or_like("origin",$this->input->post("origin"));
				$this->db->or_like("destination",$this->input->post("destination"));
				$this->db->or_like("date_available",$this->input->post("date_available"));
			}

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
			$employees = $this->db->get("glg_loads");

			echo "<pre>";
			print_r($employees->result());
			echo "</pre>";
			exit();
			$data = array();
			foreach($employees->result() as $rows)
			{
				$data[]= array(
					$rows->origin,
					$rows->destination,
					$rows->trailer_type,
					$rows->date_available,
					$rows->length,
					$rows->width,
					$rows->height,
					$rows->weight,
					$rows->date_available,
					$rows->comments,
					$rows->category,
					'<a href="#" class="btn btn-warning mr-1">Edit</a>
					 <a href="#" class="btn btn-danger mr-1">Delete</a>'
				);
			}

			$total_employees = $this->totalEmployees();
			$output = array(
					"draw" => $draw,
					"recordsTotal" => $total_employees,
					"recordsFiltered" => $total_employees,
					"data" => $data
			);
			echo json_encode($output);
			exit();
	}

	public function totalEmployees()
	{
			$query = $this->db->select("COUNT(*) as num")->get("glg_loads");
			$result = $query->row();
			if(isset($result)) return $result->num;
			return 0;
	}
}
