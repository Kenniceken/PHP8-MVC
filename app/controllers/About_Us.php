<?php
require_once("../app/core/Controller.php");

class About_Us extends Controller
{
    /**
     * get the model file and home view
     * @return view index
     */
    public function index()
    {
        $data['pageTitle'] = "About Us";
        $this->view("About_Us/index", $data);
    }
}