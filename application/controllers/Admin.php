<?php

  class Admin extends CI_Controller{

    // Dashboard

    public function index(){
      if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_user_count'] = $this->Admin_model->display_user_count();
        $data['total_product_count'] = $this->Admin_model->display_product_count();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['user_status'] = $this->Admin_model->user_register_status();
        $data['user_product'] = $this->Admin_model->user_product_status();
        $data['order'] = $this->Admin_model->display_order();
        $data['contact'] = $this->Admin_model->display_contact_mail();
        $this->load->view('admin_dashboard/home/dashboard', $data);
      }else{
        redirect('admin/expire');
      }
    }

    public function deliver_order(){
      $pid = $this->input->post('order_id');
      $status = "Delivered";

      $this->Admin_model->deliver_order($pid, $status);
    }

    public function cancel_order(){
      $pid = $this->input->post('del_id');
      $status = "Cancelled";

      $this->Admin_model->cancel_order($pid, $status);
    }

    public function delete_order(){
      $did = $this->input->post('deleted_id');

      $this->Admin_model->delete_order($did);
    }

    public function expire(){
      $this->load->view('home/index');
    }

    // End of Dashboard

    // View Dashboard Products

    public function view_products(){
      if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();

        $config['base_url'] = base_url()."admin/view_products";
        $total_row = $this->Admin_model->record_product_count();
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

        $data["product"] = $this->Admin_model->fetch_product_data($config["per_page"], $page);

        $this->load->view('admin_dashboard/product/dashboard_product', $data);
      }else{
        redirect('admin/expire');
      }
    }

    public function delete_product(){
      $pid = $this->input->post('del_id');

      $this->Admin_model->delete_product($pid);

      //$data['record'] = $this->Admin_model->display_product_by_id($pid);
      //print_r($data['record']);
      //$image = $data['record']['image'];
      //unlink('../uploads/product/'.$data);
    }

    public function delete_blog(){
      $bid = $this->input->post('blog_id');

      $this->Admin_model->delete_blog($bid);
    }

    public function delete_inbox(){
      $bid = $this->input->post('del_id');

      $this->Admin_model->delete_inbox($bid);
    }

    public function delete_menu(){
      $mid = $this->input->post('del_id');

      $this->Admin_model->delete_menu($mid);
    }

    // End of View Dashboard Products

    // Add Dashboard Products

    public function add_products(){
        $email = $this->session->userdata('uemail');
        $continent = "Africa";

        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['country_location'] = $this->Admin_model->get_country_location($continent);

        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('part_number', 'Part Number', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[30]|max_length[300]');

        if ($this->form_validation->run() == FALSE){
            // fails
            if($this->session->userdata('login')){
              $this->load->view('admin_dashboard/product/dashboard_add_product', $data);
            }else{
              redirect('admin/expire');
            }
        }else if(!empty($_FILES['userFiles']['name'])){
        // set form validation rules
        $shuffle = str_shuffle("ABCDUVXY");
        $unique = rand(000, 999);
        $code = $shuffle.$unique;

        $title = $this->input->post('title');
        $str_title = str_replace(' ', '-', $title);

        $part_no = $this->input->post('part_number');
        $price = $this->input->post('price');
        $type = $this->input->post('type');
        $status = $this->input->post('status');
        $quantity = $this->input->post('quantity');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $subcategory = $this->input->post('subcategory');
        $model = $this->input->post('model');
        $year = $this->input->post('year');
        $country = $this->input->post('country');
        $state = $this->input->post('state');

        $time = time();
        $date = date('Y-m-j H:i:s');

        $ins_prod = array(
          'code' => $code,
          'part_no' => $part_no,
          'email' => $email,
          'title' => $str_title,
          'price' => $price,
          'type' => $type,
          'status' => $status,
          'quantity' => $quantity,
          'created_time' => $time,
          'created_day' => $date
        );

        $ins_prod_det = array(
          'code' => $code,
          'part_no' => $part_no,
          'title' => $str_title,
          'description' => $description,
          'type' => $type,
          'category' => $category,
          'subcategory' => $subcategory,
          'model' => $model,
          'year' => $year,
          'country' => $country,
          'state' => $state
        );

          $files = $_FILES;
          //$images = array();
          $cpt = count($_FILES['userFiles']['name']);
              for($i=0; $i<$cpt; $i++){
              $_FILES['userFiles']['name']= $files['userFiles']['name'][$i];
              $_FILES['userFiles']['type']= $files['userFiles']['type'][$i];
              $_FILES['userFiles']['tmp_name']= $files['userFiles']['tmp_name'][$i];
              $_FILES['userFiles']['error']= $files['userFiles']['error'][$i];
              $_FILES['userFiles']['size']= $files['userFiles']['size'][$i];

              $config = array(
                  'upload_path'   => "./uploads/product/",
                  'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite'     => TRUE,
                  'max_size'      => "3000",  // Can be set to particular file size
                  //'max_height'    => "768",
                  //'max_width'     => "1024"
              );

              $this->load->library('upload', $config);
              $this->upload->initialize($config);

              $this->upload->do_upload('userFiles');
              $fileName = $_FILES['userFiles']['name'];
              $images[] = $fileName;
          }

          $fileName = implode(',', $images);

          $img = array('code' => $code, 'image' => $fileName);

          $pdc = 1;

        //if(!empty($uploadData)){
          $insert_image = $this->Admin_model->insert_data($img);
          $insert_product = $this->Admin_model->insert_product($ins_prod);
          $insert_product_details = $this->Admin_model->insert_product_details($ins_prod_det);

          if(!$insert_image && $insert_product && $insert_product_details){
            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
            $this->session->set_flashdata('msgError', $msgError);
            $this->load->view('admin_dashboard/product/dashboard_add_product', $data);
      }else{
        redirect('admin/view_products');
      }
    }
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

    // End of Add Dashboard Products

    // Orders Dashboard

    public function orders(){
      if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['orders'] = $this->Admin_model->display_order();

        $this->load->view('admin_dashboard/orders/dashboard_orders', $data);

      }else{
        redirect('admin/expire');
      }
    }

    // End of Orders Dashboard

    // Inbox Dashboard

    public function inbox(){
      if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
        $email = $this->session->userdata('uemail');
        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['user_inbox'] = $this->Admin_model->display_inbox_user($email);
        $data['inbox'] = $this->Admin_model->display_inbox($email);

        $this->load->view('admin_dashboard/inbox/dashboard_inbox', $data);

      }else{
        redirect('admin/expire');
      }
    }

    public function inbox_detail($title){
      if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
        $email = $this->session->userdata('uemail');
        $data['total'] = $this->Admin_model->display_total_products();
        $data['total_contact_count'] = $this->Admin_model->display_contact_count();
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['user_inbox'] = $this->Admin_model->display_inbox_user($email);
        $data['inbox'] = $this->Admin_model->display_inbox($email);
        $data['inbox_detail'] = $this->Admin_model->display_inbox_detail($title);

        $this->load->view('admin_dashboard/inbox/dashboard_inbox_detail', $data);

      }else{
        redirect('admin/expire');
      }
    }

    // End of Inbox Dashboard

  // Users Dashboard

  public function users(){
    if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
      $email = $this->session->userdata('uemail');
      $data['total'] = $this->Admin_model->display_total_products();
      $data['total_contact_count'] = $this->Admin_model->display_contact_count();
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['users'] = $this->Admin_model->display_all_users();

      $this->load->view('admin_dashboard/user/dashboard_users', $data);

    }else{
      redirect('admin/expire');
    }
  }

  public function activate_users(){
    $uid = $this->input->post('user_id');

    $this->admin_model->activate_user($uid);
  }

  public function deactivate_users(){
    $uid = $this->input->post('de_user_id');

    $this->admin_model->deactivate_user($uid);
  }

  // End of Users Dashboard

  // Invoice

  public function invoice(){
    if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
      $email = $this->session->userdata('uemail');
      $data['total'] = $this->Admin_model->display_total_products();
      $data['total_contact_count'] = $this->Admin_model->display_contact_count();
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['invoice'] = $this->Admin_model->display_all_invoice($email);
      $data['orders'] = $this->Admin_model->display_all_order();
      $data['admin_invoice'] = $this->Admin_model->display_order_by_email($email);

      $this->load->view('admin_dashboard/orders/dashboard_invoice', $data);
    }else{
      redirect('admin/expire');
    }
  }

  // End of Invoice

  // Edit My Website

  public function my_website(){
    if($this->session->userdata('login') && $this->session->userdata('user_level') == 1){
      $email = $this->session->userdata('uemail');
      $data['total'] = $this->Admin_model->display_total_products();
      $data['total_contact_count'] = $this->Admin_model->display_contact_count();
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['load_menu'] = $this->Admin_model->display_menu_options();

      $this->form_validation->set_rules('menu_tag', 'Menu Options', 'trim|required');

      $form_validation = $this->form_validation->run();

      if($form_validation == FALSE){
        $this->load->view('admin_dashboard/shop/dashboard_website', $data);
      }else{
        $menu_options = $this->input->post('menu_tag');
        $check[] = $menu_options;
        $menu = implode(',', $check);

        $add_data = array('menu_options' => $menu);

        $insert = $this->Admin_model->insert_menu($add_data);

        if($insert){
          $statusMsg = '<div class="alert alert-success" role="alert">Added to Menu</div>';
          $this->session->set_flashdata('msg', $statusMsg);
          $this->load->view('admin_dashboard/shop/dashboard_website', $data);
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgError', $statusMsg);
          $this->load->view('admin_dashboard/shop/dashboard_website', $data);
        }
      }
    }else{
      redirect('admin/expire');
    }
  }

  // End of Edit My Website

}

?>
