<?php
class ClinicDashboard extends MY_Controller
{
    private function loadLayoutPartials()
    {
        $this->load->view('partials/clinic/sidebar');
        $this->load->view('partials/clinic/navbar');
    }

    public function index()
    {
        $this->check_login();

        $this->load->view('partials/header');
        $this->loadLayoutPartials();
        $this->load->view('clinic/dashboard');
        $this->load->view('partials/footer');
    }
}


