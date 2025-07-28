<?php

class adminBlog
{

    private $conn;


    /*     ----database connection Start------- */

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

    /*     -------database connection End -----*/

    /*  ------admin login by db Start---- */


    public function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);
        $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";
        if (mysqli_query($this->conn, $query)) {
            $admin_info = mysqli_query($this->conn, $query);

            if ($admin_info) {
                header("location:dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }
    }

    /*  --------admin login by db End------- */
}
