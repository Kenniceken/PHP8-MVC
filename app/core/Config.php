<?php
const APP_NAME = "Clip Classic Consult";

// setting up database for the app
const DB_NAME = "clip_classic_consult";
const DB_USER = "root";
const DB_PASS = "root123";
const DB_TYPE = "mysql";
const DB_HOST = "localhost";

const DEBUG = true;

if (DEBUG)
{
    ini_set('display_errors', 1);
}
else
{
    ini_set('display_errors', 0);
}