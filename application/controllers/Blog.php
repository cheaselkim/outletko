<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    	$this->load->model("blog_model");
	    	$this->load->helper("blog");
			$result = $this->login_model->check_session();
			if ($result != true){
				redirect("/");
			}
    }

    public function check_display_images(){
        $data['result'] = $this->blog_model->check_display_images();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function insert_blog(){

        $array = array(
            "title" => $this->input->post("title"),
            "content" => $this->input->post("content"),
            "display" => $this->input->post("display"),
            "date_insert" => date("Y-m-d H:i:s")
        );

        $data['id'] = $this->blog_model->insert_blog($array);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function edit_blog(){
        $id = $this->input->post("id");
        $result = $this->blog_model->get_blog($id);

        if (!empty($result)){
            foreach($result as $key => $value){
                $data['img'] = unserialize($value->img_path);
                $data['title'] = $value->title;
                $data['display'] = $value->display;
                $data['content'] = $value->content;
                $data['status'] = $value->status;
            }    
        }

        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function update_blog(){
        $id = $this->input->post("id");
        $array = array(
            "title" => $this->input->post("title"),
            "content" => $this->input->post("content"),
            "display" => $this->input->post("display"),
            "status" => $this->input->post("status"),
            "date_update" => date("Y-m-d H:i:s")
        );

        $data['result'] = $this->blog_model->update_blog($array, $id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
        
    }

    public function delete_blog(){
        $id = $this->input->post("id");
        $data['result_delete'] = $this->blog_model->delete_file($id);
        $data['result'] = $this->blog_model->delete_blog($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function query_data(){
        $blog_date = $this->input->post("date");
        $blog_title = $this->input->post("title");
        $blog_status = $this->input->post("status");
        $type = $this->input->post("type");
        $result_data = $this->blog_model->query_data($blog_date, $blog_title, $blog_status);
        $data['result'] = blog_tbl($result_data, $type);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }    

    public function blog_query(){
        $id = $this->input->post("id");
        $result = $this->blog_model->get_blog($id);
        

        if (!empty($result)){
            foreach($result as $key => $value){
                $data['img'] = unserialize($value->img_path);
                $data['title'] = $value->title;
                $data['content'] = $value->content;
                $data['display'] = $value->display;
            }    
        }


        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function update_img_file(){

        $data['result_delete'] = $this->blog_model->delete_file($this->input->post("id"));

        $files_upload = array();
        $array_curr = array();
        $set = '';
        $counts_curr = "";

        $upload_path = './images/blog/'; 


        $counts = count($_FILES["files"]["name"]);
        // $counts_curr = count($this->input->post('curr_img'));

        $array_curr = $this->input->post('curr_img'); 

        for($x = 0; $x <$counts; $x++) { 
            $files_tmp = $_FILES['files']['tmp_name'][$x];
            $files_ext = strtolower(pathinfo($_FILES['files']['name'][$x],PATHINFO_EXTENSION));
            $randname = "file_".$this->input->post("id")."_".rand(1000,1000000) . "." . $files_ext;
            move_uploaded_file($files_tmp,$upload_path.$randname);
            $files_upload[] = $randname;
            $set = 'true';
        }

        // if($set == 'true') {
        //     for($y = 0; $y < $counts_curr; $y++) {
        //         unlink($upload_path.$array_curr[$y]);
        //     }
        // }else{}

        $serialized = serialize($files_upload); 
        
        $data = array('img_path' => $serialized); 
        $result = $this->blog_model->upload_image_file($data, $this->input->post("id", TRUE));
        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $result, 'token' => $this->security->get_csrf_hash())); 

    }

}