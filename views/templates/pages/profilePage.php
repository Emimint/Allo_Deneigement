
<?php if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost:80/Allo_Deneigement/views/'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/head.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/navbar.php"); ?>
<body>
<div class="container">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="row">
                    <!-- Section pour la photo de profil dans la side navbar -->
                    <div class="col-md-3 mt-3 vertical-bar">
                        <div class="profile-photo-container text-center">
                            <img src="https://img-c.udemycdn.com/user/200_H/anonymous_3.png" alt="Profile Photo" class="img-fluid rounded-circle" width="100">
                            <p class="mt-2">Cylia Oudiai</p>
    
                            <!-- Barre latérale avec les onglets -->
                            <div class="nav flex-column nav-pills group-list" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                <a class="nav-link" id="photo-tab" data-bs-toggle="pill" href="#photo" role="tab" aria-controls="photo" aria-selected="false">Photo</a>
                                <a class="nav-link" id="addresses-tab" data-bs-toggle="pill" href="#addresses" role="tab" aria-controls="addresses" aria-selected="false">Mes Adresses</a>
                                <a class="nav-link" id="payment-tab" data-bs-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Mode de paiement</a>
                            </div>
                           
                        </div>
                    </div>
                    <!--Contenu des onglets -->
                    <div class="col-md-9 mt-3">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Contenu de l'onglet Profile -->
                                <div id="content-container">
                                    <div class="col-md-9">
                                     <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>Votre Profil</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline">
                                        <div class="form-group row mb-3">
                                        <label for="lastname" class="col-4 col-form-label">Nom</label> 
                                           <div class="col-8">
                                                <input id="lastname" name="nom" placeholder="Nom" class="form-control" required="required" type="text">
                                              </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                        <label for="name" class="col-4 col-form-label">Prenom</label> 
                                        <div class="col-8">
                                                <input id="name" name="prenom" placeholder="Prenom" class="form-control" type="text">
                                              </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                        <label for="select" class="col-4 col-form-label">Nom afficher au public</label> 
                                        <div class="col-8">
                                          <select id="select" name="select" class="custom-select">
                                            <option value="admin">Administrateur</option>
                                            <option value="admin">Utilisateur</option>
                                            <option value="admin">Fournisseur</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row mb-3">
                                        <label for="email" class="col-4 col-form-label">Email</label> 
                                        <div class="col-8">
                                          <input id="email" name="email" placeholder="Email" class="form-control" required="required" type="text">
                                        </div>
                                      </div>
                                     
                                      <div class="form-group row mb-3">
                                        <label for="publicinfo" class="col-4 col-form-label">Information Public</label> 
                                        <div class="col-8">
                                          <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                        </div>
                                      </div>
                                     
                                      <div class="form-group row mb-3">
                                        <div class="offset-4 col-8">
                                          <button name="submit" type="submit">Mettre a jour Mon Profile</button>
                                        </div>
                                      </div>
                                      
                                    </form>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                <!-- Contenu de l'onglet Photo -->
                                <div id="photoContent" class="col-md-9 mt-3">
                                    <div class="col-md-9">
                                        <div class="card mx-auto">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <h4>Votre Photo</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="/user/edit-photo/" method="post">
                                                            <div class="um-container">
                                                                <input type="hidden" name="csrfmiddlewaretoken" value="8pIEtG7udmnHLScoTIvcDT0mifGfGC0qiQwb2w496VODME97rBbrOMPukz7PImII">
                                                                <div class="ud-form-group">
                                                                    <label for="form-group--1" class="ud-form-label ud-heading-sm">Aperçu de l'image</label>
                                                                    <div class="udlite-in-udheavy">
                                                                        <div class="ud-image-upload-preview-wrapper image-upload-preview-with-crop--preview-wrapper--3mrme">
                                                                            <div class="image-upload-preview-with-crop--image-wrapper--2soBW">
                                                                                <img data-purpose="image-preview" src="https://img-b.udemycdn.com/user/200_H/anonymous_3.png" alt="" height="200" width="200" class="" loading="lazy" style="max-height: 20rem;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="ud-image-upload-form-wrapper">
                                                                            <div class="ud-form-group">
                                                                              <div class="mb-3">
                                                                                <label for="profileImage" class="form-label">Photo de Profil</label>
                                                                                <input type="file" class="form-control" id="profileImage">
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="image_file" value="">
                                                                                   
                                                                            <div class="ud-footer-btns" style="text-align: left;">
                                                                                <button type="submit" data-purpose="user_manage:submit" class="ud-btn ud-btn-large ud-btn-primary ud-heading-md">
                                                                                    <span>Sauvegarder</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                              <label for="cardElement" class="form-label">Informations de la Carte</label>
                                                                              <div id="cardElement"></div>
                                                                              </div>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade text-center" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                                <!-- Contenu de l'onglet Mes Adresses -->
                                <h2>Mes Adresses</h2>
                                <div class="card mx-auto">
                                    <div class="card-body">
                                        <div class="col-md-9">
                                            <div class="row profile-container">
                                                <div class="col-md-12">
                                                    <h4>Adresse #1</h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3 text-center">
                                                    <div class="form-group row">
                                                        <label for="address" class="col-4 col-form-label">Adresse</label>
                                                        <div class="col-8">
                                                            <input id="address" name="address" placeholder="Adresse" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="city" class="col-4 col-form-label">Ville</label>
                                                        <div class="col-8">
                                                            <input id="city" name="city" placeholder="Ville" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="country" class="col-4 col-form-label">Pays</label>
                                                        <div class="col-8">
                                                            <input id="country" name="country" placeholder="Pays" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="zip-code" class="col-4 col-form-label">Code Postal</label>
                                                        <div class="col-8">
                                                            <input id="zip-code" name="zip-code" placeholder="Code Postal" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>Adresse #2</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-3 text-center">
                                                <div class="form-group row">
                                                    <label for="address" class="col-4 col-form-label">Adresse</label>
                                                    <div class="col-8">
                                                        <input id="address" name="address" placeholder="Adresse" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="city" class="col-4 col-form-label">Ville</label>
                                                    <div class="col-8">
                                                        <input id="city" name="city" placeholder="Ville" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="country" class="col-4 col-form-label">Pays</label>
                                                    <div class="col-8">
                                                        <input id="country" name="country" placeholder="Pays" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="zip-code" class="col-4 col-form-label">Code Postal</label>
                                                    <div class="col-8">
                                                        <input id="zip-code" name="zip-code" placeholder="Code Postal" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                <!-- Contenu de l'onglet Mode de paiement -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-md-12 text-center">
                                            <h4>Formulaire de Paiement</h4>
                                            <hr>
                                        </div>
                                                <form id="payment-form">
                                                    <!-- Informations de la carte -->
                                                    <div class="mb-3">
                                                        <label for="card-number" class="form-label">Numéro de Carte</label>
                                                        <input type="text" class="form-control" id="card-number" placeholder="**** **** **** ****" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="expiration-date" class="form-label">Date d'Expiration</label>
                                                            <input type="text" class="form-control" id="expiration-date" placeholder="MM/YY" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="cvc" class="form-label">CVC</label>
                                                            <input type="text" class="form-control" id="cvc" placeholder="CVC" required>
                                                        </div>
                                                    </div>
                            
                                                    <!-- Informations du titulaire de la carte -->
                                                    <div class="mt-3">
                                                        <label for="card-holder-name" class="form-label">Nom du Titulaire de la Carte</label>
                                                        <input type="text" class="form-control" id="card-holder-name" placeholder="Nom du Titulaire" required>
                                                    </div>
                            
                                                    <!-- Bouton de Soumission -->
                                                    <button type="submit" class="mt-4">Payer</button>
                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/Allo_Deneigement/views/templates/commons/footer.php"); ?>
<script src="<?php echo BASE_URL; ?>static/scripts/profilePage-validation.js"></script>

</body>
</html>