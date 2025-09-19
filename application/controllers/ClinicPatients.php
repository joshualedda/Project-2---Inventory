<?php
class ClinicPatients extends MY_Controller
{
    private function loadLayoutPartials()
    {
        $office = $this->session->userdata('office');

        $sidebar = 'partials/sidebar';
        $navbar = 'partials/navbar';

        if ($office === 'clinic') {
            $sidebar = 'partials/clinic/sidebar';
            $navbar = 'partials/clinic/navbar';
        }

        $this->load->view($sidebar);
        $this->load->view($navbar);
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
        $this->auto_check_access();
        $this->prepareUserData();

        $data['patients'] = $this->ClinicPatientModel->get_all();
        $data['statistics'] = $this->ClinicPatientModel->get_statistics();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/clinic_patients/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
  
        
        $data['students'] = $this->ClinicPatientModel->get_students_dropdown();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/clinic_patients/create', $data);
        $this->load->view('partials/footer');
    }

    public function store()
    {
    
        $this->form_validation->set_rules('student_id', 'Student', 'required|integer');
        $this->form_validation->set_rules('age', 'Age', 'required|integer');
        $this->form_validation->set_rules('height', 'Height', 'required|integer');
        $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer');
        $this->form_validation->set_rules('blood_pressure', 'Blood Pressure', 'required|trim');
        $this->form_validation->set_rules('sex', 'Sex', 'required|in_list[Male,Female]');
        $this->form_validation->set_rules('weight', 'Weight', 'required|integer');
        $this->form_validation->set_rules('pulse', 'Pulse', 'required|trim');
        $this->form_validation->set_rules('respiration', 'Respiration', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
            return;
        }

        $data = $this->input->post(NULL, true);
        $created = $this->ClinicPatientModel->create($data);

        $this->session->set_flashdata($created ? 'success' : 'error', $created ? 'Record created.' : 'Failed to create record.');
        redirect('admin/clinic-patients');
    }

    public function edit($id)
    {
            // $this->auto_check_access();
        $this->prepareUserData();
        $data['patient'] = $this->ClinicPatientModel->get_by_id($id);
        if (!$data['patient']) {
            show_404();
        }
        $data['students'] = $this->ClinicPatientModel->get_students_dropdown();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/clinic_patients/edit', $data);
        $this->load->view('partials/footer');
    }

    public function update($id)
    {


        $this->form_validation->set_rules('student_id', 'Student', 'required|integer');
        $this->form_validation->set_rules('age', 'Age', 'required|integer');
        $this->form_validation->set_rules('height', 'Height', 'required|integer');
        $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer');
        $this->form_validation->set_rules('blood_pressure', 'Blood Pressure', 'required|trim');
        $this->form_validation->set_rules('sex', 'Sex', 'required|in_list[Male,Female]');
        $this->form_validation->set_rules('weight', 'Weight', 'required|integer');
        $this->form_validation->set_rules('pulse', 'Pulse', 'required|trim');
        $this->form_validation->set_rules('respiration', 'Respiration', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
            return;
        }

        $data = $this->input->post(NULL, true);
        $updated = $this->ClinicPatientModel->update($id, $data);
        $this->session->set_flashdata($updated ? 'success' : 'error', $updated ? 'Record updated.' : 'Failed to update record.');
        redirect('admin/clinic-patients');
    }

    public function view($id)
    {
        //  $this->auto_check_access();
        $this->prepareUserData();
        $data['patient'] = $this->ClinicPatientModel->get_by_id($id);
        if (!$data['patient']) {
            show_404();
        }
        $data['stats'] = array(
            'student_visits' => $this->ClinicPatientModel->get_student_visit_count($data['patient']['student_id']),
            'total_visits' => $this->ClinicPatientModel->get_statistics()['total_visits'] ?? 0,
        );

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/clinic_patients/view', $data);
        $this->load->view('partials/footer');
    }

    public function delete($id)
    {
        // $this->check_admin_access();
        $deleted = $this->ClinicPatientModel->delete($id);
        $this->session->set_flashdata($deleted ? 'success' : 'error', $deleted ? 'Record deleted.' : 'Failed to delete record.');
        redirect('admin/clinic-patients');
    }
}


