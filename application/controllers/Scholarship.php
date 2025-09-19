<?php
class Scholarship extends MY_Controller
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

        $data['scholarships'] = $this->ScholarshipModel->get_all_scholarships();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarship/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->auto_check_access();
        $this->prepareUserData();

        $data['students'] = $this->ScholarshipModel->get_students_for_dropdown();
        $data['scholarship_programs'] = $this->ScholarshipProgramModel->get_all_programs();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
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
            // Return JSON response for AJAX
            if ($this->input->is_ajax_request()) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'success' => false,
                        'message' => 'Validation failed',
                        'errors' => validation_errors_array()
                    ]));
                return;
            }
            $this->create();
        } else {
            // Get selected student details (internal row id from select)
            $selected_student_row_id = $this->input->post('student_id');
            $student_details = $this->StudentModel->get_student_by_id($selected_student_row_id);
            
            if (!$student_details) {
                if ($this->input->is_ajax_request()) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode([
                            'success' => false,
                            'message' => 'Selected student not found.'
                        ]));
                    return;
                }
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
                
                if ($this->input->is_ajax_request()) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode([
                            'success' => true,
                            'message' => 'Scholarship application submitted successfully.'
                        ]));
                    return;
                }
                
                $this->session->set_flashdata('success', 'Scholarship application submitted successfully.');
                redirect(base_url('admin/scholarships'));
            } else {
                if ($this->input->is_ajax_request()) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode([
                            'success' => false,
                            'message' => 'Something went wrong. Please try again.'
                        ]));
                    return;
                }
                
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
        $data['scholarship_programs'] = $this->ScholarshipProgramModel->get_all_programs();
        
        if (empty($data['scholarship'])) {
            show_404();
        }

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarship/edit', $data);
        $this->load->view('partials/footer');
    }

    //Update
    public function update($id)
    {
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
            $this->edit($id);
            return;
        }

        $data = array(
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
            'application_status' => $this->input->post('application_status') ?: 'Pending',
        );

        $updateResult = $this->ScholarshipModel->update_scholarship($id, $data);

        if ($updateResult) {
            $this->session->set_flashdata('success', 'Scholarship application updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        }
        redirect('admin/scholarships');
    }

    public function delete($id)
    {
        $this->auto_check_access();
        $sch = $this->ScholarshipModel->get_scholarship_by_id($id);
        if (!$sch) {
            $this->session->set_flashdata('error', 'Record not found.');
            redirect('admin/scholarships');
        }

        // Optionally delete related rows
        $this->db->where('scholarship_id', $id)->delete('scholarship_edu_bg');
        $this->db->where('scholarship_id', $id)->delete('scholarship_siblings');

        if ($this->ScholarshipModel->delete_scholarship($id)) {
            $this->session->set_flashdata('success', 'Scholarship deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete scholarship.');
        }
        redirect('admin/scholarships');
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
                        'course_id' => $student->course_id,
                        'course_name' => $student->course_name,
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
        $this->loadLayoutPartials();
        $this->load->view('admin/scholarship/view', $data);
        $this->load->view('partials/footer');
    }
}
