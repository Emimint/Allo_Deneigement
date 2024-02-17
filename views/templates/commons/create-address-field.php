<?php

include_once(DOSSIER_BASE_INCLUDE . "models/adresse.class.php");

function afficherAdresse($adresse)
{
    echo '<div class="row mb-5">
    <div class="col mt-3">
        <div class="form-group row">
            <label for="address" class="col-4 col-form-label">Adresse</label>
            <div class="col-8">
                <input id="address';
    echo $adresse->getIdAdresse();
    echo '" name="address';
    echo $adresse->getIdAdresse();
    echo '" placeholder="Adresse" class="form-control" type="text" value="';
    echo $adresse->getNomRue();
    echo '"></div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-4 col-form-label">Ville</label>
            <div class="col-8">
                <input id="city';
    echo $adresse->getIdAdresse();
    echo '" name="city';
    echo $adresse->getIdAdresse();
    echo '" placeholder="Ville" class="form-control" type="text" value="';
    echo $adresse->getVille();
    echo '">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-4 col-form-label">Pays</label>
            <div class="col-8">
                <input id="country';
    echo $adresse->getIdAdresse();
    echo '" name="country';
    echo $adresse->getIdAdresse();
    echo '" placeholder="Pays" class="form-control" type="text" value="';
    echo $adresse->getPays();
    echo '"></div>
        </div>
        <div class="form-group row">
            <label for="zip-code" class="col-4 col-form-label">Code Postal</label>
            <div class="col-8">
                <input id="zip-code';
    echo $adresse->getIdAdresse();
    echo '" name="zip-code';
    echo $adresse->getIdAdresse();
    echo '" placeholder="Code Postal" class="form-control" type="text" value="';
    echo $adresse->getCodePostal();
    echo '"></div>
        </div>
    </div>
</div>';
}
