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
        $this->db->select('s.*, c.course as course_name');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->order_by('s.first_name', 'ASC');
        $query = $this->db->get();
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
        $this->db->select('s.*, c.course as course_name');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('s.id', $id);
        $query = $this->db->get();
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


