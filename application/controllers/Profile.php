<?php
class Profile extends MY_Controller
{
    private function loadLayoutPartials()
    {
        $office = $this->session->userdata('office');
        $sidebar = 'partials/sidebar';
        $navbar = 'partials/navbar';

        if ($office === 'scholar') {
            $sidebar = 'partials/scholar/sidebar';
            $navbar = 'partials/scholar/navbar';
        } elseif ($office === 'clinic') {
            $sidebar = 'partials/clinic/sidebar';
            $navbar = 'partials/clinic/navbar';
        }

        $this->load->view($sidebar);
        $this->load->view($navbar);
    }

    public function index()
    {
        $this->auto_check_access();
        $this->prepareUserData();

        $user_id = $this->session->userdata('id');

        $data['user'] = $this->User->getUserById($user_id);

        // Load the views
        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/profile/index', $data);
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

    public function editProfile($user_id)
    {
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]'); // Optional password validation
        $this->form_validation->set_rules('office', 'Office', 'required|in_list[admin,scholar]');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Prepare data for update
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'office' => $this->input->post('office')
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
