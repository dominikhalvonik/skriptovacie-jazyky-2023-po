<?php
$menu = [
    'home' => [
        'name' => 'Domov',
        'path' => 'index.php',
    ],
    'portfolio' => [
        'name' => 'Portfólio',
        'path' => 'portfolio.php',
    ],
    'qna' => [
        'name' => 'Q&A',
        'path' => 'qna.php',
    ],
    'kontakt' => [
        'name' => 'Kontakt',
        'path' => 'kontakt.php',
    ]
];
?>

<header class="container main-header">
    <div class="logo-holder">
        <a href="<?php echo $menu['home']['path']; ?>">
            <img alt="img" src="img/logo.png" height="40">
        </a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php
            foreach ($menu as $menuName => $menuData) {
                echo '<li><a href="'.$menuData['path'].'">'.$menuData['name'].'</a></li>';
            }
            ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>