<?php
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
?>
<header class="container main-header">
    <div class="logo-holder">
        <a href="<?php echo $menu['home']['path']; ?>"><img src="img/logo.png" height="40 "></a>
    </div>
    <nav class="main-nav">
        <ul class="main-menu" id="main-menu container">
            <?php
            foreach ($menu as $key => $menuItem) {
                echo '<li><a href="'.$menuItem['path'].'">'.$menuItem['name'].'</a></li>';
            }
            ?>
        </ul>
        <a class="hamburger" id="hamburger">
            <i class="fa fa-bars"></i>
        </a>
    </nav>
</header>