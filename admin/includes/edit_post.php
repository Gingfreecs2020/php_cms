<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];


    $query = "SELECT * FROM posts ";
    $select_post_by_id = mysqli_query($connection,  $query);
    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_image = $row['image']['name'];
        $post_image_temp = $row['image']['tmp_name'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = 4;
        $post_status = $row['post_status'];
        $post_date = date('d-m-y');
    }
}


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post Title">Post Title</label>
        <input value="<?php echo  $post_title; ?> " type="text" class="form-control" name="post_title">

    </div>
    <div class="form-group">
        <label for="Post Author">Post Category Id</label>
        <input value="<?php echo  $post_category_id; ?>" type=" text" class="form-control" name="post_category_id">

    </div>
    <div class="form-group">
        <label for="Post Author">Post Author</label>
        <input value="<?php echo  $post_author; ?>" type="text" class="form-control" name="post_author">

    </div>
    <div class="form-group">
        <label for="Post Status">Post Status</label>
        <input value="<?php echo  $post_status; ?>" type="text" class="form-control" name="post_status">

    </div>
    <div class="form-group">
        <label for="Post Image">Post Image</label>
        <input value="<?php echo  $post_image; ?>" type="file" name="image">

    </div>
    <div class="form-group">
        <label for="Post Content">Post Content</label>
        <textarea value="<?php echo  $post_content; ?>" class="form-control" name="post_content" id="" rows="10"></textarea>

    </div>
    <div class="form-group">
        <label for="Post Tags">Post Tags</label>
        <input value="<?php echo  $post_tags; ?>" type="text" class="form-control" name="post_tags">

    </div>
    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="update_post" value="Update post">

    </div>

</form>