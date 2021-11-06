<?php

  class Cart extends CI_Controller{

    public function index(){
		  if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }
      $data['type'] = $this->Type_model->display_all_type();
		  $this->load->view('cart/viewCart', $data);
	 }

    public function add(){

		  $insert_room = array(
        'id' => $this->input->post('id'),
			  'name' => $this->input->post('title'),
			  'price' => $this->input->post('price'),
			  'qty' => 1,
        'code' => $this->input->post('code'),
        'count_review' => $this->input->post('count_review'),
        'type' => $this->input->post('type'),
        'image' => $this->input->post('image')
		  );

		 $this->cart->insert($insert_room);

		 redirect('cart');
	}

    public function remove($rowid){
		  if($rowid=="all"){
			   $this->cart->destroy();
		  }else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}

		redirect('cart');
	}

    public function update_cart(){
 		  foreach($_POST['cart'] as $id => $cart){
			   $price = $cart['price'];
			   $amount = $price * $cart['qty'];
			  $this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}

		redirect('cart');
	}

}

?>
