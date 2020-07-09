<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outletko extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper("outletko");
        $this->load->model("outletko_model");
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
        $data['featured_product'] = featured_product($this->outletko_model->featured_product(), $this->input->post("resolution"));
        $data['carousel_store'] = $this->outletko_model->featured_store();
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
	
	public function blog(){
		$result = $this->outletko_model->blog();
		$width = $this->input->post("width");
		$heeader_content = "";

		if (!empty($result)){
			foreach($result as $key => $value){

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


				$data['result'][$key] = array(
					"id" => $value->id,
                    "title" => $value->title,
                    "author" => $value->author,
					"content" => (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 240)."..."),
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

                if (strlen($value->content) > 100){
                    $desc_content = (substr(trim(preg_replace('/<[^>]*>/', ' ', $value->content)), 0, 100)."...");
                }else{
                    $desc_content = (trim(preg_replace('/<[^>]*>/', ' ', $value->content)));
                }

                $data['title'] = $value->title;
                $data['author'] = $value->author;
                $data['desc_content'] = $desc_content;
                $img = unserialize($value->img_path);
                $data['img'] = $img[0];
            }

			$data['id'] = $id;
			$data['function'] = 0;
			$data['sub_module'] = 0;
			$data['user_type'] = 7;
			$data['menu_module'] = 0;
			$data['account_id'] = 0;
			$data['owner'] = 0;
			$data['edit'] = 0;
			$data['width'] = 1366;

			$this->template->load($menu, $data);	
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

}