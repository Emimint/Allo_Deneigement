<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>
<div class="container-fluid">
  <section class="masthead text-black" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL_VIEWS; ?>/static/image/snow-plow.jpg'); background-size: cover; background-position: center;">
    <div class="container">
      <div class="masthead-subheading">Deneigement Martineau et Fils</div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
    </div>
  </section>

  <div class="ad-service container-fluid">
    <div class="container p-5">
      <!--      Principaux services du fournisseur:-->
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 shadow-lg">
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title">Ependage</h5>
                <br><br>
                <span class="h2">$8</span>/heure
                <br><br>
              </div>
              <p class="card-text">consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fa fa-check" aria-hidden="true"></i>
                Particuliers
              </li>
              <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i>
                Commercial</li>
              <li class="list-group-item"><i class="fa fa-times" aria-hidden="true"></i>
                Zones multiples</li>
            </ul>
            <div class="card-body text-center">
              <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-lg">Selectionner</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 shadow-lg">
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title">Ramassage de neige</h5>
                <br><br>
                <span class="h2">$100</span>/tonne
                <br><br>
              </div>
              <p class="card-text">consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fa fa-check" aria-hidden="true"></i>
                Particuliers
              </li>
              <li class="list-group-item"><i class="fa fa-times" aria-hidden="true"></i>
                Commercial</li>
              <li class="list-group-item"><i class="fa fa-times" aria-hidden="true"></i>
                Zones multiples</li>
            </ul>
            <div class="card-body text-center">
              <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-lg">Selectionner</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card h-100 shadow-lg">
            <div class="card-body">
              <div class="text-center p-3">
                <h5 class="card-title">Elagage</h5>
                <br><br>
                <span class="h2">$40</span>/arbre
                <br><br>
              </div>
              <p class="card-text">consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fa fa-check" aria-hidden="true"></i>
                Particuliers
              </li>
              <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i>
                Commercial</li>
              <li class="list-group-item"><i class="fa fa-check" aria-hidden="true"></i>
                Zones multiples</li>
            </ul>
            <div class="card-body text-center">
              <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-lg">Selectionner</a>
            </div>
          </div>
        </div>
      </div>
      <!--      Autres services du fournisseurs-->
      <div class="row mt-2">
        <h3>Autres services</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item border rounded">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Ramassage de feuilles mortes
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                <br><br>
                <div class="d-flex flex-row-reverse">
                  <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-danger text-end">Selectionner</a>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item border rounded">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Deglacage des cours
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.
                <br><br>
                <div class="d-flex flex-row-reverse">
                  <a href="http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php" class="btn btn-danger text-end">Selectionner</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>