<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
    }

    /**
     * Check if user has access to admin area
     */
    protected function check_admin_access()
    {
        if (!check_office_access('admin', $this)) {
            redirect_with_toast(
                $this, 
                'Access Denied: You do not have permission to access the admin area.', 
                'error'
            );
        }
    }

    /**
     * Check if user has access to scholar area
     */
    protected function check_scholar_access()
    {
        if (!check_office_access('scholar', $this)) {
            redirect_with_toast(
                $this, 
                'Access Denied: You do not have permission to access the scholar area.', 
                'error'
            );
        }
    }

    protected function check_clinic_access()
    {
        if (!check_office_access('clinic', $this)) {
            redirect_with_toast(
                $this, 
                'Access Denied: You do not have permission to access the clinic area.', 
                'error'
            );
        }
    }
    /**
     * Check if user is logged in
     */
    protected function check_login()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    /**
     * Get current user's office
     */
    protected function get_user_office()
    {
        return $this->session->userdata('office');
    }

    /**
     * Check if current URL requires admin access
     */
    protected function is_admin_route()
    {
        $current_uri = $this->uri->segment(1);
        return $current_uri === 'admin';
    }

    /**
     * Check if current URL requires scholar access
     */
    protected function is_scholar_route()
    {
        $current_uri = $this->uri->segment(1);
        return $current_uri === 'scholar';
    }

    protected function is_clinic_route()
    {
        $current_uri = $this->uri->segment(1);
        return $current_uri === 'clinic';
    }

    /**
     * Auto-check access based on current route
     */
    protected function auto_check_access()
    {
        $this->check_login();
        
        if ($this->is_admin_route()) {
            $this->check_admin_access();
        } elseif ($this->is_scholar_route()) {
            $this->check_scholar_access();
        } elseif ($this->is_clinic_route()) {
            $this->check_clinic_access();
        }
    }
}
