<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index() {
        $this->load->view('dashboard/login');
    }
    public function adminlogin() {
        $data['contact'] = $this->input->post('contact');
        $data['password'] = md5($this->input->post('password'));
        $result = $this->db->get_where('tbl_admin', $data)->row_array();
        // print_r($result);die();
        if (!empty($result)) {
            $this->session->set_userdata('AdminData', $result);
            $this->session->set_flashdata('success', "Admin Login Successfully...");
            redirect(base_url() . 'Admin/Dashboard');
        } else {
            $this->session->set_flashdata('error', "Contact Number or Password is not Correct. Try Again....");
            redirect(base_url() . 'Login');
        }
    }
    public function logout() {
        $this->session->unset_userdata('AdminData');
        $this->session->set_flashdata('success', "Logout Successfully.");
        redirect(base_url() . 'Login');
    }
}
?>