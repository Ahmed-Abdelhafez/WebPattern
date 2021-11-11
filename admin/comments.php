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
                        <small>Subheading</small>
                    </h1>
                    <?php
                    if (isset($_GET['source'])) {

                        switch ($_GET['source']) {
                            case 'addPost';
                                include "includes/posts/addPost.php";
                                break;
                            case 'editPost';
                                include "includes/posts/editPost.php";
                                break;
                        }
                    } else {
                        include "includes/comments/displayComments.php";
                    }
                    ?>
                </div>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/footer.php"; ?>