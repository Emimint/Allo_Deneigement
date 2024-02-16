<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<section id="navbar">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
</section>
<section id="about">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/about.php"); ?>
</section>
<section id="search-section">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/search-section.php"); ?>
</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/map-info.js"></script>
<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/landing-page-script.js"></script>

</body>

</html>