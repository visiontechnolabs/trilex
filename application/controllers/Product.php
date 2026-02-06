<?php

class Product extends CI_Controller
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
        $this->load->view('product_view');
        $this->load->view('footer');
    }

    public function fetch_products()
    {
        $page = $this->input->get('page') ?? 1;
        $limit = ($this->input->get('device') == 'mobile') ? 5 : 6;
        $offset = ($page - 1) * $limit;

        $this->db->where('isActive', 1);
        $total = $this->db->count_all_results('posts');

        $this->db->where('isActive', 1);
        $this->db->limit($limit, $offset);
        $products = $this->db->get('posts')->result();

        $html = '';

        foreach ($products as $product) {

            $ext = pathinfo($product->file_path, PATHINFO_EXTENSION);

            // Media (image / video)
            if ($ext === 'mp4') {
                $media = '
            <div class="media">
                <video autoplay muted loop playsinline class="w-100 h-100">
                    <source src="' . base_url($product->file_path) . '" type="video/mp4">
                </video>
            </div>';
            } else {
                $media = '
            <div class="media">
                <img src="' . base_url($product->file_path) . '" 
                     alt="' . htmlspecialchars($product->title) . '" 
                     class="w-100 h-100">
            </div>';
            }

            $shortDesc = substr(strip_tags($product->description), 0, 90) . '…';

            $html .= '
        <div class="col-lg-4 col-md-6">
            <div class="product-card h-100">

                ' . $media . '

                <div class="product-card-body text-start">

                    <h5 class="product-card-title mb-2">
                        ' . htmlspecialchars($product->title) . '
                    </h5>

                    <div class="product-card-price mb-3">
                        ₹' . number_format($product->price, 2) . '
                    </div>

                    <p class="text-muted small mb-4">
                        ' . $shortDesc . '
                    </p>

                    <a href="' . base_url('product/detail/' . $product->id) . '" 
                       class="btn btn-primary w-100 fw-semibold" style="
                       background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
                        View Details <i class="fas fa-arrow-up-right-from-square ms-2"></i>
                    </a>

                </div>
            </div>
        </div>';
        }

        /* ---------- PAGINATION ---------- */
        $total_pages = ceil($total / $limit);
        $pagination = '<ul class="pagination justify-content-center mt-4">';

        if ($page > 1) {
            $pagination .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($page - 1) . '">‹ Prev</a>
        </li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page || ($i >= $page - 1 && $i <= $page + 1)) {
                $active = ($i == $page) ? 'active' : '';
                $pagination .= '
            <li class="page-item ' . $active . '">
                <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
            </li>';
            }
        }

        if ($page < $total_pages) {
            $pagination .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($page + 1) . '">Next ›</a>
        </li>';
        }

        $pagination .= '</ul>';

        echo json_encode([
            'html' => $html,
            'pagination' => $pagination
        ]);
    }

    public function detail($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['product'] = $this->general_model->getOne('posts', ['id' => $id, 'isActive' => 1]);

        if (!$data['product']) {
            show_404();
        }
        // echo "<pre>";
        // print_r( $data['product']);
        // die;


        $this->load->view('header');
        $this->load->view('product_details', $data);
        $this->load->view('footer');
    }

    public function checkout($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $data['product'] = $this->general_model->getOne('posts', ['id' => $id, 'isActive' => 1]);
        //   $data['user_name'] = $this->session->userdata('user_name');

        if (!$data['product']) {
            show_404();
        }

        // FETCH DYNAMIC QR FROM DATABASE
        $data['qr'] = $this->db->get('payment_settings')->row();

        $this->load->view('header');
        $this->load->view('payment_view', $data);
        $this->load->view('footer');
    }
    public function submit()
    {
        $this->load->helper('url');

        $product_title = $this->input->post('product_title');
        $product_price = $this->input->post('product_price');
        $email = $this->input->post('email');
        $transaction_ref = $this->input->post('transaction_ref');

        if (!empty($_FILES['payment_receipt']['name'])) {
            $config['upload_path'] = './uploads/receipts/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 3072;
            $config['file_name'] = time() . '_' . $_FILES['payment_receipt']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('payment_receipt')) {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            } else {
                $receipt_file = $this->upload->data('file_name');
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Please upload payment receipt.']);
            return;
        }
        $user_id = $this->session->userdata('user_id');


        // Insert into database
        $data = [
            'user_id' => $user_id,
            'product_title' => $product_title,
            'product_price' => $product_price,
            'email' => $email,
            'transaction_ref' => $transaction_ref,
            'payment_receipt' => $receipt_file,
            'created_on' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('orders', $data);

        echo json_encode(['status' => 'success']);
    }
}
