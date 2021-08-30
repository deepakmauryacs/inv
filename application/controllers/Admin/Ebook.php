<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    

    public function all(){
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_ebooks');
        $this->load->view('dashboard/footer');
    }
    

    public function add(){
            
       
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $type = $this->input->post('type');
        
       
        $data['name'] = $name;
        $data['email'] = $email;
        $data['contact'] = $contact;
        $data['type'] = $type;
      
        // print_r($data);die();
       
        $this->db->insert('tbl_ebook', $data);
        $result['status'] = 1;
        $result['message'] = 'Thank you for buy ebook..';
        echo json_encode($result);
        die;
    }
   
    public function delete_ebook(){
        $id = $_POST["ebook_id"];
        $this->Adminuser->delete_Record('tbl_ebook', $id);
    }

 

    public function getEbookList(){
        $column = array('id', 'name', 'email', 'contact', 'type','created_at');
        $query = " SELECT * FROM tbl_ebook ";
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
       
        foreach ($result as $key => $ebook) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = $ebook->name;
            $sub_array[] = $ebook->email;
            $sub_array[] = $ebook->contact;
            $sub_array[] = $ebook->type;
            $sub_array[] = $ebook->created_at;
            $sub_array[] = '
       <div>
    

        <a  id="' . $ebook->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
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
        $query = "SELECT * FROM  tbl_ebook";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
