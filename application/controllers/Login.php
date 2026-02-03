<?php

class Login extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('session');
        $this->load->library('email');




        $this->load->helper('url');

        $this->load->model('general_model');

    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('login_view');
        $this->load->view('footer');

    }
    // ===== LOGIN =====
    public function process_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row();

        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Email not registered']);
            return;
        }

        if (!password_verify($password, $user->password)) {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
            return;
        }

        // Set standard session
        $this->_set_user_session($user);

        echo json_encode(['status' => 'success']);
    }


    // ===== REGISTER & SEND OTP =====
    public function send_otp_email()
    {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $name = trim($first_name . ' ' . $last_name);

        // Check existing user
        $exists = $this->db->get_where('users', ['email' => $email])->row();
        if ($exists) {
            echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
            return;
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        $this->session->set_userdata([
            'otp' => $otp,
            'reg_data' => [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'is_verified' => 0,
                'isActive' => 1,
                'created_on' => date('Y-m-d')
            ]
        ]);

        // Send OTP via mail
        $subject = 'Your OTP for Email Verification';
        $message = "Dear $name,\n\nYour OTP is: $otp\n\nTeam Trilex";

        $this->email->from('trilexadvisories@gmail.com', 'Trilex');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo json_encode(['status' => 'success', 'message' => 'OTP sent']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'OTP failed']);
        }

    }


    // ===== VERIFY OTP =====
    public function verify_otp()
    {
        $otp = $this->input->post('otp');
        $session_otp = $this->session->userdata('otp');
        $reg_data = $this->session->userdata('reg_data');

        if ($otp != $session_otp) {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect OTP']);
            return;
        }

        // Mark as verified
        $reg_data['is_verified'] = 1;

        // Insert user
        $this->db->insert('users', $reg_data);
        $user_id = $this->db->insert_id();

        // Get full user object
        $user = $this->db->get_where('users', ['id' => $user_id])->row();

        // Set same standard session as login
        $this->_set_user_session($user);

        // Clear OTP & reg_data
        $this->session->unset_userdata(['otp', 'reg_data']);

        echo json_encode(['status' => 'success']);
    }


    // ===== PRIVATE FUNCTION TO SET SESSION =====
    private function _set_user_session($user)
    {
        $this->session->set_userdata([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'logged_in' => true
        ]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function register()
    {
        $this->load->view('header');
        $this->load->view('register_view');
        $this->load->view('footer');
    }
    public function send_otp()
    {
        $this->load->view('header');
        $this->load->view('otp_form');
        $this->load->view('footer');
    }

}