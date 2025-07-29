<?php
include("admin/Class/function.php");
$obj = new adminBlog();

$get_category = $obj->display_category();

if ($_GET['view']) {
    if ($_GET['view'] == 'postview') {
        $id = $_GET['id'];
        $post = $obj->get_post_info($id);
    }
}




?>


<?php include_once('includes/head.php') ?>

<body>

    <!-- ***** Preloader Start ***** -->
    <?php include_once('includes/pre_loader.php') ?>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

    <?php include_once('includes/header.php') ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once('includes/banner.php') ?>
    <!-- Banner Ends Here -->

    <?php include_once('includes/cta.php') ?>


    <section class="blog-posts">
        <div class="container">
            <div class="row">


                <div class="col-8">
                    <div class="blog-thumb">
                        <img src="upload/<?php echo $post['post_img'] ?>" alt="">
                    </div>
                    <h2><?php echo $post['post_title']; ?></h2>
                    <p><?php echo $post['post_content']; ?></p>
                </div>
                <!-- <?php include_once('includes/blog_post.php') ?> -->
                <?php include_once('includes/sidebar.php') ?>

            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php') ?>

    <!-- Bootstrap core JavaScript -->

    <?php include_once('includes/script.php') ?>