<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Associate_report extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser'); 
    }

    public function index() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/associate_report');
        $this->load->view('dashboard/footer');
    }
   
    public function getAssociatereportList(){
        $column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price');
        $search_column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price');
        // $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));"); 
        $query = " SELECT * FROM tbl_issue_items ";
       
        $query.= " WHERE id > 0 ";

     
  
        if(isset($_POST['associate'])&&!empty($_POST['associate']))
        {
          $query .=" AND asscociate_name ='".$_POST['associate']."'";
        }
  



        if(isset($_POST['search']['value'])&&!empty($_POST['search']['value']))
        {
          foreach ($search_column as $key=> $value) {
            $query .= ($key==0?" AND ":" OR ");
            $query .= $value ." LIKE '%".$_POST['search']['value']."%' ";
          }
        }
        $query.= " GROUP BY product_name ";
        if (isset($_POST['order'])) {
            $query.= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $query.= ' ORDER BY id DESC ';
        }
        $number_filter_row = $this->db->query($query)->num_rows();
        if (isset($_POST["length"]) && $_POST["length"] != - 1) {
            $query.= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        $result = $this->db->query($query)->result();
        $data = array();
       
        foreach ($result as $key => $product) {
            $sub_array = array();
            $sub_array[] = ++$key;
            // $sub_array[] = '<img src="' . base_url() . 'uploads/services/' . $services->image . '" style="width: 50px;height: 50px;">';
            // $sub_array[] = get_field_value('tbl_cateogery','category',['id'=>$services->category]);
            // $sub_array[] = get_field_value('tbl_service_category', 'category', ['slug' => $services->category]);
            $sub_array[] = get_field_value('tbl_product', 'company_name', ['id' => $product->product_name]);  
            //$product->company_name;
            $sub_array[] =  get_field_value('tbl_product', 'product_name', ['id' => $product->product_name]); 

            $sub_array[] = $this->Adminuser->getSum('tbl_issue_items',  ['product_name' => $product->product_name],'quantity');
            $sub_array[] = $product->product_type;
           
            $sub_array[] = '
       <div>
       
        <a href="' . base_url() . 'Admin/Product/index/' . $product->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $product->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
          <i class="fas fa-trash-alt"></i> </a>
        </div>';
            $data[] = $sub_array;
        }
        //   print_r($data);
        $draw = !empty($_POST["draw"]) ? $_POST["draw"] : 1;
        $output = array("draw" => intval($draw), "recordsTotal" => $this->count_all_data(), "recordsFiltered" => $number_filter_row, "data" => $data);
        echo json_encode($output);
    }

    public function count_all_data() {
        $query = "SELECT * FROM  tbl_issue_items";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
