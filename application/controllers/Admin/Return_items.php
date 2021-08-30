<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_items extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    public function index($id ='') {
        if (!empty($id)) {
            $data['edit_items'] = $this->db->get_where('tbl_return_items', ['id' => $id])->row();
        }else{
            $data['edit_items'] = '';
        }
        $data['associate'] = $this->db->get_where('tbl_associate', ['id >' => 0])->result();
        $data['product'] = $this->db->get_where('tbl_product', ['id >' => 0])->result();
        $data['company'] = $this->db->get_where('tbl_company', ['id >' => 0])->result();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/return-items', $data);
        $this->load->view('dashboard/footer');
    }


   

    public function all() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_return_items');
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $company_name = $this->input->post('company_name');
        $asscociate_name = $this->input->post('asscociate_name');
        $product_name = $this->input->post('product_name');
        $product_type = $this->input->post('product_type');
        $quantity = $this->input->post('quantity');
        $return_date = $this->input->post('return_date');
        $available_quantity = $this->input->post('available_quantity');
        $qty=$available_quantity -  $quantity;

        if (empty($product_name)) {
            $result['status'] = 0;
            $result['message'] = 'product name is required';
            echo json_encode($result);
            die;
        }
        if (empty($product_type)) {
            $result['status'] = 0;
            $result['message'] = 'product type field is required';
            echo json_encode($result);
            die;
        }
        if (empty($quantity)) {
            $result['status'] = 0;
            $result['message'] = 'quantity  is required';
            echo json_encode($result);
            die;
        }


        if (empty($return_date)) {
            $result['status'] = 0;
            $result['message'] = 'return date  is required';
            echo json_encode($result);
            die;
        }


        if(!empty($quantity)){
          $pro =$this->db->get_where('tbl_product',['id'=>$product_name])->row();
          $qty = $pro->quantity + $quantity;
          if($pro->product_type != $product_type){
             $data['company_name'] = get_field_value('tbl_company', 'company_name', ['id' =>$company_name]); 
             $data['product_type'] = $product_type;
             $data['product_name'] = get_field_value('tbl_product', 'product_name', ['id' =>$product_name]); 
             $data['quantity'] =$quantity;
             $this->db->insert('tbl_product', $data);
          }else{
            $updatedata['quantity'] = $qty;
            $this->db->where('id',$product_name);
            $this->db->update('tbl_product', $updatedata);
          }
        }



        $data['company_name'] = $company_name;
        $data['asscociate_name'] = $asscociate_name;
        $data['product_name'] = $product_name;
        $data['product_type'] = $product_type; 
        $data['quantity'] =$quantity;
        $data['return_date'] = $return_date; 
        

        if (!empty($edit_id) ) {
            $this->db->update('tbl_return_items', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Return Items  update successfully';
        } else {
            $this->db->insert('tbl_return_items', $data);
            $result['status'] = 1;
            $result['message'] = 'Return Items  successfully';
          echo json_encode($result);
        die;
    }

   }

    /*public function delete() {
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_product', $id);
    }*/

   
    public function getReturnitemsList(){ 

        $column = array('id', 'asscociate_name', 'product_name', 'product_type', 'quantity' , 'return_date');
        $search_column = array('asscociate_name', 'product_name', 'product_type', 'quantity' , 'return_date');
        
        $query = " SELECT * FROM tbl_return_items";
        $query.= " WHERE id > 0 ";

        /*if(isset($_POST['search']['value']) && !empty($_POST['search']['value']))
        {
          foreach ($search_column as $key=> $value) {
            $query .= ($key==0?" AND ":" OR ");
            $query .= $value ." LIKE '%".$_POST['search']['value']."%' ";
          }
        }*/
        if (isset($_POST['search_by']) && !empty($_POST['search_by'])  && !empty($_POST['search_query'])  ) {
            $query.= $this->_getQueryResult($_POST['search_by'], $_POST['search_query']);
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
        //echo $query;die;
        foreach ($result as $key => $product) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = get_field_value('tbl_associate', 'asscociate_name', ['id' => $product->asscociate_name ]);
            $sub_array[] = get_field_value('tbl_product', 'product_name', ['id' => $product->product_name]);
            $sub_array[] = $product->product_type;
            $sub_array[] = $product->quantity; 
            $sub_array[] = $product->return_date;
            $sub_array[] = '
       <div>
       
        <a href="' . base_url() . 'Admin/Return_items/index/' . $product->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

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

    
    public function _getQueryResult($search_by, $search_query) {
        $query= " ";
        switch($search_by){
            case "associate_name":
                $sql = "SELECT id FROM tbl_associate WHERE asscociate_name LIKE '%".$search_query."%'";
                $row=$this->db->query($sql)->result();
                $dataarray=array();
                if(!empty($row)){
                    foreach($row as $key=>$value){
                        $dataarray[]=$value->id;
                    }
                    $query.= " AND ";
                    for($i=0; $i<count($dataarray); $i++){
                        if($i!=0)
                            $query.= " OR ";
                        $query .= " asscociate_name = '".$dataarray[$i]."'";
                    }
                }
                break;
        
            case "product_name":
                $sql = "SELECT id FROM tbl_product WHERE product_name LIKE '%".$search_query."%'";
                $row=$this->db->query($sql)->result();
                $dataarray=array();
                if(!empty($row)){
                    foreach($row as $key=>$value){
                        $dataarray[]=$value->id;
                    }
                    $query.= " AND ";
                    for($i=0; $i<count($dataarray); $i++){
                        if($i!=0)
                            $query.= " OR ";
                        $query .= " product_name = '".$dataarray[$i]."'";
                    }
                }
                break;
        }
        
        return $query;
        
    }
    
    public function count_all_data() {
        $query = "SELECT * FROM  tbl_return_items";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_return_items', ['id'=>$id]);
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
