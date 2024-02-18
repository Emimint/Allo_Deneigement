  <!-- Modal for adresse: -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-2">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Adresse de livraison</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form class="row g-3" action="?actionModal=nouvelleAdresse" method="POST">
                      <div class="col-md-8">
                          <label for="inputAddress" class="form-label">Rue/avenue</label>
                          <input type="text" class="form-control" name="newRue" id="inputAddress" placeholder="rue Principale, Appartement">
                      </div>

                      <div class="col-md-4">
                          <label for="inputAddress2" class="form-label">Numero</label>
                          <input type="text" class="form-control" name="newNumero" id="inputAddress2" placeholder="Apartment, studio, etage">
                      </div>

                      <div class="d-flex align-items-end">
                          <div class="col-sm-6 mx-1">
                              <label for="ville">Ville</label>
                              <input class="form-control" name="newVille" placeholder="Montreal" />
                              <nordpass-icon data-np-uid="cb62c672-0256-4aa3-be50-a7bc133f49bd"></nordpass-icon>
                          </div>
                          <div class="col-sm-3 mx-1">
                              <label for="PostalCode">Code Postal</label>
                              <input class="form-control" name="newPostalCode" placeholder="A1B 2C3" />
                          </div>
                      </div>
                      <div class="d-flex align-items-end">
                          <div class="col-sm-3 mx-1">
                              <label for="Province">Province</label>
                              <select class="form-select" name="newProvince" required="">
                                  <option value="" disabled="" selected="">Sélectionnez une province</option>
                                  <option value="Alberta">AB</option>
                                  <option value="Colombie_Britanique">BC</option>
                                  <option value="Il-du-Prince-edouard">PE</option>
                                  <option value="Manitoba">MB</option>
                                  <option value="Nouveau-Brunswick">NB</option>
                                  <option value="Nouvelle-ecosse">NS</option>
                                  <option value="Ontario">ON</option>
                                  <option value="Quebec">QC</option>
                                  <option value="Saskatchewan">SK</option>
                                  <option value="Terre-Neuve-et-Labrador">NL</option>
                                  <option value="Nuvavut">NU</option>
                                  <option value="Territoure du Nord-Ouest">NT</option>
                                  <option value="Yukon">YT</option>
                              </select>
                          </div>
                          <div class="col-sm-3 mx-1">
                              <label for="Pays">Pays</label>
                              <input class="form-control" name="newPays" placeholder="Canada" />
                          </div>
                      </div>


                      <div class="col-12 mt-5">
                          <button name="nouvelleAdresse" type="submit" class="btn btn-primary">Soumettre</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>