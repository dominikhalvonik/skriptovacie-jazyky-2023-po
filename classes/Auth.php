<?php

namespace ukf\classes;

use PDO;

class Auth
{
    private string $hostname = "localhost";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "sj-2023";

    private $connection;


    public function __construct(string $host = "", int $port = 3306, string $user = "", string $pass = "", string $dbName = "")
    {
        if(!empty($host)) {
            $this->hostname = $host;
        }

        if(!empty($port)) {
            $this->port = $port;
        }

        if(!empty($user)) {
            $this->username = $user;
        }

        if(!empty($pass)) {
            $this->password = $pass;
        }

        if(!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            //"mysql:host=localhost;dbname=sj-2023;port=3306"
            $this->connection = new PDO("mysql:charset=utf8;host=".$this->hostname.";dbname=".$this->dbName.";port=".$this->port, $this->username, $this->password);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function login(string $username, string $pass): bool
    {
        $sql = "SELECT COUNT(id) AS user_exists FROM user WHERE username = '".$username."' AND password = '".$pass."'";
        $query = $this->connection->query($sql);
        $login = $query->fetch(PDO::FETCH_ASSOC);

        if($login['user_exists'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}