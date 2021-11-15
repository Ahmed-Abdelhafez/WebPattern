<?php include "includes/header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small><?php echo $_SESSION['username']; ?> </small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->


            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM categories";
                                    $allCategories = mysqli_query($success, $query);
                                    $categoriesCount = mysqli_num_rows($allCategories);

                                    ?>
                                    <div class='huge'><?php echo $categoriesCount; ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM posts";
                                    $allPosts = mysqli_query($success, $query);
                                    $postsCount = mysqli_num_rows($allPosts);

                                    ?>
                                    <div class='huge'><?php echo $postsCount; ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM users";
                                    $allUsers = mysqli_query($success, $query);
                                    $usersCount = mysqli_num_rows($allUsers);

                                    ?>
                                    <div class='huge'><?php echo $usersCount; ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM comments";
                                    $allComments = mysqli_query($success, $query);
                                    $commentsCount = mysqli_num_rows($allComments);

                                    ?>
                                    <div class='huge'><?php echo $commentsCount; ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <?php 
            
            $query = "SELECT * FROM posts WHERE status='Draft'";
            $draftPosts = mysqli_query($success, $query);
            $draftPostsCount = mysqli_num_rows($draftPosts);
            
            $query = "SELECT * FROM comments WHERE status='Unapproved'";
            $unapprovedCommetns = mysqli_query($success, $query);
            $unapprovedCommetnsCount = mysqli_num_rows($unapprovedCommetns);

            $query = "SELECT * FROM users WHERE role='Subscriber'";
            $subscriberUsers = mysqli_query($success, $query);
            $subscriberUsersCount = mysqli_num_rows($subscriberUsers);
            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Element', 'Count'],

                            <?php
                            $elements = ['Categories', 'Active Posts', 'Draft Posts', 'Users', 'Subscriber Users', 'Comments', 'Unapproved Commetns'];
                            $counts = [$categoriesCount, $postsCount, $draftPostsCount, $usersCount, $subscriberUsersCount, $commentsCount, $unapprovedCommetnsCount];
                            for ($i = 0; $i < count($elements); $i++) {
                                echo "['{$elements[$i]}', {$counts[$i]}],";
                            }

                            ?>

                        ]);

                        var options = {
                            chart: {
                                title: 'Company Performance',
                                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php"; ?>