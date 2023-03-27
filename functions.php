<?php

namespace main;

use \PDO;

class Menu
{
    private $filePath = "source/headerMenu.json";

    private string $hostname = "localhost";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "sj-2023";

    private $connection;

    const TEST = 22;


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
            $this->connection = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbName.";port=".$this->port, $this->username, $this->password);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function getMenu(string $type): array
    {
        $menu = [];
        $isValid = $this->validateMenuType($type);

        if($isValid) {
            if($type === "header") {
                try {
                    $sql = "SELECT * FROM menu";
                    $query = $this->connection->query($sql);
                    $menuItems = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($menuItems as $menuItem) {
                        $menu[$menuItem['sys_name']] = [
                            'path' => $menuItem['path'],
                            'name' => $menuItem['user_name'],
                        ];
                    }

                    //$menuJson = file_get_contents($this->filePath);
                    //$menu = json_decode($menuJson, true);
                } catch (\Exception $exception) {
                    //echo $exception->getMessage();
                    $menu = [
                        'home' => [
                            'path' => 'index.php',
                            'name' => 'Domov',
                        ]
                    ];
                }
            }
        }

        return $menu;
    }

    public function printMenu(array $menu)
    {
        foreach ($menu as $key => $menuItem) {
            echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
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

    private function validateMenuType(string $menuType): bool
    {
        $validTypes = [
            'header',
            'footer',
            'main'
        ];

        if(in_array($menuType, $validTypes)) {
            return true;
        } else {
            return false;
        }
    }
}