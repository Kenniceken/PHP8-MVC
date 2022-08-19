<?php

require_once("../app/core/Controller.php");


class Users extends Controller
{
    /**
     * index method
     * loads the Users Model & Users View respectively
     * @return view Users
     */

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST")
        {
            $user = $this->getModel("User");
            $user->login();
        }

        $data['pageTitle'] = "Login";
        $this->view("Users/login", $data);
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST")
        {
            $reg = $this->getModel("User");
            $reg->register();
        }

        $data['pageTitle'] = "Register";
        $this->view("Users/register", $data);
    }
}