<?php

  class About extends CI_Controller{

    public function index(){
      $data['type'] = $this->Type_model->display_all_type();
      $this->load->view('home/about', $data);
    }
  }

?>
