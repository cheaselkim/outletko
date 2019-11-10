<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("product_model");
            $this->load->helper("product");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
	}

    public function account_tax(){
        $data['data'] = $this->product_model->account_tax();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function product_type(){
		$data['data'] = $this->product_model->product_type();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_brand(){
		$data['data'] = $this->product_model->product_brand();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_model(){
		$data['data'] = $this->product_model->product_model();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_category(){
		$data['data'] = $this->product_model->product_category();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_color(){
		$data['data'] = $this->product_model->product_color();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_size(){
		$data['data'] = $this->product_model->product_size();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_class(){
        $prod_cat = $this->input->post("prod_cat", TRUE);
		$data['data'] = $this->product_model->product_class($prod_cat);
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_unit(){
		$data['data'] = $this->product_model->product_unit();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);		
	}

	public function product_tax(){
		$data['data'] = $this->product_model->product_tax();
        $data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);				
	}

    public function product_ave_cost(){
        $id = $this->input->post("id", TRUE);
        $data['data'] = $this->product_model->product_ave_cost($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function outlet(){
        $result = $this->product_model->outlet();
        echo json_encode(array("all_access" => $result['all_access'], "data" => $result['result'], 'token' => $this->security->get_csrf_hash()));
    }

    public function product_wo_id(){
        $product_no = $this->input->post("product_no", TRUE);
        $data['result'] = $this->product_model->product_wo_id($product_no);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function product_w_id(){
        $product_no = $this->input->post("product_no", TRUE);
        $id = $this->input->post("id", TRUE);
        $data['result'] = $this->product_model->product_w_id($product_no, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	public function save_product() {
        $product_hdr = $this->input->post('product_hdr', TRUE);
        $product_hdr['comp_id'] =  $this->session->userdata('comp_id');
        $product_hdr['date_insert'] =  date('Y-m-d H:i:s');
        $this->activity_model->insert_activity("4", "5", "1");
        $query = $this->product_model->save_product($product_hdr);

        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }

        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function upload_image_file() {

		$files_upload = array();

		$db = $this->load->database('default', TRUE);

		$upload_path = './images/products/'; 
		$counts = count($_FILES["files"]["name"]);

		for($x = 0; $x < $counts; $x++) { 
			$files_tmp = $_FILES['files']['tmp_name'][$x];
			$files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
			$randname = "file_".rand(1000,1000000) . "." . $files_ext;

			move_uploaded_file($files_tmp,$upload_path.$randname);
			$files_upload[] = $randname;
		}
		$serialized = serialize($files_upload);	 		
		$data = array('image_loc' => $serialized); 
        $result = $this->product_model->upload_image_file($data, $this->input->post("product_no", TRUE));
        $this->output->set_content_type('application/json');
		echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash()));					
	}

    public function update_product() {
		$product_no = $this->input->post('product_no', TRUE);
        $product_hdr = $this->input->post('product_hdr', TRUE);
        $product_hdr['date_update'] =  date('Y-m-d H:i:s');
        $id = $this->input->post("id");
        $this->activity_model->insert_activity("4", "5", "2");
        $query = $this->product_model->update_product($id,$product_hdr);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }

    public function update_img_file() {
        $files_upload = array();
        $array_curr = array();
        $set = '';

        $db = $this->load->database('default', TRUE);
        $upload_path = './images/products/'; 

        $counts = count($_FILES["files"]["name"]);
        $counts_curr = count($this->input->post('curr_img'));

        $array_curr = $this->input->post('curr_img'); 
        //var_dump($array_curr);

        for($x = 0; $x <$counts; $x++) { 
 
            $files_tmp = $_FILES['files']['tmp_name'][$x];
            $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));

            $randname = "file_".rand(1000,1000000) . "." . $files_ext;

            move_uploaded_file($files_tmp,$upload_path.$randname);
            $files_upload[] = $randname;
            $set = 'true';
        }

        if($set == 'true') {
            for($y = 0; $y < $counts_curr; $y++) {
                unlink($upload_path.$array_curr[$y]);
            }
        }else{}

        $serialized = serialize($files_upload); 
        
        $data = array(
                'image_loc' => $serialized,
        ); 

        $this->db->trans_begin();

        $db->where('product_no',$this->input->post('product_no', TRUE))
					->update('products',$data);       

        if($this->db->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db->trans_rollback(); 
            $status = "failed ".$db_error;
        }else{  
            $this->db->trans_commit();
            $status = "success";
        }   

        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $data, 'token' => $this->security->get_csrf_hash())); 
    }

    public function product_list(){
        $type = $this->input->post('type');
        $function = $this->input->post("app_func");
        $term = $this->input->post('term');
        $outlet = $this->input->post("outlet");
        $status = $this->input->post("status");
        $prod_class = $this->input->post("prod_class");
        $prod_cat = $this->input->post("prod_cat");
        $prod_brand = $this->input->post("prod_brand");
        $prod_color = $this->input->post("prod_color");
        $prod_size = $this->input->post("prod_size");
        $result = $this->product_model->product_list($type,$term, $outlet, $status, $prod_class, $prod_cat, $prod_brand, $prod_color, $prod_size);
        $data['result'] = table_product($result,$function);
        $data['token'] = $this->security->get_csrf_hash();
        $this->activity_model->insert_activity("4", "5", "3");
        echo json_encode($data);
	}

	public function get_product_dtl(){
        $inv = array();
        $id = $this->input->post('id');
        $result = $this->product_model->get_product_dtl($id);
        $result2 = $this->product_model->sales_qty($id, $this->session->userdata('outelt'));
        $result3 = $this->product_model->inv_qty($id, $this->session->userdata('outlet'));
        $unserialized_files = "";
        foreach ($result as $row) {
            $unserialized_files = unserialize($row->image_loc); 
            //$img = json_encode($unserialized_files);
        }

        foreach ($result3 as $key => $value) {
            $inv['good_stock'] = number_format($value->inv_qty_good_stock) - number_format($result2);
            $inv['damage'] = $value->inv_qty_damage;
            $inv['total'] = number_format($inv['good_stock']) + number_format($inv['damage']);
        }

        echo json_encode(array('product_dtl' => $result,'unserialized_files' => $unserialized_files, 'inventory' => $inv, 'token' => $this->security->get_csrf_hash()));
    }

    public function product_inventory(){
        $id = $this->input->post("id");
        $outlet = $this->input->post("outlet");

        $result2 = $this->product_model->sales_qty($id, $outlet);
        $result3 = $this->product_model->inv_qty($id, $outlet);

        foreach ($result3 as $key => $value) {
            $inv['good_stock'] = number_format($value->inv_qty_good_stock) - number_format($result2);
            $inv['damage'] = $value->inv_qty_damage;
            $inv['total'] = number_format($inv['good_stock']) + number_format($inv['damage']);
        }

        echo json_encode(array("inventory" => $inv, 'token' => $this->security->get_csrf_hash()));
    }

    public function delete_product(){
        $id = $this->input->post("id");
        $result = $this->product_model->delete_product($id);
        $this->activity_model->insert_activity("4", "5", "5");
        echo json_encode($result);        
    }
    
    public function search_field() {
        $result = $this->product_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        echo json_encode($list);
    }


}
