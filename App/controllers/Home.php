<?php
require_once("../app/core/Controller.php");

class Home extends Controller
{
    /**
     * get the model file and home view
     * @return view index
     */
    public function index()
    {
        $user = $this->getModel('User');
        $userData = $user->isAuthenticated();
        if (is_object($userData))
        {
            $data['userData'] = $userData;
        }

        $data['pageTitle'] = "Home";
        $this->view("Home/index", $data);
    }

    public function services()
    {
        $data['pageTitle'] = "Our Services";
        $this->view("Home/services", $data);
    }
}