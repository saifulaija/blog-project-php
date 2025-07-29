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


    /*  --------admin Logout Start------- */
    public function adminLogout()
    {
        unset($_SESSION['adminID']);
        unset($_SESSION['admin_name']);
        header('location:index.php');
    }

    /*  --------admin Logout  End------- */





    /*  --------Sent Category Name to DB Start------- */


    public function add_category($data)
    {

        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT INTO category(cat_name,cat_des) value('$cat_name','$cat_des')";
        if (mysqli_query($this->conn, $query)) {
            // header("location:manage_category.php");
            return "Category added successfully";
        }
    }

    /*  --------Sent Category Name to DB End------- */


    /*  --------Get Category Data from DB Start------- */

    public function display_category()
    {
        $query = "SELECT * FROM category";

        if (mysqli_query($this->conn, $query)) {
            $category = mysqli_query($this->conn, $query);
            return $category;
        }
    }


    /*  --------Get Category Data from DB End------- */

    /*  --------Delete Category Data from DB Start------- */

    public  function delete_category($id)
    {
        $query = "DELETE FROM category WHERE cat_id=$id";

        if (mysqli_query($this->conn, $query)) {
            return "Category deleted successfully";
        }
    }



    /*  --------Delete Category Data from DB End------- */

    /*  --------add Category Data from DB End------- */

    // public function add_post($data){
    //  $post_title=$data['post_title'];
    //  $post_content=$data['post_content'];
    //  $post_img=$_FILES['post_img']['name'];
    //  $post_img_tmp=$_FILES['post_img']['tmp_name'];
    //  $post_category=$data['post_category'];
    //  $post_summery=$data['post_summery'];
    //  $post_tag=$data['post_tag'];
    //  $post_status=$data['post_status'];


    //  $query= "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) VALUES('$post_title','$post_content','$post_img',$post_category,'Admin', NOW(), 3,'$post_summery','$post_tag',$post_status";


    //  if(mysqli_query($this->conn,$query)){
    //     move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
    //     return 'Post created successfully';
    //  }



    // }


    public function add_post($data)
    {
        // Sanitize and assign input data
        $post_title = mysqli_real_escape_string($this->conn, $data['post_title']);
        $post_content = mysqli_real_escape_string($this->conn, $data['post_content']);
        $post_category = (int)$data['post_category'];
        $post_summery = mysqli_real_escape_string($this->conn, $data['post_summery']);
        $post_tag = mysqli_real_escape_string($this->conn, $data['post_tag']);
        $post_status = (int)$data['post_status'];

        // Handle file upload
        $post_img = $_FILES['post_img']['name'];
        $post_img_tmp = $_FILES['post_img']['tmp_name'];
        $upload_dir = '../upload/';
        $target_file = $upload_dir . basename($post_img);

        // Validate file upload
        if (move_uploaded_file($post_img_tmp, $target_file)) {
            // Prepare SQL statement
            $query = "INSERT INTO posts (
                    post_title,
                    post_content,
                    post_img,
                    post_ctg,
                    post_author,
                    post_date,
                    post_comment_count,
                    post_summery,
                    post_tag,
                    post_status
                  ) VALUES (
                    '$post_title',
                    '$post_content',
                    '$post_img',
                    $post_category,
                    'Admin',
                    NOW(),
                    0,
                    '$post_summery',
                    '$post_tag',
                    $post_status
                  )";

            // Execute query
            if (mysqli_query($this->conn, $query)) {
                return 'Post added successfully';
            } else {
                return 'Database error: ' . mysqli_error($this->conn);
            }
        } else {
            return 'File upload failed';
        }
    }

    /*  --------Delete Category Data from DB End------- */


    public function display_post()
    {
        $query = "SELECT * FROM post_with_ctg";
        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }
    public function display_post_public()
    {
        $query = "SELECT * FROM post_with_ctg WHERE post_status = 1";
        if (mysqli_query($this->conn, $query)) {
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    public function edit_image($data)
    {

        $img_id = $data['edit_img_id'];
        $img_name = $_FILES['change_img']['name'];
        $tmp_img = $_FILES['change_img']['tmp_name'];
        $query = "UPDATE posts SET post_img='$img_name' WHERE post_id=$img_id";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_img, '../upload/' . $img_name);
            return "Thumbnail updated successfully";
        }
    }


    public function get_post_info($id)
    {
        $query = "SELECT * FROM post_with_ctg WHERE post_id=$id";
        if (mysqli_query($this->conn, $query)) {
            $post_info = mysqli_query($this->conn, $query);
            $post = mysqli_fetch_assoc($post_info);
            return $post;
        }
    }


    public function update_post($data){
        $post_title=$data['change_title'];
        $post_content=$data['change_content'];
        $post_id=$data['edit_post_id'];

        $query="UPDATE posts SET post_title='$post_title', post_content='$post_content' WHERE post_id=$post_id";


        if(mysqli_query($this->conn,$query)){
            return "Post updated successfully";
        }

    }
}
