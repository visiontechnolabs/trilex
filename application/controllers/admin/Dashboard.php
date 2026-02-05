<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');

        $this->load->model('general_model');

        if (!$this->session->userdata('admin')) {

            redirect('admin');

        }
    }


    public function index()
    {
        // Count all posts
        $post_count = $this->db->count_all('posts');
        $blog_count = $this->db->count_all('blogs');
        $blog_category_count = $this->db->count_all('blog_category');
        $order_count = $this->db->count_all('orders');
        $user_count = $this->db->count_all('users');
        $service_count = $this->db->count_all('services');
        $service_category_count = $this->db->count_all('service_category');
        $qr_count = $this->db->count_all('payment_settings');

        $data = [
            'post_count' => $post_count,
            'blog_count' => $blog_count,
            'blog_category_count' => $blog_category_count,
            'order_count' => $order_count,
            'user_count' => $user_count,
            'service_count' => $service_count,
            'service_category_count' => $service_category_count,
            'qr_count' => $qr_count
        ];

        $this->load->view('admin/header');
        $this->load->view('admin/dashboard_view', $data);
        $this->load->view('admin/footer');
    }


}

?>