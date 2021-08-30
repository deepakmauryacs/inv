<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Available_items extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }

    

    public function index() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_available_items');
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $company_name = $this->input->post('company_name');
        $product_type = $this->input->post('product_type');
        $product_name = $this->input->post('product_name');
        $quantity = $this->input->post('quantity');
        $base_price = $this->input->post('base_price');
        $sgst = $this->input->post('sgst');
        $cgst = $this->input->post('cgst');
        $igst = $this->input->post('igst');
        $price = $this->input->post('price');
        if (empty($company_name)) {
            $result['status'] = 0;
            $result['message'] = 'company name is required';
            echo json_encode($result);
            die;
        }
        if (empty($product_type)) {
            $result['status'] = 0;
            $result['message'] = 'product type field is required';
            echo json_encode($result);
            die;
        }
        if (empty($product_name)) {
            $result['status'] = 0;
            $result['message'] = 'product name is required';
            echo json_encode($result);
            die;
        }
        if (empty($quantity)) {
            $result['status'] = 0;
            $result['message'] = 'quantity  is required';
            echo json_encode($result);
            die;
        }

     

        if (empty($base_price)) {
            $result['status'] = 0;
            $result['message'] = 'base price  is required';
            echo json_encode($result);
            die;
        }

        // $where['email']=$email;
		// if(!empty($edit_id))
		// {
		// 	$where['id!=']=$edit_id;
		// }

		// $row=$this->db->get_where('tbl_company',$where)->row();
		// if(!empty($row))
		// {
		// 	$result['status']=0;
		// 	$result['message']='Email Id Allready exist';
		// 	echo json_encode($result);die;
		// }
		
        $data['company_name'] = $company_name; 
        $data['product_type'] = $product_type; 
        $data['product_name'] = $product_name;
        $data['quantity'] =$quantity;
        $data['base_price'] = $base_price;
        $data['sgst'] =$sgst;
        $data['cgst'] =$cgst;
        $data['igst'] =$igst;
        $data['price'] =$price;


        // print_r($data);die();
        if (!empty($edit_id)) {
            $this->db->update('tbl_product', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Product update successfully';
        } else {
            $this->db->insert('tbl_product', $data);
            $result['status'] = 1;
            $result['message'] = 'Product add successfully';
        }
        echo json_encode($result);
        die;
    }

   
    public function delete() {
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_product', $id);
    }

   
    public function getAvailableList(){
        $column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price');
        $search_column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price');

        $query = " SELECT * FROM tbl_product ";
        $query.= " WHERE id > 0 ";

        if(isset($_POST['company'])&&!empty($_POST['company']))
        {
          $query .=" AND company_name ='".$_POST['company']."'";
        }
  
        if(isset($_POST['stocktype'])&&!empty($_POST['stocktype']))
        {
          $query .=" AND product_type ='".$_POST['stocktype']."'";
        }
  



        if(isset($_POST['search']['value'])&&!empty($_POST['search']['value']))
        {
          foreach ($search_column as $key=> $value) {
            $query .= ($key==0?" AND ":" OR ");
            $query .= $value ." LIKE '%".$_POST['search']['value']."%' ";
          }
        }

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
            $sub_array[] = $product->company_name;
            $sub_array[] = $product->product_name;
            $sub_array[] = $this->Adminuser->getSum('tbl_issue_items',  ['product_name' => $product->id],'quantity');
            $sub_array[] = $product->quantity.' '.$product->product_type;
            $sub_array[] = $product->product_type;
            $sub_array[] = $product->base_price;
           
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
        $query = "SELECT * FROM  tbl_product";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
