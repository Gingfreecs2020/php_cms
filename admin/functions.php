<?php
function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}






function insertCategory()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {

            echo "This field should not be empty!";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);


            if (!$create_category_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories ";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
?>

        <tr>
            <?php

            echo "<td>" . "<a href='#'>{$cat_id}</a>"  . "</td>";
            echo "<td>" . "<a href='#'>{$cat_title}</a>" . "</td>";
            echo "<td>" . "<a href='categories.php?delete={$cat_id}'>Delete</a>" . "</td>";
            echo "<td>" . "<a href='categories.php?edit={$cat_id}'>Edit</a>" . "</td>";

            ?>


        </tr>

        <?php
    }
}



function editCategories()
{

    global $connection;
    if (isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
        $select_categories_id = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

        ?>
            <input value="<?php if (isset($cat_title)) {
                                echo $cat_title;
                            } ?>" class="form-control" type="text" name="cat_title">

<?php
        }
    }
}

function updateCAtegories()
{
    global $connection;
    $cat_id = $_GET['edit'];
    if (isset($_POST['update_category'])) {
        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id={$cat_id}";
        $update_query = mysqli_query($connection, $query);
        // header("Location: categories.php");
        if (!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
}

function deleteCategory()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function deletePost()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id={$the_post_id}";
        $query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }
}
