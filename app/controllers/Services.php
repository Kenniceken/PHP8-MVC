<?php
require_once("../app/core/Controller.php");

class Services extends Controller
{
    /**
     * get the model file and home view
     * @return view index
     */
    public function index()
    {
        $data['pageTitle'] = "Our Services";
        $this->view("Services/index", $data);
    }
}