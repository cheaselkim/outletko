<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_force extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model("activity_model");
            $this->load->model("sales_force_model");
            $this->load->model("password_model");
            $this->load->helper("sales_force");
            $this->load->helper("user");
            $result = $this->login_model->check_session();
            if ($result != true){
                redirect("/");
            }
    }

    public function get_outlet(){
        $comp_id = $this->session->userdata('comp_id', TRUE);
        $data['data'] = $this->sales_force_model->get_outlet($comp_id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function account_id(){
        $data = array();
        $outlet = $this->input->post("outlet", TRUE);
        $data['account_id'] = $this->sales_force_model->account_id($outlet);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function sales_force_type(){
        $data['data'] = $this->sales_force_model->sales_force_type();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_sales_force() {
        $data_outlet = array();
        $data_users = $this->input->post('data_users', TRUE);
        $data_hdr = $this->input->post('data_hdr', TRUE);
        $outlet = $this->input->post("outlet", TRUE);
        
        $data_users['comp_id'] = $this->session->userdata('comp_id');
        $data_hdr['comp_id'] =  $this->session->userdata('comp_id');
        $data_hdr['user'] = $this->session->userdata('user_id');
        $data_hdr['date_insert'] =  date('Y-m-d H:i:s');
        $data_hdr['user_id'] = $this->sales_force_model->insert_users($data_users);
        
        if ($outlet != "0"){
            $data_outlet[0] = array(
                "user_id" => $data_hdr['user_id'],
                "outlet_id" => $outlet
            );            
        }else{
            $result_outlet = $this->sales_force_model->get_outlet($this->session->userdata("comp_id"));

            foreach ($result_outlet as $key => $value) {
                $data_outlet[$key] = array(
                    "user_id" => $data_hdr['user_id'],
                    "outlet_id" => $value->id
                );            
            }

        }

        $this->activity_model->insert_activity("5", "0", "1");
        $user_outlet = $this->sales_force_model->insert_user_outlet($data_outlet);
        $query = $this->sales_force_model->save_sales_force($data_hdr);        
        $randomString = $this->randomString();
        $status = $this->send_email($data_users['email'], $data_users['account_id'], $randomString);

        if($query == true){
            $this->activity_model->insert_activity("5", "0", "1");
            $status = "success";
        }else{
            $status = "failed";
        }
        echo json_encode(array('status' => $status, 'string' => $randomString, 'token' => $this->security->get_csrf_hash()));       
    }

    public function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function send_email($email, $account_id, $randomString){

        $this->load->library("email");
        $status = 0;

        $result = $this->password_model->find_accountid($account_id, $randomString);

        if ($result > 0){
            $config = array(
                        'protocol' => 'mail',
                        'mail_type' => 'html',
                        'smtp_host' => 'mail.outletko.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'eoutletsuite@outletko.com',
                        'smtp_pass' => 'eoutletsuite_email',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );


            $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('noreply@epgmcompany.com', 'eOutletSuite Application')
                        ->to($email)
                        ->subject('eOutletSuite Account Register')
                        ->message(" Your Account ID : ". $account_id . " ".
                                    "Your Password : ".$randomString);

            if($this->email->send()) {
                $status = 1;
            }else {
                $status = $this->email->print_debugger();
                }
        }else{
            $status = 0;
        }
        return $status;
    }



    public function search_field() {
        $result = $this->sales_force_model->search_field();
        $list = array();
        foreach ($result->result() as $row) {
            $list[] = array(
                'term' => $row->term
            );
        }
        $this->output->set_content_type('application/json');
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($list);
    }

    public function sales_force_list(){
        $term = $this->input->post('term', TRUE);
        $type = $this->input->post('type', TRUE);
        $outlet = $this->input->post('outlet', TRUE);
        $status = $this->input->post('status', TRUE);
        $function = $this->input->post("app_func", TRUE);
        $result = $this->sales_force_model->sales_force_list($term,$type,$outlet,$status);
        $data['result'] = table_sales_force($result,$function);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function get_sales_force_dtl(){
        $user_id = "";
        $id = $this->input->post('id', TRUE);
        $result = $this->sales_force_model->get_sales_force_dtl($id);

        foreach ($result as $key => $value) {
            $user_id = $value->user_id;
        }

        $result2 = $this->sales_force_model->get_all_access($user_id);
        echo json_encode(array('sales_force_dtl' => $result, 'all_access' => $result2, 'token' => $this->security->get_csrf_hash()));
    }

    public function open_transaction(){
        $account_id = $this->input->post("account_id");
        $outlet = $this->input->post("outlet_id");

        $data['result'] = $this->sales_force_model->open_transaction($account_id, $outlet);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    //FOR UPDATE
    public function update_sales_force() {
        $id = $this->input->post('id', TRUE);
        $data = $this->input->post('data_hdr', TRUE);
        $this->activity_model->insert_activity("5", "0", "2");
        $query = $this->sales_force_model->update_sales_force($data, $id);
        $user_id = $this->sales_force_model->user_id($data['account_id']);
        $outlet = $data['outlet'];

        if ($outlet != "0"){
            $data_outlet[0] = array(
                "user_id" => $id,
                "outlet_id" => $outlet
            );            
        }else{
            $result_outlet = $this->sales_force_model->get_outlet($this->session->userdata("comp_id"));

            foreach ($result_outlet as $key => $value) {
                $data_outlet[$key] = array(
                    "user_id" => $id,
                    "outlet_id" => $value->id
                );            
            }

        }

        $user_outlet = $this->sales_force_model->update_user_outlet($data_outlet, $outlet, $user_id);
        $user_roles_trans = $this->sales_force_model->update_user_roles($outlet, $user_id);

        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->activity_model->insert_activity("5", "0", "2");
        echo json_encode(array('status' => $status, 'string' => 'ok', 'token' => $this->security->get_csrf_hash()));       
    }

    public function delete_sales_force(){
        $id = $this->input->post("id", TRUE);
        $this->activity_model->insert_activity("5", "0", "5");
        $data['result'] = $this->sales_force_model->delete_sales_force($id);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);        
    }

    public function user_list(){
        $result = $this->sales_force_model->user_list();
        $data['result'] = table_user($result);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function save_user_roles() {
        $table_data = $this->input->post('table_data');
        $query = $this->sales_force_model->save_user_roles($table_data);
        if($query == true){
            $status = "success";
        }else{
            $status = "failed";
        }
        $this->activity_model->insert_activity("5", "0", "6");
        // $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status, 'token' => $this->security->get_csrf_hash()));       
    }


    public function list_sales_force(){
        $this->activity_model->insert_activity("5", "0", "3");
        $result = $this->sales_force_model->list_sales_force();
        $data['result'] = sales_force_list($result);
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

}
