<?php
class User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all users
    public function getUsers()
    {
        $this->db->select('users.id, users.first_name, users.last_name, users.status');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Login
    public function loginUser()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            return array('success' => false, 'error' => validation_errors());
        }

        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            $hashed_password = $user['password'];

            if (password_verify($password, $hashed_password)) {
                return array('success' => true, 'user' => $user);
            }
        }

        return array('success' => false, 'error' => 'Invalid Email or Password.');
    }

    // Register
    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    // Get User by id and for profile purposes
    public function getUserById($id)
    {
        // Use Query Builder to get user by ID
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }

        return null;
    }

    //Update Profile

    public function updateProfile($user_id, $data)
    {
        // Check if employee_no is unique
        if (isset($data['employee_no'])) {
            $this->db->where('employee_no', $data['employee_no']);
            $this->db->where('id !=', $user_id); // Ensure the check is not for the current user
            $query = $this->db->get('users');

            if ($query->num_rows() > 0) {
                return ['status' => 'error', 'message' => 'Employee Number already exists.'];
            }
        }

        // Proceed with the update
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);  // Ensure the table name is correct
    }
}
