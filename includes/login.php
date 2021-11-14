<?php include 'db.php' ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $inputUsername = mysqli_real_escape_string($success, $inputUsername);
    $inputUsername = mysqli_real_escape_string($success, $inputUsername);
    $query = "SELECT * FROM users WHERE username='{$inputUsername}'";
    $selectUser = mysqli_query($success, $query);
    if (!$selectUser) {
        die("Query Failed!" . mysqli_error($success));
    }
    if (mysqli_num_rows($selectUser) == 0) {
        echo "<script>alert('The Username or Password isn\'t correct!');
        window.location.href='../index.php';</script>";
    }

    while ($user = mysqli_fetch_assoc($selectUser)) {
        $password = $user['password'];
        $firstname = $user['fristname'];
        $lastname = $user['lastname'];
        $role = $user['role'];
    }
    if ($inputPassword !== $password) {
        echo "<script>alert('The Username or Password isn\'t correct!');
        window.location.href='../index.php';</script>";
    } elseif($role === "Admin") {

        $_SESSION['username']=$inputUsername;
        $_SESSION['firstname']=$firstname;
        $_SESSION['lastname']=$lastname;
        $_SESSION['role']=$role;

        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }


}



?>