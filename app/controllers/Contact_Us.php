<?php

require_once("../app/core/Controller.php");

class Contact_Us extends Controller
{
    /**
     * get the model file and home view
     * @return view index
     */
    public function index()
    {
        $data['pageTitle'] = "Contact Us";
        $this->view("Contact_Us/index", $data);
    }
}