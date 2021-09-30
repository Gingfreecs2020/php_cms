<table class="table table-bordered table-hover">
    <theader>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </theader>

    <tbody>

        <?php

        $query = "SELECT * FROM posts";
        $queryShowAllposts = mysqli_query($connection, $query);

        if (!$queryShowAllposts) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($queryShowAllposts)) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            $post_date = $row['post_date'];

        ?>
            <tr>
                <td><?php echo $post_id; ?> </td>
                <td><?php echo $post_author; ?></td>
                <td><?php echo $post_title; ?></td>
                <td>---</td>
                <td>---</td>
                <td><img class="img-responsive" src="../images/<?php echo $post_image; ?>" alt="image"></td>
                <td>---</td>
                <td><?php echo  $post_date; ?></td>
                <td><a href='posts.php?source=edit_post&p_id=<?php echo $post_id; ?>'>Edit</a></td>
                <td><a href='posts.php?delete=<?php echo $post_id; ?>'>Delete</a></td>

            </tr>

        <?php

        }

        ?>
        <?php deletePost(); ?>





    </tbody>
</table>