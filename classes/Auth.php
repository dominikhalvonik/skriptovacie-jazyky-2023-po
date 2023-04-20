<?php

namespace ukf\classes;

use PDO;

class Auth
{
    private string $host;
    private int $port;
    private string $username;
    private string $password;
    private string $dbName;

    private $connection;

    public function __construct(
        string $host = "localhost",
        int $port = 3306,
        string $user = "root",
        string $password = "",
        string $dbName = "sj-2023-2"
    )
    {
        if(!empty($host)) {
            $this->host = $host;
        }

        if(!empty($port)) {
            $this->port = $port;
        }

        if(!empty($user)) {
            $this->username = $user;
        }

        if(isset($password)) {
            $this->password = $password;
        }

        if(!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new PDO(
                'mysql:charset=utf8;host='.$this->host.';dbname='.$this->dbName.";port=".$this->port,
                $this->username,
                $this->password
            );
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function login(string $name, string $password): bool
    {
        try {
            $hash = hash('sha256',$password);
            $sql = "SELECT COUNT(id) AS is_admin FROM user WHERE meno = '".$name."' AND heslo = '".$hash."'";
            $query = $this->connection->query($sql);
            $login = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($login);
            if($login['is_admin'] == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $exception) {
            return false;
        }
    }
}