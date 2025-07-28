<?php
$categoryName = $obj->display_category();
if (isset($_POST['add_post'])) {
    $msg = $obj->add_post($_POST);
}

?>




<form action="" method="POSt" class="mb-8" enctype="multipart/form-data">

    <h1>Add Post</h1>
    <p style="color: green;"><?php if (isset($msg)) {
                                    echo $msg;
                                } ?></p>
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input required class="form-control py-4" id="post_title" type="text" name="post_title" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea id="post_content" name="post_content" required class="form-control py-4" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_img">Post Thumbnail</label> <br>
        <input required class=" py-4" id="post_img" type="file" name="post_img" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_category">Select Post Category</label>
        <select class="form-control" id="post_category" name="post_category">

            <?php while ($category = mysqli_fetch_assoc($categoryName)) { ?>
                <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_summery">Post Summary</label>
        <input required class="form-control py-4" id="post_summery" type="text" name="post_summery" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tags</label>
        <input required class="form-control py-4" id="post_tag" type="text" name="post_tag" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>
        <select class="form-control" id="post_status" name="post_status">
            <option value="1">Published</option>
            <option value="0">UnPublished</option>
        </select>
    </div>
    <input type="submit" value="Add Post" name="add_post" class="form-control btn btn-block btn-primary">

</form>