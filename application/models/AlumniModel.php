<?php
class AlumniModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select('a.*, s.student_id as sid, s.first_name, s.last_name, c.course as course_name');
        $this->db->from('alumni a');
        $this->db->join('students s', 'a.student_id = s.id', 'left');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('s.status', 'Graduated'); // ✅ only graduated students
        $this->db->order_by('a.graduation_year', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_by_id($id)
    {
        return $this->db->get_where('alumni', ['id' => $id])->row_array();
    }

    public function get_detailed_by_id($id)
    {
        $this->db->select('a.*, s.student_id as sid, s.first_name, s.last_name, c.course as course_name');
        $this->db->from('alumni a');
        $this->db->join('students s', 'a.student_id = s.id', 'left');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('a.id', $id);
        return $this->db->get()->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('alumni', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('alumni', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('alumni');
    }

    public function get_students_for_dropdown()
    {
        $this->db->select('s.id, s.student_id, s.first_name, s.last_name, c.course as course_name, s.year_level');
        $this->db->from('students s');
        $this->db->join('courses c', 's.course_id = c.id', 'left');
        $this->db->where('s.status', 0);
        $this->db->order_by('s.last_name', 'ASC');
        return $this->db->get()->result();
    }

    public function get_statistics()
    {
        $stats = array();

        // Total alumni
        $stats['total_alumni'] = $this->db->count_all('alumni');

        // Employed count
        $this->db->where('employment_status', 'Employed');
        $stats['total_employed'] = $this->db->count_all_results('alumni');

        // Unemployed count
        $this->db->where('employment_status', 'Unemployed');
        $stats['total_unemployed'] = $this->db->count_all_results('alumni');

        // Students by status (requires enum values in students.status)
        $this->db->select('status, COUNT(*) as count');
        $this->db->from('students');
        $this->db->group_by('status');
        $rows = $this->db->get()->result_array();
        $byStatus = array();
        foreach ($rows as $row) {
            $byStatus[$row['status']] = (int) $row['count'];
        }
        $stats['total_enrolled'] = $byStatus['Enrolled'] ?? 0;
        $stats['total_graduated'] = $byStatus['Graduated'] ?? 0;
        $stats['total_students_alumni'] = $byStatus['Alumni'] ?? 0;

        return $stats;
    }
}
?>