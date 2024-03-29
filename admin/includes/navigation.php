<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">WevPattern Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <!-- <li><a href="">Online Users: <?php // echo onlineUsers(); ?></a></li> -->
        <li><a href="">Online Users: <span class="onlineusers"></span> </a></li>
        <li><a href="../index.php">Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php

                if (isset($_SESSION['username'])) {
                    echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                }

                ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="posts.php">Veiw Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=addPost">Add Post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories </a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="users.php">Veiw Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=addUser">Add User</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments </a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>