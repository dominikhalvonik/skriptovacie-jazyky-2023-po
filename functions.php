<?php

function getMenu(string $type): array
{
    $menu = [];

    $isValid = validateMenuType($type);

    if($isValid) {
        if($type === "header") {
            $menu = [
                'home' => [
                    'path' => 'index.php',
                    'name' => 'Domov',
                ],
                'portfolio' => [
                    'path' => 'portfolio.php',
                    'name' => 'Portfólio',
                ],
                'faq' => [
                    'path' => 'qna.php',
                    'name' => 'Q&A',
                ],
                'contact' => [
                    'path' => 'kontakt.php',
                    'name' => 'Kontakt',
                ],
            ];
        }
    }

    return $menu;
}

function printMenu(array $menu)
{
    foreach ($menu as $key => $menuItem) {
        echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
    }
}

function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
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

function validateMenuType(string $menuType): bool
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