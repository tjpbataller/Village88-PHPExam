<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Tasks extends CI_Controller {
    public function assignments($num = 0)
    {
        $this->load->model("Task");
        $view_data = array("tasks" => $this->Task->show_all($base = 5, $num));
        $this->load->view("tasks/index", $view_data);
    }
    public function show()
    {
        $this->load->model("Task");
        $this->Task->show_more();
        redirect("/assignments");
    }
}
?>