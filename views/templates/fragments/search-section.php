<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>
<div class="container-fluid d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('<?php echo BASE_URL_VIEWS; ?>static/image/snow-plow.jpg'); background-size: cover; background-position: center;">

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="text-black modal-content p-2">
        <span class="d-flex flex-row-reverse" data-bs-dismiss="modal">
          <i class="fa fa-window-close" aria-hidden="true"></i>
        </span>
        <div class="container">
          <div>
            <h3 class="bold">Type de residence</h3>
            <div>
              <div>
                <label>
                  <input type="checkbox">
                  <span class="fil-name">Commercial</span></label>
              </div>
            </div>
            <div>
              <label>
                <input type="checkbox">
                <span class="checkmark"></span>
                <span class="fil-name">Particulier</span></label>
            </div>
          </div>
          <div>
            <h3 class="bold">Services proposes</h3>
            <div>
              <div>
                <label>
                  <input type="checkbox">
                  <span class="fil-name">Ependage</span>
                </label>
              </div>
            </div>
            <div>
              <div>
                <label>
                  <input type="checkbox">
                  <span class="fil-name">Deneigement</span>
                </label>
              </div>
            </div>
            <div>
              <div>
                <label>
                  <input type="checkbox">
                  <span class="fil-name">Transport de neige</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="search-box bg-light rounded shadow p-5">
    <div class="text-black text-center p-5">
      <h2 class="mb-3">Notre liste de fournisseurs</h2>
      <h5 class="mb-4">Decouvrez notre selection de professionnels repondant a vos besoins</h5>
      <div class="container p-3">
        <div class="row justify-content-center mb-2">

          <div class="col-lg-2 col-md-6">
            <p class="d-inline-block h6"> Cherchez par:</p>
          </div>

          <div class="col-lg-3 col-md-6 d-flex">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="searchType" id="codePostal">
              <label class="form-check-label" for="codePostal">
              </label>
            </div>
            <form role="search">
              <input type="search" class="form-control" placeholder="Code postal..." aria-label="Search">
            </form>
          </div>

          <div class="col-lg-3 col-md-6 d-flex">
            <div class="px-2">
              <p class="d-inline-block h6"> ou </p>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="searchType" id="allFournisseurs" checked>
              <label class="form-check-label h6" for="allFournisseurs">
                Tous les fournisseurs
              </label>
            </div>
          </div>

          <div class="col-lg-1 col-md-6">
            <button type="button" class="btn btn-light me-2" data-bs-target="#exampleModalCenter" id="filtrerButton" data-bs-toggle="modal">Filtrer</button>
          </div>

          <div class="col-lg-1 col-md-6">
            <button type="button" class="btn btn-light me-2" id="searchButton">Rechercher</button>
          </div>

        </div>
        <div class="container-fluid">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a href="#home-list" class="nav-link active" data-bs-toggle="tab">Liste</a>
            </li>
            <li class="nav-item">
              <a href="#carte" class="nav-link" data-bs-toggle="tab">Carte</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="home-list">
              <div class="row">
                <div class="col">

                  <!--    1) Numbers of results to show-->
                  <div>
                    14 fournisseurs trouves [pres de l'adresse]
                  </div>

                  <!--    2) Suppliers addresses-->
                  <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary mb-4" style="max-height: 500px; overflow-y: auto;">
                    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/fragments/liste-fournisseurs.php"); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="carte">
              <div class="row">
                <div class="col">

                  <!--    3) [OPTIONAL] additional filters-->
                  <div class="d-flex">
                    <div>
                      <p>
                        Filtres par :
                      </p>
                    </div>
                    <div class="mx-2">
                      <button type="button" class="btn btn-light me-2">Residence</button>
                    </div>
                    <div>
                      <button type="button" class="btn btn-light me-2">Services</button>
                    </div>
                  </div>

                  <!--    4) Map-->
                  <div id="map" class=" mb-4" style="min-height: 500px;border:1px solid black; width:100%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>