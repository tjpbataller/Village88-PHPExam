<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model
{   
    /* This is to show all tasks*/
    public function show_all($base, $num)
    {
        /* Checks if session userdata called limit exists, set value to $base which is 5 if not*/
        if(!$this->session->userdata("limit"))
        {
            $this->session->set_userdata("limit", $base);
        }
        /* Checks if an argument has been received, sets session limit to given value*/
        if($num !== 0)
        {
            $this->session->set_userdata("limit", $num);
        }
        /* run query*/
        $limit = $this->session->userdata("limit");
        $query = "SELECT tasks.id, tasks.name AS assignment, tasks.sequence, tasks.level, tracks.name AS track FROM tasks INNER JOIN tracks ON tasks.track_id = tracks.id ORDER BY id LIMIT {$limit}";
        return $this->db->query($query)->result_array();
    }

    /* shows additional 5 to the result of query */
    public function show_more()
    {
        $limit = $this->session->userdata("limit");
        $this->session->set_userdata("limit", $limit+5);
    }
}

?>