<?php

  class Admin_model extends CI_Model{

    // Dashboard

    public function display_total_products(){
      return $this->db->get('user_details')->result();
    }

    public function display_user_count(){
      return $this->db->query("SELECT COUNT(*) AS user_count FROM users")->result();
    }

    public function display_product_count(){
      return $this->db->query("SELECT COUNT(*) AS product_count FROM product")->result();
    }

    public function display_contact_count(){
      return $this->db->query("SELECT COUNT(*) AS contact_count FROM contact")->result();
    }

    public function display_order_count(){
      return $this->db->query("SELECT COUNT(*) AS order_count FROM order_detail")->result();
    }

    public function user_register_status(){
      $query = $this->db->query("SELECT * FROM users ORDER BY created_time DESC LIMIT 6");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function user_product_status(){
      $query = $this->db->query("SELECT users.email, users.firstname, users.surname, users.image, product.email,
      product.title, product.created_time, product.created_day FROM users INNER JOIN product ON users.email = product.email
      ORDER BY product.created_time DESC LIMIT 6");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function display_order(){
      $query = $this->db->query("SELECT users.email, users.firstname, users.surname, order_detail.id,
      order_detail.email, order_detail.orderid, order_detail.title, order_detail.quantity, order_detail.price,
      order_detail.status, order_detail.created_time, order_detail.created_day, shipping.email, shipping.businessname,
      shipping.telephone, shipping.address1, shipping.province, shipping.state, shipping.country FROM users INNER JOIN
      order_detail INNER JOIN shipping ON users.email = order_detail.email AND users.email = shipping.email ORDER BY
      order_detail.created_time DESC LIMIT 6");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function display_all_order(){
      return $this->db->get('order_detail')->result();
    }

    public function cancel_order($id, $status){
      $id = $this->db->escape_str($id);
      $status = $this->db->escape_str($status);

      $query = $this->db->query("UPDATE order_detail SET status = '$status' WHERE id = '$id' ");
      return $query;
    }

    public function deliver_order($id, $status){
      $id = $this->db->escape_str($id);
      $status = $this->db->escape_str($status);

      $query = $this->db->query("UPDATE order_detail SET status = '$status' WHERE id = '$id' ");
      return $query;
    }

    public function display_contact_mail(){
      $query = $this->db->query("SELECT * FROM contact ORDER BY created_time DESC");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function record_product_count() {
        return $this->db->count_all("product");
    }

    public function fetch_product_data($limit, $start){

        $this->db->limit($limit, $start);
        $query = $this->db->query("SELECT product.id, product.code, product.title, product.type, product.price,
        image.code, image.image FROM product INNER JOIN image ON product.code = image.code ORDER BY product.created_day
        DESC");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function display_product_by_id($id){
      $id = $this->db->escape_str($id);

      $this->db->where('id');
      $query = $this->db->get('image')->result();
      return $query;
    }

    function display_location(){
      $this->db->where('continent', 'Africa');
      $query = $this->db->get('country')->result();
      return $query;
    }

    // End of Dashboard

    // Inbox of Dashboard

    public function display_inbox(){
      $this->db->order_by('created_time', 'DESC');
      $query = $this->db->get('contact')->result();
      return $query;
    }

    public function display_inbox_user($email){
      $email = $this->db->escape_str($email);

      $this->db->where('email', $email);
      $query = $this->db->get('users')->result();
      return $query;
    }

    public function display_inbox_detail($title){
      $title = $this->db->escape_str($title);

      $this->db->where('title', $title);
      $query = $this->db->get('contact')->result();
      return $query;
    }

    // End of Inbox of Dashboard

    // Users Dashboard

    public function display_all_users(){
      $query = $this->db->query("SELECT users.id, users.user_code, users.firstname, users.surname, users.email,
       users.image, users.user_status, users.created_time, users.created_day, shipping.user_code, shipping.telephone,
       shipping.address1, shipping.address2, shipping.province, shipping.state, shipping.country FROM users INNER JOIN shipping
       ON users.user_code = shipping.user_code");

       if($query->num_rows() > 0){
         return $query->result();
       }else{
         return NULL;
       }
    }

    public function activate_user($id){
      $id = $this->db->escape_str($id);

      $query = $this->db->query("UPDATE users SET user_status = 'Activated' WHERE id = '$id' ");
      return $query;
    }

    public function deactivate_user($id){
      $id = $this->db->escape_str($id);

      $query = $this->db->query("UPDATE users SET user_status = 'Deactivated' WHERE id = '$id' ");
      return $query;
    }

    // End of Users Dashboard

    // Invoice of Dashboard

    public function display_all_invoice($email){
      $email = $this->db->escape_str($email);

      $this->db->where('email', $email);
      $query = $this->db->get('shipping')->result();
      return $query;
    }

    public function display_order_by_email($email){
      $email = $this->db->escape_str($email);

      $query = $this->db->query("SELECT users.email, users.firstname, users.surname, order_detail.id,
      order_detail.email, order_detail.orderid, order_detail.title, order_detail.quantity, order_detail.price,
      order_detail.status, order_detail.created_time, order_detail.created_day, shipping.email, shipping.businessname,
      shipping.telephone, shipping.address1, shipping.province, shipping.state, shipping.country FROM users INNER JOIN
      order_detail INNER JOIN shipping ON users.email = order_detail.email AND users.email = shipping.email WHERE order_detail.email = '$email'
      ORDER BY order_detail.created_time DESC LIMIT 6");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    // End of Invoice Dashboard

    // Delete Dashboard Product

    public function delete_product($id){
      $id = $this->db->escape_str($id);

      $query = $this->db->query("DELETE FROM product WHERE id = '$id' ");
      $querypd = $this->db->query("DELETE FROM product_details WHERE id = '$id' ");
      $queryi = $this->db->query("DELETE FROM image WHERE id = '$id' ");
    }

    public function delete_order($id){
      $id = $this->db->escape_str($id);

      $query = $this->db->query("DELETE FROM order_detail WHERE id = '$id' ");
      return $query;
    }

    public function delete_inbox($id){
      $id = $this->db->escape_str($id);

      $query = $this->db->query("DELETE FROM contact WHERE id = '$id' ");
      return $query;
    }

    // End Delete Dashboard Product

    // Add a Product

    public function insert_product($data){
      $data = $this->db->escape_str($data);

      $query = $this->db->insert('product', $data);
      return $query;
    }

    public function insert_product_details($data){
      $data = $this->db->escape_str($data);

      $query_details = $this->db->insert('product_details', $data);
      return $query_details;
    }

    public function insert_data($data){
      $data = $this->db->escape_str($data);

      $query = $this->db->insert('image', $data);
      return $query;
    }

    public function get_country_location($continent){
      $this->db->where('continent', $continent);
      $query = $this->db->get('country')->result();
      return $query;
    }

    public function get_region_location($country){
      $this->db->where('country', $country);
      $query = $this->db->get('region', $country)->result();
      return $query;
    }

    // End of Add a Product

    // Menu Options

    function insert_menu($data){
      $data = $this->db->escape_str($data);

      $query = $this->db->insert('menu', $data);
      return $query;
    }

    function display_menu_options(){
      $query = $this->db->get('menu')->result();
      return $query;
    }

    // End of Menu Options

  }

?>
