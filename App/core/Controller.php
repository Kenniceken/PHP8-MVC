<?php

class Controller
{
    /**
     * load all the view files
     * @return void
     */
    public function view($path, $data = [])
    {
        extract($data);
        if (file_exists("../app/views/" . $path . ".php"))
        {
            include "../app/views/" . $path . ".php";
        }
        else
        {
            include "../app/views/404.php";
        }
    }

    /**
     * load all the Models
     * load model file
     * @return object
     */
    public function getModel($model)
    {
        if (file_exists("../app/models/" . strtolower($model) . ".php"))
        {
            include "../app/models/" . strtolower($model). ".php";
            return $m = new $model;
        }
        return false;
    }
}