<?php

  class User_model extends CI_Model{

    // User Dashboard

    function display_user($email){
      $email = $this->db->escape_str($email);

      $query = $this->db->query("SELECT users.user_code, users.firstname, users.surname, users.email, users.image,
      users.created_time, users.user_status, user_details.user_code, user_details.my_product_count, user_details.order_count
      FROM users INNER JOIN user_details ON users.user_code = user_details.user_code WHERE users.email = '$email' ");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    function display_quantity_low($email){
      $email = $this->db->escape_str($email);

      $query = $this->db->query("SELECT title, quantity FROM product WHERE email = '$email' ");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function record_user_count() {
        return $this->db->count_all("order_detail");
    }

    public function fetch_user_data($email, $limit, $start){
        $email = $this->db->escape_str($email);

        $this->db->limit($limit, $start);
        $this->db->where('email', $email);
        $query = $this->db->get("order_detail");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // End of User Dashboard

    // Invoice

    function display_shipping($email){
      $email = $this->db->escape_str($email);

      $query = $this->db->query("SELECT * FROM shipping WHERE email = '$email' ");

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function display_product_count($email){
      $email = $this->db->escape_str($email);

      return $this->db->query("SELECT COUNT(*) AS product_count FROM product WHERE email = '$email' ")->result();
    }

    public function display_order_count($email){
      $email = $this->db->escape_str($email);

      return $this->db->query("SELECT COUNT(*) AS order_count FROM order_detail WHERE email = '$email' ")->result();
    }

    public function record_invoice_count() {
        return $this->db->count_all("order_detail");
    }

    public function fetch_invoice_data($email, $limit, $start){
        $email = $this->db->escape_str($email);

        $this->db->limit($limit, $start);
        $this->db->where('email', $email);
        $query = $this->db->get("order_detail");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // End of Invoice

    // Cancel Invoice

    public function cancel_order($id, $status){
      $id = $this->db->escape_str($id);
      $status = $this->db->escape_str($status);

      $query = $this->db->query("UPDATE order_detail SET status = '$status' WHERE id = '$id' ");
      return $query;
    }

    // End of Cancel Invoice

    // Profile Settings

    public function update_profile_firstname($prev_email, $firstname){
      $prev_email = $this->db->escape_str($prev_email);
      $firstname = $this->db->escape_str($firstname);

      return $this->db->query("UPDATE users SET firstname = '$firstname' WHERE email = '$prev_email' ");
    }

    public function update_profile_surname($prev_email, $surname){
      $prev_email = $this->db->escape_str($prev_email);
      $surname = $this->db->escape_str($surname);

      return $this->db->query("UPDATE users SET surname = '$surname' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_business($prev_email, $business){
      $prev_email = $this->db->escape_str($prev_email);
      $business = $this->db->escape_str($business);

      return $this->db->query("UPDATE shipping SET businessname = '$business' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_telephone($prev_email, $telephone){
      $prev_email = $this->db->escape_str($prev_email);
      $telephone = $this->db->escape_str($telephone);

      return $this->db->query("UPDATE shipping SET telephone = '$telephone' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_address1($prev_email, $address1){
      $prev_email = $this->db->escape_str($prev_email);
      $address1 = $this->db->escape_str($address1);

      return $this->db->query("UPDATE shipping SET address1 = '$address1' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_province($prev_email, $province){
      $prev_email = $this->db->escape_str($prev_email);
      //$province = $this->db->escape_str($province);

      return $this->db->query("UPDATE shipping SET province = '$province' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_postcode($prev_email, $postcode){
      $prev_email = $this->db->escape_str($prev_email);
      $postcode = $this->db->escape_str($postcode);

      return $this->db->query("UPDATE shipping SET postcode = '$postcode' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_address2($prev_email, $address2){
      $prev_email = $this->db->escape_str($prev_email);
      $address2 = $this->db->escape_str($address2);

      return $this->db->query("UPDATE shipping SET address2 = '$address2' WHERE email = '$prev_email' ");
    }

    public function update_customer_shipping_state($prev_email, $state){
      $prev_email = $this->db->escape_str($prev_email);
      $state = $this->db->escape_str($state);

      return $this->db->query("UPDATE shipping SET state = '$state' WHERE email = '$prev_email' ");
    }

    public function update_image($prev_email, $image){
      $prev_email = $this->db->escape_str($prev_email);
      $image = $this->db->escape_str($image);

      return $this->db->query("UPDATE users SET image = '$image' WHERE email = '$prev_email' ");
    }

    // End of Profile Settings

  }

?>
