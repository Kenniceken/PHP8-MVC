<?php

class Errors
{
    private $errors;

    public function __construct($error)
    {
        $this->errors = array();

        if (isset($error))
        {
            $this->errors[] = $error;
        }
        if (in_array($error, $this->errors))
        {
            return $error;
        }
    }
}