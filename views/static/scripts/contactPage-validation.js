
$(document).ready(function () {
   
    function resetErrors() {
        $(".error-message").hide();
    }

    resetErrors();
    let usernameError = true;
    let firstNameError = true;
    let emailError = true;
    let phoneError = true;
    let adresseError = true;
    let paysError = true;

    let codePostalError = true;
    let selectProvinceError = true;
    let selectError = true;
    let villeError = true;


    $(".deneigement-validate-username").keyup(function () {
        validateUsername();
    });

    $(".deneigement-validate-firstname").keyup(function () {
        validateFirstname();
    });

    $(".deneigement-validate-nomEntreprise").keyup(function () {
     validateNomEntreprise();
            
    });

    $(".deneigement-validate-email").keyup(function () {
        validateEmail();
    });

    $(".deneigement-validate-phoneNumber").keyup(function () {
        validatePhoneNumber();
    });

    $(".deneigement-validate-selectionMenu").change(function () {
        validateSelectionMenu();
    });

    $(".deneigement-validate-adresse").keyup(function () {
        validateAdresse();
    });

    $(".deneigement-validate-ville").keyup(function () {
        validateVille();
    });

    $(".deneigement-validate-pays").keyup(function () {
        validatePays();
    });

    $(".deneigement-validate-codePostal").keyup(function () {
        validateCodePostal();
    });

    $(".deneigement-validate-selectionProvince").change(function () {
        validateSelectionProvince();
    });
    
    
  // validation username

  function validateUsername() {
    let usernameValue = $("input[name='nom']").val();
    if (usernameValue.trim() === "") {
        $("#usercheck").show();
        usernameError = false;

    }else if (usernameValue.length < 3 || usernameValue.length > 10) {
        $("#usercheck").show();
        $("#usercheck").html("Veuillez saisir au moins 3 caractères");
        usernameError = false;
    } else {
        $("#usercheck").hide();
        usernameError = true;
    }
  }

 // validation firstname
   function validateFirstname() {
    let firstNameValue = $("input[name='prenom']").val();
    if (firstNameValue.trim() === "") {
        $("#firstNameCheck").show();
        firstNameError = false;
    } else if (firstNameValue.length < 3 || firstNameValue.length > 10) {
        $("#firstNameCheck").show();
        $("#firstNameCheck").html("Veuillez saisir au moins 3 caracteres");
        firstNameError = false;
    } else {
        $("#firstNameCheck").hide();
        firstNameError = true;
    }
   }

   // validation nom entreprise
   
   function validateNomEntreprise() {
    let nomEntrepriseValue = $("input[name='nomEntreprise']").val();
    if (nomEntrepriseValue.trim() === "") {
        $("#entrepriseCheck").show();
        entrepriseError = false;
    } else if (nomEntrepriseValue.length < 3 || nomEntrepriseValue.length > 10) {
        $("#entrepriseCheck").show();
        $("#entrepriseCheck").html("Veuillez saisir entre 3 et 10 caractères.");
        entrepriseError = false;
    } else {
        $("#entrepriseCheck").hide();
        entrepriseError = true;
    }
}

 // validation email
   function validateEmail() {
    let emailValue = $("input[name='email']").val();
    let emailRegex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    if (emailValue.trim() === "") {
        $("#emailCheck").show();
    } else if (!emailRegex.test(emailValue.trim())) {
        $("#emailCheck").show();
        emailError = false;
    } else {
        $("#emailCheck").hide();
        emailError = true;
    }
   }  

 // validation phone number
 function validatePhoneNumber() {
    let phoneNumberValue = $("input[name='telephone']").val();
    let phoneRegex = /^\d{10}$/;

    if (!phoneRegex.test(phoneNumberValue.trim())) {
        $("#phoneCheck").show().text("Veuillez saisir un numéro de téléphone valide.");
        phoneError = false;
    } else {
        $("#phoneCheck").hide();
        phoneError = true;
    }
    }

     // validation selection menu
    function validateSelectionMenu() {
        let selectionMenuValue = $("select[name='selectionMenu']").val();
        if (selectionMenuValue === "") {
           $('#selectError').show().text("veuillez choisir un probleme.");
        } else {
            $("#selectError").hide();
            selectError = true;
        }
    }

      // validation adresse
      function validateAdresse(){
        let adresseValue = $("input[name='adresse']").val();
    let adresseRegex = /^[a-zA-Z0-9\s,'-]*$/;

    if (!adresseRegex.test(adresseValue.trim())) {
      
        $("#adresseCheck").show().text("Veuillez saisir une adresse valide.");
        adresseError = false;
    } else {
      
        $("#adresseCheck").hide();
        adresseError = true;
    }
    }

     // validation pays
     function validatePays(){
        let paysValue = $("input[name='pays']").val();
    let paysRegex = /^[a-zA-Z0-9\s,'-]*$/;

    if (!paysRegex.test( paysValue.trim())) {
       
        $("#paysCheck").show().text("Veuillez saisir un pays valide.");
        paysError = false;
    } else {
        
        $("#paysCheck").hide();
        paysError = true;
    }
    }

    function validateVille(){
        let villeValue = $("input[name='ville']").val();
    let villeRegex = /^[a-zA-Z0-9\s,'-]*$/;

    if (!villeRegex.test(villeValue.trim())) {
       
        $("#villeCheck").show().text("Veuillez saisir une ville valide.");
        villeError = false;
    } else {
        
        $("#villeCheck").hide();
        villeError = true;
    }
    }
    
     // validation privince
     function validateSelectionProvince() {
        let provinceValue = $("select[name='selectionProvince']").val();
        if (provinceValue === "") {
            $('#selectProvinceError').text("Veuillez choisir une province.").show();
            return false;
        } else {
            $("#selectProvinceError").hide();
            return true;
        }
    }

     // Validation codePostal
   function validateCodePostal(){
    let codePostalValue = $("input[name='codePostal']").val();
    let codePostalRegex = /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/;

    if(!codePostalRegex.test(codePostalValue.trim())){
        $("#codePostalCheck").show().text("Veuillez saisir un code postal valide.");
        codePostalError = false;
    } else {
        $("#codePostalCheck").hide();
        codePostalError = true;
    }
    }

    $("#signupForm").submit(function (event) {
        event.preventDefault();

        resetErrors();

        validateUsername();
        validateFirstname();
        validateEmail();
        validateSelectionMenu();

        if (usernameError == true && firstNameError == true && emailError == true && selectError) {
            this.submit();
        } else {
            alert("Veuillez remplir tous les champs obligatoires correctement.");
        }
    });


   
});
