<?php
//Truyen du lieu
    include_once "config.php";
    class Db{
        public static $connection;
        public function __construct()
        {
            if(!self::$connection){
                self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                self::$connection ->set_charset(DB_CHARSET);
            }
        return self::$connection;
        }
    }
    $db = new Db();
    $conn = $db::$connection;

   //Kiem tra ket noi
    if($conn->connect_error){
        die("Connection failed: ". $con->connect_error);
    }