<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_items extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    public function index($id ='') {
        if (!empty($id)) {
            $data['edit_items'] = $this->db->get_where('tbl_issue_items', ['id' => $id])->row();
        }else{
            $data['edit_items'] = '';
        }
        $data['associate'] = $this->db->get_where('tbl_associate', ['id >' => 0])->result();
        $data['product'] = $this->db->get_where('tbl_product', ['id >' => 0])->result();
        $data['company'] = $this->db->get_where('tbl_company', ['id >' => 0])->result();
       

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/issue-items', $data);
        $this->load->view('dashboard/footer');
    }


     // get_productqty
    public function get_productqty(){
        $id = $this->input->post('product_id');
        $issue_qty = $this->input->post('issue_qty');
        //$html = '<option value="">Select category</option>';
        $qty = $this->db->get_where('tbl_product', ['id' => $id])->result();
        if (!empty($qty)) {
            foreach ($qty as $key => $value) {

                $qty =$value->quantity + $issue_qty;
                $html.= '<option  value="' . $qty . '" selected="selected">' .  $qty . '</option>';
            }
        }
        echo $html;
        die;
    }

     // get_product
     public function get_product(){
        $product_type = $this->input->post('product_type');
        $html = '<option value="" selected="selected"> Select Product </option>';
        $type = $this->db->get_where('tbl_product', ['product_type' => $product_type])->result();
        if (!empty($type)) {
            foreach ($type as $key => $value) {
    
                $html.= '<option  value="' . $value->id . '" >' .  $value->product_name . '</option>';
            }
        }
        echo $html;
        die;
    }



    public function all() {
        $data['associates'] = $this->db->get_where('tbl_associate')->result_array();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_issue_items', $data);
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $asscociate_name = $this->input->post('asscociate_name');
        $product_name = $this->input->post('product_name');
        $product_type = $this->input->post('product_type');
        $quantity = $this->input->post('quantity');
        $issue_date = $this->input->post('issue_date');
        $available_quantity = $this->input->post('available_quantity');
        $qty=$available_quantity -  $quantity;
       
        if (empty($product_name)) {
            $result['status'] = 0;
            $result['message'] = 'Product Name is Required';
            echo json_encode($result);
            die;
        }

        if($available_quantity <  $quantity){
            $result['status'] = 0;
            $result['message'] = 'Quantity  Should be Less then Available Quantity';
            echo json_encode($result);
            die;  
        }

        if (empty($product_type)) {
            $result['status'] = 0;
            $result['message'] = 'Product Type Field is Required';
            echo json_encode($result);
            die;
        }
        if (empty($quantity)) {
            $result['status'] = 0;
            $result['message'] = 'Quantity  is Required';
            echo json_encode($result);
            die;
        }

        if(!empty($quantity)){
          $updatedata['quantity'] = $qty;
          $this->db->where('id',$product_name);
          $this->db->update('tbl_product', $updatedata);
        }

        if (empty($issue_date)) {
            $result['status'] = 0;
            $result['message'] = 'issue date  is required';
            echo json_encode($result);
            die;
        }

        $data['asscociate_name'] = $asscociate_name;
        $data['product_name'] = $product_name;
        $data['product_type'] = $product_type; 
        $data['quantity'] =$quantity;
        $data['issue_date'] = $issue_date; 
        
        if (!empty($edit_id) ) {
            $this->db->update('tbl_issue_items', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Items Issue update successfully';
        } else {
            $is_available = $this->db->get_where("tbl_issue_items", ['issue_date'=>$issue_date, 'asscociate_name'=>$asscociate_name, 'product_name'=>$product_name, 'product_type'=>$product_type])->row();
            if($is_available){
                $this->db->update('tbl_issue_items', ['quantity'=>$is_available->quantity+$quantity], ['id' => $is_available->id]);
            }else{
                $this->db->insert('tbl_issue_items', $data);
            }
            $result['status'] = 1;
            $result['message'] = 'Items Issue successfully';
        }
        echo json_encode($result);
        die;
    }

   
    /*public function delete() {
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_product', $id);
    }*/

   
    public function getIssueitemsList(){ 

        $column = array('id', 'asscociate_name', 'product_name', 'product_type', 'quantity' , 'issue_date');
        $search_column = array('asscociate_name', 'product_name', 'product_type', 'quantity' , 'issue_date');
        
        $query = " SELECT * FROM tbl_issue_items ";
        $query.= " WHERE id > 0 ";

        if(isset($_POST['search']['value'])&&!empty($_POST['search']['value']))
        {
          foreach ($search_column as $key=> $value) {
            $query .= ($key==0?" AND ":" OR ");
            $query .= $value ." LIKE '%".$_POST['search']['value']."%' ";
          }
        }
        
        if(isset($_POST['associate']) && $_POST['associate']>0)
        {
            $query.= " AND asscociate_name = ".$_POST['associate'];
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
            $sub_array[] = get_field_value('tbl_associate', 'asscociate_name', ['id' => $product->asscociate_name ]);
            $sub_array[] = get_field_value('tbl_product', 'product_name', ['id' => $product->product_name]);
            $sub_array[] = $product->product_type;
            $sub_array[] = $product->quantity; 
            $sub_array[] = $product->issue_date;
            $sub_array[] = '
       <div>
       
        <a href="' . base_url() . 'Admin/Issue_items/index/' . $product->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

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
        $query = "SELECT * FROM  tbl_issue_items";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    public function print_issue_item($associate_id) {
        $data['associates'] = $this->db->get_where('tbl_associate', ['id'=>$associate_id])->row_array();
        $data['issue_item'] = $this->db->get_where('tbl_issue_items', ['asscociate_name'=>$associate_id])->result_array();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/issue_items_print', $data);
        $this->load->view('dashboard/footer');
    }
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_issue_items', ['id'=>$id]);
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

