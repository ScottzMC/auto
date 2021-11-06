<?php

  class Checkout extends CI_Controller{

    public function index(){
      $email = $this->session->userdata('uemail');

      $data['type'] = $this->Type_model->display_all_type();
      $data['shipping'] = $this->Checkout_model->display_shipping_details($email);

      $this->load->view('cart/checkout', $data);
   }

	public function save_order(){
    $shuffle = str_shuffle("CDEUVX");
    $unique = rand(000, 999);
    $cust_id = $shuffle.$unique;

		$customer = array(
      'user_code'    => $cust_id,
			'firstname'    => $this->input->post('firstname'),
			'business' 	   => $this->input->post('business'),
			'telephone'    => $this->input->post('telephone'),
			'address1' 	   => $this->input->post('address1'),
      'province' 	   => $this->input->post('province'),
      'surname' 	   => $this->input->post('surname'),
      'email' 	     => $this->input->post('email'),
      'postcode' 	   => $this->input->post('postcode'),
      'address2' 	   => $this->input->post('address2'),
      'state' 	     => $this->input->post('state'),
      'created_time' => time(),
      'created_day'  => date('Y-m-j H:i:s')
		);

    $firstname = $this->input->post('firstname');
    $business = $this->input->post('businessname');
    $telephone = $this->input->post('telephone');
    $address1 = $this->input->post('address1');
    $province = $this->input->post('province');
    $surname = $this->input->post('surname');
    $email = $this->input->post('email');
    $postcode = $this->input->post('postcode');
    $address2 = $this->input->post('address2');
    $state = $this->input->post('state');

    $this->Checkout_model->update_customer_shipping_firstname($this->session->userdata('uemail'), $firstname);
    $this->Checkout_model->update_customer_shipping_surname($this->session->userdata('uemail'), $surname);
    $this->Checkout_model->update_customer_shipping_business($this->session->userdata('uemail'), $business);
    $this->Checkout_model->update_customer_shipping_telephone($this->session->userdata('uemail'), $telephone);
    $this->Checkout_model->update_customer_shipping_address1($this->session->userdata('uemail'), $address1);
    $this->Checkout_model->update_customer_shipping_province($this->session->userdata('uemail'), $province);
    $this->Checkout_model->update_customer_shipping_postcode($this->session->userdata('uemail'), $postcode);
    $this->Checkout_model->update_customer_shipping_email($this->session->userdata('uemail'), $email);
    $this->Checkout_model->update_customer_shipping_address2($this->session->userdata('uemail'), $address2);
    $this->Checkout_model->update_customer_shipping_state($this->session->userdata('uemail'), $state);
    //$this->checkout_model->;

		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
          'email'        => $this->input->post('email'),
					'orderid' 	   => $cust_id,
					'productid' 	 => $item['id'],
          'title'        => $item['name'],
					'quantity' 		 => $item['qty'],
					'price' 		   => $item['price'],
          'image'        => $item['image'],
          'status'       => 'Delivering',
          'created_time' => time(),
          'created_day'  => date('Y-m-j H:i:s')
				);

				$this->Checkout_model->insert_order_detail($order_detail);
        $this->Checkout_model->update_product_detail($item['qty'], $item['name']);
        $this->Checkout_model->decrease_quantity($item['qty'], $item['name']);
				$this->cart->destroy();
			endforeach;
		endif;

    redirect('checkout/success');
	}

  public function success(){
    $data['type'] = $this->Type_model->display_all_type();
    $this->load->view('cart/orderSuccess', $data);
  }

}

?>
