<?php

class Customer extends CI_Controller

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
    $this->load->view('admin/header');
    $this->load->view('admin/customer_view');
    $this->load->view('admin/footer');
}

public function fetch_customers_ajax()
{
    $page   = $this->input->post('page') ?? 1;
    $search = $this->input->post('search') ?? '';
    $limit  = 10;
    $offset = ($page - 1) * $limit;

    $this->db->select('users.*, COUNT(orders.id) AS total_orders');
    $this->db->from('users');
    $this->db->join('orders', 'orders.user_id = users.id', 'left');
    $this->db->where('users.role', 0); // only customers
    if (!empty($search)) {
        $this->db->group_start();
        $this->db->like('users.name', $search);
        $this->db->or_like('users.email', $search);
        $this->db->group_end();
    }
    $this->db->group_by('users.id');

    $query_total = $this->db->get_compiled_select('', false);
    $total_customers = $this->db->query($query_total)->num_rows();

    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    $customers = $query->result();

    echo json_encode([
        'status' => 'success',
        'customers' => $customers,
        'total_customers' => $total_customers,
        'limit' => $limit,
        'current_page' => (int)$page
    ]);
}

public function deactivate_user()
{
    $id = $this->input->post('id');
    if ($id) {
        $this->db->where('id', $id)->update('users', ['isActive' => 0]);
        echo json_encode(['status' => 'success', 'message' => 'User deactivated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid user ID']);
    }
}

public function order()
{
   
    $this->load->view('admin/header');
    $this->load->view('admin/order_view');
    $this->load->view('admin/footer');
}
public function fetch_orders_ajax()
{
    $page   = $this->input->post('page') ?? 1;
    $search = $this->input->post('search') ?? '';
    $limit  = 5;
    $offset = ($page - 1) * $limit;

    $this->db->select('orders.*, users.name, users.email');
    $this->db->from('orders');
    $this->db->join('users', 'users.id = orders.user_id', 'left');

    if(!empty($search)){
        $this->db->group_start();
        $this->db->like('users.name', $search);
        $this->db->or_like('users.email', $search);
        $this->db->or_like('orders.product_title', $search);
        $this->db->or_like('orders.transaction_ref', $search);
        $this->db->group_end();
    }

    $total_orders = $this->db->count_all_results('', false);
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    $orders = $query->result();

    echo json_encode([
        'status' => 'success',
        'orders' => $orders,
        'total_orders' => $total_orders,
        'limit' => $limit,
        'current_page' => (int)$page
    ]);
}

public function update_order_status()
{
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    if(!$id || $status === null){
        echo json_encode(['status'=>'error','message'=>'Invalid request']);
        return;
    }

    $this->db->where('id', $id)->update('orders', ['status'=>$status]);
    echo json_encode(['status'=>'success']);
}





   

}  

?>