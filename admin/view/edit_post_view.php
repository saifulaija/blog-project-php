<h1>Edit Post page</h1>

<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'editpost') {
        $id = $_GET['id'];

        $post_data = $obj->get_post_info($id);
    }
}



if (isset($_POST['update_post_btn'])) {
    $msg = $obj->update_post($_POST);
}



?>


<div class="shadow m-5 p-4">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <input type="hidden" name="edit_post_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_title">Change Title</label> <br>
            <input value="<?php echo $post_data['post_title']; ?>" class=" py-4 form-control" id="change_title" type="text" name="change_title" />
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_content">Change Title</label> <br>
            <textarea id="change_content" name="change_content" rows="10" cols="30" class="form-control">
<?php echo $post_data['post_content']; ?>

            </textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="update_post_btn" value="Update Post">
    </form>
</div>