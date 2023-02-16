<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model
{   
    /* This is to show all tasks*/
    public function show_all($query)
    {
        /* run query  */
        return $this->run_query($query[0],$query[1],$query[2]);
    }
    /* This method compose and runs the query */
    public function run_query($easy="", $intermediate="", $track="")
    {
        $limit_num = $this->session->userdata("limit");
        /* creates the first portion of the query */
        $start = "SELECT tasks.id, tasks.name AS assignment, tasks.sequence, tasks.level, tracks.name AS track FROM tasks INNER JOIN tracks ON tasks.track_id = tracks.id";
        /* sets easy val to easy if condition is met for later use in query */
        $easy == TRUE?$easy_val = "easy": $easy_val = "";
        /* sets intermediate val to intermediate if condition is met for later use in query */
        $intermediate == TRUE?$intermediate_val = "intermediate":$intermediate_val = "";
        /* sets the where condition */
        $where = " WHERE level IN ('{$easy_val}{$intermediate_val}')";
        /* Checks if both easy and intermediate are checked
            if yes adds both in WHERE clause of MYsql;
        */
        if($easy == TRUE && $intermediate == TRUE)
        {
            $where = " WHERE level IN ('".$easy_val."', '".$intermediate_val."')";
        }
        /* checks if easy and intermediate has value,
            if none then removes where clause */
        else if($easy !== TRUE && $intermediate !== TRUE)
        {
            $where = "";
        }
        /*  checks if track has a value if yes proceed to another validation */
        if($track !== "")
        {
            /* checks if easy or intermedtiate has value,
                if any has value then add AND clause in where condition */
            if($easy == TRUE || $intermediate == TRUE)
            {
                $where .= " AND tasks.track_id = '$track'";
            }
            /* checks if easy and intermedtiate has no value,
                if none, then removes the AND clause from WHERE condition*/
            else if($easy !== TRUE && $intermediate !== TRUE)
            {
                var_dump($track);
                $where .= " WHERE tasks.track_id = '$track'";
            }
        }
        /* adds sorting to query */
        $end = " ORDER BY tasks.id";
        $limit = "";
        $query = $start.$where.$end.$limit;
        return $this->db->query($query)->result_array();
    }

    public function filter_data($data)
    {
        /* set value for filtering */
        $this->session->set_userdata("level", array(
            "easy" => isset($data["easy"])?TRUE:"",
            "intermediate" => isset($data["intermediate"])?TRUE:""
        ));
        $this->session->set_userdata("track", isset($data["track"])?$data["track"]:"");
        $session = $this->session->userdata(NULL, TRUE);
        // var_dump($session);
        return array(
            $session["level"]["easy"],
            $session["level"]["intermediate"],
            $session["track"]
        );
    }
}
?>