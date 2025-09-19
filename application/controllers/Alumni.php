<?php
class Alumni extends MY_Controller
{
    private function prepareUserData()
    {
        $user_id = $this->session->userdata('id');
        $user_data = $this->User->getUserById($user_id);
        $this->data['user_data'] = $user_data;
        $this->data['is_logged_in'] = $this->session->userdata('logged_in');
        $this->data['role'] = $this->session->userdata('role');
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
        $this->check_admin_access();
        $this->prepareUserData();
        $data['alumni'] = $this->AlumniModel->get_all();
        $data['statistics'] = $this->AlumniModel->get_statistics();
        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/alumni/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->check_admin_access();
        $this->prepareUserData();
        $data['students'] = $this->AlumniModel->get_students_for_dropdown();
        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/alumni/create', $data);
        $this->load->view('partials/footer');
    }

    public function store()
    {
        $this->check_admin_access();
        $this->form_validation->set_rules('student_id', 'Student', 'required|integer');
        $this->form_validation->set_rules('graduation_year', 'Graduation Year', 'required|integer');
        $this->form_validation->set_rules('employment_status', 'Employment Status', 'required|trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
        $this->form_validation->set_rules('position', 'Position', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
            return;
        }

        $student = $this->StudentModel->get_student_by_id($this->input->post('student_id'));
        if (!$student) {
            $this->session->set_flashdata('error', 'Selected student not found.');
            redirect('admin/alumni/create');
        }

        $data = array(
            'student_id' => (int)$student->id,
            'graduation_year' => (int)$this->input->post('graduation_year'),
            'employment_status' => $this->input->post('employment_status'),
            'company' => $this->input->post('company'),
            'position' => $this->input->post('position'),
            'status' => (int)$this->input->post('status')
        );

        if ($this->AlumniModel->insert($data)) {
            $this->session->set_flashdata('success', 'Alumni record created successfully.');
            redirect('admin/alumni');
        }
        $this->session->set_flashdata('error', 'Failed to create alumni record.');
        redirect('admin/alumni/create');
    }

    public function edit($id)
    {
        $this->check_admin_access();
        $this->prepareUserData();
        $data['alumni'] = $this->AlumniModel->get_by_id($id);
        if (!$data['alumni']) { show_404(); }
        $data['students'] = $this->AlumniModel->get_students_for_dropdown();
        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/alumni/edit', $data);
        $this->load->view('partials/footer');
    }

    public function update($id)
    {
        $this->check_admin_access();
        $this->form_validation->set_rules('student_id', 'Student', 'required|integer');
        $this->form_validation->set_rules('graduation_year', 'Graduation Year', 'required|integer');
        $this->form_validation->set_rules('employment_status', 'Employment Status', 'required|trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
        $this->form_validation->set_rules('position', 'Position', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
            return;
        }

        $student = $this->StudentModel->get_student_by_id($this->input->post('student_id'));
        if (!$student) {
            $this->session->set_flashdata('error', 'Selected student not found.');
            redirect('admin/alumni/edit/'.$id);
        }

        $data = array(
            'student_id' => (int)$student->id,
            'graduation_year' => (int)$this->input->post('graduation_year'),
            'employment_status' => $this->input->post('employment_status'),
            'company' => $this->input->post('company'),
            'position' => $this->input->post('position'),
            'status' => (int)$this->input->post('status')
        );

        if ($this->AlumniModel->update($id, $data)) {
            $this->session->set_flashdata('success', 'Alumni record updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update alumni record.');
        }
        redirect('admin/alumni');
    }

    public function view($id)
    {
        $this->check_admin_access();
        $this->prepareUserData();
        $data['alumni'] = $this->AlumniModel->get_detailed_by_id($id);
        if (!$data['alumni']) { show_404(); }
        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/alumni/view', $data);
        $this->load->view('partials/footer');
    }

    public function delete($id)
    {
        $this->check_admin_access();
        if ($this->AlumniModel->delete($id)) {
            $this->session->set_flashdata('success', 'Alumni record deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete alumni record.');
        }
        redirect('admin/alumni');
    }
}
?>


