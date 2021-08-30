<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnto_company extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    public function index($id =''){
        if (!empty($id)) {
            $data['edit_items'] = $this->db->get_where('tbl_returnto_company', ['id' => $id])->row();
        }else{
            $data['edit_items'] = '';
        }
        $data['product'] = $this->db->get_where('tbl_product', ['id >' => 0,'product_type'=>'Defected'])->result();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/returnto_company', $data);
        $this->load->view('dashboard/footer');
    }

    public function all(){
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_returnto_company');
        $this->load->view('dashboard/footer');
    }

    public function add(){
        $product_name = $this->input->post('product_name');
        $return_date = $this->input->post('return_date'); 
        if (empty($product_name)) {
            $result['status'] = 0;
            $result['message'] = 'Product Name is Required';
            echo json_encode($result);
            die;
         }
         if (empty($return_date)) {
            $result['status'] = 0;
            $result['message'] = 'Return Date  is Required';
            echo json_encode($result);
            die;
         }

        if(!empty($product_name)){
          $pro =$this->db->get_where('tbl_product',['id'=>$product_name])->row();
          if($pro){
             $data['company_name'] = $pro->company_name; 
             $data['product_type'] = $pro->product_type; 
             $data['product_name'] = $pro->product_name;
             $data['quantity'] =$pro->quantity;
             $data['base_price'] = $pro->base_price;
             $data['sgst'] =$pro->sgst;
             $data['cgst'] =$pro->cgst;
             $data['igst'] =$pro->igst;
             $data['price'] =$pro->price;
             $data['return_date'] = $return_date;
             $do=$this->db->insert('tbl_returnto_company',$data);
              if($do){
                $this->Adminuser->delete_Record('tbl_product',$product_name);
              }
            $result['status'] = 1;
            $result['message'] = 'Return Items to Company   successfully';
            echo json_encode($result);die;
             }else{
              $result['status'] = 0;
              $result['message'] = 'Select Product Name..!';
              echo json_encode($result);die;
             }
          }else{
            $result['status'] = 0;
            $result['message'] = 'Something Went to Wrong..!';
            echo json_encode($result);die;
          }
    }

    public function delete(){
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_returnto_company', $id);
    }
   
    public function getReturntocompanyList(){ 

        $column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price','created_at');
        $search_column = array('company_name', 'product_name');
        
        $query = " SELECT * FROM tbl_returnto_company";
        $query.= " WHERE id > 0 ";

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
            $sub_array[] = $product->company_name;
            $sub_array[] = $product->product_type;
            $sub_array[] = $product->product_name;
            // $sub_array[] = get_field_value('tbl_product', 'product_name',['id' => $product->product_name]);
            $sub_array[] = $product->quantity;
            $sub_array[] = $product->base_price;
            $sub_array[] = $product->sgst;
            $sub_array[] = $product->cgst;
            $sub_array[] = $product->igst;
            $sub_array[] = $product->price;
            $sub_array[] = date("d-M-Y", strtotime($product->created_at)) ;
            $sub_array[] = '
       <div>
       
    
        <a  id="' . $product->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.$product->id.'`);"> 
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
        $query = "SELECT * FROM  tbl_returnto_company";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_returnto_company', ['id'=>$id]);
        if($res){
		    $result['status']=1;
		    $result['message']="Details deleted Successfully";
		}else{
		    $result['status']=0;
		    $result['message']="Failed to delete, Please Try again Later";
		}
		echo json_encode($result);die;
    }
}
