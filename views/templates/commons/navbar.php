<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
            <div>
            <header class="p-3 text-white" style="background-color: #b50303">
            <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo BASE_URL;?>" class="d-flex align-items-center mb-3 mb-lg-0 text-white text-decoration-none me-lg-auto">
            <div class="d-flex align-items-center bd-highlight ">
            <img class="mb-4 mt-3 img-fluid img-logo" src="<?php echo BASE_URL;?>/static/image/flocon-black.svg" style="height: 80px; width: 80px;" alt="LOGO">
            <h4 >ALLO<br> DÉNEIGEMENT
            </div>
            </a>
            <ul class="d-flex  align-items-center nav col-12  col-lg-auto mb-2 mb-md-0">
            <li class="nav-link" ><a href="<?php echo BASE_URL;?>" class="nav-link px-2 text-white">A propos</a></li>
            <li  class="nav-link"><a href="<?php echo BASE_URL;?>/templates/pages/historique-utilisateur.php" class="nav-link px-2 text-white">Mes demandes de service</a></li>
            <li class="nav-link"><a href="<?php echo BASE_URL;?>/templates/pages/contactPage.php" class="nav-link px-2 text-white">Nous joindre</a></li>
            <li class="nav-link"><a href="#" class="nav-link px-2"><i class="fa-regular fa-bell" style="color: #ffffff;"></i></a></li>
            <li class="nav-link dropdown">
            <a href="#" class="nav-link px-2 dropdown-toggle" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" href="?lang=en">English</a></li>
            <li><a class="dropdown-item" href="?lang=fr">Français</a></li>
            </ul>
            </li>
            <li class="nav-linkf user is logged in-->
                <?php
                // Start the session
                //session_start();
                
                // Check if the user is logged in
                //later replace with if (isset($_SESSION['user']))
                if (false) {
                    // User is logged in, display user icon and a logout link
                    
                    echo '<a href="logout.php" ><button type="button" class="btn btn-danger btn-block ">Logout</button></a>';
                } else {
                    // User is not logged in, display the login button
                    echo '<a href="login.php" > <button type="button" class="btn btn-outline-light">Connexion</button></a>';
                }
                ?>
            </li>
            </ul>
            </div>
            </div>
            </header>
            </div> 