$(document).ready(function () {
  $("#myForm").submit(function (event) {
    event.preventDefault();
    validateForm();
  });

  function validateForm() {
    let isValid = true;

    // Reset validation feedback
    $(".invalid-feedback").text("");

    // Validate each input field
    isValid = validateInput(
      $("#companyName"),
      /^[a-zA-Z\s]+$/,
      "nom de la compagnie invalide"
    );
    isValid =
      validateInput($("#firstName"), /^[a-zA-Z\s]+$/, "Prenom invalide") &&
      isValid;
    isValid =
      validateInput(
        $("#lastName"),
        /^[a-zA-Z\s]+$/,
        "Nom de famille invalide"
      ) && isValid;
    isValid =
      validateInput(
        $("#email"),
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        "Courriel invalide"
      ) && isValid;
    isValid =
      validateInput(
        $("#password"),
        /^(?=.*[a-z])[a-zA-Z\d]{6,}$/,
        "Entrez un mot de passe de 6 caractères ou plus."
      ) && isValid;
    isValid =
      validateInput(
        $("#confirmPassword"),
        /^(?=.*[a-z])[a-zA-Z\d]{6,}$/,
        "Veuillez confirmer votre mot de passe."
      ) && isValid;

    if ($("#password").val() !== $("#confirmPassword").val()) {
      $("#password, #confirmPassword").addClass("is-invalid");
      $("#confirmPassword")
        .siblings(".invalid-feedback")
        .text("Les mots de passe ne correspondent pas");
      isValid = false;
    }

    // Additional custom validations can be added here

    return isValid;
  }

  function validateInput($input, regex, errorMessage) {
    let inputValue = $input.val().trim();
    let isValid = regex.test(inputValue);

    // Update validation feedback
    if (!isValid) {
      $input.addClass("is-invalid");
      $input.siblings(".invalid-feedback").text(errorMessage);
    } else {
      $input.addClass("is-valid");
    }

    return isValid;
  }
});
