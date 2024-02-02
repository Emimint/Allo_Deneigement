<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Allo Déneigement</title>
    <link rel="icon" href="static/image/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSS LIBRAIRIES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo BASE_URL;?>/assets/fontawesome/css/fontawesome.css" rel="stylesheet"/>
    <link href="<?php echo BASE_URL;?>/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/assets/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="<?php echo BASE_URL;?>/static/style/main.css" rel="stylesheet"/>
    <!-- JS LIBRAIRIES -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
			  crossorigin="anonymous"></script>
<!-- Jquery validate plugin -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.js"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  </head>
  <body class="d-flex flex-column vh-100 text-grey">