<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Service_category extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }
    
    public function index($id = '') {
        if (!empty($id)) {
            $data['edit_category'] = $this->db->get_where('tbl_service_category', ['id' => $id])->row();
        }
        $data['service_category'] = $this->Adminuser->select_Record('tbl_service_category');
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/service_category', $data);
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $category = $this->input->post('category');
        $slug = $this->input->post('slug');
        if (empty($category)) {
            $result['status'] = 0;
            $result['message'] = 'category name required';
            echo json_encode($result);
            die;
        }
        if (empty($edit_id)) {
            $categoryname = $this->db->get_where('tbl_service_category', ['id >' => 0])->result();
            foreach ($categoryname as $row) {
                if (!empty($row) AND trim($row->category) == trim($category)) {
                    $result['status'] = 0;
                    $result['message'] = 'category name should be Uniqe';
                    echo json_encode($result);
                    die;
                }
            }
        }
        if (empty($slug)) {
            $result['status'] = 0;
            $result['message'] = 'slug name required';
            echo json_encode($result);
            die;
        }
        if (empty($edit_id)) {
            $slugname = $this->db->get_where('tbl_service_category', ['id >' => 0])->result();
            foreach ($slugname as $row) {
                if (!empty($slugname) AND trim($row->slug) == trim($slug)) {
                    $result['status'] = 0;
                    $result['message'] = 'slug name should be Uniqe';
                    echo json_encode($result);
                    die;
                }
            }
        }
        $data['category'] = $category;
        $data['slug'] = $slug;
        // print_r($data);die();
        if (!empty($edit_id)) {
            $this->db->update('tbl_service_category', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Category update successful';
        } else {
            $this->db->insert('tbl_service_category', $data);
            $result['status'] = 1;
            $result['message'] = 'Category add successful';
        }
        echo json_encode($result);
        die;
    }

    public function delete_category($id) {
        $this->Adminuser->delete_Record('tbl_service_category', $id);
        // $a=$this->db->last_query();
        // print_r($a);die();
        $this->session->set_flashdata('info', 'Your details has been deleted');
        redirect(base_url() . 'Admin/Service_category');
    }
}
?>