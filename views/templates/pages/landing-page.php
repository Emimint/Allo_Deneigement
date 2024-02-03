<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
</head>
<style>
html {
    scroll-behavior: smooth;
}

#navbar {
    position: fixed;
    width: 100%;
    z-index: 999999;
    top: 0;
   
}

body {
    padding-top: 60px;
}

ul.d-flex {
    font-size: 20px; /* Adjust the size as needed */
}


</style>

<body>

<div id="navbar"><?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
</div>


<section id="about">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/about.php"); ?>
</section>


<section id="search-section">
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/search-section.php"); ?>
</section>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>


<script src="<?php echo BASE_URL;?>/static/scripts/map-info.js"></script>

<script>
debugger;
var aboutSectionLink = document.querySelector('li.nav-link:first-child a');
var searchSectionLink =  document.querySelector('li.nav-link:nth-child(3) a');

console.log(searchSectionLink);
console.log(aboutSectionLink);
aboutSectionLink.addEventListener("click", function(){
   // Check if the anchor tag is found
if (aboutSectionLink) {
    // Update the href attribute to "#section"
    aboutSectionLink.href = "#about";
}


})

searchSectionLink.addEventListener("click", function(){
   // Check if the anchor tag is found
if (searchSectionLink) {
    // Update the href attribute to "#section"
    searchSectionLink.href = "#search-section";
}


})

</script>
</body>
</html>

