    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_type_model extends CI_Model {

    public function __construct(){
        parent::__construct();
            $this->load->database();
                $result = $this->login_model->check_session();
                if ($result != true){
                    redirect("/");
                }
    }

    public function company(){
        $result = $this->db->query("SELECT * FROM company WHERE id = ?", array($this->session->userdata("comp_id")))->row();
        return $result->comp_name;
    }

    public function outlet(){
        $result = $this->db->query("SELECT * FROM outlet WHERE comp_id = ?", array($this->session->userdata("comp_id")))->result();
        return $result;
    }

    public function insert_payment_type($insert_array){
        $this->db->insert("payment_type", $insert_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function query_payment_type($type_desc,  $outlet){
        $type_desc_query = "";
        $outlet_query = "";

        if ($type_desc != ""){
            $type_desc_query = "AND type_desc LIKE %'".$type_desc."'%";
        }

        if ($outlet != 0){
            $outlet_query = "AND `payment_type`.`outlet_id` = '".$outlet."'";
        }

        $query = $this->db->query("SELECT payment_type.*, 
            (CASE WHEN (`payment_type`.`outlet_id` = '0') THEN 'ALL' ELSE `outlet`.`outlet_code` END) AS outlet_desc
            FROM payment_type
            LEFT JOIN outlet ON 
            `payment_type`.`outlet_id` = `outlet`.`id`
            WHERE `payment_type`.`comp_id` = '".$this->session->userdata("comp_id")."' ".$type_desc_query." ".$outlet_query." ")->result(); 
        return $query;
    }

    public function delete_payment_type($id){
        $query = $this->db->query("DELETE FROM payment_type WHERE id = ?", array($id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_transaction($id){
        $result = $this->db->query("SELECT * FROM payment_type WHERE id = ?", array($id))->row();
        return $result;
    }

    public function update_payment_type($update_array, $id){
        $this->db->where("id", $id);
        $this->db->update("payment_type", $update_array);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}









