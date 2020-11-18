<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper("outletko");
        $this->load->model("outletko_model");
        $this->load->model("guest_model");
    }

    public function email_acknowledge(){
        $result_data = $this->guest_model->get_buyer_data(27);
        $data['href'] = base_url()."pay-link/1234562712345";
        $data['name'] = $result_data['name'];
        $this->load->view("email/email_acknowledge", $data);
    }

    public function randomlink(){
        $order_id = 58;
        $payid = $this->randomNumber(6).$order_id.$this->randomNumber(5);
        var_dump($payid);
    }

    public function email_decline(){
        $result_data = $this->guest_model->get_buyer_data(27);

        $data['href'] = base_url()."pay-link/1234562712345";
        $data['comp_name'] = $result_data['seller_name'];
        $data['name'] = $result_data['name'];
        $this->load->view("email/email_payment_decline", $data);
    }

    public function email_approve(){
        $result_data = $this->guest_model->get_buyer_data(27);

        $data['href'] = base_url()."pay-link/1234562712345";
        $data['comp_name'] = $result_data['seller_name'];
        $data['name'] = $result_data['name'];
        $this->load->view("email/email_payment_approve", $data);
    }

    public function email_order_decline(){
        $result_data = $this->guest_model->get_buyer_data(27);

        $data['href'] = base_url()."pay-link/1234562712345";
        $data['comp_name'] = $result_data['seller_name'];
        $data['name'] = $result_data['name'];
        $data['order_no'] = $result_data['order_no'];
        $data['order_date'] = $result_data['order_date'];
        $this->load->view("email/email_order_decline", $data);
    }

    public function featured_outlet(){
		$result = $this->outletko_model->featured_outlet();

		foreach ($result as $key => $value) {
			$data['data'][$key] = array(
				"account_name" => $value->account_name,
				"link_name" => $value->link_name,
				"about_us" => $value->about_us,
                // "loc_image" => ($value->loc_image == null ? null : unserialize($value->loc_image))
                "loc_image" => unserialize($value->loc_image)
 			);
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
    }
    
    public function featured(){
        $data['featured_store'] = featured_store($this->outletko_model->featured_store(), $this->input->post("resolution"));
        $data['featured_product'] = featured_product($this->outletko_model->featured_product(), $this->input->post("resolution"), $this->session->userdata("IPCurrencyCode"));
        $data['carousel'] = $this->outletko_model->featured_product();
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
    public function menu($menu){


        if ($menu == "6"){
            // var_dump($menu);
            header("Location:https://blog.outletko.com/");
        }else{  
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
	
	public function blog(){
		$result = $this->outletko_model->blog();
		$width = $this->input->post("width");
        $heeader_content = "";
        $content = "";

		if (!empty($result)){
			foreach($result as $key => $value){
                $content = "";

				// if ($width <= 768){
				// 	$heeader_content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 380)."...");
				// }else{
				// 	$heeader_content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 850)."...");
				// }

				if ($width <= 768){
					$heeader_content = (substr($value->content, 0, 500)."...");
				}else{
					$heeader_content = (substr($value->content, 0, 1000)."...");
                }
                

                if ($width <= 768){
                    $content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 165)."...");
                }else if ($width <= 998){
                    $content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 175)."...");
                }else{
                    $content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 240)."...");
                }

                // $content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 240)."...");

				$data['result'][$key] = array(
					"id" => $value->id,
                    "title" => $value->title,
                    "author" => $value->author,
					"content" => $content,
					"header_content" => $heeader_content,
					"img" => unserialize($value->img_path),
					"display" => $value->display,
					"blog_date" => date("F d, Y", strtotime($value->date_insert)),
				);
 			}
		}

		$data['token'] = $this->security->get_csrf_hash();
		$data['width'] = $width;
		echo json_encode($data);


	}

	public function blog_title(){

	}

	public function get_blog($id, $title){

        $data['url'] = base_url()."blog/".$id."/".$title;
		$id_content = substr($id, 0, 7);
		$id = substr($id, 7);
		
		if ($id_content == "4579328"){
			$menu = 7;
            $result = $this->outletko_model->get_blog($id);            

            foreach ($result as $key => $value) {

                $href = "https://blog.outletko.com/".strtolower(str_replace(" ", "-", preg_replace('/[^A-Za-z0-9 ]/', '', $value->title)))."/".$this->randomNumber(6).$value->id.$this->randomNumber(5);

                // redirect($href);

                header('location: '.$href.  '');

                // if (strlen($value->content) > 100){
                //     $desc_content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 100)."...");
                // }else{
                //     $desc_content = (trim(preg_replace('/<[^>]*>/', ' ', $value->content)));
                // }

                // $data['title'] = $value->title;
                // $data['author'] = $value->author;
                // $data['desc_content'] = $desc_content;
                // $img = unserialize($value->img_path);
                // $data['img'] = $img[0];
            }   

			// $data['id'] = $id;
			// $data['function'] = 0;
			// $data['sub_module'] = 0;
			// $data['user_type'] = 7;
			// $data['menu_module'] = 0;
			// $data['account_id'] = 0;
			// $data['owner'] = 0;
			// $data['edit'] = 0;
			// $data['width'] = 1366;

			// $this->template->load($menu, $data);	
		}else{
			redirect("/");
		}

	}

	public function get_page_blog(){
		$id = $this->input->post("id");
		$result = $this->outletko_model->get_blog($id);

		if (!empty($result)){
			foreach($result as $key => $value){
				$data['result'][$key] = array(
                    "id" => $value->id,
                    "title" => $value->title,
                    "author" => $value->author,
					"content" => $value->content,
					"blog_date" => date("F d, Y", strtotime($value->date_insert)),
					"img" => unserialize($value->img_path),
					"display" => $value->display
				);
			}
		}else{
			$data['result'] = "";
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

    public function randomNumber($length) {
        $str = "";
        // $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $characters = range(0, 9);
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
          $rand = mt_rand(0, $max);
          $str .= $characters[$rand];
        }
        return str_shuffle($str);
    }
    

}