<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $CI = &get_instance(); 
            $this->load->database();
            $this->db2 = $CI->load->database('admin', TRUE);
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function get_blog($id){
        $query = $this->db2->query("SELECT * FROM blog WHERE id = ? ", array($id))->result();
        return $query;
    }

    public function insert_blog($data){
        $this->db2->insert("blog", $data);
        return $this->db2->insert_id();
    }

    public function update_blog($data, $id){
        $this->db2->where("id", $id);
        $this->db2->update("blog", $data);
    }

    public function delete_blog($id){
        $this->db2->where("id", $id);
        $this->db2->delete("blog");
    }

    public function query_data($blog_date, $blog_title, $blog_status){
        $query_date = "";
        $query_title = "";
        $query_status = "";

        if (!empty($blog_date)){
            $query_date = " AND DATE(date_insert) = '".$blog_date."'";
        }

        if (!empty($blog_title)){
            $query_title = "AND title = '".$blog_title."'";
        }

        if ($blog_status != ""){
            $query_status = "AND `blog`.`status`= '".$blog_status."'";
        }

        $query = $this->db2->query("SELECT id, title, date_insert FROM blog WHERE date_insert IS NOT NULL 
        ".$query_date." ".$query_title." ".$query_status."
        ")->result();
        return $query;
    }

    public function delete_file($id){
        $result = $this->db2->query("SELECT img_path FROM blog WHERE id = ? ", array($id))->row();
        $status = true;
        $img = unserialize($result->img_path);

        if (!empty($img[0])){
            unlink('./images/blog/'.$img[0]);
            $status = true;
        }
        return $status;
    }

    public function upload_image_file($data, $id){
        $status = "";
        $this->db2->trans_begin();

        $this->db2->where('id',$this->input->post('id'));
        $this->db2->update('blog',$data);     

        if($this->db2->trans_status() === FALSE){
            $db_error = "";
            $db_error = $this->db->error();
            $this->db2->trans_rollback();
           $status = $db_error;
        }else{  
            $this->db2->trans_commit();
            $status = "success";
        }   

        return $status;
    }    

}