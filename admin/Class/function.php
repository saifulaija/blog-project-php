<?php

class adminBlog
{

    private $conn;


/*     database connection start */

    public function __construct()
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = "";
        $db_name = 'blogproject';
        $this->conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (!$this->conn) {

            die("Database Connection Error");
        }
    }

    /*     database connection end */


    
}
