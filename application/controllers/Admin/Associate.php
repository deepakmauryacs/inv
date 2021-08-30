<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Associate extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }

    public function index($id = '') {
        if (!empty($id)) {
            $data['edit_associate'] = $this->db->get_where('tbl_associate', ['id' => $id])->row();
        }else{
            $data['edit_associate'] = '';
        }

       // print_r($data);die();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/associate', $data);
        $this->load->view('dashboard/footer');
    }

    public function all() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_associate');
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $asscociate_name = $this->input->post('asscociate_name');
        $asscociate_number = $this->input->post('asscociate_number');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        if (empty($asscociate_name)) {
            $result['status'] = 0;
            $result['message'] = 'asscociate name field required';
            echo json_encode($result);
            die;
        }
        if (empty($asscociate_number)) {
            $result['status'] = 0;
            $result['message'] = 'asscociate number field required';
            echo json_encode($title);
            die;
        }
        if (empty($email)) {
            $result['status'] = 0;
            $result['message'] = 'email field  required';
            echo json_encode($description);
            die;
        }
        if (empty($address)) {
            $result['status'] = 0;
            $result['message'] = 'address field required';
            echo json_encode($result);
            die;
        }

        $data['asscociate_name'] =  $asscociate_name;
        $data['asscociate_number'] = $asscociate_number;
        $data['email'] =$email;
        $data['address'] = $address;
      

        // print_r($data);die();
        if (!empty($edit_id)) {
            $this->db->update('tbl_associate', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Associate update successfully';
        } else {
            $this->db->insert('tbl_associate', $data);
            $result['status'] = 1;
            $result['message'] = 'Associate add successfully';
        }
        echo json_encode($result);
        die;
    }

   

    public function delete_asssociate() {
        $id = $_POST["id"];
        $this->Adminuser->delete_Record('tbl_associate', $id);
    }
    
  
    public function getAsssociateList() {
        
        $column = array('id', 'asscociate_name', 'asscociate_number', 'email', 'address');
        $search_column=array('asscociate_name', 'asscociate_number', 'email', 'address');
        $query = " SELECT * FROM tbl_associate ";
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
        $status = array('1' => 'Active', '2' => 'Inactive');
        foreach ($result as $key => $asscociate) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = $asscociate->asscociate_name;
            $sub_array[] = $asscociate->asscociate_number;
            $sub_array[] = $asscociate->email;
            $sub_array[] = $asscociate->address;
            $sub_array[] = '
       <div>
        
        <a href="' . base_url() . 'Admin/Associate/index/' . $asscociate->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $asscociate->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.$asscociate->id.'`);"> 
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
        $query = "SELECT * FROM  tbl_associate";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_associate', ['id'=>$id]);
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
