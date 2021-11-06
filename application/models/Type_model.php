<?php

  class Type_model extends CI_Model{

    // Catalog Page

    function display_all_type(){
      return $this->db->get('type')->result();
    }

    function display_type_name($type){
      $type = $this->db->escape_str($type);

      $this->db->where('type', $type);
      $query = $this->db->get('product')->result();
      return $query;
    }

    function display_all_type_by_name($type){
      $type = $this->db->escape_str($type);

      $query = $this->db->query(
      "SELECT product.code, product.title, product.price, product.status, product_details.code,
      product_details.type, product_details.description, product_details.category, product_details.subcategory,
      image.code, image.image FROM product INNER JOIN product_details ON product.code = product_details.code
      INNER JOIN image ON product.code = image.code WHERE product.type = '$type' ORDER BY product.created_day DESC LIMIT 20"
      );

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    public function record_type_count() {
        return $this->db->count_all("product");
    }

    public function fetch_type_data($type, $limit, $start){
        $type = $this->db->escape_str($type);

        $this->db->limit($limit, $start);
        $query = $this->db->query("SELECT product.code, product.title, product.price, product.status, product_details.code,
        product_details.type, product_details.description, product_details.category, product_details.subcategory,
        image.code, image.image FROM product INNER JOIN product_details ON product.code = product_details.code
        INNER JOIN image ON product.code = image.code WHERE product.type = '$type' ORDER BY product.created_day DESC");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // End of Catalog Page

    // For Detail Page

    function display_detail($title){
      $title = $this->db->escape_str($title);

      $query = $this->db->query(
      "SELECT product.code, product.id, product.title, product.price, product.status, product.sold, product.part_no,
      product.count_review, image.code, image.image FROM product INNER JOIN image ON product.code = image.code
      WHERE product.title = '$title' "
     );

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    function display_featured_detail($type){
      $type = $this->db->escape_str($type);

      $query = $this->db->query(
      "SELECT product.code, product.title, product.price, product.status, product.sold, product.type,
      image.code, image.image FROM product INNER JOIN image ON product.code = image.code
      WHERE product.type = '$type' LIMIT 6"
      );

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return NULL;
      }
    }

    function display_detail_pd($title){
      $title = $this->db->escape_str($title);

      $this->db->where('title', $title);
      $query = $this->db->get('product_details')->result();
      return $query;
    }

    // End of Detail Page

    // Product Review Page

    function display_product_review($title){
      $title = $this->db->escape_str($title);

      $this->db->where('title', $title);
      $query = $this->db->get('product_review')->result();
      return $query;
    }

    function insert_product_review($data){
      $this->db->escape_str($data);

      $query = $this->db->insert('product_review', $data);
      return $query;
    }

    // End of Product Review Page

  }

?>
