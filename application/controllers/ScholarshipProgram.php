<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScholarshipProgram extends MY_Controller
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

    private function loadLayoutPartials()
    {
        $office = $this->session->userdata('office');
        $sidebar = 'partials/sidebar';
        $navbar = 'partials/navbar';

        if ($office === 'scholar') {
            $sidebar = 'partials/scholar/sidebar';
            $navbar = 'partials/scholar/navbar';
        }

        $this->load->view($sidebar);
        $this->load->view($navbar);
    }

    public function index()
    {
        $this->auto_check_access();
        $this->prepareUserData();

        $data['programs'] = $this->ScholarshipProgramModel->get_all_programs();
        $data['statistics'] = $this->ScholarshipProgramModel->get_program_statistics();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarshipprogram/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->auto_check_access();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarshipprogram/create');
        $this->load->view('partials/footer');
    }

    public function store()
    {
        $this->redirectIfUnauthorized();

        // Set validation rules
        $this->form_validation->set_rules('scholarship_name', 'Scholarship Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('source', 'Source', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('type', 'Type', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            $data = array(
                'scholarship_name' => $this->input->post('scholarship_name'),
                'description' => $this->input->post('description'),
                'source' => $this->input->post('source'),
                'type' => $this->input->post('type')
            );

            $insert = $this->ScholarshipProgramModel->insert_program($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'Scholarship program created successfully.');
                redirect(base_url('admin/scholarshipprogram'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                redirect(base_url('admin/scholarshipprogram/create'));
            }
        }
    }

    public function edit($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['program'] = $this->ScholarshipProgramModel->get_program_by_id($id);
        
        if (empty($data['program'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarshipprogram/edit', $data);
        $this->load->view('partials/footer');
    }

    public function update($id)
    {
        $this->redirectIfUnauthorized();

        // Set validation rules
        $this->form_validation->set_rules('scholarship_name', 'Scholarship Name', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('source', 'Source', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('type', 'Type', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'scholarship_name' => $this->input->post('scholarship_name'),
                'description' => $this->input->post('description'),
                'source' => $this->input->post('source'),
                'type' => $this->input->post('type')
            );

            $update = $this->ScholarshipProgramModel->update_program($id, $data);

            if ($update) {
                $this->session->set_flashdata('success', 'Scholarship program updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }

            redirect(base_url('admin/scholarshipprogram'));
        }
    }

    public function delete($id)
    {
        $this->redirectIfUnauthorized();

        $delete = $this->ScholarshipProgramModel->delete_program($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Scholarship program deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        }

        redirect(base_url('admin/scholarshipprogram'));
    }

    public function view($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['program'] = $this->ScholarshipProgramModel->get_program_by_id($id);
        
        if (empty($data['program'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarshipprogram/view', $data);
        $this->load->view('partials/footer');
    }
}
