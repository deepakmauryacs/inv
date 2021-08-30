<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
    }

    public function index($id = '') {
        if (!empty($id)) {
            $data['edit_articles'] = $this->db->get_where('tbl_articles', ['id' => $id])->row();
        } else {
            $data['edit_articles'] = '';
        }
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/articles', $data);
        $this->load->view('dashboard/footer');
    }

    public function all() {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/all_articles');
        $this->load->view('dashboard/footer');
    }

    public function add() {
        $edit_id = $this->input->post('edit_id');
        $old_image = $this->input->post('old_image');
        $image = $_FILES['image'];
        if (!empty($image['name'])) {
            $row = $this->doUpload('image', 'articles');
            if ($row['status']) {
                $data['image'] = $row['file_name'];
                $this->removeFile($old_image, 'articles');
            } else {
                $result['status'] = 0;
                $result['message'] = $row['file_name'];
                echo json_encode($result);
                die;
            }
        }
        if (!empty($edit_id)) {
            $this->db->update('tbl_articles', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Blog update successfully';
        } else {
            $this->db->insert('tbl_articles', $data);
            $result['status'] = 1;
            $result['message'] = 'Blog add successfully';
        }
        echo json_encode($result);
        die;
    }
   
    public function delete_articles() {
        $id = $_POST["articles_id"];
        $this->Adminuser->delete_Record('tbl_articles', $id);
    }
    public function getArticlesList() {
        $column = array('id', 'image', 'category', 'title', 'description');
        $query = " SELECT * FROM tbl_articles ";
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
        foreach ($result as $key => $articles) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = '<img src="' . base_url() . 'uploads/articles/' . $articles->image . '" style="width: 100px;height: 100px;">';
            $sub_array[] = '
       <div>
        <a  href="' . base_url() . 'uploads/articles/' . $articles->image . '" class="btn btn-xs btn-primary" style="color: white;border-radius: 0px;"  target="_blank"><i class="fas fa-eye"></i></a>
        <a href="' . base_url() . 'Admin/Articles/index/' . $articles->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $articles->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
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
        $query = "SELECT * FROM  tbl_articles";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
}
