<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'editimg') {
        $id = $_GET['id'];
    }
}
if(isset($_POST['change_img_btn'])){
   $msg= $obj->edit_image($_POST);
}



?>


<div class="shadow m-5 p-4">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <?php  if(isset($msg)){echo $msg;} ?>
        <input type="hidden" name="edit_img_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_img">Change Thumbnail</label> <br>
            <input required class=" py-4" id="change_img" type="file" name="change_img" />
        </div>
        <input class="btn btn-primary" type="submit" name="change_img_btn" value="Change Image">
    </form>
</div>