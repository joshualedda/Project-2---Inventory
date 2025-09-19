<?php
class Student extends MY_Controller
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

           $data['students'] = $this->StudentModel->get_all_students();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->check_admin_access();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/create');
        $this->load->view('partials/footer');
    }
    // Store
    public function store()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required|trim');
        $this->form_validation->set_rules('contact', 'Contact', 'trim');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('course_id', 'Course', 'required');
        $this->form_validation->set_rules('year_level', 'Year Level', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('school_year', 'School Year', 'required');
        $this->form_validation->set_rules('scholarship_type', 'Scholarship Type', 'trim');
        $this->form_validation->set_rules('office', 'Office', 'required');
        $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required|trim');
        $this->form_validation->set_rules('guardian_contact', 'Guardian Contact', 'required|trim');
        $this->form_validation->set_rules('admission_date', 'Date of Admission', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
            return;
        }

        // Pass everything at once
        $inserted = $this->StudentModel->insert_student($this->input->post(NULL, true));

        if ($inserted) {
            $this->session->set_flashdata('success', 'Student added successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    // Edit
    public function edit($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['student'] = $this->StudentModel->get_student_by_id($id);
        
        if (empty($data['student'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/edit', $data);
        $this->load->view('partials/footer');
    }

    //Update
    public function update($id)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required|trim');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('course_id', 'Course', 'required');
        $this->form_validation->set_rules('year_level', 'Year Level', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('school_year', 'School Year', 'required');
        $this->form_validation->set_rules('scholarship_type', 'Scholarship Type', 'trim');
        $this->form_validation->set_rules('office', 'Office', 'required');
        $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required|trim');
        $this->form_validation->set_rules('guardian_contact', 'Guardian Contact', 'required|trim');
        $this->form_validation->set_rules('admission_date', 'Date of Admission', 'required');

        // Check if form validation passes
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            // Prepare data for updating the student
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'student_id' => $this->input->post('student_id'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'contact' => $this->input->post('contact'),
                'gender' => $this->input->post('gender'),
                'course_id' => $this->input->post('course_id'),
                'year_level' => $this->input->post('year_level'),
                'section' => $this->input->post('section'),
                'school_year' => $this->input->post('school_year'),
                'scholarship_type' => $this->input->post('scholarship_type'),
                'office' => $this->input->post('office'),
                'guardian_name' => $this->input->post('guardian_name'),
                'guardian_contact' => $this->input->post('guardian_contact'),
                'admission_date' => $this->input->post('admission_date'),
            );

            // Update the student data in the database
            $updateResult = $this->StudentModel->update_student($id, $data);

            // Check if the update was successful
            if ($updateResult) {
                $this->session->set_flashdata('success', 'Student updated successfully.');
            } else {
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

        // Load the student model
        $this->load->model('StudentModel');
        
        // Get student data
        $student = $this->StudentModel->get_student_by_id($id);
        
        if (!$student) {
            $this->session->set_flashdata('error', 'Student not found.');
            redirect('admin/student');
        }

        $data['student'] = $student;

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/view', $data);
        $this->load->view('partials/footer');
    }
}
