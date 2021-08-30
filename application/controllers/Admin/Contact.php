<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    

    public function all(){
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_contact');
        $this->load->view('dashboard/footer');
     }

    public function add(){
      
       
        $name = $this->input->post('name');
        $city = $this->input->post('city');
        $contact = $this->input->post('contact');
        $message = $this->input->post('message');
       
        $data['name'] = $name;
        $data['city'] = $city;
        $data['contact'] = $contact;
        $data['message'] = $message;
        // print_r($data);die();
       
        $this->db->insert('tbl_contact', $data);
        $result['status'] = 1;
        $result['message'] = 'Thank you for getting in touch!';
        echo json_encode($result);
        die;
    }
   
    public function delete_contact(){
        $id = $_POST["service_id"];
        $this->Adminuser->delete_Record('tbl_services', $id);
    }

    public function getContactList(){
        $column = array('id', 'name', 'city', 'contact', 'message');
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
            $sub_array[] = $contact->city;
            $sub_array[] = $contact->contact;
            $sub_array[] = $contact->message;
            $sub_array[] = '
       <div>

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
