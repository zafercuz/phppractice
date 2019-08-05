<?php
// including the database connection file
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    // checking empty fields
    if (empty($name) || empty($age) || empty($email)) {

        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE users SET name=:name, age=:age, email=:email WHERE id=:id";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':age', $age);
        $query->bindparam(':email', $email);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $age = $row['age'];
    $email = $row['email'];
}
?>
<html>
<head>
    <title>Edit Data</title>
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
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
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


<br/><br/>

<div class="container">
    <a href="index.php" class="btn btn-info">Home</a><br><br>
    <form name="form1" method="post" action="edit.php">
        <table border="0" class="table table-bordered table-active">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td><input type="hidden" class="form-control" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>