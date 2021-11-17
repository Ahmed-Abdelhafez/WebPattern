<?php

if (isset($_POST['createPost'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['post_category'];
    $date = date('d-m-y');
    $status = $_POST['status'];
    $tags = $_POST['tags'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($imageTmp, "../images/$image");

    $query = "INSERT INTO posts
                (category_id, title, author, date, image, content, tags, status) 
            VALUES
                ({$category},'{$title}','{$author}',now(),'{$image}','{$content}','{$tags}','{$status}' ) ";

    $createPostQuery = mysqli_query($success, $query);

    if (!$createPostQuery) {
        die('Query Falied!' . mysqli_error($success));
    }

    header("Location: posts.php");
}

?>

<form action="" method="POST" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
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

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['id'];
                $cat_title = $row['title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            } // end while
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <select class="form-control" name="status" id="">
            <option value="Draft">Select Option</option>
            <option value="Published">Published</option>
            <option value="Draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="createPost" value="Publish">

    </div>



</form>