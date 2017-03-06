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
      //$this->db->insert("settings", array("userid" => $userid, "alertremainder" => 1440, "inmute" = "false"));
      $data = array(
  			"messages" => "Akun anda telah dibuat, silahkan masuk.",
  			"success" => TRUE
  		);
    } else {
      $data = array(
  			"messages" => "Upss, telah terjadi kesalahan.",
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

}

?>
