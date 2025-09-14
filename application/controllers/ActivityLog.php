<?php
class ActivityLog extends CI_Controller
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
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/activitylog/index');
        $this->load->view('partials/footer');
    }

    // View
    public function view()
    {
        $this->redirectIfUnauthorized();
        $this->prepareUserData();
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/activitylog/view');
        $this->load->view('partials/footer');
    }
}
