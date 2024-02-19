<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>
<div class="container-fluid">
  <section class="masthead text-black" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL_VIEWS; ?>/static/image/snow-plow.jpg'); background-size: cover; background-position: center;">
    <div class="container">
      <div class="masthead-subheading"><?php echo $controleur->getFournisseur()->getNomDeLaCompagnie()?></div>
      <p><?php echo $controleur->getFournisseur()->getDescription()?></p>
    </div>
  </section>

  <div class="ad-service container-fluid">
    <div class="container p-5">
      <!--      Principaux services du fournisseur:-->
      <div class="row">
    <?php foreach ($controleur->getOffre() as $offre): ?>
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                    <div class="text-center p-3">
                        <h5 class="card-title"><?php echo $offre->getDescription(); ?></h5>
                        <br><br>
                        <span class="h2"><?php echo $offre->getPrixUnitaire(); ?></span>/heure
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
                    <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-lg">Selectionner</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

      <!--      Autres services du fournisseurs-->
      <div class="row mt-2">
        <h3>Autres services</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php foreach ($controleur->getOffre() as $offre): ?>
          <div class="accordion-item border rounded">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <?php echo $offre->getCategorie(); ?>
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"> <?php echo $offre->getDescription(); ?>
                <br><br>
                <div class="d-flex flex-row-reverse">
                  <a href="?=action=ToBeDeterminated" class="btn btn-danger text-end">Selectionner</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>

    <div>