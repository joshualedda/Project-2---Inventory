<?php
class Login extends CI_Controller
{
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
        $this->load->view('partials/header');
        $this->load->view('auth/login');
        $this->load->view('partials/footer');
    }

    // Login
    public function authenticate()
    {
        $result = $this->User->loginUser();

        if ($result['success']) {
            $user = $result['user'];

            $user_data = array(
                'id' => $user['id'],
                'role_id' => $user['role_id'],
                'logged_in' => true
            );

            $this->session->set_userdata($user_data);

            if ($user['role_id'] == 0) {
                redirect('user/dashboard'); // Redirect user to their dashboard
            } elseif ($user['role_id'] == 1) {
                redirect('dashboard'); // Redirect admin to admin dashboard
            }
        } else {
            $data['error_message'] = $result['error'];
            $this->load->view('partials/header');
            $this->load->view('auth/login', $data);
            $this->load->view('partials/footer');
        }
    }

    // register
    public function logout()
    {
        // Destroy session and redirect to login
        $this->session->sess_destroy();
        redirect('login');
    }
}
