<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	  public function __construct(){
        parent::__construct();
        $this->load->helper("search");
        $this->load->model("store_model");
	  }

	public function store($store){
        
            $prod_id = 0;

            if (!empty($this->session->userdata("comp_prod_id"))){
                $prod_id = $this->session->userdata("comp_prod_id");
                $this->session->unset_userdata("comp_prod_id");
            }

            $data['id'] = $this->store_model->search_store($store);
            $data['comp_prod_id'] = $prod_id;
            $data['sub_module'] = 0;
			$data['menu_module'] = 0;
			$data['edit'] = 0;
			$data['function'] = 0;
			$data['width'] = 1366;
			$data['account_id'] = $this->session->userdata("account_id");
            $data['owner'] = 0;

			if (!empty($data['id'])){
				if ($this->session->userdata("validated") == true){
					// $data['user_type'] = $this->session->userdata('user_type');
                    $result = $this->login_model->check_session();	
                    if ($this->session->userdata("user_type") == "2"){
                        $link_name = $this->store_model->get_linkname();
                    }else{
                        $link_name = $this->store_model->get_linkname_id($data['id']);
                    }
					if ($result != true){
						redirect("/");
					}else{
                        if ($this->session->userdata("user_type") == "4"){
                            if ($store != $link_name){
                                redirect("/".$link_name);
                            }else{
                                $data['user_type'] = $this->session->userdata('user_type');
                            }    
                        }else{
                            $data['user_type'] = $this->session->userdata('user_type');
                        }
					}
				}else{
					$data['user_type'] = 6;
				}
				
				// var_dump($this->session->userdata());

                if ($this->session->userdata("user_type") == "1"){
                    $menu = "9";
                }else{
                    $menu = "0";
                }

                $this->template->load($menu, $data);			
			}else{
				redirect("/");
			}




    }
    
    public function products($product){
        $comp_id = substr(substr($this->input->get("OS"), 5), 0, -3);
        $prod_id = substr(substr($this->input->get("pd"), 2), 0, -3);;

        $link_name = $this->store_model->get_linkname_id($comp_id);
        $this->session->set_userdata("comp_prod_id", $prod_id);

        redirect("/".$link_name);

    }

    public function all(){

        $data['city_id']  = "";
		$data['prov_id'] = "";
        $data['product'] = "";	
        $data['tbl_prod'] = "";


        $query = $this->store_model->all_store();
        $data['tbl_store'] = tbl_query($query);	
        $data['store'] = 1;	    
		
		$data['id'] = "";
		$menu = 1;
		$data['function'] = 0;
		$data['sub_module'] = 0;
		$data['user_type'] = 6;
		$data['menu_module'] = 0;
		$data['account_id'] = 0;
		$data['owner'] = 0;
		$data['edit'] = 0;
		$data['width'] = 1366;

		if ($this->session->userdata("validated") == true){
			$result = $this->login_model->check_session();

			if ($result != true){
				redirect("/");
			}else{
				$data['user_type'] = 5;
			}
		}

		$this->template->load($menu, $data);        

    }

}
