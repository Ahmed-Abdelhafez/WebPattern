<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
   
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                

                <!-- Blog Posts -->
                <?php 
                
                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];
                        $query = "SELECT * FROM posts WHERE tags LIKE '%$search%'";
                        $searchResult = mysqli_query($success, $query);
                        if(!$searchResult){
                            die("Query Failed!" . mysqli_error($success));
                        }
                    }

                    $count = mysqli_num_rows($searchResult);
                    if($count == 0){
                        echo "<h1>NO RESULT!</h1>";
                    } else {

                    while($post = mysqli_fetch_assoc($searchResult)){
                        $title = $post['title'];
                        $author = $post['author'];
                        $date = $post['date'];
                        $content = $post['content'];
                        $image = $post['image'];
                        ?>
                        <h1 class="page-header">
                            Page Heading
                        <small>Secondary Text</small>
                        </h1>
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

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

            
        <!-- /.row -->
        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

      