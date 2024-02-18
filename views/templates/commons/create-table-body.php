<?php

include_once(DOSSIER_BASE_INCLUDE . "controllers/controleur.abstract.class.php");
include_once(DOSSIER_BASE_INCLUDE . "models/demande_de_service.class.php");



function afficherTableau($liste_demande, $liste_fournisseur, $liste_service)
{
    foreach ($liste_demande as $index => $demande) {
        echo "<tr>";
        echo "<td>" . $demande->getIdDemande() . "</td>";
        echo "<td>" . $liste_service[$index] . "</td>";
        echo "<td>" . $demande->getDateDebut() . "</td>";
        echo "<td>" . $demande->getDateFin() . "</td>";
        echo "<td>" . $demande->getStatus() . "</td>";
       
            echo "<td>
                <a href='?=action=ToBeDeterminated'>
                    " . $liste_fournisseur[$index] . "
                </a>
            </td>";
     
      
        echo "<td>
            <div style='width:100%; display:flex; justify-content: space-around;'>
                <a href='?=action=ToBeDeterminated'>
                    <i class='fa-sharp fa-solid fa-circle-info' style='color: #b50303;'>
                    </i>
                </a>
            </div>
        </td>";
        echo "<td>
            <div style='width:100%; display:flex; justify-content: space-around;'>
                <a href='?=action=ToBeDeterminated'>
                    <i class='fa-solid fa-trash' style='color: #b50303;'>
                    </i>
                </a>
            </div>
        </td>";
        echo "</tr>";
    }
}

function afficherTableauFournisseur                                        ($liste_demande, $liste_fournisseur, $liste_service)
{
    foreach ($liste_demande as $index => $demande) {
        echo "<tr>";
        echo "<td>" . $demande->getIdDemande() . "</td>";
        echo "<td>" . $liste_service[$index] . "</td>";
        echo "<td>" . $demande->getDateDebut() . "</td>";
        echo "<td>" . $demande->getDateFin() . "</td>";
        echo "<td>" . $demande->getStatus() . "</td>";
       
         
     
      
        echo "<td>
            <div style='width:100%; display:flex; justify-content: space-around;'>
                <a href='?=action=ToBeDeterminated'>
                    <i class='fa-sharp fa-solid fa-circle-info' style='color: #b50303;'>
                    </i>
                </a>
            </div>
        </td>";
        echo "<td>
            <div style='width:100%; display:flex; justify-content: space-around;'>
                <a href='?=action=ToBeDeterminated'>
                    <i class='fa-solid fa-trash' style='color: #b50303;'>
                    </i>
                </a>
            </div>
        </td>";
        echo "</tr>";
    }
}

