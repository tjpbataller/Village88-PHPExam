<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track extends CI_Model
{
    /* This method returns all tracks in the database */
    public function show_all()
    {
        $query = "SELECT * FROM tracks";
        return $this->db->query($query)->result_array();
    }

}
?>