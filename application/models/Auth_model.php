<?php
class Auth_model extends CI_Model {

    public function register($data) {
        $this->db->insert('users', $data);
    }

    public function login($email, $password) {
        $user = $this->db->get_where('users', array('email' => $email))->row();

        if ($user ) {
            // Login successful
            // Set user data in the session
            $user_data = array(
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'logged_in' => true
            );

            $this->session->set_userdata($user_data);

            return true;
        } else {
            // Login failed
            return false;
        }
    }
}
