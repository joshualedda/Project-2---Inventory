<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('home');
		$this->load->view('partials/footer');
	}
	public function about()
	{
		$this->load->view('partials/header');
		$this->load->view('about');
		$this->load->view('partials/footer');
	}
}
