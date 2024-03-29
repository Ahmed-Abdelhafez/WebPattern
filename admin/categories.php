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
                    <!-- Add Category Form -->
                    <div class="col-xs-6">

                        <?php addCategory() ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="title">Category Title</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">

                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- Update Category -->
                        <?php updateCategory() ?>


                    </div>
                    <!-- Veiw Category Table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php displayCategories() ?>
                                <!-- Delete Category -->
                                <?php deleteCategory(); ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php"; ?>