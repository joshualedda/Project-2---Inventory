<?php
class CourseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all courses
     */
    public function get_all_courses()
    {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->order_by('course', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get course by ID
     */
    public function get_course_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('courses');
        return $query->row_array();
    }

    /**
     * Create new course
     */
    public function create_course($data)
    {
        return $this->db->insert('courses', $data);
    }

    /**
     * Update course
     */
    public function update_course($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('courses', $data);
    }

    /**
     * Delete course
     */
    public function delete_course($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('courses');
    }

    /**
     * Get students by course ID
     */
    public function get_students_by_course_id($course_id)
    {
        $this->db->select('s.*, c.course as course_name');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('s.course_id', $course_id);
        $this->db->order_by('s.first_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get courses for dropdown
     */
    public function get_courses_for_dropdown()
    {
        $this->db->select('id, course, description');
        $this->db->from('courses');
        $this->db->where('status', 0); // Only active courses
        $this->db->order_by('course', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Check if course name exists (for validation)
     */
    public function course_name_exists($course_name, $exclude_id = null)
    {
        $this->db->where('course', $course_name);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get('courses');
        return $query->num_rows() > 0;
    }

    /**
     * Get course statistics
     */
    public function get_course_statistics()
    {
        $stats = array();
        
        // Total courses
        $stats['total_courses'] = $this->db->count_all('courses');
        
        // Active courses
        $this->db->where('status', 0);
        $stats['active_courses'] = $this->db->count_all_results('courses');
        
        // Inactive courses
        $this->db->where('status', 1);
        $stats['inactive_courses'] = $this->db->count_all_results('courses');
        
        // Students per course
        $this->db->select('c.course, COUNT(s.id) as student_count');
        $this->db->from('courses c');
        $this->db->join('students s', 'c.id = s.course_id', 'left');
        $this->db->group_by('c.id, c.course');
        $this->db->order_by('student_count', 'DESC');
        $query = $this->db->get();
        $stats['students_per_course'] = $query->result_array();
        
        return $stats;
    }
}
