<?php

  class User extends CI_Controller{

    // If Session Expire

    public function expire(){
      $this->load->view('user_dashboard/session_expire');
    }

    // End of If Session Expire

    // User Dashboard login

    public function login(){
      $email = $this->input->post("email");
      $password = $this->input->post("password");

      // form validation
      $this->form_validation->set_rules("email", "Email", "trim|required|min_length[3]|valid_email|is_unique[user.email]");
      $this->form_validation->set_rules("password", "Password", "trim|required");

      //if ($this->form_validation->run() == FALSE){
        // validation fail
        //$this->load->view('account_view');
      //}else{
        // check for user credentials
        $uresult = $this->Account_model->get_user($email, $password);
        if(count($uresult) > 0){
          // set session
          $sess_data = array(
            'login' => TRUE,
            'uname' => $uresult[0]->firstname,
            'usurname' => $uresult[0]->surname,
            'uemail' => $uresult[0]->email,
            'user_level' => $uresult[0]->user_level
          );
          $this->session->set_userdata($sess_data);
          redirect("user/index");
        }else{
          $error = '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>';
          $this->session->set_flashdata('error', $error);
          $this->load->view('user_dashboard/session_expire');
        }
    }

    // End of User Dashboard Login

    // Home of User Dashboard

    public function index(){
      $email = $this->session->userdata('uemail');
      $data['total_product_count'] = $this->User_model->display_product_count($email);
      $data['total_order_count'] = $this->User_model->display_order_count($email);

      $data['userdp'] = $this->User_model->display_user($email);
      //$data['orderdp'] = $this->user_model->display_user_order($email);
      $data['lowdp'] = $this->User_model->display_quantity_low($email);

      $config['base_url'] = base_url()."user/index";
      $total_row = $this->User_model->record_user_count();
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

      $data["userdp"] = $this->User_model->fetch_user_data($email, $config["per_page"], $page);

      if($this->session->userdata('login')){
        $this->load->view('user_dashboard/dashboard', $data);
      }else{
        redirect('user/expire');
      }
    }

    // End of Home of User Dashboard

    // Invoice Page

    public function invoice(){
      $email = $this->session->userdata('uemail');
      $data['userdp'] = $this->User_model->display_user($email);
      $data['shipdp'] = $this->User_model->display_shipping($email);
      $data['total_order_count'] = $this->User_model->display_order_count($email);

      $config['base_url'] = base_url()."user/invoice";
      $total_row = $this->User_model->record_invoice_count();
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

      $data["invodp"] = $this->User_model->fetch_invoice_data($email, $config["per_page"], $page);

      if($this->session->userdata('login')){
        $this->load->view('user_dashboard/invoice', $data);
      }else{
        redirect('user/expire');
      }
    }

    // End of Invoice Page

    // Cancel Order of Invoice

    public function cancel_order(){
      $pid = $this->input->post('user_id');
      $status = "Cancelled";

      $this->User_model->cancel_order($pid, $status);
      //redirect('user/view_products');
    }

    // End of Cancel Order of Invoice

    // Profile Page

    public function profile(){
      $email = $this->session->userdata('uemail');
      $data['userdp'] = $this->User_model->display_user($email);
      $data['shipdp'] = $this->User_model->display_shipping($email);
      $data['total_order_count'] = $this->User_model->display_order_count($email);

      if($this->session->userdata('login')){
        $this->load->view('user_dashboard/profile', $data);
      }else{
        redirect('user/expire');
      }
    }

    // End of Profile Page

    // Profile Settings

    public function update_profile(){
      $email = $this->session->userdata('uemail');
      $data['userdp'] = $this->User_model->display_user($email);
      $data['shipdp'] = $this->User_model->display_shipping($email);

      $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('surname', 'SurName', 'trim|required|min_length[3]|max_length[50]');

      //if($this->input->post('updateProfile')){
        if ($this->form_validation->run() == FALSE){
            // fails
            if($this->session->userdata('login')){
              $this->load->view('user_dashboard/profile', $data);
            }else{
              redirect('user/expire');
            }
        }else{
        // set form validation rules

        $firstname = $this->input->post('firstname');
        $surname = $this->input->post('surname');

        $update_firstname = $this->User_model->update_profile_firstname($email, $firstname);
        $update_surname = $this->User_model->update_profile_surname($email, $surname);

        if ($update_firstname || $update_surname){
              //$msgSuccess = '<div class="alert alert-success>Update Was Successful</div>';
              //$this->session->set_flashdata('msgSuccess', $msgSuccess);
              redirect('user/profile');
              //$this->load->view('user_dashboard/profile', $data);
        }else{
            $msgError = '<div class="alert alert-danger>Update Failed</div>';
            $this->session->set_flashdata('msgError', $msgError);
            $this->load->view('user_dashboard/profile', $data);
         }
      }
    }

    // End of Profile Settings

    // Update Profile Image

    public function do_upload(){
      $config = array(
          'upload_path'   => "./uploads/profile/",
          'allowed_types' => "gif|jpg|png|jpeg",
          'overwrite'     => TRUE,
          'max_size'      => "3000",  // Can be set to particular file size
          //'max_height'    => "768",
          //'max_width'     => "1024"
        );

        $email = $this->session->userdata('uemail');
        $image = $this->input->post('fileToUpload');

        $this->load->library('upload', $config);

        if($this->upload->do_upload('fileToUpload')){
					$data = array(
            'userdp'      => $this->User_model->display_user($email),
            'shipdp'      => $this->User_model->display_shipping($email)

          );
          $image_name = $this->upload->data();
          $this->User_model->update_image($email, $image_name['file_name']);

          //$msg = '<div class="alert alert-success>Update Failed</div>';
          //$this->session->set_flashdata('msg', $msg);
          //$this->load->view('user_dashboard/profile', $data);
          redirect('user/profile');
				}else{
				  $error = array('error' => $this->upload->display_errors());

          $msgError = '<div class="alert alert-danger>Update Failed</div>';
          $this->session->set_flashdata('msgError', $msgError);
          $this->load->view('user_dashboard/profile', $data);
          //redirect('user/profile');
				}
      }

    // End of Update Profile Image

    // Shipping Settings

    public function update_shipping(){
      $email = $this->session->userdata('uemail');
      $data['userdp'] = $this->User_model->display_user($email);
      $data['shipdp'] = $this->User_model->display_shipping($email);
      $data['total_order_count'] = $this->User_model->display_order_count($email);

      $this->form_validation->set_rules('businessname', 'Business Name', 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('address1', 'Address1', 'trim|required|min_length[3]|max_length[100]');
      $this->form_validation->set_rules('address2', 'Address2', 'trim|required|min_length[3]|max_length[100]');
      $this->form_validation->set_rules('province', 'Province', 'trim|required|min_length[3]|max_length[50]');
      $this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|min_length[3]|max_length[50]');

      //if($this->input->post('updateProfile')){
        if ($this->form_validation->run() == FALSE){
            // fails
            if($this->session->userdata('login')){
              $this->load->view('user_dashboard/profile', $data);
            }else{
              redirect('user/expire');
            }
        }else{
        // set form validation rules

        $businessname = $this->input->post('businessname');
        $telephone = $this->input->post('telephone');
        $address1 = $this->input->post('address1');
        $address2 = $this->input->post('address2');
        $province = $this->input->post('province');
        $postcode = $this->input->post('postcode');
        $state = $this->input->post('state');

        if ($this->User_model->update_customer_shipping_business($email, $businessname)
            || $this->User_model->update_customer_shipping_telephone($email, $telephone)
            || $this->User_model->update_customer_shipping_address1($email, $address1)
            || $this->User_model->update_customer_shipping_address2($email, $address2)
            || $this->User_model->update_customer_shipping_province($email, $province)
            || $this->User_model->update_customer_shipping_postcode($email, $postcode)
            || $this->User_model->update_customer_shipping_state($email, $state)){
              $this->session->set_flashdata('msg, <div class="alert alert-success">Updated Successfully</div>');
              redirect('user/profile');
              //$this->load->view('user_dashboard/profile', $data);
              //redirect($_SERVER['REQUEST_URI'], 'refresh');
             //$this->load->view('home');
        }else{
            $fail = '<div class="alert alert-danger>Update Failed</div>';
            $this->session->set_flashdata('fail', $fail);
            $this->load->view('user_dashboard/profile', $data);
         }
      }
    }

    // End of Shipping Settings

    // Forgot Password

    public function forgot_password(){
      $email = $this->session->userdata('uemail');
      $data['userdp'] = $this->User_model->display_user($email);

      if($this->session->userdata('login')){
        $this->load->view('user_dashboard/forgot_password', $data);
      }else{
        redirect('user/expire');
      }
    }

    // End of Forgot Password

  }

?>
