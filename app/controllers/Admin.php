<?php

require_once("../app/core/Controller.php");

class Admin extends Controller
{
    /**
     * Get User Model and Admin/index view respectively
     * @return Admin/index view
     */
    public function index()
    {
        $adminUser = $this->getModel('User');
        $userData = $adminUser->isAuthenticated(['Admin']);
        if (is_object($userData))
        {
            $data['userData'] = $userData;
        }
        $data['pageTitle'] = "Admin Home";
        $this->view("Admin/index", $data);
    }
}