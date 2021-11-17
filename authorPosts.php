<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if(isset($_GET['author'])){
                $author = $_GET['author'];
            }
            
            $query = "SELECT * FROM posts WHERE status='Published' AND author='{$author}'";
            $allAuthorPosts = mysqli_query($success, $query);
            if (mysqli_num_rows($allAuthorPosts)==0) {
                die("<h1>No posts Here</h1>");
            }
            ?>

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Blog Posts -->
            <?php
            $allAuthorPosts = mysqli_query($success, $query);
            while ($post = mysqli_fetch_assoc($allAuthorPosts)) {
                $id = $post['id'];
                $title = $post['title'];
                $date = $post['date'];
                $content = substr($post['content'], 0, 100);
                $image = $post['image'];
            ?>
                <h2>
                    <a href="post.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="authorPosts.php?author=<?php echo $author; ?>"><?php echo $author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
                <hr>
                <a href="post.php?id=<?php echo $id; ?>"><img class="img-responsive" src="images/<?php echo $image; ?>" alt=""></a>
                <hr>
                <p><?php echo $content; ?></p>
                <a class="btn btn-primary" href="post.php?id=<?php echo $id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <?php


            }


            ?>


            <hr>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>


        <!-- /.row -->
        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>