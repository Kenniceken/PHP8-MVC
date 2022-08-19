<?php

class ApplicationDbContext
{
    private $context = null;
    private static $instance = null;
    public $BASE_URL = "http://localhost/ClipClassicConsult/";

    private function __construct()
    {
        $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->context = new PDO($string, DB_USER, DB_PASS);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new ApplicationDbContext();
        }
        return self::$instance;
    }

    public function read($query, $data = array())
    {
        $stmt = $this->context->prepare($query);
        $res = $stmt->execute($data);

        if ($res) 
        {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) 
            {
                return $data;
            }
        }
        return false;
    }

    public function write($query, $data = array())
    {
        $stmt = $this->context->prepare($query);
        $res = $stmt->execute($data);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getLastInsertId()
    {
        return $this->context->lastInsertId();
    }
}