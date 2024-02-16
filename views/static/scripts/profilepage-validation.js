$(document).ready(function(){
    // Cacher tous les contenus d'onglets sauf le premier
    $('.tab-pane').not(':first').removeClass('active show');

    // Lorsqu'un bouton est cliqué
    $('.stylePersoBarreVerticale button').on('click', function () {
        // Retirer la classe active et show de tous les onglets
        $('.stylePersoBarreVerticale button').removeClass('active');
        $('.tab-pane').removeClass('active show');

        // Récupérer l'attribut data-bs-target du bouton cliqué
        var target = $(this).attr('data-bs-target');
        
        // Ajouter la classe active au bouton cliqué
        $(this).addClass('active');
        
        // Afficher le contenu de l'onglet correspondant au bouton cliqué
        $(target).addClass('active show');
    });
});
