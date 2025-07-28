
<?php

if(isset($_POST['add_cat_btn'])){
   $return_message= $obj->add_category($_POST);
}




?>




<form action="" method="POSt" class="mb-8">

    <h1>Add Category</h1>
    <p style="color: green;"><?php if(isset($return_message)){echo $return_message;}?></p>
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input required class="form-control py-4" id="cat_name" type="text" name="cat_name" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category Description</label>
        <input required class="form-control py-4" id="cat_des" type="text" name="cat_des" />
    </div>
    <input type="submit" value="Add Category" name="add_cat_btn" class="form-control btn btn-block btn-primary">

</form>