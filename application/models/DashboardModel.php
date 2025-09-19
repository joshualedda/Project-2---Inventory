<?php
class DashboardModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get total scholarship programs count
     */
    public function get_total_programs()
    {
        $this->db->from('scholarship_programs');
        return $this->db->count_all_results();
    }

    /**
     * Get total students count
     */
    public function get_total_students()
    {
        $this->db->from('students');
        return $this->db->count_all_results();
    }

    /**
     * Get students count by course
     */
    public function get_students_by_course()
    {
        $this->db->select('c.course, COUNT(s.id) as count');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->group_by('c.id, c.course');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get total scholarships count
     */
    public function get_total_scholarships()
    {
        $this->db->from('scholarships');
        return $this->db->count_all_results();
    }

    /**
     * Get scholarships by status
     */
    public function get_scholarships_by_status()
    {
        $this->db->select('status, COUNT(*) as count');
        $this->db->from('scholarships');
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get total users count
     */
    public function get_total_users()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    /**
     * Get users by office
     */
    public function get_users_by_office()
    {
        $this->db->select('office, COUNT(*) as count');
        $this->db->from('users');
        $this->db->group_by('office');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get recent students (last 5)
     */
    public function get_recent_students($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get recent scholarships (last 5)
     */
    public function get_recent_scholarships($limit = 5)
    {
        $this->db->select('s.*, sp.scholarship_name, st.first_name, st.last_name');
        $this->db->from('scholarships s');
        $this->db->join('scholarship_programs sp', 's.scholarship_id = sp.id', 'left');
        $this->db->join('students st', 's.student_id = st.id', 'left');
        $this->db->order_by('s.created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get dashboard statistics for admin
     */
    public function get_admin_dashboard_stats()
    {
        $stats = array();
        
        // Total programs
        $stats['total_programs'] = $this->get_total_programs();
        
        // Total students
        $stats['total_students'] = $this->get_total_students();
        
        // Students by course
        $students_by_course = $this->get_students_by_course();
        $stats['students_by_course'] = array();
        if (!empty($students_by_course)) {
            foreach ($students_by_course as $course) {
                if (isset($course['course']) && isset($course['count'])) {
                    $stats['students_by_course'][$course['course']] = $course['count'];
                }
            }
        }
        
        // Total scholarships
        $stats['total_scholarships'] = $this->get_total_scholarships();
        
        // Recent students
        $stats['recent_students'] = $this->get_recent_students();
        
        return $stats;
    }

    /**
     * Get dashboard statistics for user dashboard
     */
    public function get_user_dashboard_stats()
    {
        $stats = array();
        
        // Extension projects (using scholarships as proxy)
        $this->db->where('status', 0); // Assuming 0 = proposal/extension
        $stats['extension_projects'] = $this->db->count_all_results('scholarships');
        
        // Research studies (using scholarships as proxy)
        $this->db->where('status', 1); // Assuming 1 = evaluation/research
        $stats['research_studies'] = $this->db->count_all_results('scholarships');
        
        // AQA quality checks (using scholarships as proxy)
        $this->db->where('status', 2); // Assuming 2 = ongoing/quality check
        $stats['aqa_checks'] = $this->db->count_all_results('scholarships');
        
        // Planning strategies (using scholarships as proxy)
        $this->db->where('status', 3); // Assuming 3 = completed/planning
        $stats['planning_strategies'] = $this->db->count_all_results('scholarships');
        
        // FO1-FO4 inventory (using different statuses or categories)
        $stats['fo1_inventory'] = $this->get_total_scholarships(); // Total as FO1
        $stats['fo2_inventory'] = $this->get_total_students(); // Students as FO2
        $stats['fo3_inventory'] = $this->get_total_programs(); // Programs as FO3
        $stats['fo4_inventory'] = $this->get_total_users(); // Users as FO4
        
        // Recent files/research
        $stats['recent_files'] = $this->get_recent_scholarships();
        
        return $stats;
    }

    /**
     * Get dashboard statistics for scholar dashboard
     */
    public function get_scholar_dashboard_stats()
    {
        $stats = array();
        
        // Scholar-specific statistics
        $stats['total_scholarships'] = $this->get_total_scholarships();
        $stats['total_programs'] = $this->get_total_programs();
        $stats['total_students'] = $this->get_total_students();
        
        // Recent scholarships
        $stats['recent_scholarships'] = $this->get_recent_scholarships();
        
        return $stats;
    }
}
