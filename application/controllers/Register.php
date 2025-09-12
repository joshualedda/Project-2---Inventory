<?php
class Register extends CI_Controller
{
        // if login redirect to dashboard
        private function redirect_if_logged_in()
        {
                if ($this->session->userdata('logged_in')) {
                        if ($this->session->userdata('role') == 0) {
                                redirect('user/dashboard');
                        } elseif ($this->session->userdata('role') == 1) {
                                redirect('dashboard');
                        }
                }
        }

        public function index()
        {
                $this->redirect_if_logged_in();

                $this->load->view('partials/header');
                $this->load->view('auth/register');
                $this->load->view('partials/footer');
        }

        public function register_user()
        {
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('employee_no', 'Employee No.', 'required|numeric|is_unique[users.employee_no]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

                if ($this->form_validation->run() == FALSE) {
                        $this->index();
                } else {
                        $data = array(
                                'first_name' => $this->input->post('first_name'),
                                'last_name' => $this->input->post('last_name'),
                                'email' => $this->input->post('email'),
                                'employee_no' => $this->input->post('employee_no'),
                                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                        );

                        $insert = $this->User->insert_user($data);

                        if ($insert) {
                                $this->session->set_flashdata('success', 'Registration Successfull.');
                                redirect('register');
                        } else {
                                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                                redirect('register');
                        }
                }
        }
}
