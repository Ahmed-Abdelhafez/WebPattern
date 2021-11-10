<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM posts WHERE id='{$id}'";
    $post = mysqli_query($success, $query);
    $post = mysqli_fetch_object($post);
    $title = $post->title;
    $author = $post->author;
    $category = $post->category_id;
    $date = $post->date;
    $commentsCount = $post->comments_count;
    $content = $post->content;
    $status = $post->status;
    $tags = $post->tags;
    $image = $post->image;
}

if (isset($_POST['editPost'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $category = $_POST['post_category'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    move_uploaded_file($imageTmp, "../images/$image");

    if (empty($image)) {
        $query = "SELECT * FROM posts WHERE id = {$id} ";
        $select_image = mysqli_query($success, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $image = $row['image'];
        }
    }



    $query = "UPDATE posts SET ";
    $query .= "title = '{$title}', ";
    $query .= "category_id = {$category}, ";
    $query .= "date = now(), ";
    $query .= "author = '{$author}', ";
    $query .= "status = '{$status}', ";
    $query .= "tags = '{$tags}', ";
    $query .= "content = '{$content}', ";
    $query .= "image = '{$image}' ";
    $query .= "WHERE id = {$id} ";

    $updatePost = mysqli_query($success, $query);
    if (!$updatePost) {
        die("Post Updating Failed!" . mysqli_error($success));
    }
    header("Location: posts.php");
}
?>

<form action="" method="POST" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
    </div>

    <div class="form-group">
        <label>Choose Post Category</label>
        <select class="form-control" name="post_category" id="post_category">
            <?php

                // Declare query string for Update:
                $query = "SELECT * FROM categories";
                // Perform query:
                $select_categories = mysqli_query($success, $query);
                // Confirm that $select_categories query is successful:
               
                while ( $row = mysqli_fetch_assoc($select_categories) )  {
                    $cat_id = $row['id'];
                    $cat_title = $row['title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                } // end while
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $author; ?>">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $status; ?>">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $image; ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" value="<?php echo $tags; ?>">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control"><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="editPost" value="Publish">

    </div>



</form>