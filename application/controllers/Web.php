<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Adminuser');
        $this->load->model('product_filter_model');
        $this->load->model('Blog_model');
        $this->load->model('Article_model');
        $this->load->model('Images_model');
        $this->load->library('pagination');
        $this->load->library("cart");
        $this->load->helper('text');
    }

    public function index() {

        $data['services']=$this->db->get_where('tbl_services',['id >'=>0])->result();
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
    }

    public function about() {
        
        $this->load->view('header');
        $this->load->view('about');
        $this->load->view('footer');
    }

    public function Achievements() {
        
        $this->load->view('header');
        $this->load->view('achievements');
        $this->load->view('footer');
    }

    public function ebooks() {
        
        $this->load->view('header');
        $this->load->view('ebooks');
        $this->load->view('footer');
    }

    // public function blog() {
        
    //     $this->load->view('header');
    //     $this->load->view('blog');
    //     $this->load->view('footer');
    // }

    

    public function blog($offset=null)
    {
        $search = array(
            'keyword' => trim($this->input->post('search_key')),
        );
        
        $this->load->library('pagination');
        
        $limit = 12;
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $config['base_url'] = site_url('Web/blog');
        $config['total_rows'] = $this->Blog_model->get_blog($limit, $offset, $search, $count=true);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a href="" class="current_page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);

        $data['blog'] = $this->Blog_model->get_blog($limit, $offset, $search, $count=false);
    
        $data['pagelinks'] = $this->pagination->create_links();
        $this->load->view('header');
        $this->load->view('blog', $data);
        $this->load->view('footer');
    }

    public function article($offset=null)
    {
        
        $search = array(
            'keyword' => trim($this->input->post('search_key')),
        );
        
        $this->load->library('pagination');
        
        $limit = 12;
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $config['base_url'] = site_url('Web/article');
        $config['total_rows'] = $this->Article_model->get_articles($limit, $offset, $search, $count=true);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a href="" class="current_page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['article'] = $this->Article_model->get_articles($limit, $offset, $search, $count=false);
        $data['pagelinks'] = $this->pagination->create_links();
        $this->load->view('header');
        $this->load->view('article', $data);
        $this->load->view('footer');
    }
    
    public function images($offset=null)
    {
        
        $search = array(
            'keyword' => trim($this->input->post('search_key')),
        );
        
        $this->load->library('pagination');
        
        $limit = 12;
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $config['base_url'] = site_url('Web/images');
        $config['total_rows'] = $this->Images_model->get_images($limit, $offset, $search, $count=true);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a href="" class="current_page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['images'] = $this->Images_model->get_images($limit, $offset, $search, $count=false);
        $data['pagelinks'] = $this->pagination->create_links();
        $this->load->view('header');
        $this->load->view('images', $data);
        $this->load->view('footer');
    }









    

 
    public function blog_details($slug) {

        $data['blog']=$this->db->get_where('tbl_blog',['slug'=>$slug])->row();
        $this->load->view('header');
        $this->load->view('blog_details',$data);
        $this->load->view('footer');
    }

    public function service_details($slug) {

        $data['service']=$this->db->get_where('tbl_services',['slug'=>$slug])->row();
        
        if(isset($data['service'])){
         $this->load->view('header');
         $this->load->view('service_details',$data);
         $this->load->view('footer');
         }else{
         $this->load->view('header');
         $this->load->view('not_found');
         $this->load->view('footer');
         }
    }



    public function P2p_investment() {
        
        $this->load->view('header');
        $this->load->view('p2p-investment');
        $this->load->view('footer');
    }

    public function credit_score() {
        
        $this->load->view('header');
        $this->load->view('credit-score');
        $this->load->view('footer');
    }

    public function contact() {
       
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function privacy_policy() {
        $data['h'] = $this->Adminuser->select_Record('tbl_privacy_policy');
        $this->load->view('header');
        $this->load->view('privacy-policy', $data);
        $this->load->view('footer');
    }
    public function terms_and_conditions() {
        $data['h'] = $this->Adminuser->select_Record('tbl_terms_and_conditions');
        $this->load->view('header');
        $this->load->view('terms_and_conditions', $data);
        $this->load->view('footer');
    }
  
    public function gallery() {
        $this->load->view('header');
        $this->load->view('gallery');
        $this->load->view('footer');
    }

    public function registration() {
        $this->load->view('header');
        $this->load->view('registration');
        $this->load->view('footer');
    }

    public function login() {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }
}
?>