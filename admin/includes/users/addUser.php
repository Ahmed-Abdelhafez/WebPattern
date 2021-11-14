<?php

if (isset($_POST['createUser'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $lastname = $_POST['lastname'];
    $fristname = $_POST['fristname'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    move_uploaded_file($imageTmp, "../images/$image");

    $query = "INSERT INTO users
                (username, fristname, lastname, email, image, role, password) 
            VALUES
                ('{$username}','{$fristname}','{$lastname}','{$email}','{$image}','{$role}','{$password}') ";

    $createUser = mysqli_query($success, $query);

    if (!$createUser) {
        die('Query Falied!' . mysqli_error($success));
    }

    header("Location: users.php");
}

?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="fristname">Frist Name</label>
        <input type="text" class="form-control" name="fristname">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label for="image">Profile Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="role">User Role</label>
        <select class="form-control" name="role" id="">
        <option value="Subscriber">Select Role</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="createUser" value="Add User">
    </div>

</form>