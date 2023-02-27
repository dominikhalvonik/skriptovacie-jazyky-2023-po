<!DOCTYPE html>
<html lang="sk">
<?php
include_once "parts/header.php";
?>
<body>
<?php
include_once "parts/body_header.php"
?>
  <main>
    <section class="banner">
      <div class="container text-white">
        <h1>Q&A</h1>
      </div>
    </section>
      <?php include_once "parts/body_perex.php"; ?>
      <section class="container">
      <div class="accordion">
        <div class="question">Otázka 1</div>
        <div class="answer">Odpoveď 1</div>
      </div>
      <div class="accordion">
        <div class="question">Otázka 2</div>
        <div class="answer">Odpoveď 2</div>
      </div>
      <div class="accordion">
        <div class="question">Otázka 3</div>
        <div class="answer">Odpoveď 3</div>
      </div>
    </section>
  </main>
<?php include_once "parts/footer.php"; ?>
<script src="js/accordion.js"></script>
<script src="js/app.js"></script>
</body>
</html>