<?php
class MyFilesUser extends CI_Controller
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

        $this->load->view('partials/header');
        $this->load->view('partials/user/sidebar');
        $this->load->view('partials/user/navbar');
        $this->load->view('user/userfiles/index');
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->load->view('partials/user/sidebar');
        $this->load->view('partials/user/navbar');
        $this->load->view('user/userfiles/create');
        $this->load->view('partials/footer');
    }

    // Store
    public function store()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('department_id', 'Department', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            $data = array(
                'first_name'    => $this->input->post('first_name'),
                'last_name'     => $this->input->post('last_name'),
                'department_id' => $this->input->post('department_id'),
            );

            $insert = $this->Author->insert($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'Author Added Successfully.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    // Edit
    public function edit()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();
        // if (empty($data['userfiles'])) {
        //     show_404();
        // }

        $this->load->view('partials/header');
        $this->load->view('partials/user/sidebar');
        $this->load->view('partials/user/navbar');
        $this->load->view('user/userfiles/edit');
        $this->load->view('partials/footer');
    }

    //Update
    public function update($id)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('department_id', 'Research Department', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        // Check if form validation passes
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            // Prepare data for updating the userfiles
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'department_id' => $this->input->post('department_id'),
                'status' => $this->input->post('status'),
            );

            // Update the userfiles data in the database
            $updateResult = $this->Author->updateAuthor($id, $data);

            // Check if the update was successful
            if ($updateResult) {
                $this->session->set_flashdata('success', 'Author updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // View
    public function view()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();


        $this->load->view('partials/header');
        $this->load->view('partials/user/sidebar');
        $this->load->view('partials/user/navbar');
        $this->load->view('user/userfiles/view');
        $this->load->view('partials/footer');
    }
}
