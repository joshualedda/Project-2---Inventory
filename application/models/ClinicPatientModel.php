<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClinicPatientModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($status = null)
    {
        $this->db->select('cp.*, s.first_name, s.last_name, s.student_id as sid');
        $this->db->from('clinic_patients cp');
        $this->db->join('students s', 'cp.student_id = s.id', 'left');
        if ($status !== null) {
            $this->db->where('cp.status', $status);
        }
        $this->db->order_by('cp.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->select('cp.*, s.first_name, s.last_name, s.student_id as sid');
        $this->db->from('clinic_patients cp');
        $this->db->join('students s', 'cp.student_id = s.id', 'left');
        $this->db->where('cp.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function create($data)
    {
        return $this->db->insert('clinic_patients', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('clinic_patients', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('clinic_patients');
    }

    public function get_students_dropdown()
    {
        $this->db->select('s.id, s.first_name, s.last_name, s.student_id');
        $this->db->from('students s');
        $this->db->order_by('s.last_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_statistics()
    {
        $stats = array();

        // Total visits = total rows
        $stats['total_visits'] = $this->db->count_all('clinic_patients');

        // Unique students who visited
        $this->db->select('COUNT(DISTINCT student_id) as unique_students');
        $query = $this->db->get('clinic_patients');
        $row = $query->row_array();
        $stats['unique_students'] = isset($row['unique_students']) ? (int)$row['unique_students'] : 0;

        // Male count
        $this->db->where('sex', 'Male');
        $stats['male_count'] = $this->db->count_all_results('clinic_patients');

        // Female count
        $this->db->where('sex', 'Female');
        $stats['female_count'] = $this->db->count_all_results('clinic_patients');

        return $stats;
    }

    public function get_student_visit_count($student_id)
    {
        $this->db->where('student_id', (int)$student_id);
        return $this->db->count_all_results('clinic_patients');
    }
}


