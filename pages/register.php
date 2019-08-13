<?php
include_once('config.php');
include ('class/registerlogin.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">View Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<br><br>

<div class="container">
    <form action="register.php" method="post" name="form1">
        <table class="table table-bordered table-active">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="form-control"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Register" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>

<?php
if (isset($_POST['Submit']) && !empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    register($username,$password);
//    $query = "INSERT INTO systemusers(username, password) VALUES(:username, :password)";
//    $query = $dbConn->prepare($query);
//
//    $query->bindparam(':username', $username);
//    $query->bindparam(':password', $password);
//    $query->execute();
    header("refresh:0;url=register.php");
}

function register($username)
{
    $x = "Username inputted: " . $username;
    return $x;
}

?>


</body>
</html>