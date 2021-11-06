<?php

  class Product extends CI_Controller{

    public function __construct(){
      parent::__construct();
    }

    public function type($type){
      $data['type_name'] = $this->Type_model->display_type_name($type);
      //$data['type_detail'] = $this->type_model->display_all_type_by_name($type);
      $data['type'] = $this->Type_model->display_all_type($type);

      //$query = $this->db->get('product', '6', $this->uri->segment(6));

      $config['base_url'] = base_url()."product/type/$type";
      $total_row = $this->Type_model->record_type_count();
      $config['total_rows'] = $total_row;
      $config['per_page'] = 10;
      $config['uri_segment'] = 3;
      $choice = $config['total_rows']/$config['per_page'];
      $config['num_links'] = round($choice);

      $config['full_tag_open'] = '<ul style="margin-left: 100px;" class="pagination">';
      $config['full_tag_close'] = '</ul>';

      $config['first_tag_open'] = '<li>';
      $config['last_tag_open'] = '<li>';

      $config['next_tag_open'] = '<li>';
      $config['prev_tag_open'] = '<li>';

      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';

      $config['first_tag_close'] = '</li>';
      $config['last_tag_close'] = '</li>';

      $config['next_tag_close'] = '</li>';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"><span><b>';
      $config['cur_tag_close'] = '</b></span></li>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

      $data["type_detail"] = $this->Type_model->fetch_type_data($type, $config["per_page"], $page);

      $this->load->view('product/catalog', $data);
    }

    public function detail($type, $title){
      $data['detail'] = $this->Type_model->display_detail($title);
      $data['pd'] = $this->Type_model->display_detail_pd($title);
      $data['type'] = $this->Type_model->display_all_type();
      $data['other'] = $this->Type_model->display_featured_detail($type);
      $data['review'] = $this->Type_model->display_product_review($title);

      $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
      $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[3]|max_length[200]');

      if ($this->form_validation->run() == FALSE){
          // fails
          $this->load->view('product/detail', $data);
      }else{
      // set form validation rules

      //insert user details into db
      $time = time();
      $fullname = $_POST['fullname'];
      $message = $_POST['message'];
      $email = $_POST['email'];
      $date = date('Y-m-j H:i:s');

      $review = array(
        'title' => $title,
        'fullname' => $fullname,
        'email' => $email,
        'message' => $message,
        'created_time' => $time,
        'created_day' => $date
      );

      $insert = $this->Type_model->insert_product_review($review);

      if($insert){
        $statusMsg = '<div class="alert alert-success" role="alert">Message Sent Successfully</div>';
        $this->session->set_flashdata('msg', $statusMsg);
        $this->load->view('product/detail', $data);
      }else {
        $statusMsg = '<div class="alert alert-danger" role="alert">Message Failed</div>';
        $this->session->set_flashdata('msgError', $statusMsg);
        $this->load->view('product/detail', $data);
      }
     }
    }

    public function search(){
      $data['type'] = $this->Type_model->display_all_type();

      $match_name = $this->input->post('search_query');
      $match_number = $this->input->post('part_number');
      $match_type = $this->input->post('type');
      $match_status = $this->input->post('status');
      $match_min_year = $this->input->post('minyear');
      $match_max_year = $this->input->post('maxyear');
      $match_location = $this->input->post('country');
      $match_region = $this->input->post('state');
      $match_minprice = $this->input->post('minprice');
      $match_maxprice = $this->input->post('maxprice');

      $data['results'] = $this->Product_model->get_search_query($match_name, $match_number, $match_type, $match_status, $match_min_year, $match_max_year, $match_location, $match_region, $match_minprice, $match_maxprice);
      $this->load->view('product/search', $data);
    }
  }

?>
