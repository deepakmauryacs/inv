<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    

    public function all(){
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_subscribe');
        $this->load->view('dashboard/footer');
     }

    public function add(){
      
        $email = $this->input->post('email');
        $data['email'] = $email;

        $this->db->insert('tbl_subscribe', $data);
        $result['status'] = 1;
        $result['message'] = 'Thank Your New Subscriber';
        echo json_encode($result);
        die;
    }
   
    public function delete_contact(){
        $id = $_POST["service_id"];
        $this->Adminuser->delete_Record('tbl_subscribe', $id);
    }

    public function getSubscribeList(){
        $column = array('id','email', 'created_at');
        $query = " SELECT * FROM tbl_subscribe ";
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
           
            $sub_array[] = $contact->email;
            $sub_array[] = $contact->created_at;
        
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
        $query = "SELECT * FROM  tbl_subscribe";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
