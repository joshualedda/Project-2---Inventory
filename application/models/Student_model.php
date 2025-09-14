<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $studentData['created_at'] = isset($studentData['created_at']) ? $studentData['created_at'] : date('Y-m-d H:i:s');
        return $this->db->insert('students', $studentData);
    }
}


