<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function index(){

		// ____________________________________________________________________________________
		// NOTE:  GETTING GRAPH FOR LOADS
		$res=$this->db->
		select('COUNT(*)')->
		from('glg_loads')->
		where('deleted_status', 0)->
		where("(YEAR(date_added) = '".date('Y')."' or YEAR(date_added) = '".date('Y',strtotime('-1 year'))."')")->
		group_by("MONTH(date_added)")->get()->result_array();
		// echo $this->db->last_query();
		$res2=$this->db->
		select('date_added')->
		from('glg_loads')->
		where('deleted_status', 0)->
		where("(YEAR(date_added) = '".date('Y')."' or YEAR(date_added) = '".date('Y',strtotime('-1 year'))."')")->
		group_by("MONTH(date_added)")->get()->result_array();
		// echo $this->db->last_query();
		// exit();
// date("m", strtotime($value))
		$res2_formated=[];
		foreach ($res2 as $value) {
			$res2_formated[]=date("Y-m", strtotime($value['date_added']));
		}
		// echo "<pre>";
		// print_r($res);
		// print_r($res2_formated);
		// echo "</pre>";
		$past_6_months=[];
		// $past_6_months_numeric=[];
		$past_6_months_values=[];

		for ($i = 6; $i >= 1; $i--) {
			$past_6_months[] = date('F', strtotime("-$i month"));
			$past_6_months_no_this_month[] = date('F', strtotime("-$i month"));
			// $past_6_months_numeric[] = date('m', strtotime("-$i month"));
			$past_6_months_values[]=in_array(date('Y-m', strtotime("-$i month")), $res2_formated)?$res[array_search(date('Y-m', strtotime("-$i month")), $res2_formated)]['COUNT(*)']:0;
		}
		$past_6_months[] = "This month";
		$past_6_months_no_this_month[] = date('F');
		$past_6_months_values[]=in_array(date('Y-m'), $res2_formated)?$res[array_search(date('Y-m'), $res2_formated)]['COUNT(*)']:0;

		// echo "<pre>";print_r($past_6_months);
		// echo "<br>";print_r($past_6_months_values);

		$data['past_6_months_no_this_month']=$past_6_months_no_this_month;
		$data['loads_past_6_months']=$past_6_months;
		$data['loads_past_6_months_values']=$past_6_months_values;
		// ____________________________________________________________________________________

		// NOTE:  GETTING GRAPH FOR TRUCKS
		$res=$this->db->
		select('COUNT(*)')->
		from('glg_trucks')->
		where('deleted_status', 0)->
		where("(YEAR(date_added) = '".date('Y')."' or YEAR(date_added) = '".date('Y',strtotime('-1 year'))."')")->
		group_by("MONTH(date_added)")->get()->result_array();

		// echo $this->db->last_query();
		// echo "<br>";
		$res2=$this->db->
		select('date_added')->
		from('glg_trucks')->
		where('deleted_status', 0)->
		where("(YEAR(date_added) = '".date('Y')."' or YEAR(date_added) = '".date('Y',strtotime('-1 year'))."')")->
		group_by("MONTH(date_added)")->get()->result_array();
		// echo $this->db->last_query();
		
		
		// echo "<pre>";
		// print_r($res);
		// echo "<br>";print_r($res2);
		// exit;

		$res2_formated=[];
		foreach ($res2 as $value) {
			$res2_formated[]=trim(date("Y-m", strtotime($value['date_added'])));
		}


		$past_6_months=[];
		// $past_6_months_numeric=[];
		$past_6_months_values=[];

		for ($i = 6; $i >= 1; $i--) {
			$past_6_months[] = date('F', strtotime("-$i month"));
			$past_6_months_values[]=in_array(date('Y-m', strtotime("-$i month")), $res2_formated)?$res[array_search(date('Y-m', strtotime("-$i month")), $res2_formated)]['COUNT(*)']:0;
		}
		$past_6_months[] = "This month";
		// $past_6_months_numeric[] = date('m');
		$past_6_months_values[]=in_array(date('Y-m'), $res2_formated)?$res[array_search(date('Y-m'), $res2_formated)]['COUNT(*)']:0;

		$data['trucks_past_6_months']=$past_6_months;
		// $data['past_6_months_numeric']=$past_6_months_numeric;
		$data['trucks_past_6_months_values']=$past_6_months_values;


		
		// echo "<br>";print_r(date('Y-m'));
		// echo "<br>";print_r($res2_formated);
		// echo "<br>";print_r(array("2020-02","2020-03"));
		// echo "<br>XX";print_r(array_search(date('Y-m'), $res2_formated)?"t":"flase");
		// echo "<br>XX";print_r(array_search("2020-02", array("2020-02","2020-03"))?"t":"flase");
		// exit;

		// echo "<br>";print_r($past_6_months);
		// echo "<br>";print_r($past_6_months_values);
		// exit;

 // ____________________________________________________________________________________

		$month = date('m');

		$data['users'] = $this->db->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

		$data['shippers'] = $this->db->
		where('user_type', 'shipper')->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

		$data['loads'] = $this->db->
		where('deleted_status', 0)->
		from('glg_loads')->
		count_all_results();

		$data['trucks'] = $this->db->
		where('deleted_status', 0)->
		from('glg_trucks')->
		count_all_results();

		$data['carriers'] = $this->db->
		where('user_type', 'carrier')->
		where('status', 'active')->
		from('glg_users')->
		count_all_results();

		$topstate = $this->db->
		select('origin_state, count(origin_state)')->
		where('deleted_status', 0)->
		from('glg_loads')->
		group_by('origin_state')->
		get()->result_array();

		$topstate_truck = $this->db->
		select('origin_state, count(origin_state)')->
		where('deleted_status', 0)->
		from('glg_trucks')->
		group_by('origin_state')->
		get()->result_array();

		// echo "<pre>";
		// print_r($topstate_truck);
		// echo "</pre>";
		// exit();
		// sort($topstates[]);
		// $data['topstates'] = array_column($topstate, 'count(origin)');
		// array_multisort($data['topstates'], SORT_DESC, $topstate);
		array_multisort(array_column($topstate, 'count(origin_state)'), SORT_DESC, $topstate);
		array_multisort(array_column($topstate_truck, 'count(origin_state)'), SORT_DESC, $topstate_truck);
		// $data['topstates'] = $topstate;
		// echo "<pre>";print_r($topstate);exit;
		$state = $this->getState();
		for($i = 0; $i<=3; $i++){
				$abbstate = $topstate[$i]['origin_state'];
				$topstate[$i]['origin_state'] = $state[$abbstate];
				$topstate_abbr[$i]['origin_state'] = $abbstate;
		}
		for($i = 0; $i<=3; $i++){
				if(empty($topstate_truck[$i]['origin_state'])){
					continue;
				}else{
					$abbstate = $topstate_truck[$i]['origin_state'];
					$topstate_truck[$i]['origin_state'] = $state[$abbstate];
					$topstate_truck_abbr[$i]['origin_state'] = $abbstate;
				}
		} 
		$data['topstates'] = $topstate;
		$data['topstate_abbr'] = $topstate_abbr;
		$data['topstates_truck'] = $topstate_truck;
		$data['topstates_truck_abbr'] = $topstate_truck_abbr;
		// echo "<pre>";print_r($data);exit;
		
    $this->load_page('index.php', $data,'index_footer');
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
