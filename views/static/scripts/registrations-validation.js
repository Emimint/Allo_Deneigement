$(document).ready(function () {
  $("#myForm").validate({
    rules: {
      companyName: {
        required: true,
      },
      firstName: {
        required: true,
      },
      lastName: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      confirmPassword: {
        required: true,
        equalTo: "#password",
      },
    },
    messages: {
      companyName: "Veuillez saisir le nom de votre compagnie.",
      firstName: "Veuillez saisir votre prénom.",
      lastName: "Veuillez saisir votre nom de famille.",
      email: {
        required: "Veuillez entrer votre addresse courriel.",
        email: "Veuillez entrer une adresse courriel valide.",
      },
      password: {
        required: "Veuillez saisir un mot de passe.",
        minlength: "Votre mot de passe doit contenir au moins 6 caracteres.",
      },
      confirmPassword: {
        required: "Veuillez confirmer votre mot de passe.",
        equalTo: "Les mots de passe doivent correspondre.",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
