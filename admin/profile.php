<?php include "includes/header.php"; ?>

<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='{$username}'";
    $userProfile = mysqli_query($success, $query);
    while ($user = mysqli_fetch_assoc($userProfile)) {
        $id = $user['id'];
        $username = $user['username'];
        $role = $user['role'];
        $lastname = $user['lastname'];
        $firstname = $user['firstname'];
        $email = $user['email'];
    }
}

if (isset($_POST['editUser'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $email = $_POST['email'];

    move_uploaded_file($imageTmp, "../images/$image");

    $query = "UPDATE users SET
                username = '{$username}', 
                firstname='{$firstname}', 
                lastname='{$lastname}', 
                email='{$email}', 
                image='{$image}', 
                role='{$role}', 
                password='{$password}' 
                WHERE id = {$id}";

    $updateUser = mysqli_query($success, $query);

    if (!$updateUser) {
        die('Query Falied!' . mysqli_error($success));
    }

}
?>

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
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                        </div>

                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input type="file" name="image" value="<?php echo $image; ?>">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select class="form-control" name="role" id="">

                                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                                <?php if ($role == "Admin") { ?>
                                    <option value="Subscriber">Subscriber</option>
                                <?php } else { ?>
                                    <option value="Admin">Admin</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="editUser" value="Update Profile">
                        </div>

                    </form>
                </div>


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/footer.php"; ?>