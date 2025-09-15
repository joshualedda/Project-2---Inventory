<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScholarshipSiblingsModel extends CI_Model
{
    /**
     * Insert siblings records for a scholarship
     *
     * @param int $scholarship_id
     * @param array $siblings_data
     * @return bool
     */
    public function insert_siblings($scholarship_id, $siblings_data)
    {
        $this->db->trans_start();
        
        // Delete existing siblings for this scholarship
        $this->db->where('scholarship_id', $scholarship_id);
        $this->db->delete('scholarship_siblings');
        
        // Insert new siblings records
        if (!empty($siblings_data)) {
            foreach ($siblings_data as $sibling) {
                if (!empty($sibling['name'])) { // Only insert if name is provided
                    $data = array(
                        'scholarship_id' => $scholarship_id,
                        'sibling_name' => $sibling['name'],
                        'sibling_age' => $sibling['age'],
                        'sibling_course' => $sibling['course'],
                        'sibling_school' => $sibling['school']
                    );
                    $this->db->insert('scholarship_siblings', $data);
                }
            }
        }
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    /**
     * Get siblings for a scholarship
     *
     * @param int $scholarship_id
     * @return array
     */
    public function get_siblings($scholarship_id)
    {
        $this->db->where('scholarship_id', $scholarship_id);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('scholarship_siblings');
        return $query->result();
    }

    /**
     * Delete siblings for a scholarship
     *
     * @param int $scholarship_id
     * @return bool
     */
    public function delete_siblings($scholarship_id)
    {
        $this->db->where('scholarship_id', $scholarship_id);
        return $this->db->delete('scholarship_siblings');
    }
}
