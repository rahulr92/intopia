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

	public function admin()
	{
		$forms = $this->M_forms->get_all_insurance_frms();
		$data = array('title' => 'Insurance Forms','main_content' => 'form_list_v', 'forms' =>$forms);
		$this->load->view('template',$data);
		//$this->load->view('insurance_form_v');

	}

	public function insurance()
	{
		
		$data = array('title' => 'Intopia Listing','main_content' => 'insurance_form_v');
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
				'br_pc_no'	=>	$this->input->post('chip-plants-br')
				);
			
			if($this->M_forms->submit_insurance_frm($data)){
							$msg = array('msg' => "Insurance form sucessfully submitted.");
			} else
			{
						$msg = array('msg' => "Invalid data. Submission failed!");

			}

					$this->load->view('alert_v',$msg);
					$this->index();
	}

}
?>

