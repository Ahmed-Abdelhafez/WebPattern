<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Blog Posts -->
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }

            $query = "SELECT * FROM posts WHERE id=$id";
            $allPosts = mysqli_query($success, $query);

            while ($post = mysqli_fetch_assoc($allPosts)) {
                $title = $post['title'];
                $author = $post['author'];
                $date = $post['date'];
                $content = $post['content'];
                $image = $post['image'];
            ?>
                <h2>
                    <a href="#"><?php echo $title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $image; ?>" alt="">
                <hr>
                <p><?php echo $content; ?></p>

            <?php
            }
            if (isset($_POST['createComment'])) {
                $postId = $_GET['id'];
                $author = $_POST['author'];
                $email = $_POST['email'];
                $content = $_POST['content'];

                $query = "INSERT INTO comments 
                            (post_id, author, email, content, status, date) 
                            VALUES 
                            ($postId, '{$author}', '{$email}', '{$content}', 'Unapproved',  now())";

                $createComment = mysqli_query($success, $query);

                if (!$createComment) {
                    die('Query Failed!' . mysqli_error($success));
                }

                $query = "UPDATE posts 
                            SET comments_count = comments_count + 1
                            WHERE id = $postId";
                $UpdateCount = mysqli_query($success, $query);
                if (!$UpdateCount) {
                    die('Query Failed!' . mysqli_error($success));
                }
            }



            ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" name="author">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea name="content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="createComment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <?php
            $query = "SELECT * FROM comments WHERE post_id=$id AND status = 'Approved'";
            $allComments = mysqli_query($success, $query);
            while ($comment = mysqli_fetch_assoc($allComments)) {
                $content = $comment['content'];
                $author = $comment['author'];
                $date = $comment['date'];
            ?>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $author; ?>
                        <small><?php echo $date; ?></small>
                    </h4>
                    <?php echo $content; ?>
                </div>
            </div>

            <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>


        <!-- Footer -->
        <?php include "includes/footer.php"; ?>