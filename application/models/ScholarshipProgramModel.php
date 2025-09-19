<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScholarshipProgramModel extends CI_Model
{
    /**
     * Insert a new scholarship program.
     *
     * @param array $programData
     * @return bool
     */
    public function insert_program(array $programData)
    {
        return $this->db->insert('scholarship_programs', $programData);
    }

    /**
     * Get all scholarship programs.
     *
     * @return array
     */
    public function get_all_programs()
    {
        $this->db->order_by('scholarship_name', 'ASC');
        $query = $this->db->get('scholarship_programs');
        return $query->result();
    }

    /**
     * Get a scholarship program by ID.
     *
     * @param int $id
     * @return object|null
     */
    public function get_program_by_id($id)
    {
        $query = $this->db->get_where('scholarship_programs', array('id' => $id));
        return $query->row();
    }

    /**
     * Update a scholarship program record.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_program($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('scholarship_programs', $data);
    }

    /**
     * Delete a scholarship program record.
     *
     * @param int $id
     * @return bool
     */
    public function delete_program($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('scholarship_programs');
    }

    /**
     * Get programs by type.
     *
     * @param int $type
     * @return array
     */
    public function get_programs_by_type($type)
    {
        $query = $this->db->get_where('scholarship_programs', array('type' => $type));
        return $query->result();
    }

    /**
     * Get programs by source.
     *
     * @param string $source
     * @return array
     */
    public function get_programs_by_source($source)
    {
        $query = $this->db->get_where('scholarship_programs', array('source' => $source));
        return $query->result();
    }

    /**
     * Get program statistics.
     *
     * @return array
     */
    public function get_program_statistics()
    {
        $stats = array();

        // Total programs
        $stats['total'] = $this->db->count_all('scholarship_programs');

        // Programs by type
        $this->db->select('type, COUNT(*) as count');
        $this->db->group_by('type');
        $query = $this->db->get('scholarship_programs');
        $stats['by_type'] = $query->result();

        // Programs by source
        $this->db->select('source, COUNT(*) as count');
        $this->db->group_by('source');
        $query = $this->db->get('scholarship_programs');
        $stats['by_source'] = $query->result();

        return $stats;
    }

    /**
     * Search programs by name or description.
     *
     * @param string $search_term
     * @return array
     */
    public function search_programs($search_term)
    {
        $this->db->like('scholarship_name', $search_term);
        $this->db->or_like('description', $search_term);
        $this->db->or_like('source', $search_term);
        $query = $this->db->get('scholarship_programs');
        return $query->result();
    }
}
