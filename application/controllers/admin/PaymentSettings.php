<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentSettings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('general_model');
        $this->load->database();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['qr'] = $this->db->get('payment_settings')->row();

        // IMPORTANT: wrap inside your admin theme
        $this->load->view('admin/header');
        $this->load->view('admin/payment_settings', $data);
        $this->load->view('admin/footer');
    }

    public function update_qr()
    {
        $data = [
            'upi_id' => $this->input->post('upi_id'),
            'qr_data' => $this->input->post('qr_data')
        ];

        $this->db->update('payment_settings', $data, ['id' => 1]);

        redirect('admin/paymentsettings');
    }
}
