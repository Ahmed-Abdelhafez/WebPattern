<?php

if (isset($_POST['checkBoxs'])) {

    foreach ($_POST['checkBoxs'] as $postId) {

        $bulkOption = $_POST['bulkOption'];

        if ($bulkOption == "delete") {
            $query = "DELETE FROM posts WHERE id={$postId}";
            $deletePost = mysqli_query($success, $query);
            if (!$deletePost) {
                die("Query Failed! " . mysqli_error($success));
            }
        } else if ($bulkOption == "Published" || $bulkOption == "Draft") {
            $query = "UPDATE posts SET status='{$bulkOption}' WHERE id={$postId}";
            $updateStatus = mysqli_query($success, $query);
            if (!$updateStatus) {
                die("Query Failed! " . mysqli_error($success));
            }
        }
    }
}

?>


<form action="" method="POST">

    <table class="table table-bordered table-hover">

        <div id="bulkOptions" class="col-xs-4">

            <select name="bulkOption" id="bulkOption" class="form-control">
                <option value="">Select Option</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="delete">Delete</option>
            </select>

        </div>

        <div class="col-xs-4 p-2">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=addPost" class="btn btn-primary">Add Post</a>
        </div>

        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            displayPosts();
            deletePost();
            ?>
        </tbody>
    </table>

</form>