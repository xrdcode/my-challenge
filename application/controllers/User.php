<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper("form");
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('default');
		$this->output->set_title('Task Scheduler');
		$this->load->css("/assets/css/bootstrap.min.css");
		$this->load->js("/assets/js/jquery.js");
		$this->load->js("/assets/js/bootstrap.js");
	}

  public function index() {
		if($this->isLoggedIn()) {
			redirect("user/dashboard","refresh");
		}
  }

	public function login() {
		$this->load->css("/assets/css/register.css");
		$this->load->view("user/v_login");
	}

	function isLoggedIn() {
		if($this->session->userdata('logged_in')) {
      return $this->session->userdata('logged_in');
    } else {
      redirect('user/login', 'refresh');
    }
	}

	public function loggingin() {
		$data = array('succes' => false);
		$this->output->set_template('blank');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_user');
    $this->form_validation->set_error_delimiters('<p class="text text-danger">','</p>');
    if($this->form_validation->run()) {
        $data['success'] = true;
				$data['reload'] = site_url('user/dashboard');
    } else {
				foreach($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
	    }
	  }
		echo json_encode($data);
	}

	public function check_user($password) {
		$this->load->model("UserModel");
		$username = $this->input->post('username');
		$result = $this->UserModel->login($username, md5($password));
		if($result) {
				$sess_array = array();
				foreach($result as $row) {
						$sess_array = array(
						'userid' => $row->userid ,
						'username' => $row->username,
						'email' => $row->mail
						);
				$this->session->sess_expiration = 7200;
				$this->session->set_userdata('logged_in', $sess_array);
				}
				return TRUE;
	 } else {
				$this->form_validation->set_message('check_user', 'Invalid username or password');
				return FALSE;
		 }
	}


	public function dashboard()
	{
		if($this->isLoggedIn()) {
			$data = array(
				"headTitle" => "Dashboard | ",
				"subTitle" => "Simple Task Scheduler"
			);
			$this->load->css("/assets/css/sb-admin.css");
			$this->output->set_template('t_dashboard');
			$this->load->view('user/v_dashboard', $data);
		}
	}

	public function register() {
		$this->load->css("/assets/css/register.css");
		$this->load->view("user/v_register");
	}

	public function registering() {
		$data = array(
			"message" => "",
			"success" => FALSE
		);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|callback_userExist');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('mail', 'Email', 'trim|required|valid_email|callback_usedMail');
		$this->form_validation->set_error_delimiters('<p class="text text-danger">','</p>');
		if(!$this->form_validation->run()) {
			$data = array(
				"messages" => "",
				"success" => FALSE,
				"formValid" => FALSE
			);
			foreach($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		} else {
			$userdata = array(
				"username" => $this->input->post("username"),
				"mail" => $this->input->post("mail"),
				"password" => md5($this->input->post("password"))
			);
			$this->load->model("UserModel");
			$data = $this->UserModel->newUser($userdata);
			$data["formValid"] = TRUE;
		}
		$this->output->set_template("blank");
		echo json_encode($data);
	}

	public function userExist($username) {
		$this->load->model("UserModel");
		$result = $this->UserModel->isUserRegistered($username);
		if(!$result) {
			return TRUE;
		} else {
			$this->form_validation->set_message('userExist', 'Username already taken');
			return FALSE;
		}
	}

	public function usedMail($email) {
		$this->load->model("UserModel");
		$result = $this->UserModel->isMailRegistered($email);
		if(!$result) {
			return TRUE;
		} else {
			$this->form_validation->set_message('usedMail', 'Email already used');
			return FALSE;
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		redirect("user", "refresh");
	}

}
