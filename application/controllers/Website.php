<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function privacy(){
		$this->load->view("website/privacy");
	}

	public function terms(){
		$this->load->view("website/terms");
	}

	public function email2(){
		$data['first_name'] = "Peter";
		$data['account_id'] = "116986556";
		$data['password'] = "aksfjaf";	
		$this->load->view("admin/email/email_register.php", $data);
	}

    public function ip_add(){
        $ip = $_SERVER['REMOTE_ADDR']; // This will contain the ip of the request

        // if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //     $ip = $_SERVER['HTTP_CLIENT_IP'];
        // } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // } else {
        //     $ip = $_SERVER['REMOTE_ADDR'];
        // }
        // You can use a more sophisticated method to retrieve the content of a webpage with php using a library or something
        // We will retrieve quickly with the file_get_contents
        $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

        var_dump($dataArray);
        // $data_array = json_decode($dataArray, true);

        // outputs something like (obviously with the data of your IP) :

        // geoplugin_countryCode => "DE",
        // geoplugin_countryName => "Germany"
        // geoplugin_continentCode => "EU"

        // foreach ($dataArray as $key => $value) {
        // }

        // $country = $data_array['geoplugin_countryName'];
        echo nl2br("\nHello visitor from: ".$dataArray->geoplugin_countryName);
        echo nl2br("\nHello visitor from: ".$dataArray->geoplugin_continentName);
        echo nl2br("\nHello visitor from: ".$dataArray->geoplugin_currencyCode);
        echo nl2br("\nHello visitor from: ".$dataArray->geoplugin_timezone);
        
        if ($ip == "::1"){
            $this->session->set_userdata("IPCountryCode", "PH");
            $this->session->set_userdata("IPCountry", "Philippines");
            $this->session->set_userdata("IPContinent", "Asia");
            $this->session->set_userdata("IPCurrencyCode", "PHP");
            $this->session->set_userdata("IPTimeZone", "Asia/Manila");    
        }else{
            $this->session->set_userdata("IPCountryCode", $dataArray->geoplugin_countryCode);
            $this->session->set_userdata("IPCountry", $dataArray->geoplugin_countryName);
            $this->session->set_userdata("IPContinent", $dataArray->geoplugin_continentName);
            $this->session->set_userdata("IPCurrencyCode", $dataArray->geoplugin_currencyCode);
            $this->session->set_userdata("IPTimeZone", $dataArray->geoplugin_timezone);    
        }




    }
    

}
