<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('contact_model');
    }

    public function index() {

        $limit = 10;
        $user_id = $this->session->userdata('user_id');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['contacts'] = $this->contact_model->count_contacts($user_id);

        $this->load->library('pagination');

        // Configure pagination settings
        $config['base_url'] = site_url('dashboard/index');
        $config['total_rows'] = count($this->contact_model->get_contacts($user_id, 0, 0));
        $config['per_page'] = $limit;

        // Initialize pagination
        $this->pagination->initialize($config);



        $this->load->view('layout_bootstrap', array('title' => 'Dashboard', 'content' => $this->load->view('dashboard/contactList', $data, true)));
    }


}
