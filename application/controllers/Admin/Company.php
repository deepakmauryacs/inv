<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    public function index($id = '') {
        if (!empty($id)) {
            $data['edit_company'] = $this->db->get_where('tbl_company', ['id' => $id])->row();
        }else{
            $data['edit_company'] = '';
        }
     
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/company', $data);
        $this->load->view('dashboard/footer');
    }

    public function all() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_company');
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');

        // print_r($edit_id);die();
        $company_name = $this->input->post('company_name');
        $conatact = $this->input->post('conatact');
        $email = $this->input->post('email');
        $service_type = $this->input->post('service_type');
        if (empty($company_name)) {
            $result['status'] = 0;
            $result['message'] = 'company name is required';
            echo json_encode($result);
            die;
        }
        if (empty($conatact)) {
            $result['status'] = 0;
            $result['message'] = 'contact number is required';
            echo json_encode($result);
            die;
        }
        if (empty($email)) {
            $result['status'] = 0;
            $result['message'] = 'email id is required';
            echo json_encode($result);
            die;
        }
        if (empty($service_type)) {
            $result['status'] = 0;
            $result['message'] = 'service type is required';
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
        $data['conatact'] = $conatact;
        $data['email'] = $email;
        $data['service_type'] = $service_type;
        // print_r($data);die();
        if (!empty($edit_id)) {
            $this->db->update('tbl_company', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Company update successfully';
        } else {
            $this->db->insert('tbl_company', $data);
            $result['status'] = 1;
            $result['message'] = 'Company add successfully';
        }
        echo json_encode($result);
        die;
    }

    public function edit($id) {
        $sql = "SELECT * FROM `tbl_product` WHERE `id`= $id ";
        $data['product'] = $this->db->query($sql)->row();
        $data['category'] = $this->Adminuser->select_Record('tbl_cateogery');
        $data['brand'] = $this->Adminuser->select_Record('tbl_brand');
        $data['unit'] = $this->Adminuser->select_Record('tbl_unit');
        $this->load->view('dash/header');
        $this->load->view('dash/edit_product', $data);
        $this->load->view('dash/footer');
    }

   
    public function delete_service() {
        $id = $_POST["service_id"];
        $this->Adminuser->delete_Record('tbl_services', $id);
    }

    public function showDetails() {
        $id = $this->input->post('id');
        $data = $this->db->get_where('tbl_services', ['id' => $id])->row();
        //print_r($data);
        $html = ' <div class="table-responsive">
            <table class="table table-bordered mb-0">';
        $html.= '<tr><th>Image:</th><td><img src="' . base_url() . 'uploads/services/' . $data->image . '" style="width: 50px;height: 50px;"></td></tr>';
        $html.= '<tr><th>Title:</th><td>' . $data->title . '</td></tr>';
        $html.= '<tr><th>Category:</th><td>' . get_field_value('tbl_service_category', 'category', ['slug' => $data->category]) . '</td></tr>';
        $html.= '<tr><th>Description:</th><td>' . $data->description . '</td></tr>';
        $html.= '<tr><th>Slug : </th><td>' . $data->slug . '</td></tr>';
        $html.= '</table>
            </div>';
        echo $html;
    }

    public function getCompanyList() {
        //print_r($_POST);die;
        $column = array('company_name');
        $query = " SELECT * FROM tbl_company ";
        $query.= " WHERE id > 0 ";
        if(isset($_POST['search']['value'])&&!empty($_POST['search']['value']))
        {
          foreach ($column as $key=> $value) {
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
       
        foreach ($result as $key => $company) {
            $sub_array = array();
            $sub_array[] = ++$key;
            // $sub_array[] = '<img src="' . base_url() . 'uploads/services/' . $services->image . '" style="width: 50px;height: 50px;">';
            // $sub_array[] = get_field_value('tbl_cateogery','category',['id'=>$services->category]);
            // $sub_array[] = get_field_value('tbl_service_category', 'category', ['slug' => $services->category]);
            $sub_array[] = $company->company_name;
            $sub_array[] = $company->conatact;
            $sub_array[] = $company->email;
            $sub_array[] = $company->service_type;
            $sub_array[] = '
       <div>
       
        <a href="' . base_url() . 'Admin/Company/index/' . $company->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $company->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.$company->id.'`);"> 
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
        $query = "SELECT * FROM  tbl_company";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    
    public function delete_item() {
        $id = $_POST["delete_id"];
        $res = $this->db->delete('tbl_company', ['id'=>$id]);
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
