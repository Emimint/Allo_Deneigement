<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>

<style>
    #item-card {
        width: 280px;
        padding: 20px;


    }

    #items {
        margin-left: 5%;
        margin-right: 5%;
    }

    .card-body {}
</style>
<div class="container-fluid">
    <section class="masthead text-black" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL_VIEWS; ?>/static/image/snow-plow.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="masthead-subheading"><?php echo $controleur->getFournisseur()->getNomDeLaCompagnie() ?></div>
            <p><?php echo $controleur->getFournisseur()->getDescription() ?></p>
        </div>
    </section>

    <div class="ad-service container-fluid">
        <div class="container p-5">
            <!--      Principaux services du fournisseur:-->
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $first = true;
                    foreach ($controleur->getOffre() as $offre) :
                    ?>
                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                            <div class="row" id="items">
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="card h-100 shadow-lg" id="item-card">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="card-title"><?php echo $offre->getDescription(); ?></h5>
                                                <br><br>
                                                <span class="h2"><?php echo $offre->getPrixUnitaire(); ?></span>$/heure
                                                <br><br>
                                            </div>
                                            <p class="card-text"><?php echo $offre->getDescription(); ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item <?php echo ($offre->getTypeClientele() === 'Résidentiel') ? 'active' : ''; ?>">
                                                <i class="fa <?php echo ($offre->getTypeClientele() === 'Résidentiel') ? 'fa-check' : 'fa-times'; ?>" aria-hidden="true"></i>
                                                Résidentiel
                                            </li>
                                            <li class="list-group-item <?php echo ($offre->getTypeClientele() === 'Commercial') ? 'active' : ''; ?>">
                                                <i class="fa <?php echo ($offre->getTypeClientele() === 'Commercial') ? 'fa-check' : 'fa-times'; ?>" aria-hidden="true"></i>
                                                Commercial
                                            </li>
                                        </ul>
                                        <div class="card-body text-center">
                                            <a href="?action=faireDemandeSoumission&id_fournisseur=<?php echo $FournisseurAssocie->getIdFournisseur(); ?>" class="btn btn-lg">Selectionner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $first = false;
                    endforeach;
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="margin-top: 20% ;margin-bottom: 20% ;">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="margin-top: 20% ;margin-bottom: 20% ;">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <!--      Autres services du fournisseurs-->
            <div class="row mt-2">
                <h3>Autres services</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php foreach ($controleur->getOffre() as $index => $offre) : ?>
                        <div class="accordion-item border rounded">
                            <h2 class="accordion-header" id="flush-heading<?php echo $index; ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $index; ?>">
                                    <?php echo $offre->getCategorie(); ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $index; ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php echo $offre->getDescription(); ?>
                                    <br><br>
                                    <div class="d-flex flex-row-reverse">
                                        <a href="?action=ToBeDetermined" class="btn btn-danger text-end">Selectionner</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>

        <div>