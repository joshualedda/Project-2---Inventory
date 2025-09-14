<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    /**
     * Insert a new student row.
     *
     * @param array $studentData
     * @return bool
     */
    public function insert_student(array $studentData)
    {
        return $this->db->insert('students', $studentData);
    }
    
        public function get_all_students()
    {
        $query = $this->db->get('students');
        return $query->result();
    }
}


