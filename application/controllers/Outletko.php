<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("outletko_model");
    }

    public function menu($menu){

		$data['id'] = "";
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = 7;
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		$this->template->load($menu, $data);	


    }

}