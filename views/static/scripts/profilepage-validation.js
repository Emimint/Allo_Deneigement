  // Fonction pour afficher le contenu de la section "Profile"
  function showProfile() {
    document.getElementById("profileContent").style.display = "block";
    document.getElementById("addressesContent").style.display = "none";
    document.getElementById("photoContent").style.display = "none";
    document.getElementById("paymentContent").style.display = "none";
}
 // Fonction pour afficher le contenu de la section "adresse"
function showAddresses() {
    document.getElementById("profileContent").style.display = "none";
    document.getElementById("addressesContent").style.display = "block";
    document.getElementById("photoContent").style.display = "none";
    document.getElementById("paymentContent").style.display = "none";
}

 // Fonction pour afficher le contenu de la section "photo"
 function showPhoto() {
    document.getElementById("profileContent").style.display = "none";
    document.getElementById("addressesContent").style.display = "none";
    document.getElementById("photoContent").style.display = "block";
    document.getElementById("paymentContent").style.display = "none";
}

 // Fonction pour afficher le contenu de la section "paiement"
function showPayment() {
    document.getElementById("profileContent").style.display = "none";
    document.getElementById("addressesContent").style.display = "none";
    document.getElementById("photoContent").style.display = "none";
    document.getElementById("paymentContent").style.display = "block";
}