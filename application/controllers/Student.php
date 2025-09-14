<?php
class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->library(['form_validation','session']);
        $this->load->helper(['url','form']);
    }
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
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/index');
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->redirectIfUnauthorized();
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
        $this->form_validation->set_rules('student_number', 'Student ID', 'required|trim');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('year_level', 'Year Level', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('school_year', 'School Year', 'required');
        $this->form_validation->set_rules('scholarship_type', 'Scholarship Type', 'trim');
        $this->form_validation->set_rules('office', 'Office', 'required');
        $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required|trim');
        $this->form_validation->set_rules('guardian_contact', 'Guardian Contact', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('admission_date', 'Date of Admission', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
            return;
        }

        $studentData = array(
            'first_name' => $this->input->post('first_name', true),
            'middle_name' => $this->input->post('middle_name', true),
            'last_name' => $this->input->post('last_name', true),
            'student_number' => $this->input->post('student_number', true),
            'date_of_birth' => $this->input->post('date_of_birth', true),
            'gender' => $this->input->post('gender', true),
            'course' => $this->input->post('course', true),
            'year_level' => $this->input->post('year_level', true),
            'section' => $this->input->post('section', true),
            'school_year' => $this->input->post('school_year', true),
            'scholarship_type' => $this->input->post('scholarship_type', true),
            'office' => $this->input->post('office', true),
            'guardian_name' => $this->input->post('guardian_name', true),
            'guardian_contact' => $this->input->post('guardian_contact', true),
            'status' => $this->input->post('status', true),
            'admission_date' => $this->input->post('admission_date', true),
        );

        $inserted = $this->Student_model->insert_student($studentData);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Student added successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    // Edit
    public function edit()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();
        // if (empty($data['student'])) {
        //     show_404();
        // }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/edit');
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
            // Prepare data for updating the student
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'department_id' => $this->input->post('department_id'),
                'status' => $this->input->post('status'),
            );

            // Update the student data in the database
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
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/student/view');
        $this->load->view('partials/footer');
    }
}
