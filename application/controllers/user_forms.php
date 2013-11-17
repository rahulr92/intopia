<?php
class User_forms extends CI_Controller {

	public function __construct() { 
		parent::__construct();
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$forms = $this->M_forms->get_insurance_frms($user_id);
		$data = array('title' => 'Insurance Forms','main_content' => 'insurance_form_v', 'forms' =>$forms);
		$this->load->view('template',$data);
		//$this->load->view('insurance_form_v');

	}

	public function admin($type)
	{
		if($type==="nec"){
		$forms = $this->M_forms->get_all_nec_frms();
		$data = array('title' => 'Insurance Forms','main_content' => 'nec_form_list_v', 'forms' =>$forms);
		$this->load->view('template',$data);
		} else if ($type =="rates")
		{
		$rates = $this->M_forms->get_all_insurance_rates();
		$data = array('title' => 'Insurance Forms','main_content' => 'rates_v', 'rates' =>$rates);
		$this->load->view('template',$data);
		}else if ($type =="w1s")
		{
		$forms = $this->M_forms->get_all_w1s_frms();
		$data = array('title' => 'W1s Forms','main_content' => 'w1s_list_v', 'forms' =>$forms);
		$this->load->view('template',$data);
		} else
		{
		$forms = $this->M_forms->get_all_insurance_frms();
		$data = array('title' => 'Insurance Forms','main_content' => 'form_list_v', 'forms' =>$forms);
		$this->load->view('template',$data);
		}
		
		//$this->load->view('insurance_form_v');

	}

	public function insurance()
	{
		
		$user_id = $this->session->userdata('user_id');
		$forms = $this->M_forms->get_insurance_frms($user_id);
		$rates = $this->M_forms->get_all_insurance_rates();
		$data = array('title' => 'Insurance Forms','main_content' => 'insurance_form_v', 'forms' =>$forms, 'rates' =>$rates);
		$this->load->view('template',$data);
	}

		public function nec()
	{
		
		$user_id = $this->session->userdata('user_id');
		$forms = $this->M_forms->get_nec_frms($user_id);
		$data = array('title' => 'NEC Forms','main_content' => 'nec_form_v', 'forms' =>$forms);
		$this->load->view('template',$data);
	}

		public function w1s()
	{
		
		$user_id = $this->session->userdata('user_id');
		$forms = $this->M_forms->get_w1s_frms($user_id);
		$teams = $this->Model->get_teams();
		$data = array('title' => 'W1s Forms','main_content' => 'w1s_form_v', 'forms' =>$forms, 'teams' => $teams);
		$this->load->view('template',$data);
	}



	public function view_insurance($insur_id)
	{
		$form = $this->M_forms->get_insurance_frm($insur_id);
		$data = array('title' => 'Intopia Listing','main_content' => 'insurance_show_v','form'=>$form);
		$this->load->view('template',$data);
	}


		public function submit_insurance_frm()
	{
	if($this->session->userdata('user_id'))
		{
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'period_id' => $this->input->post('period'),
				'money_area_id' => $this->input->post('area-sending'),
				'payment_currency_id' => $this->input->post('currency-no'),
				'us_inventory_sf' => $this->input->post('inventory-sf-value-us'),
				'ec_inventory_sf' => $this->input->post('inventory-sf-value-ec'),
				'br_inventory_sf' => $this->input->post('inventory-sf-value-br'),
				'us_chip_no'	=>	$this->input->post('chip-plants-us'),
				'ec_chip_no'	=>	$this->input->post('chip-plants-ec'),
				'br_chip_no'	=>	$this->input->post('chip-plants-br'),
				'us_pc_no'	=>	$this->input->post('pc-plants-us'),
				'ec_pc_no'	=>	$this->input->post('pc-plants-ec'),
				'br_pc_no'	=>	$this->input->post('pc-plants-br'),
				'us_inven_rt'	=>	$this->input->post('us_inven_rt'),
				'ec_inven_rt'	=>	$this->input->post('ec_inven_rt'),
				'br_inven_rt'	=>	$this->input->post('br_inven_rt'),
				'us_chip_rt'	=>	$this->input->post('us_chip_rt'),
				'ec_chip_rt'	=>	$this->input->post('ec_chip_rt'),
				'br_chip_rt'	=>	$this->input->post('br_chip_rt'),
				'us_pc_rt'	=>	$this->input->post('us_pc_rt'),
				'ec_pc_rt'	=>	$this->input->post('ec_pc_rt'),
				'br_pc_rt'	=>	$this->input->post('br_pc_rt')

				);
			
			if($this->M_forms->submit_insurance_frm($data)){
							$msg =  "Insurance form successfully submitted.";
			} else
			{
						$msg =  "Invalid data. Submission failed!";

			}

					$this->session->set_flashdata('alert_msg', $msg );
					redirect('/user_forms/insurance','location',301);
			}
			else
			{
				$url = base_url('index.php/login');
				echo "<h1>Session timed out! Please <a href='$url'>relogin</a> to submit this form!</h1>";
			}

	}

		public function view_nec($nec_id)
	{
		$form = $this->M_forms->get_nec_frm($nec_id);
		$data = array('title' => 'Intopia Listing','main_content' => 'nec_show_v','form'=>$form);
		$this->load->view('template',$data);
	}


		public function submit_nec_frm()
	{
	if($this->session->userdata('user_id'))
		{
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'current_period_id' => $this->input->post('period'),
				'exe_period_id' => $this->input->post('period-executed'),
				'area_from_id' => $this->input->post('area-from'),
				'area_to_id' => $this->input->post('area-to'),
				'prod_sold' => $this->input->post('product-sold'),
				'seller_grade_id' => $this->input->post('grade-number'),
				'unit_quantity'	=>	$this->input->post('unit-quantity'),
				'currency_id'	=>	$this->input->post('nec-currency-no'),
				'unit_price'	=>	$this->input->post('unit-price'),
				'cash_payment'	=>	$this->input->post('cash-payment'),
				'ap1_amt'	=>	$this->input->post('ap1'),
				'ap2_amt'	=>	$this->input->post('ap2'),
				'conversion'	=>	$this->input->post('cash-converted'),
				'freight_type'	=>	$this->input->post('freight')
				);
			
			if($this->M_forms->submit_nec_frm($data)){
							$msg =  "Insurance form successfully submitted.";
			} else
			{
						$msg =  "Invalid data. Submission failed!";

			}
					$this->session->set_flashdata('alert_msg', $msg );
					redirect('/user_forms/nec','location',301);

		}
		else
			{
				$url = base_url('index.php/login');
				echo "<h1>Session timed out! Please <a href='$url'>relogin</a> to submit this form!</h1>";
			}
	}

		public function update_rates()
	{		
				$quarter_id 	=	$this->input->post('quarter_id');

			$data = array(
				'us_inven_rt'	=>	$this->input->post('us_inven_rt'),
				'ec_inven_rt'	=>	$this->input->post('ec_inven_rt'),
				'br_inven_rt'	=>	$this->input->post('br_inven_rt'),
				'us_chip_rt'	=>	$this->input->post('us_chip_rt'),
				'ec_chip_rt'	=>	$this->input->post('ec_chip_rt'),
				'br_chip_rt'	=>	$this->input->post('br_chip_rt'),
				'us_pc_rt'	=>	$this->input->post('us_pc_rt'),
				'ec_pc_rt'	=>	$this->input->post('ec_pc_rt'),
				'br_pc_rt'	=>	$this->input->post('br_pc_rt')
				);
			
			$report = $this->M_forms->update_rates($data, $quarter_id);

			if(!$report['error']){
							$msg =  "Rates successfully submitted.";
			} else
			{
						$msg =  "Invalid data. Updation failed!";

			}
					$this->session->set_flashdata('alert_msg', $msg );
					redirect('/user_forms/admin/rates','location',301);
	}
	
public function submit_w1s_frm()
	{
	if($this->session->userdata('user_id'))
		{
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'sending_user_id' => $this->input->post('sending_team'),
				'period_id' => $this->input->post('period'),
				'area_from_id' => $this->input->post('area-from'),
				'area_to_id' => $this->input->post('area-to'),
				'currency_id'	=>	$this->input->post('nec-currency-no'),
				'amount'	=> 	$this->input->post('amount'),
				'special_ins'	=> 	$this->input->post('special_ins')
				);
			
			if($this->M_forms->submit_w1s_frm($data)){
							$msg =  "W1s form successfully submitted.";
			} else
			{
						$msg =  "Invalid data. Submission failed!";

			}
					$this->session->set_flashdata('alert_msg', $msg );
					redirect('/user_forms/w1s','location',301);

		}
		else
			{
				$url = base_url('index.php/login');
				echo "<h1>Session timed out! Please <a href='$url'>relogin</a> to submit this form!</h1>";
			}
	}

		public function view_w1s($w1s_id)
	{
		$form = $this->M_forms->get_w1s_frm($w1s_id);
		$data = array('title' => 'Intopia Listing','main_content' => 'w1s_show_v','form'=>$form);
		$this->load->view('template',$data);
	}

}
?>