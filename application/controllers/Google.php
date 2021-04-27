<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Google extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    

	public function index(){	
		$this->load->view('google/index');
	}

    public function get_directions(){
        $origin = $this->input->post("origin");
        $destination = $this->input->post("destination");
        $url = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=" . urlencode($origin) ."&destination=". urldecode($destination) . "&key=AIzaSyBlHXlcGQ4m6BjY0Anhr3R1VZ3Pti6iNuQ");
        // $url = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=Disneyland&destination=Universal+Studios+Hollywood&key=AIzaSyBlHXlcGQ4m6BjY0Anhr3R1VZ3Pti6iNuQ");
        // // $response = $this->output->set_content_type('application/json')->set_output($url);
        header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: GET, OPTIONS");
        // header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        // header('Access-Control-Allow-Headers: x-requested-with');
        // header('Access-Control-Allow-Headers: *');
        // $data["others"] = "sdsd";
        // // echo json_encode($data);

        // // $response = $this->output->set_content_type('application/json')->set_output($url);

        
        // $this->output->set_header('Access-Control-Allow-Origin: *');
        // $this->output->set_header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        // $response = $this->output->set_header('Access-Control-Allow-Origin: *')->set_content_type('application/json')->set_output($url);

        // $data["direction"] = $response;
        // echo json_encode($data);


        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // $data = curl_exec($ch);
        // $info = curl_getinfo($ch);
        // curl_close($ch);
        // echo $data;

        // echo json_encode($this->output->set_header('Access-Control-Allow-Origin: *')->set_content_type('application/json')->set_output($url));
        $this->output->set_content_type('application/json')->set_output($url);
    }

}