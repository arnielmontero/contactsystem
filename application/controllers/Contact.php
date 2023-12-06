<?php
class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('contact_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['contacts'] = $this->contact_model->get_contacts($user_id);

        $this->load->view('layout_bootstrap', array('title' => 'Contacts', 'content' => $this->load->view('contact/index', $data, true)));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('company', 'company', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required');
            // Add other validation rules

            if ($this->form_validation->run() === TRUE) {
                // Validation and data processing
                $data = array(
                    'contact_name' => $this->input->post('contact_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'contact_email' => $this->input->post('contact_email'),
                    // Add other fields
                    'user_id' => $this->session->userdata('user_id')
                );

                // Add contact
                $this->contact_model->add_contact($data);

                // Redirect to contact list
                redirect('dashboard');
            }
        }

        // Load add contact view with the Bootstrap layout
        $this->load->view('layout_bootstrap', array('title' => 'Add Contact', 'content' => $this->load->view('contact/add', '', true)));
    }

    public function edit($contact_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation and data processing
            $data = array(
                'contact_name' => $this->input->post('contact_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'contact_email' => $this->input->post('contact_email'),
                // Add other fields
            );

            // Update contact
            $this->contact_model->update_contact($contact_id, $data);

            // Redirect to contact list
            redirect('dashboard');
        }

        $contact = $this->contact_model->get_contact($contact_id);

        // Load edit contact view with the Bootstrap layout
        $this->load->view('layout_bootstrap', array('title' => 'Edit Contact', 'content' => $this->load->view('contact/edit', array('contact' => $contact), true)));
    }

    public function delete($contact_id) {
        // Your delete logic
        $this->contact_model->delete_contact($contact_id);

        // Redirect to contact list
        redirect('dashboard');
    }
}
