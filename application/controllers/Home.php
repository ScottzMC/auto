<?php

  class Home extends CI_Controller{

    public function __construct(){
      parent::__construct();
    }

     function index(){
       $continent = "Africa";

      $data['featured'] = $this->Product_model->display_featured_products();
      $data['popular'] = $this->Product_model->display_popular_products();
      $data['type'] = $this->Type_model->display_all_type();
      $data['country_location'] = $this->Admin_model->get_country_location($continent);
      $data['load_menu'] = $this->Admin_model->display_menu_options();

      $this->load->view('home/index', $data);
    }

    function get_region(){
      $country = $this->input->post('country');
      $region = $this->Admin_model->get_region_location($country);
      if(count($region) > 0){
        $region_select = '';
        $region_select.= '<option value="">Select State Location</option>';
        foreach($region as $reg){
          $region_select .='<option value="'.$reg->state.'">'.$reg->state.'</option>';
        }
        echo json_encode($region_select);
      }
    }

    function logout(){
      $data['featured'] = $this->Product_model->display_featured_products();
      $data['popular'] = $this->Product_model->display_popular_products();
      $data['type'] = $this->Type_model->display_all_type();

      // destroy session
      $info = array('login' => '', 'uname' => '', 'usurname' => '', 'uemail' => '');
      $this->session->unset_userdata($info);
      $this->session->sess_destroy();
      redirect('home/index', $data);
    }

  }

?>
