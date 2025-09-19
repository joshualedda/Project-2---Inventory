<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScholarshipModel extends CI_Model
{
    /**
     * Insert a new scholarship application.
     *
     * @param array $scholarshipData
     * @return bool
     */
    public function insert_scholarship(array $scholarshipData)
    {
        return $this->db->insert('scholarships', $scholarshipData);
    }

    /**
     * Get all scholarship applications.
     *
     * @return array
     */
    public function get_all_scholarships()
    {
        $this->db->select('sch.*, st.first_name, st.middle_name, st.last_name, st.year_level, c.course as course_name, sp.scholarship_name');
        $this->db->from('scholarships sch');
        $this->db->join('students st', 'sch.student_id = st.student_id', 'left');
        $this->db->join('courses c', 'st.course_id = c.id', 'left');
        $this->db->join('scholarship_programs sp', 'sch.scholarship_id = sp.id', 'left');
        $this->db->order_by('sch.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get a scholarship by ID.
     *
     * @param int $id
     * @return object|null
     */
    public function get_scholarship_by_id($id)
    {
        $query = $this->db->get_where('scholarships', array('id' => $id));
        return $query->row();
    }

    /**
     * Update a scholarship record.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_scholarship($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('scholarships', $data);
    }

    /**
     * Delete a scholarship record.
     *
     * @param int $id
     * @return bool
     */
    public function delete_scholarship($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('scholarships');
    }

    /**
     * Get scholarships by status.
     *
     * @param string $status
     * @return array
     */
    public function get_scholarships_by_status($status)
    {
        $query = $this->db->get_where('scholarships', array('application_status' => $status));
        return $query->result();
    }

    /**
     * Get scholarships by type.
     *
     * @param string $type
     * @return array
     */
    public function get_scholarships_by_type($type)
    {
        $query = $this->db->get_where('scholarships', array('scholarship_type' => $type));
        return $query->result();
    }

    /**
     * Get scholarships by student ID.
     *
     * @param string $student_id
     * @return array
     */
    public function get_scholarships_by_student($student_id)
    {
        $query = $this->db->get_where('scholarships', array('student_id' => $student_id));
        return $query->result();
    }

    /**
     * Update scholarship status.
     *
     * @param int $id
     * @param string $status
     * @param string $approved_by
     * @param float $amount_granted
     * @return bool
     */
    public function update_scholarship_status($id, $status, $approved_by = null, $amount_granted = null)
    {
        $data = array(
            'application_status' => $status,
            'approval_date' => date('Y-m-d')
        );

        if ($approved_by) {
            $data['approved_by'] = $approved_by;
        }

        if ($amount_granted) {
            $data['amount_granted'] = $amount_granted;
        }

        $this->db->where('id', $id);
        return $this->db->update('scholarships', $data);
    }

    /**
     * Get scholarship statistics.
     *
     * @return array
     */
    public function get_scholarship_statistics()
    {
        $stats = array();

        // Total applications
        $stats['total'] = $this->db->count_all('scholarships');

        // Applications by status
        $this->db->select('application_status, COUNT(*) as count');
        $this->db->group_by('application_status');
        $query = $this->db->get('scholarships');
        $stats['by_status'] = $query->result();

        // Applications by type
        $this->db->select('scholarship_type, COUNT(*) as count');
        $this->db->group_by('scholarship_type');
        $query = $this->db->get('scholarships');
        $stats['by_type'] = $query->result();

        return $stats;
    }

    /**
     * Get all students for dropdown selection.
     *
     * @return array
     */
    public function get_students_for_dropdown()
    {
        $this->db->select('s.id, s.student_id, s.first_name, s.middle_name, s.last_name, s.course_id, s.year_level, c.course as course_name');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('s.status', 0); // Only active students
        $this->db->order_by('s.last_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get student details by ID.
     *
     * @param int $student_id
     * @return object|null
     */
    public function get_student_details($student_id)
    {
        $query = $this->db->get_where('students', array('id' => $student_id));
        return $query->row();
    }

    /**
     * Get scholarship with related data (education background and siblings).
     *
     * @param int $id
     * @return object|null
     */
    public function get_scholarship_with_related_data($id)
    {
        $scholarship = $this->get_scholarship_by_id($id);
        
        if ($scholarship) {
            // Load education background
            $scholarship->education_background = $this->ScholarshipEducationModel->get_education_background($id);
            
            // Load siblings
            $scholarship->siblings = $this->ScholarshipSiblingsModel->get_siblings($id);
        }
        
        return $scholarship;
    }

    /**
     * Update scholarship with related data.
     *
     * @param int $id
     * @param array $data
     * @param array $education_background
     * @param array $siblings_info
     * @return bool
     */
    public function update_scholarship_with_related_data($id, $data, $education_background = null, $siblings_info = null)
    {
        $this->db->trans_start();
        
        // Update main scholarship record
        $this->update_scholarship($id, $data);
        
        // Update education background if provided
        if ($education_background !== null) {
            $this->ScholarshipEducationModel->insert_education_background($id, $education_background);
        }
        
        // Update siblings if provided
        if ($siblings_info !== null) {
            $this->ScholarshipSiblingsModel->insert_siblings($id, $siblings_info);
        }
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
