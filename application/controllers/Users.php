<?php

class Users extends CI_Controller
{
    private function redirectIfUnauthorized()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
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

    public function index()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['users'] = $this->User->getUsers();


        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/users/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/users/create');
        $this->load->view('partials/footer');
    }

    public function createUser()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('employee_no', 'Employee No.', 'required|numeric|min_length[5]|is_unique[users.employee_no]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('institution_id', 'Institution', 'required');
        $this->form_validation->set_rules('department_id', 'Department', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'employee_no' => $this->input->post('employee_no'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'institution_id' => $this->input->post('institution_id'),
                'department_id' => $this->input->post('department_id')
            );

            $insert = $this->User->insert_user($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'Registration Successfull.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
    public function edit($id)
    {

        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['user'] = $this->User->getUserbyId($id);
        if (empty($data['user'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/users/edit', $data);
        $this->load->view('partials/footer');
    }

    // Update Users
    public function update($id)
    {
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('institution_id', 'Institution', 'required');
        $this->form_validation->set_rules('department_id', 'Department', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('employee_no', 'Employee No.', 'required|integer|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);  // Make sure edit() method loads the form correctly
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'institution_id' => $this->input->post('institution_id'),
                'department_id' => $this->input->post('department_id'),
                'email' => $this->input->post('email'),
                'employee_no' => $this->input->post('employee_no'),
            );

            // Update password if it was entered
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $updateResult = $this->User->updateUser($id, $data);

            if ($updateResult) {
                $this->session->set_flashdata('success', 'User updated successfully.');
            } else {
                log_message('error', 'Update failed: ' . $this->db->last_query());
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // View
    public function view($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['user'] = $this->User->getUserbyId($id);

        if (empty($data['user'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/users/view', $data);
        $this->load->view('partials/footer');
    }
}
