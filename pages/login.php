<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "Username inputted: " . $username;

}

?>
</body>
</html>
