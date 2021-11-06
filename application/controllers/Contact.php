<?php

  class Contact extends CI_Controller{

    public function index(){
      $data['type'] = $this->Type_model->display_all_type();

      // form validation
      $this->form_validation->set_rules("fullname", "FullName", "trim|required|min_length[3]|max_length[50]");
      $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|min_length[3]|max_length[50]");
      $this->form_validation->set_rules("telephone", "Telephone", "trim|required|max_length[30]");
      $this->form_validation->set_rules("title", "Title", "trim|required|min_length[3]|max_length[20]");
      $this->form_validation->set_rules("message", "Message", "trim|required|min_length[3]|max_length[200]");

      if($this->form_validation->run() == FALSE){
        $this->load->view('home/contact', $data);
      }else{
        $fullname  = $_POST['fullname'];
        $email     = $_POST['email'];
        $telephone = $_POST['telephone'];
        $title     = $_POST['title'];
        $message   = $_POST['message'];
        $time      = time();
        $date      = date('Y-m-j H:i:s');

        $con = array(
          'fullname' => $fullname,
          'email' => $email,
          'telephone' => $telephone,
          'title' => $title,
          'message' => $message,
          'created_time' => $time,
          'created_day' => $date
        );

        $insert = $this->Account_model->insert_contact($con);
        //redirect('contact');
        if($insert){
          $statusMsg = '<div class="alert alert-success" role="alert">Message Sent Successfully</div>';
          $this->session->set_flashdata('msg', $statusMsg);
          $this->load->view('home/contact', $data);
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Message Sent Failed</div>';
          $this->session->set_flashdata('msgError', $statusMsg);
          $this->load->view('home/contact', $data);
        }
       }
     }
    }

?>
