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

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }

                    $query = "SELECT * FROM posts WHERE id=$id";
                    $allPosts = mysqli_query($success, $query);

                    while($post = mysqli_fetch_assoc($allPosts)){
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
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <?php    
                    
                    
                    }

                
                ?>

               
                <hr>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

            
        <!-- /.row -->
        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

      