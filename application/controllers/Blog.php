<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
    }

    // Blog listing page
    public function index()
    {
        $data['categories'] = $this->db
            ->where('id !=', 0)
            ->order_by('title', 'ASC')
            ->get('blog_category')
            ->result();

        $data['blogs'] = $this->db
            ->select('blogs.*, blog_category.title as category_title')
            ->from('blogs')
            ->join('blog_category', 'blog_category.id = blogs.category_id', 'left')
            ->where('blogs.isActive', 1)
            ->order_by('blogs.id', 'DESC')
            ->get()
            ->result();

        $this->load->view('header');
        $this->load->view('blog_view', $data);
        $this->load->view('footer');
    }


    // Category-wise blogs
    public function category($category_id, $title = '')
    {
        $data['categories'] = $this->db->get('blog_category')->result();

        $data['blogs'] = $this->db
            ->select('blogs.*, blog_category.title as category_title')
            ->from('blogs')
            ->join('blog_category', 'blog_category.id = blogs.category_id', 'left')
            ->where('blogs.category_id', $category_id)
            ->where('blogs.isActive', 1)
            ->get()
            ->result();

        $this->load->view('header');
        $this->load->view('blog_view', $data);
        $this->load->view('footer');
    }

    public function fetchBlogs()
{
    $categoryId = $this->input->post('category_id');

    $this->db->from('blogs');
    $this->db->where('isActive', 1);

    if ($categoryId !== 'all') {
        $this->db->where('category_id', $categoryId);
    }

    $blogs = $this->db->order_by('id', 'DESC')->get()->result();

    if (!empty($blogs)) {

        foreach ($blogs as $blog) {
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card product-card">
                    <img src="'.base_url($blog->file_path).'" class="product-image">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold">'.htmlspecialchars($blog->title).'</h5>
                        <p class="card-text">'.strip_tags($blog->description).'</p>
                        <a href="'.base_url('blog/detail/'.$blog->id).'" class="btn btn-primary-custom">
                            Read More <i class="fas fa-book-open ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>';
        }

    } else {

        echo '
        <div class="col-12">
            <div class="no-blog-box">
                <i class="fas fa-folder-open"></i>
                <h4>No blogs in this category</h4>
                <p>Please check another category.</p>
            </div>
        </div>';
    }
}

    public function detail($id)
    {
        $data['blogs'] = $this->db
            ->select('blogs.*, blog_category.title as category_title')
            ->from('blogs')
            ->join('blog_category', 'blog_category.id = blogs.category_id', 'left')
            ->where('blogs.id', $id)
            ->where('blogs.isActive', 1)
            ->get()
            ->row();

        if (!$data['blogs']) {
            show_404();
        }

        $this->load->view('header');
        $this->load->view('blog_details', $data);
        $this->load->view('footer');
    }


    // Single blog page
    public function view($id)
    {
        $data['blog'] = $this->Blog_model->getBlogById($id);
        $this->load->view('header');
        $this->load->view('blog/view', $data);
        $this->load->view('footer');
    }
}
