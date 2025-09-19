<?php
class Course extends MY_Controller
{
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

        $data['courses'] = $this->CourseModel->get_all_courses();
        $data['statistics'] = $this->CourseModel->get_course_statistics();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/course/index', $data);
        $this->load->view('partials/footer');
    }

    public function create()
    {
        $this->check_admin_access();
        $this->prepareUserData();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/course/create');
        $this->load->view('partials/footer');
    }

    public function store()
    {
        $this->check_admin_access();

        // Set validation rules
        $this->form_validation->set_rules('course', 'Course Name', 'required|trim|is_unique[courses.course]');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error_message', validation_errors());
            redirect('admin/course/create');
        }

        $data = array(
            'course' => $this->input->post('course'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        if ($this->CourseModel->create_course($data)) {
            $this->session->set_flashdata('success', 'Course created successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to create course.');
        }

        redirect('admin/courses');
    }

    public function edit($id)
    {
        $this->check_admin_access();
        $this->prepareUserData();

        $data['course'] = $this->CourseModel->get_course_by_id($id);

        if (!$data['course']) {
            $this->session->set_flashdata('error_message', 'Course not found.');
            redirect('admin/courses');
        }

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/course/edit', $data);
        $this->load->view('partials/footer');
    }

    public function update($id)
    {
        $this->check_admin_access();

        // Check if course exists
        $course = $this->CourseModel->get_course_by_id($id);
        if (!$course) {
            $this->session->set_flashdata('error_message', 'Course not found.');
            redirect('admin/courses');
        }

        // Set validation rules
        $this->form_validation->set_rules('course', 'Course Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error_message', validation_errors());
            redirect('admin/course/edit/' . $id);
        }

        // Check if course name is unique (excluding current course)
        $course_name = $this->input->post('course');
        if ($course_name !== $course['course'] && $this->CourseModel->course_name_exists($course_name, $id)) {
            $this->session->set_flashdata('error_message', 'Course name already exists.');
            redirect('admin/course/edit/' . $id);
        }

        $data = array(
            'course' => $course_name,
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        if ($this->CourseModel->update_course($id, $data)) {
            $this->session->set_flashdata('success_message', 'Course updated successfully.');
        } else {
            $this->session->set_flashdata('error_message', 'Failed to update course.');
        }

        redirect('admin/courses');
    }

    public function view($id)
    {
        $this->check_admin_access();
        $this->prepareUserData();

        $data['course'] = $this->CourseModel->get_course_by_id($id);

        if (!$data['course']) {
            $this->session->set_flashdata('error_message', 'Course not found.');
            redirect('admin/courses');
        }

        $data['students'] = $this->CourseModel->get_students_by_course_id($id);

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('admin/course/view', $data);
        $this->load->view('partials/footer');
    }

    public function delete($id)
    {
        $this->check_admin_access();

        $course = $this->CourseModel->get_course_by_id($id);
        if (!$course) {
            $this->session->set_flashdata('error_message', 'Course not found.');
            redirect('admin/courses');
        }

        // Check if course has students
        $students = $this->CourseModel->get_students_by_course_id($id);
        if (!empty($students)) {
            $this->session->set_flashdata('error_message', 'Cannot delete course. It has associated students.');
            redirect('admin/courses');
        }

        if ($this->CourseModel->delete_course($id)) {
            $this->session->set_flashdata('success_message', 'Course deleted successfully.');
        } else {
            $this->session->set_flashdata('error_message', 'Failed to delete course.');
        }

        redirect('admin/courses');
    }
}
