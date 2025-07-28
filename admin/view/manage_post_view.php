<?php
$posts = $obj->display_post();




?>



<h1>Manage Post Page</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($postData = mysqli_fetch_assoc($posts)) { ?>
                <tr>
                    <td><?php echo $postData['post_id'] ?></td>
                    <td><?php echo $postData['post_title'] ?></td>
                    <td><?php echo $postData['cat_name'] ?></td>
                    <td><img height="50px" src="../upload/<?php echo $postData['post_img'] ?>" alt="">
                    <br>
                    <a href="edit_img.php?status=editimg&&id=<?php echo $postData['post_id']?>">change</a>
                </td>
                    <td><?php if ($postData['post_status'] == 1) {
                            echo 'Published';
                        } else {
                            echo 'Unpublished';
                        } ?></td>
                    <td><?php echo $postData['post_date'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>