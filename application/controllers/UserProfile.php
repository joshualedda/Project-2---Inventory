<?php
class UserProfile extends CI_Controller
{
    public function index()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $user_id = $this->session->userdata('id');

        $data['user'] = $this->User->getUserById($user_id);

        // Load the views
        $this->load->view('partials/header');
        $this->load->view('partials/user/sidebar');
        $this->load->view('partials/user/navbar');
        $this->load->view('user/profile/index', $data);
        $this->load->view('partials/footer');
    }


    private function redirectIfUnauthorized()
    {
        if (!$this->session->userdata('logged_in')) {
            $previous_url = $_SERVER['HTTP_REFERER'] ?? 'login';
            redirect($previous_url);
        }
    }

    private function prepareUserData()
    {
        $user_id = $this->session->userdata('id');
        $user_data = $this->User->getUserById($user_id);
        $is_logged_in = $this->session->userdata('logged_in');
        $user_role = $this->session->userdata('role');

        $this->data['user_data'] = $user_data;
        $this->data['is_logged_in'] = $is_logged_in;
        $this->data['role'] = $user_role;
    }


    // Profile Updated
    public function editProfile($user_id)
    {
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('employee_no', 'Employee No.', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]'); // Optional password validation

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Prepare data for update
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'employee_no' => $this->input->post('employee_no')
        );

        // Handle password update if provided
        $password = $this->input->post('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT); // Hash the password
        }

        // Load the model
        $this->load->model('User');

        // Update profile
        $updateResult = $this->User->updateProfile($user_id, $data);

        if (is_array($updateResult) && $updateResult['status'] === 'error') {
            echo json_encode($updateResult);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.', 'data' => $data]);
        }
    }
}
