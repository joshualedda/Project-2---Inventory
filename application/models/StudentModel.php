<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
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

    /**
     * Get a student by ID.
     *
     * @param int $id
     * @return object|null
     */
    public function get_student_by_id($id)
    {
        $query = $this->db->get_where('students', array('id' => $id));
        return $query->row();
    }

    /**
     * Update a student record.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_student($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }
}


