<?php

class DbModel extends CI_Model {
  public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

  public function getPriorlist() {
    $this->db->select("*");
    $res = $this->db->get("priority_list");
    if($res->num_rows() > 0) {
      return $res->result();
    } else {
      return FALSE;
    }
  }

}

?>
