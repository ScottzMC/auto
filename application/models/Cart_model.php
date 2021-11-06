<?php

  class Cart_model extends CI_Model{

    function update_cart($rowid, $qty, $price, $amount) {
      $rowid = $this->db->escape_str($rowid);
      $qty = $this->db->escape_str($qty);
      $price = $this->db->escape_str($price);
      $amount = $this->db->escape_str($amount);

 		   $data = array(
			   'rowid'   => $rowid,
			   'qty'     => $qty,
			   'price'   => $price,
			   'amount'  => $amount
		 );

		  $this->cart->update($data);
	  }

  }

?>
