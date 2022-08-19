<?php

require_once("../app/core/Controller.php");

class Project extends Controller
{
    /**
     * get the model file and home view
     * @return view index
     */
    public function index()
    {
        $data['pageTitle'] = "Projects";
        $this->view("Project/index", $data);
    }

}