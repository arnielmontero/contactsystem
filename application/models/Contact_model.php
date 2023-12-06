<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    
    public function add_contact($data) {
        $this->db->insert('contacts', $data);
    }

    public function count_contacts($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('contacts')->result();
    }

    public function get_contacts($user_id, $limit, $offset) {
        $this->db->where('user_id', $user_id);
        $this->db->limit($limit, $offset);
        return $this->db->get('contacts')->result();
    }
    
    public function search_contacts($user_id, $keyword) {
        $this->db->where('user_id', $user_id);
        $this->db->like('contact_name', $keyword);
        $this->db->or_like('company', $keyword);
        $this->db->or_like('phone', $keyword);
        $this->db->or_like('contact_email', $keyword);
        return $this->db->get('contacts')->result();
    }

    public function get_contact($contact_id) {
        $this->db->where('contact_id', $contact_id);
        return $this->db->get('contacts')->row();
    }

    public function update_contact($contact_id, $data) {
        $this->db->where('contact_id', $contact_id);
        $this->db->update('contacts', $data);
    }

    public function delete_contact($contact_id) {
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('contacts');
    }
}