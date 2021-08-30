<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    

    public function all(){
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_registrations');
        $this->load->view('dashboard/footer');
    }
    

    public function add(){
      
       
        $last_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $con_password = $this->input->post('con_password');
        $contact = $this->input->post('contact');
        $address = $this->input->post('address');
       
        $data['name'] = $first_name;
        $data['email'] = $last_name;
        $data['password'] = $password;
        $data['contact'] = $contact;
        $data['address'] = $address;
        // print_r($data);die();
       
        $this->db->insert('tbl_contact', $data);
        $result['status'] = 1;
        $result['message'] = 'Tha add successfully';
        echo json_encode($result);
        die;
    }
   
    public function delete_contact(){
        $id = $_POST["service_id"];
        $this->Adminuser->delete_Record('tbl_services', $id);
    }

    public function showDetails(){
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

    public function getContactList(){
        $column = array('id', 'name', 'email', 'contact', 'message');
        $query = " SELECT * FROM tbl_contact ";
        $query.= " WHERE id > 0 ";
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
        foreach ($result as $key => $contact) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = $contact->name;
            $sub_array[] = $contact->email;
            $sub_array[] = $contact->contact;
            $sub_array[] = '
       <div>
        <a  onclick="showDetails(`' . $contact->id . '`);"   class="btn btn-xs btn-primary" style="color: white;border-radius: 0px;" ><i class="fas fa-eye"></i></a>
        <a href="' . base_url() . 'Admin/Service/index/' . $contact->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $contact->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
          <i class="fas fa-trash-alt"></i> </a>
        </div>';
            $data[] = $sub_array;
        }
        //   print_r($data);
        $draw = !empty($_POST["draw"]) ? $_POST["draw"] : 1;
        $output = array("draw" => intval($draw), "recordsTotal" => $this->count_all_data(), "recordsFiltered" => $number_filter_row, "data" => $data);
        echo json_encode($output);
    }
    
    public function count_all_data(){
        $query = "SELECT * FROM  tbl_contact";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
