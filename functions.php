<?php

namespace ukf;

use PDO;

class Menu
{
    private $sourceFileName = "source/headerMenu.json";

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

    public function getMenuData(string $type): array
    {
        $menu = [];

        if ($this->validateMenuType($type)) {
            if ($type === "header") {
                try {
                    //$menuJsonFile = file_get_contents($this->sourceFileName);
                    //$menu = json_decode($menuJsonFile, true);

                    $sql = "SELECT * FROM menu";
                    $query = $this->connection->query($sql);
                    $menuData = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($menuData as $menuItem) {
                        $menu[$menuItem['sys_name']] = [
                            'name' => $menuItem['user_name'],
                            'path' => $menuItem['path'],
                            'id' => $menuItem['id']
                        ];
                    }
                } catch (\Exception $exception) {
                    //echo $exception->getMessage();
                }
            }
        }

        return $menu;
    }

    public function insertMenuItem(string $sysName, string $userName, string $path): bool
    {
        $sql = "INSERT INTO menu (sys_name, user_name, path) 
                VALUE ('".$sysName."', '".$userName."', '".$path."')";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute();
            return $insert;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function deleteMenuItem(int $id): bool
    {
        $sql = "DELETE FROM menu WHERE id = ".$id;
        $statement = $this->connection->prepare($sql);
        try {
            $delete = $statement->execute();
            return $delete;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function printMenu(array $menu)
    {
        foreach ($menu as $menuName => $menuData) {
            echo '<li><a href="' . $menuData['path'] . '">' . $menuData['name'] . '</a></li>';
        }
    }

    private function validateMenuType(string $type): bool
    {
        $menuTypes = [
            'header',
            'footer'
        ];

        if (in_array($type, $menuTypes)) {
            return true;
        } else {
            return false;
        }
    }


    public function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
    {
        $portfolio = [];
        $colIndex = 1;

        for ($i = 1; $i <= $numberOfRows; $i++) {
            for ($j = 1; $j <= $numberOfCols; $j++) {
                $portfolio[$i][] = $colIndex;
                $colIndex++;
            }
        }

        return $portfolio;
    }
}


?>