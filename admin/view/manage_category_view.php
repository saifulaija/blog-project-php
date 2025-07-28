<?php
$cat_data = $obj->display_category();

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $delete_id = $_GET['id'];
        $message_delete = $obj->delete_category($delete_id);
    }
}


?>



<h1>Manage Category</h1>
<p style="color: red;">
    <?php if (isset($message_delete)) {
        echo $message_delete;
    } ?>
    </p>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php while ($cat = mysqli_fetch_assoc($cat_data)) { ?>
            <tr>
                <td><?php echo $cat['cat_id'] ?></td>
                <td><?php echo $cat['cat_name'] ?></td>
                <td><?php echo $cat['cat_des'] ?></td>
                <td>
                    <a class="btn btn-primary" href="#">Edit</a>
                    <a class="btn btn-danger" href="?status=delete&&id=<?php echo $cat['cat_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>