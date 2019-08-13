<?php
require_once 'autoload.php';

class registerlogin extends dbcon
{
    public function register($username,$password)
    {
        $query = "INSERT INTO systemusers(username, password) VALUES(:username, :password)";
        $query = $this->dbConn->prepare($query);

        $query->bindparam(':username', $username);
        $query->bindparam(':password', $password);
        $query->execute();
    }
}