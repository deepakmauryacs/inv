<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    public function index($id = '') {
        if (!empty($id)) {
            $data['edit_product'] = $this->db->get_where('tbl_product', ['id' => $id])->row();
        }else{
            $data['edit_product'] = '';
        }
        $data['company'] = $this->db->get_where('tbl_company', ['id >' => 0])->result();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/product', $data);
        $this->load->view('dashboard/footer');
    }

    public function all() {
        $data['company'] = $this->db->get_where('tbl_company', ['id >' => 0])->result();
        //print_r($data);die;
        if(isset($_POST['search_product'])){
            $sql = "SELECT id FROM tbl_product WHERE product_name LIKE '%".$_POST['search_product']."%'";
            $row=$this->db->query($sql)->result();
            if(!empty($row)){
                $dataarray=array();
                foreach($row as $key=>$value){
                    $dataarray[]=$value->id;
                }
            }
            $data['search_products_id'] = json_encode($dataarray);
        }
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_product', $data);
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
       
        $data_array=array();
        if (empty($edit_id)) {
            $subarray=array();
            for($i=0; $i<count($product_type); $i++){
                if (empty($product_type[$i])) {
                $result['status'] = 0;
                $result['message'] = 'product type field is required';
                echo json_encode($result);
                die;
                }
                if (empty($product_name[$i])) {
                    $result['status'] = 0;
                    $result['message'] = 'product name is required';
                    echo json_encode($result);
                    die;
                }
                if (empty($quantity[$i])) {
                    $result['status'] = 0;
                    $result['message'] = 'quantity  is required';
                    echo json_encode($result);
                    die;
                }
        
                if (empty($base_price[$i])) {
                    $result['status'] = 0;
                    $result['message'] = 'base price  is required';
                    echo json_encode($result);
                    die;
                }
                $c = $s = $ig = 0;
                if(!empty($sgst) && !empty($sgst[$i]))
                    $s = ($base_price[$i]*$sgst[$i])/100;
                if(!empty($cgst) && !empty($cgst[$i]))
                    $c = ($base_price[$i]*$cgst[$i])/100;
                if(!empty($igst) && !empty($igst[$i]))
                    $ig = ($base_price[$i]*$igst[$i])/100;
                $subarray=array(
                    'company_name'=>$company_name, 
                    'product_type'=>$product_type[$i],
                    'product_name'=>$product_name[$i],
                    'quantity'=>$quantity[$i],
                    'base_price'=>$base_price[$i],
                    'sgst'=>$sgst[$i],
                    'cgst'=>$cgst[$i],
                    'igst'=>$igst[$i],
                    'price'=>$base_price[$i]+intval($s)+intval($c)+intval($ig),
                );
                $data_array[]=$subarray;
            }
        }else{
            $data['company_name'] = $company_name; 
            $data['product_type'] = $product_type; 
            $data['product_name'] = $product_name;
            $data['quantity'] =$quantity;
            $data['base_price'] = $base_price;
            $data['sgst'] =$sgst;
            $data['cgst'] =$cgst;
            $data['igst'] =$igst;
            $c = $s = $ig = 0;
            if(!empty($sgst))
                $s = ($base_price*$sgst)/100;
            if(!empty($cgst))
                $c = ($base_price*$cgst)/100;
            if(!empty($igst))
                $ig = ($base_price*$igst)/100;
            $data['price'] =$base_price+intval($s)+intval($c)+intval($ig);
        }
        
        if (!empty($edit_id)) {
            $this->db->update('tbl_product', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Product update successfully';
        } else {
            $this->db->insert_batch('tbl_product', $data_array);
            $result['status'] = 1;
            $result['message'] = 'Product add successfully';
        }
        echo json_encode($result);
        die;
    }

   
    /*public function delete() {
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_product', $id);
    }*/

   
    public function getProductList(){
        //print_r($_POST['company']);die;
        $column = array('id', 'company_name', 'product_type', 'product_name', 'quantity' , 'base_price','sgst','cgst','igst','price');
        $search_column = array('product_name');

        $query = " SELECT * FROM tbl_product ";
        
        if(isset($_POST['search_id']))
        {
            $query.= " WHERE ";
            for($i=0; $i<count($_POST['search_id']); $i++){
                if($i!=0)
                    $query.= " OR ";
                $query .= " id = ".$_POST['search_id'][$i];
            }
        }else{
            $query.= " WHERE id > 0 ";
        }
        
        
        if(isset($_POST['company']) && !empty($_POST['company']))
        {
            $query.= " AND company_name = '".$_POST['company']."'";
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
        //echo $query;die;
        $result = $this->db->query($query)->result();
        $data = array();
       
        foreach ($result as $key => $product) {
            $sub_array = array();
            $sub_array[] = ++$key;
            // $sub_array[] = '<img src="' . base_url() . 'uploads/services/' . $services->image . '" style="width: 50px;height: 50px;">';
            // $sub_array[] = get_field_value('tbl_cateogery','category',['id'=>$services->category]);
            // $sub_array[] = get_field_value('tbl_service_category', 'category', ['slug' => $services->category]);
            $sub_array[] = $product->company_name;
            $sub_array[] = $product->product_type;
            $sub_array[] = $product->product_name;
            $sub_array[] = $product->quantity;
            $sub_array[] = $product->base_price;
            $sub_array[] = $product->sgst;
            $sub_array[] = $product->cgst;
            $sub_array[] = $product->igst;
            $sub_array[] = $product->price;
            $sub_array[] = '
       <div>
       
        <a href="' . base_url() . 'Admin/Product/index/' . $product->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

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
        $query = "SELECT * FROM  tbl_product";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_product', ['id'=>$id]);
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
