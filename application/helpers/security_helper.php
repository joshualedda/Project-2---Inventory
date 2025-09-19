<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_office_access')) {
    /**
     * Check if user has access to the requested area based on their office
     * 
     * @param string $required_office The office required to access the area ('admin' or 'scholar')
     * @param object $CI CodeIgniter instance
     * @return bool True if access is allowed, false otherwise
     */
    function check_office_access($required_office, $CI) {
        // Check if user is logged in
        if (!$CI->session->userdata('logged_in')) {
            return false;
        }
        
        $user_office = $CI->session->userdata('office');
        
        // Check if user's office matches the required office
        return $user_office === $required_office;
    }
}

if (!function_exists('redirect_with_toast')) {
    /**
     * Redirect user with toast notification
     * 
     * @param object $CI CodeIgniter instance
     * @param string $message Toast message
     * @param string $type Toast type (success, error, warning, info)
     * @param string $redirect_url URL to redirect to
     */
    function redirect_with_toast($CI, $message, $type = 'error', $redirect_url = null) {
        // Set flash data for toast notification
        $CI->session->set_flashdata('toast_message', $message);
        $CI->session->set_flashdata('toast_type', $type);
        
        // Determine redirect URL
        if ($redirect_url === null) {
            $user_office = $CI->session->userdata('office');
            if ($user_office === 'admin') {
                $redirect_url = base_url('user/dashboard');
            } elseif ($user_office === 'scholar') {
                $redirect_url = base_url('scholar/dashboard');
            } else {
                $redirect_url = base_url('login');
            }
        }
        
        redirect($redirect_url);
    }
}

if (!function_exists('get_office_redirect_url')) {
    /**
     * Get the appropriate redirect URL based on user's office
     * 
     * @param object $CI CodeIgniter instance
     * @return string Redirect URL
     */
    function get_office_redirect_url($CI) {
        $user_office = $CI->session->userdata('office');
        
        if ($user_office === 'admin') {
            return base_url('user/dashboard');
        } elseif ($user_office === 'scholar') {
            return base_url('scholar/dashboard');
        } else {
            return base_url('login');
        }
    }
}
