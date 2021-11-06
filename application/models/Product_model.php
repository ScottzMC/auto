<?php

  class Product_model extends CI_Model{

    public function __construct(){
      parent::__construct();
    }

    public function display_featured_products(){
      $query = $this->db->query(
      'SELECT product.code, product.title, product.price, product.type, product.status, product.type,
       image.code, image.image FROM product INNER JOIN image ON product.code = image.code LIMIT 8'
      );

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function display_popular_products(){
      $query = $this->db->query(
      'SELECT product.code, product.title, product.price, product.type, image.code, image.image
       FROM product INNER JOIN image ON product.code = image.code ORDER BY product.sold DESC LIMIT 6'
      );

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    // Search

    public function get_search_query($match_name, $match_type, $match_status, $match_min_year, $match_max_year, $match_location, $match_region, $match_minprice, $match_maxprice){
      $results = array();
      $match_name = $this->db->escape_str($match_name);
      $match_type = $this->db->escape_str($match_type);
      $match_status = $this->db->escape_str($match_status);
      $match_min_year = $this->db->escape_str($match_min_year);
      $match_max_year = $this->db->escape_str($match_max_year);
      $match_location = $this->db->escape_str($match_location);
      $match_region = $this->db->escape_str($match_region);
      $match_minprice = $this->db->escape_str($match_minprice);
      $match_maxprice = $this->db->escape_str($match_maxprice);

      $query = $this->db->query("SELECT product.code, product.title, product.price, product.status,
      product_details.code, product_details.description, product_details.type, product_details.category,
      product_details.subcategory, image.code, image.image FROM product INNER JOIN product_details
      ON product.code = product_details.code INNER JOIN image ON product.code = image.code
      WHERE product.title LIKE '%$match_name%' AND product_details.type = '$match_type'
      AND product.status = '$match_status' AND product_details.year BETWEEN '$match_min_year' AND '$match_max_year'
      AND product_details.country = '$match_location' AND product_details.state = '$match_region' AND product.price BETWEEN '$match_minprice'
      AND '$match_maxprice' ");

      if($query->num_rows() > 0){
        $results = $query->result();
        return $results;
      }else{
        return NULL;
      }
    }



    // End of Search

  }

?>
