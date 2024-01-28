<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<div>
    <header class="p-3 text-white vw-100" style="background-color: #b50303">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?php echo BASE_URL;?>" class="d-flex align-items-center mb-3 mb-lg-0 text-white text-decoration-none me-lg-auto">
                    <div class="d-flex align-items-center bd-highlight ">
                        <img class="mb-4 mt-3 img-fluid img-logo" src="<?php echo BASE_URL;?>/static/image/flocon-black.svg" style="height: 80px; width: 80px;" alt="LOGO">
                        <h4 >ALLO<br> DÉNEIGEMENT
                    </div>
                </a>
                <ul class="d-flex align-items-center nav col-12  col-lg-auto mb-2 mb-md-0 me-5">
                    <li><a href="<?php echo BASE_URL;?>" class="nav-link px-2 text-white">A propos</a></li>
                    <li><a href="<?php echo BASE_URL;?>/templates/pages/historique-utilisateur.php" class="nav-link px-2 text-white">Mes demandes de service</a></li>
                    <li><a href="<?php echo BASE_URL;?>/templates/pages/contactPage.php" class="nav-link px-2 text-white">Nous joindre</a></li>
                    <li><a href="#" class="nav-link px-2"><i class="fa-regular fa-bell" style="color: #ffffff;"></i></a></li>
                    <li><a href="#" class="nav-link px-2 p-6">
                        <div class="d-flex flex-column  bd-highlight align-items-center">
                            <i class="fa-solid fa-globe" style="color: #ffffff;"></i>
                            <p style="color: #ffffff;">EN</p>
                        </div></a></li>
                    <li >
                        <!-- if user is not connected it should render the connexion button -->
                        <div th:switch="${true}">
                            <div th:case="${true}">
                                <button
                                    type="button"
                                    class="btn btn-outline-light dropdown-toggle"
                                    id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">Connexion
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">utilisateur</a></li>
                                    <li><a class="dropdown-item" href="#">fournisseur</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">administrateur</a>
                                    </li>
                                </ul>
                            </button></div>
                            <div th:case="${false}"> <i class="fa-solid fa-user" style="color: #ffffff;"></i></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>


