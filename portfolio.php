<!DOCTYPE html>
<html lang="en">
<?php
include_once "parts/header.php"
?>
<body>
<?php
include_once "parts/body_header.php";
$portfolio = $menuObj->preparePortfolio(2, 4);
?>

<main>
    <section class="banner">
        <div class="container text-white">
            <h1>Portfólio</h1>
        </div>
    </section>
    <section class="container">
        <?php
        foreach ($portfolio as $row => $col) {
            echo '<div class="row">';
            foreach ($col as $index) {
                echo '<div class="col-25 portfolio text-white text-center" id="portfolio-'.$index.'">
                        Web stránka '.$index.'
                      </div>';
            }
            echo '</div>';
        }
        ?>
    </section>

</main>
<?php include_once "parts/footer.php"; ?>
<script src="js/app.js"></script>
</body>
</html>