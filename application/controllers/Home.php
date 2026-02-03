<?php

class Home extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');


        $this->load->helper('url');

        $this->load->model('general_model');

    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('home_view');
        $this->load->view('footer');

    }

    public function about()
    {
        $this->load->view('header');
        $this->load->view('about_view');
        $this->load->view('footer');
    }

    public function contact()
    {
        $this->load->view('header');
        $this->load->view('contact_view');
        $this->load->view('footer');
    }
    public function blog()
    {
        $data['blogs'] = $this->general_model->getAll('blogs', ['isActive' => 1]);

        $this->load->view('header');
        $this->load->view('blog_view', $data);
        $this->load->view('footer');
    }

    public function detail($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['blogs'] = $this->general_model->getOne('blogs', ['id' => $id, 'isActive' => 1]);

        if (!$data['blogs']) {
            show_404();
        }
        // echo "<pre>";
        // print_r( $data['product']);
        // die;


        $this->load->view('header');
        $this->load->view('blog_details', $data);
        $this->load->view('footer');
    }
    public function account()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row();

        $this->db->where('user_id', $user_id);
        $data['order_count'] = $this->db->count_all_results('orders');

        $this->load->view('header');
        $this->load->view('profile_view', $data);
        $this->load->view('footer');
    }
    public function update_user()
    {
        // Check if AJAX request
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $user_id = $this->session->userdata('user_id');
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        if (empty($name) || empty($email)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            return;
        }

        // Check if email already exists for another user
        $exists = $this->db->where('email', $email)
            ->where('id !=', $user_id)
            ->get('users')
            ->row();

        if ($exists) {
            echo json_encode(['status' => 'error', 'message' => 'Email already in use by another account.']);
            return;
        }

        $update_data = [
            'name' => $name,
            'email' => $email
        ];

        $this->db->where('id', $user_id)->update('users', $update_data);

        // Update session data
        $this->session->set_userdata([
            'user_name' => $name,
            'user_email' => $email
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Your account information has been updated successfully.']);
    }


    public function history()
    {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            redirect('login');
        }

        // Load history view (initial page)
        $this->load->view('header');
        $this->load->view('history_view'); // we'll fetch orders via AJAX
        $this->load->view('footer');
    }

    // AJAX request to fetch orders
    public function fetch_orders()
    {
        $user_id = $this->session->userdata('user_id');
        $status_filter = $this->input->post('status') ?? 'all';
        $page = (int) $this->input->post('page') ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }

        // Count total orders (with filter)
        $this->db->where('user_id', $user_id);
        if ($status_filter !== 'all') {
            if ($status_filter === 'approved')
                $this->db->where('status', 1);
            elseif ($status_filter === 'rejected')
                $this->db->where('status', 0);
            elseif ($status_filter === 'pending')
                $this->db->where('status', 2);
        }
        $total_orders = $this->db->count_all_results('orders'); // reset query after counting

        // Fetch paginated orders
        $this->db->where('user_id', $user_id);
        if ($status_filter !== 'all') {
            if ($status_filter === 'approved')
                $this->db->where('status', 1);
            elseif ($status_filter === 'rejected')
                $this->db->where('status', 0);
            elseif ($status_filter === 'pending')
                $this->db->where('status', 2);
        }
        $this->db->limit($limit, $offset);
        $orders = $this->db->order_by('created_on', 'DESC')->get('orders')->result();

        echo json_encode([
            'status' => 'success',
            'orders' => $orders,
            'total_orders' => $total_orders,
            'current_page' => $page,
            'limit' => $limit
        ]);
    }

    public function profile()
    {
        $this->load->view('header');
        $this->load->view('mobile_profile_view');
        $this->load->view('footer');
    }

    public function service($id = null, $slug = null)
    {
        if ($id) {
            $query = $this->db->get_where('services', ['category_id' => $id]);
        } else {
            // If no category id, get all services
            $query = $this->db->get('services');
        }
        $data['services'] = $query->result_array();
        $data['slug'] = $slug;

        $this->load->view('header');
        $this->load->view('service_view', $data);
        $this->load->view('footer');
    }



    public function details($id)
    {
        $query = $this->db->get_where('services', ['id' => $id]);
        $data['service'] = $query->row_array();

        // if (!$data['service']) {
        //     show_404();
        // }
// echo "<pre>";
// print_r($data);
// die;
        $this->load->view('header');
        $this->load->view('_service_details', $data);
        $this->load->view('footer');
    }


}