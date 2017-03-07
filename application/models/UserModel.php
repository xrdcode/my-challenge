<?php

class UserModel extends CI_Model {
  public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
  public function newUser($data = "") {
    if($data != "") {
      $this->db->insert("user", $data );
      $data = array(
  			"messages" => "Account created, please sign in.",
  			"success" => TRUE
  		);
    } else {
      $data = array(
  			"messages" => "Oops, an error occured.",
  			"success" => FALSE
  		);
    }
    return $data;
  }

  public function login($username, $password) {
    $this->db->select("*");
    $this->db->where(array(
      "username" => $username,
      "password" => $password));
    $res = $this->db->get("user");
    if($res->num_rows() > 0) {
      return $res->result();
    } else {
      return FALSE;
    }
  }

  public function isUserRegistered($username) {
    $this->db->select("*");
    $this->db->where("username", $username);
    $res = $this->db->get("user");
    if ($res->num_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function isMailRegistered($mail) {
    $this->db->select("*");
    $this->db->where("mail", $mail);
    $res = $this->db->get("user");
    if ($res->num_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function saveTask($task) {
    if($task != "") {
      $this->db->insert("saved_task", $task );
      $data = array(
        "messages" => "Task created",
        "success" => TRUE
      );
    } else {
      $data = array(
        "messages" => "Oops, an error occured.",
        "success" => FALSE
      );
    }
    return $data;
  }

  public function getTaskCount($userid) {
    $this->db->select("*");
    $this->db->where("userid", $userid);
    $res = $this->db->get("saved_task");
    return $res->num_rows();
  }

}

?>
