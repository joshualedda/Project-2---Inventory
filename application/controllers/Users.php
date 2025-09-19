<?php

class Users extends MY_Controller
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
        $this->check_admin_access();
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
        $this->check_admin_access();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/users/create');
        $this->load->view('partials/footer');
    }

    public function createUser()
    {
        $this->check_admin_access();
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('role_id', 'Role', 'required|in_list[0,1]');
        $this->form_validation->set_rules('office', 'Office', 'required|in_list[admin,scholar,clinic,alumni,sbo,gad,time,marshall]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role_id' => (int)$this->input->post('role_id'),
                'office' => $this->input->post('office'),
                'status' => (int)$this->input->post('status'),
            );

            $insert = $this->User->insert_user($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'User created successfully.');
                redirect(base_url('admin/users'));
            } else {
                $this->session->set_flashdata('error', 'Creation failed. Please try again.');
                redirect(base_url('admin/user/create'));
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
        $this->check_admin_access();
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required|in_list[0,1]');
        $this->form_validation->set_rules('office', 'Office', 'required|in_list[admin,scholar,clinic,alumni,sbo,gad,time,marshall]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);  // Make sure edit() method loads the form correctly
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'role_id' => (int)$this->input->post('role_id'),
                'office' => $this->input->post('office'),
                'status' => (int)$this->input->post('status'),
            );

            // Update password if it was entered
            if (!empty($this->input->post('password'))) {
                $this->form_validation->set_rules('password', 'Password', 'min_length[8]');
                $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'matches[password]');
                if ($this->form_validation->run() === FALSE) {
                    $this->edit($id);
                    return;
                }
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }

            $updateResult = $this->User->updateUser($id, $data);

            if ($updateResult) {
                $this->session->set_flashdata('success', 'User updated successfully.');
            } else {
                log_message('error', 'Update failed: ' . $this->db->last_query());
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }

            redirect(base_url('admin/users'));
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
