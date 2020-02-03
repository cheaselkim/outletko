<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("outletko_model");
    }

	public function featured_outlet(){
		$result = $this->outletko_model->featured_outlet();

		foreach ($result as $key => $value) {
			$data['data'][$key] = array(
				"account_name" => $value->account_name,
				"link_name" => $value->link_name,
				"about_us" => $value->about_us,
				"loc_image" => ($value->loc_image == null ? null : unserialize($value->loc_image))
 			);
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
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