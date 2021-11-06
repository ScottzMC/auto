<?php

  class Account_model extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    function get_user($email, $password){
      $email = $this->db->escape_str($email);
      $password = $this->db->escape_str($password);

  		$this->db->where('email', $email);
  		$this->db->where('password', md5($password));
      $query = $this->db->get('users')->result();
  		return $query;
  	}

    function insert_user($data){
      $data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $data);
      return $query;
    }

    function insert_contact($data){
      $data = $this->db->escape_str($data);
      $query = $this->db->insert('contact', $data);
      return $query;
    }

  }

?>
