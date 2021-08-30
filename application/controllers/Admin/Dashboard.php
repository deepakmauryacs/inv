<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }

    public function index() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/footer');
    }

    public function profile() {
        $data['data'] = $this->db->get_where('tbl_admin', ['id >' => 0])->row();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/profile', $data);
        $this->load->view('dashboard/footer');
    }

    public function update_profile() {
        $id = $this->input->post('id');
        $image1 = $this->input->post('oldImage1');
        if ($_FILES['image1']['name']) {
            if (file_exists("uploads" . $image1)) {
                unlink("uploads" . $image1);
            }
            $config = array('upload_path' => 'uploads', 'allowed_types' => 'jpg|jpeg|gif|png',);
            $this->load->library('upload', $config);
            $this->upload->do_upload('image1');
            $img = $this->upload->data();
            $image1 = $img['file_name'];
        }
        $updateArray['image1'] = $image1;
        $updateArray['username'] = $this->input->post('username');
        $updateArray['email'] = $this->input->post('email');
        $updateArray['contact'] = $this->input->post('contact');
        $updateArray['address'] = $this->input->post('address');
        $this->Adminuser->update_global_Record('tbl_admin', $id, $updateArray);
        $this->session->set_flashdata('update', 'Your details has been updated');
        redirect(base_url() . 'Admin/Dashboard/profile');
    }

    public function password() {
        $data['data'] = $this->db->get_where('tbl_admin', ['id >' => 0])->row();
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/password', $data);
        $this->load->view('dashboard/footer');
    }
    
    public function update_password() {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $con_password = $this->input->post('con_password');
        $check = 1;
        if (empty($password)) {
            $check = 0;
            $this->session->set_flashdata('error', 'Please enter current password');
        }
        if (empty($new_password) && $check) {
            $check = 0;
            $this->session->set_flashdata('error', 'Please enter new password');
        }
        if (empty($con_password) && $check) {
            $check = 0;
            $this->session->set_flashdata('error', 'Please enter confirm password');
        }
        $row = $this->db->get_where('tbl_admin', ['id' => $id, 'password' => md5($password) ])->row();
        //echo $this->db->last_query();die;
        if (empty($row) && $check) {
            $check = 0;
            $this->session->set_flashdata('error', 'Please enter correct password');
        }
        if ($new_password != $con_password && $check) {
            $check = 0;
            $this->session->set_flashdata('error', 'New password and confirm password not match!');
        }
        //print_r($_POST);die;
        if ($check) {
            $updateArray = array('password' => md5($new_password));
            $this->Adminuser->update_global_Record('tbl_admin', $id, $updateArray);
            $this->session->set_flashdata('update', 'Your Psassword has been updated');
        }
        redirect(base_url() . 'Admin/Dashboard/password');
    }
    
    public function delete_pass_conf()
	{
		$pass=$this->input->post('password');
		if(empty($pass)){
			$result['status']=0;
			$result['message']="Some thing went wrong, Please Refresh the Page.";
			echo json_encode($result);die;
		}
		if($pass === PASS_CONF){
		    $result['status']=1;
		    $result['message']="Password Matched Successful, Click Ok Button to delete Details";
		}else{
		    $result['status']=0;
		    $result['message']="Password not Match, Please Try again Later";
		}
		echo json_encode($result);die;
	}
}
?>