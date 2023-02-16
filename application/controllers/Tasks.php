<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Tasks extends CI_Controller {
    /* This is just to redirect base_url() to tasks controller method assignments */
    public function index()
    {
        redirect('assignments');
    }
    /* This method if run will call Task method and then call the show_all method from Task model,
    which will run a query to fetch all assignments then pass the result to view tasks/assignments.
    This method also accepts a parameter which has a default value of 0.
    If contains an argument, it will pass it to the task model method show_all
    */
    public function assignments($num = 0)
    {
        /* loads task model */
        $this->load->model("Task");
        /* set view_data to an array to contain the return value from Task method show_all() */
        $view_data = array("tasks" => $this->Task->show_all($base = 5, $num));
        /* this is to check if the parameter has been changed */
        if($num !== 0)
        {
            $view_data['num'] = $num;
        }
        /* loads view assignments from tasks folder */
        $this->load->view("tasks/assignments", $view_data);
    }
    /* This method if run will show an additional 5 result to the current results. */
    public function show()
    {
        /* loads tasks model */
        $this->load->model("Task");
        /* runs show_more method from model Task which adds 5 more to session called limit */
        $this->Task->show_more();
        redirect("/assignments");
    }
}
?>