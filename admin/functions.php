<?php

function addCategory()
{
    global $success;
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];

        if ($title == "" || empty($title)) {
            echo "This field should not be empty!";
        } else {
            $query = "INSERT INTO categories(title) VALUE('{$title}')";
            $createCategory = mysqli_query($success, $query);

            if (!$createCategory) {
                die("Category Adding Failed!" . mysqli_error($success));
            }
        }
    }
}

function updateCategory()
{
    global $success;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = "SELECT * FROM Categories WHERE id='{$id}'";
        $category = mysqli_query($success, $query);
        $category = mysqli_fetch_object($category);
        $title = $category->title;
        if (isset($title)) {
?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Category Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                </div>
            </form>
        <?php
        }
    }
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $query = "UPDATE categories SET title = '{$title}' WHERE id = '{$id}'";
        $updateCategory = mysqli_query($success, $query);
        if (!$updateCategory) {
            die("Category Updating Failed!" . mysqli_error($success));
        }
    }
}

function displayCategories()
{
    global $success;
    $query = "SELECT * FROM Categories";
    $allCategories = mysqli_query($success, $query);
    while ($category = mysqli_fetch_assoc($allCategories)) {
        $title = $category['title'];
        $id = $category['id'];
        ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $title ?></td>
            <td><a href="categories.php?delete=<?php echo $id ?>">Delete</a></td>
            <td><a href="categories.php?edit=<?php echo $id ?>">Edit</a></td>
        </tr>
    <?php
    }
}

function deleteCategory()
{
    global $success;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id = '{$id}'";
        mysqli_query($success, $query);
        header("Location: categories.php");
    }
}

function displayPosts()
{
    global $success;
    $query = "SELECT * FROM posts";
    $allPosts = mysqli_query($success, $query);
    while ($post = mysqli_fetch_assoc($allPosts)) {
        $title = $post['title'];
        $id = $post['id'];
        $author = $post['author'];
        $categoryId = $post['category_id'];
        $date = $post['date'];
        $commentsCount = $post['comments_count'];
        $status = $post['status'];
        $tags = $post['tags'];
        $image = $post['image'];
    ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $author ?></td>
            <td><?php echo $title ?></td>

            <?php

            $query = "SELECT * FROM Categories WHERE id='{$categoryId}'";
            $category = mysqli_query($success, $query);
            $category = mysqli_fetch_assoc($category);
            $CategoryTitle = $category['title'];

            ?>

            <td><?php echo $CategoryTitle ?></td>
            <td><?php echo $status ?></td>
            <td><img class="img-responsive" style="max-width:100px; max-height:50px;" src="../images/<?php echo $image ?>" alt="<?php echo $title ?>"></td>
            <td><?php echo $tags ?></td>
            <td><?php echo $commentsCount ?></td>
            <td><?php echo $date ?></td>
            <td><a href="posts.php?source=editPost&edit=<?php echo $id ?>">Edit</a></td>
            <td><a href="posts.php?delete=<?php echo $id ?>">Delete</a></td>
        </tr>
<?php
    }
}

function deletePost()
{
    global $success;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE id = '{$id}'";
        mysqli_query($success, $query);
        header("Location: posts.php");
    }
}



function displayComments()
{
    global $success;
    $query = "SELECT * FROM comments";
    $allComments = mysqli_query($success, $query);
    while ($comment = mysqli_fetch_assoc($allComments)) {
        $id = $comment['id'];
        $author = $comment['author'];
        $postId = $comment['post_id'];
        $date = $comment['date'];
        $content = $comment['content'];
        $status = $comment['status'];
        $email = $comment['email'];
    ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $author ?></td>
            <td><?php echo $content ?></td>
            <td><?php echo $email ?></td>

            <?php
            $query = "SELECT * FROM posts WHERE id='{$postId}'";
            $post = mysqli_query($success, $query);
            $post = mysqli_fetch_assoc($post);
            $postTitle = $post['title'];
            ?>

            <td><a href="../post.php?id=<?php echo $postId ?>"><?php echo $postTitle ?></a></td>
            <td><?php echo $status ?></td>
            <td><?php echo $date ?></td>
            <td><a href="comments.php?approve=<?php echo $id ?>">Approve</a></td>
            <td><a href="comments.php?unapprove=<?php echo $id ?>">Unapprove</a></td>
            <td><a href="comments.php?delete=<?php echo $id ?>">Delete</a></td>
        </tr>
<?php
    }
}

function deleteComment()
{
    global $success;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE id = '{$id}'";
        mysqli_query($success, $query);
        header("Location: comments.php");
    }
}

function approveComment()
{
    global $success;
    if (isset($_GET['approve'])) {
        $id = $_GET['approve'];
        $query = "UPDATE comments SET status='Approved' WHERE id = '{$id}'";
        $changeStatus = mysqli_query($success, $query);
        if (!$changeStatus) {
            die("Status Updating Failed!" . mysqli_error($success));
        }
        header("Location: comments.php");
    }
    if (isset($_GET['unapprove'])) {
        $id = $_GET['unapprove'];
        $query = "UPDATE comments SET status='Unapproved' WHERE id = '{$id}'";
        $changeStatus = mysqli_query($success, $query);
        if (!$changeStatus) {
            die("Status Updating Failed!" . mysqli_error($success));
        }
        header("Location: comments.php");
    }
    
}
