<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

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

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //url helper
        $this->load->database(); //manual connection to the database
        $this->load->model('Main_model');
        $this->load->helper('string');
        $this->load->helper('form'); //form validations
        $this->load->library('encryption'); //password
        $this->load->library('session'); //log in  
        $this->check_isvalidated();      
    }

	public function index()
	{
		$this->load->view('admin_login');
	}

	public function Admin_login(){
		$Log_key = random_string('alnum',8);

		$result = $this->Main_model->validateUser($Log_key);
        
        if (!$result) {
           $this->load->view('login_error');
           $this->load->view('admin_login');
        } else {
           redirect('Main_controller');
        }
	}

	private function check_isvalidated()
    {
        if ($this->session->userdata('validated')) {
            redirect('Main_controller');
        }
    }
}
