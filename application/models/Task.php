<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model
{   
    /* This is to show all tasks*/
    public function show_all($base, $num)
    {
        if(!$this->session->userdata("limit"))
        {
            $this->session->set_userdata("limit", $base);
        }
        if($num !== 0)
        {
            $this->session->set_userdata("limit", $num);
        }
        $limit = $this->session->userdata("limit");
        $query = "SELECT tasks.id, tasks.name AS assignment, tasks.sequence, tasks.level, tracks.name AS track FROM tasks INNER JOIN tracks ON tasks.track_id = tracks.id ORDER BY id LIMIT {$limit}";
        return $this->db->query($query)->result_array();
    }

    public function show_more()
    {
        $limit = $this->session->userdata("limit");
        $this->session->set_userdata("limit", $limit+5);
    }
}

?>