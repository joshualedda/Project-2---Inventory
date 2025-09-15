<?php
class Scholarship extends CI_Controller
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

        $data['scholarships'] = $this->ScholarshipModel->get_all_scholarships();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/scholarship/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['students'] = $this->ScholarshipModel->get_students_for_dropdown();

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/scholarship/create', $data);
        $this->load->view('partials/footer');
    }

    // Store
    public function store()
    {
        // Set validation rules for required fields (aligned to new schema)
        $this->form_validation->set_rules('student_id', 'Student', 'required|integer');
        $this->form_validation->set_rules('application_type', 'Application Type', 'required|in_list[New,Renewal]');
        $this->form_validation->set_rules('semester', 'Semester', 'required|integer');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
        $this->form_validation->set_rules('birth_date', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required|in_list[Male,Female]');
        $this->form_validation->set_rules('religion', 'Religion', 'required|trim');
        $this->form_validation->set_rules('father_name', 'Father\'s Name', 'required|trim');
        $this->form_validation->set_rules('father_address', 'Father\'s Address', 'required|trim');
        $this->form_validation->set_rules('father_contact', 'Father\'s Contact', 'required|trim');
        $this->form_validation->set_rules('father_occupation', 'Father\'s Occupation', 'required|trim');
        $this->form_validation->set_rules('father_education', 'Father\'s Education', 'required|trim');
        $this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required|trim');
        $this->form_validation->set_rules('mother_address', 'Mother\'s Address', 'required|trim');
        $this->form_validation->set_rules('mother_contact', 'Mother\'s Contact', 'required|trim');
        $this->form_validation->set_rules('mother_occupation', 'Mother\'s Occupation', 'required|trim');
        $this->form_validation->set_rules('mother_education', 'Mother\'s Education', 'required|trim');
        $this->form_validation->set_rules('scholar_reason', 'Scholar Reason', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            // Get selected student details (internal row id from select)
            $selected_student_row_id = $this->input->post('student_id');
            $student_details = $this->StudentModel->get_student_by_id($selected_student_row_id);
            
            if (!$student_details) {
                $this->session->set_flashdata('error', 'Selected student not found.');
                redirect(base_url('admin/scholarship/create'));
            }

            // Process education background data
            $education_background = array();
            $school_names = $this->input->post('school_name');
            $year_graduates = $this->input->post('year_graduated');
            $honors = $this->input->post('honors');
            
            if ($school_names && $year_graduates && $honors) {
                foreach ($school_names as $level => $school_name) {
                    if (!empty($school_name)) { // Only include if school name is provided
                        $education_background[] = array(
                            'level' => $level,
                            'school_name' => $school_name,
                            'year_graduate' => isset($year_graduates[$level]) ? $year_graduates[$level] : '',
                            'honors' => isset($honors[$level]) ? $honors[$level] : ''
                        );
                    }
                }
            }

            // Process siblings data
            $siblings_info = array();
            $sibling_names = $this->input->post('sibling_name');
            $sibling_ages = $this->input->post('sibling_age');
            $sibling_courses = $this->input->post('sibling_course');
            $sibling_schools = $this->input->post('sibling_school');
            
            if ($sibling_names && $sibling_ages && $sibling_courses && $sibling_schools) {
                foreach ($sibling_names as $index => $sibling_name) {
                    if (!empty($sibling_name)) { // Only include siblings with names
                        $siblings_info[] = array(
                            'name' => $sibling_name,
                            'age' => isset($sibling_ages[$index]) ? $sibling_ages[$index] : '',
                            'course' => isset($sibling_courses[$index]) ? $sibling_courses[$index] : '',
                            'school' => isset($sibling_schools[$index]) ? $sibling_schools[$index] : ''
                        );
                    }
                }
            }

            $data = array(
                'student_id' => $student_details->student_id,
                'scholarship_id' => (int)$this->input->post('scholarship_id'),
                'application_type' => $this->input->post('application_type'),
                'semester' => (int)$this->input->post('semester'),
                'contact_no' => $this->input->post('contact_no'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'birth_date' => $this->input->post('birth_date'),
                'gender' => $this->input->post('gender'),
                'facebook' => $this->input->post('facebook'),
                'birth_place' => $this->input->post('birth_place'),
                'religion' => $this->input->post('religion'),
                'father_name' => $this->input->post('father_name'),
                'father_address' => $this->input->post('father_address'),
                'father_contact' => $this->input->post('father_contact'),
                'father_occupation' => $this->input->post('father_occupation'),
                'father_employment' => $this->input->post('father_employment'),
                'father_education' => $this->input->post('father_education'),
                'mother_name' => $this->input->post('mother_name'),
                'mother_address' => $this->input->post('mother_address'),
                'mother_contact' => $this->input->post('mother_contact'),
                'mother_occupation' => $this->input->post('mother_occupation'),
                'mother_employment' => $this->input->post('mother_employment'),
                'mother_education' => $this->input->post('mother_education'),
                'scholar_reason' => (int)$this->input->post('scholar_reason'),
                'application_status' => 'Pending',
                'status' => 0
            );

            $insert = $this->ScholarshipModel->insert_scholarship($data);

            if ($insert) {
                $scholarship_id = $this->db->insert_id();

                // Insert education background data into scholarship_edu_bg
                if (!empty($education_background)) {
                    $this->db->trans_start();
                    foreach ($education_background as $edu) {
                        $this->db->insert('scholarship_edu_bg', array(
                            'scholarship_id' => $scholarship_id,
                            'education_level' => $edu['level'],
                            'school_name' => $edu['school_name'],
                            'year_graduated' => $edu['year_graduate'],
                            'honors_received' => $edu['honors']
                        ));
                    }
                    $this->db->trans_complete();
                }

                // Insert siblings data into scholarship_siblings
                if (!empty($siblings_info)) {
                    $this->db->trans_start();
                    foreach ($siblings_info as $sibling) {
                        $this->db->insert('scholarship_siblings', array(
                            'scholarship_id' => $scholarship_id,
                            'sibling_name' => $sibling['name'],
                            'sibling_age' => $sibling['age'],
                            'sibling_course' => $sibling['course'],
                            'sibling_school' => $sibling['school']
                        ));
                    }
                    $this->db->trans_complete();
                }
                
                $this->session->set_flashdata('success', 'Scholarship application submitted successfully.');
                redirect(base_url('admin/scholarships'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                redirect(base_url('admin/scholarship/create'));
            }
        }
    }

    // Edit
    public function edit($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['scholarship'] = $this->ScholarshipModel->get_scholarship_by_id($id);
        
        if (empty($data['scholarship'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/scholarship/edit', $data);
        $this->load->view('partials/footer');
    }

    //Update
    public function update($id)
    {
        $this->form_validation->set_rules('scholarship_name', 'Scholarship Name', 'required|trim');
        $this->form_validation->set_rules('scholarship_type', 'Scholarship Type', 'required');
        $this->form_validation->set_rules('student_id', 'Student ID', 'required|trim');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('year_level', 'Year Level', 'required');
        $this->form_validation->set_rules('school_year', 'School Year', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('application_date', 'Application Date', 'required');

        // Check if form validation passes
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            // Prepare data for updating the scholarship
            $data = array(
                'scholarship_name' => $this->input->post('scholarship_name'),
                'scholarship_type' => $this->input->post('scholarship_type'),
                'student_id' => $this->input->post('student_id'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'gender' => $this->input->post('gender'),
                'course' => $this->input->post('course'),
                'year_level' => $this->input->post('year_level'),
                'section' => $this->input->post('section'),
                'school_year' => $this->input->post('school_year'),
                'semester' => $this->input->post('semester'),
                'gpa' => $this->input->post('gpa'),
                'family_income' => $this->input->post('family_income'),
                'family_size' => $this->input->post('family_size'),
                'father_name' => $this->input->post('father_name'),
                'father_occupation' => $this->input->post('father_occupation'),
                'mother_name' => $this->input->post('mother_name'),
                'mother_occupation' => $this->input->post('mother_occupation'),
                'guardian_name' => $this->input->post('guardian_name'),
                'guardian_contact' => $this->input->post('guardian_contact'),
                'guardian_relationship' => $this->input->post('guardian_relationship'),
                'address' => $this->input->post('address'),
                'barangay' => $this->input->post('barangay'),
                'municipality' => $this->input->post('municipality'),
                'province' => $this->input->post('province'),
                'contact_number' => $this->input->post('contact_number'),
                'email' => $this->input->post('email'),
                'application_date' => $this->input->post('application_date'),
                'application_status' => $this->input->post('application_status'),
                'approved_by' => $this->input->post('approved_by'),
                'approval_date' => $this->input->post('approval_date'),
                'amount_granted' => $this->input->post('amount_granted'),
                'terms_conditions' => $this->input->post('terms_conditions'),
                'requirements_submitted' => $this->input->post('requirements_submitted'),
                'remarks' => $this->input->post('remarks'),
            );

            // Update the scholarship data in the database
            $updateResult = $this->ScholarshipModel->update_scholarship($id, $data);

            // Check if the update was successful
            if ($updateResult) {
                $this->session->set_flashdata('success', 'Scholarship application updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }
            redirect($_SERVER['HTTP_REFERER']);

        }
    }

    // AJAX endpoint to get student details
    public function get_student_details()
    {
        // Set content type to JSON
        header('Content-Type: application/json');
        
        try {
            $student_id = $this->input->post('student_id');
            
            if (!$student_id) {
                echo json_encode(['success' => false, 'message' => 'Student ID is required']);
                return;
            }
            
            $student = $this->StudentModel->get_student_by_id($student_id);
            
            if ($student) {
                echo json_encode([
                    'success' => true,
                    'student' => [
                        'student_id' => $student->student_id,
                        'first_name' => $student->first_name,
                        'middle_name' => $student->middle_name,
                        'last_name' => $student->last_name,
                        'date_of_birth' => $student->date_of_birth,
                        'gender' => $student->gender,
                        'course' => $student->course,
                        'year_level' => $student->year_level,
                        'section' => $student->section,
                        'school_year' => $student->school_year,
                        'guardian_name' => $student->guardian_name,
                        'guardian_contact' => $student->guardian_contact,
                        'contact_number' => $student->guardian_contact,
                        'email' => '',
                        'address' => isset($student->address) ? $student->address : '',
                        'father_name' => '', // These fields don't exist in students table
                        'father_occupation' => '',
                        'mother_name' => '',
                        'mother_occupation' => '',
                        'religion' => '' // Religion field doesn't exist in students table
                    ]
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Student not found']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    // View
    public function view($id)
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();

        $data['scholarship'] = $this->ScholarshipModel->get_scholarship_by_id($id);
        
        if (empty($data['scholarship'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/scholarship/view', $data);
        $this->load->view('partials/footer');
    }
}
