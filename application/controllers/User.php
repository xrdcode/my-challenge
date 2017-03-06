<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('default');
	}

  public function index() {
    $this->load->view("user/v_login");
  }

	public function dashboard()
	{
		$this->output->set_template('t_dashboard');
		$this->load->css("/assets/css/bootstrap.min.css");
		$this->load->css("/assets/css/sb-admin.css");
		$this->load->js("/assets/js/jquery.js");
		$this->load->js("/assets/js/bootstrap.js");
		$this->load->view('user/v_dashboard');
	}

}
