<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('auth_model');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation and data processing
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                );

                // Register user
                $this->auth_model->register($data);

                // Redirect to login or dashboard
                redirect('auth/login');
            }    
        }

        // Load register view with the Bootstrap layout
        $this->load->view('layout_bootstrap', array('title' => 'Register', 'content' => $this->load->view('auth/register', '', true)));
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation and data processing
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
            // Login user
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                if ($this->auth_model->login($email, $password)) {
                    // Redirect to dashboard or contacts
                    redirect('dashboard');
                   
                } else {
                    // Login failed, show error
                    $data['error'] = 'Invalid email or password';
                }
            }
        }

        // Load login view with the Bootstrap layout
        $this->load->view('layout_bootstrap', array('title' => 'Login', 'content' => $this->load->view('auth/login', isset($data) ? $data : array(), true)));
    }

    public function logout() {
        // Logout user
        $this->session->sess_destroy();

        // Redirect to login
        redirect('auth/login');
    }
}
