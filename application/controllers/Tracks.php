<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Tracks extends CI_Controller {

    /* This function calls track model and method show_all */
    public function get_all()
    {
        $this->load->model("Track");
        return $this->Track->show_all();
    }
}
?>