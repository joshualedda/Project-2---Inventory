<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScholarshipEducationModel extends CI_Model
{
    /**
     * Insert education background records for a scholarship
     *
     * @param int $scholarship_id
     * @param array $education_data
     * @return bool
     */
    public function insert_education_background($scholarship_id, $education_data)
    {
        $this->db->trans_start();
        
        // Delete existing education background for this scholarship
        $this->db->where('scholarship_id', $scholarship_id);
        $this->db->delete('scholarship_education_background');
        
        // Insert new education background records
        if (!empty($education_data)) {
            foreach ($education_data as $education) {
                $data = array(
                    'scholarship_id' => $scholarship_id,
                    'education_level' => $education['level'],
                    'school_name' => $education['school_name'],
                    'year_graduated' => $education['year_graduate'],
                    'honors_received' => $education['honors']
                );
                $this->db->insert('scholarship_education_background', $data);
            }
        }
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    /**
     * Get education background for a scholarship
     *
     * @param int $scholarship_id
     * @return array
     */
    public function get_education_background($scholarship_id)
    {
        $this->db->where('scholarship_id', $scholarship_id);
        $this->db->order_by('education_level', 'ASC');
        $query = $this->db->get('scholarship_education_background');
        return $query->result();
    }

    /**
     * Delete education background for a scholarship
     *
     * @param int $scholarship_id
     * @return bool
     */
    public function delete_education_background($scholarship_id)
    {
        $this->db->where('scholarship_id', $scholarship_id);
        return $this->db->delete('scholarship_education_background');
    }
}
