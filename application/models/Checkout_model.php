<?php

  class Checkout_model extends CI_Model{

  public function display_shipping_details($email){
    $email = $this->db->escape_str($email);

    $this->db->where('email', $email);
    $query = $this->db->get('shipping')->result();
    return $query;
  }

  // Updating Shipping Details

  public function update_customer_shipping_firstname($prev_email, $firstname){
    $prev_email = $this->db->escape_str($prev_email);
    $firstname = $this->db->escape_str($firstname);

    return $this->db->query("UPDATE shipping SET firstname = '$firstname' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_surname($prev_email, $surname){
    $prev_email = $this->db->escape_str($prev_email);
    $surname = $this->db->escape_str($surname);

    return $this->db->query("UPDATE shipping SET surname = '$surname' WHERE email = '$prev_email' ");
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
    $province = $this->db->escape_str($province);

    return $this->db->query("UPDATE shipping SET province = '$province' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_postcode($prev_email, $postcode){
    $prev_email = $this->db->escape_str($prev_email);
    $postcode = $this->db->escape_str($postcode);

    return $this->db->query("UPDATE shipping SET postcode = '$postcode' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_email($prev_email, $email){
    $prev_email = $this->db->escape_str($prev_email);
    $email = $this->db->escape_str($email);

    return $this->db->query("UPDATE shipping SET email = '$email' WHERE email = '$prev_email' ");
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

  // End of Updating Shipping Details

  public function update_product_detail($qty, $name){
    $qty = $this->db->escape_str($qty);
    $name = $this->db->escape_str($name);

    return $this->db->query("UPDATE product SET sold = sold + '$qty' WHERE title = '$name' ");
  }

  public function decrease_quantity($qty, $name){
    $qty = $this->db->escape_str($qty);
    $name = $this->db->escape_str($name);

    return $this->db->query("UPDATE product SET quantity = quantity - '$qty' WHERE title = '$name' ");
  }

	public function insert_order_detail($data){
    $data = $this->db->escape_str($data);

		$query = $this->db->insert('order_detail', $data);
    return $query;
	}
}

?>
