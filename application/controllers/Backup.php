<?php
class Backup extends CI_Controller
{
	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('partials/navbar');
		$this->load->view('admin/backup/index');
		$this->load->view('partials/footer');
	}

	public function backupData()
	{
		$this->load->dbutil();

		$tables = $this->db->list_tables();

		$prefs = [
			'tables'     => $tables,
			'format'     => 'txt',
			'add_drop'   => TRUE,
			'add_insert' => TRUE,
			'newline'    => "\n"
		];

		$backup = $this->dbutil->backup($prefs);

		$fileName = 'backup' . '.sql';
		$filePath = FCPATH . 'assets/database/' . $fileName;

		$this->load->helper('file');
		if (write_file($filePath, $backup)) {
			$this->session->set_flashdata('success', 'Database backup created successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to create database backup.');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}



	public function restoreData()
	{
		$this->load->helper('file');
		$this->load->dbutil();

		$filePath = FCPATH . 'assets/database/backup.sql';

		if (!file_exists($filePath)) {
			echo json_encode(['status' => 'error', 'message' => 'Backup file not found.']);
			return;
		}

		$backupContent = read_file($filePath);

		$this->db->trans_start();
		$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');

		$queries = explode(';', $backupContent);
		foreach ($queries as $query) {
			if (trim($query) != '') {
				if (!$this->db->simple_query($query . ';')) {
					$this->db->trans_rollback();
					echo json_encode(['status' => 'error', 'message' => 'Error restoring the database.']);
					return;
				}
			}
		}

		$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('errorRestore', 'Database Not Found. Please Try Again.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('successRestore', 'Database Succesfully Restored.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
