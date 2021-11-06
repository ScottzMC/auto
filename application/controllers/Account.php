<?php

  class Account extends CI_Controller{

   public function takeToLogin(){
     $data['type'] = $this->Type_model->display_all_type();
     $this->load->view('account/login', $data);
   }

   public function takeToRegister(){
     $data['type'] = $this->Type_model->display_all_type();
     $this->load->view('account/register', $data);
   }

   function login(){
       // get form input
       $data['type'] = $this->Type_model->display_all_type();

       $email = $this->input->post("email");
       $password = $this->input->post("password");

       // form validation
       $this->form_validation->set_rules("email", "Email", "trim|required");
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
           redirect("home/index");
         }else{
           $statusMsg = '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>';
           $this->session->set_flashdata('msgError', $statusMsg);
           $this->load->view('account/login', $data);
           //redirect('account/takeToLogin');
         }
      //}
   }

   function register(){
     $data['type'] = $this->Type_model->display_all_type();
    // set form validation rules
     $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
     $this->form_validation->set_rules('surname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
     $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
     $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
     $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');

       // submit
       if ($this->form_validation->run() == FALSE){
           // fails
           $this->load->view('account/register');
       }else{
           //insert user details into db
           $time = time();
           $firstname = $_POST['firstname'];
           $surname = $_POST['surname'];
           $email = $_POST['email'];
           $password = $_POST['password'];
           $time = time();
           $shuffle = str_shuffle("ABCDETUVXYZ");
           $unique = rand(000, 999);
           $code = $shuffle.$unique;
           $user_code = $code;
     			 $user_status = "Activated";
           $image = 'original.jpg';
           $user_level = 0;
     			 $date = date('Y-m-j H:i:s');

           $use = array(
             'firstname' => $firstname,
             'surname' => $surname,
             'user_code' => $user_code,
             'email' => $email,
             'password' => $password,
             'image' => $image,
             'user_status' => $user_status,
             'user_level' => $user_level,
             'created_time' => $time,
             'created_day' => $date
           );

           $insert_user = $this->Account_model->insert_user($use);

           if($insert_user){
               $statusMsg = '<div class="alert alert-success text-center">You are Successfully Registered!!</div>';
               $this->session->set_flashdata('msg', $statusMsg);
               $this->load->view('account/register', $data);
               redirect('account/takeToLogin');
           }else{
               // error
               $statusMsg = '<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>';
               $this->session->set_flashdata('msgError', $statusMsg);
               $this->load->view('account/register', $data);
               //redirect('account/takeToRegister');
           }
       }
   }

  }

?>
