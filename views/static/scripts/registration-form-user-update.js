 $(document).ready(function(){
            // Initial text
            var text1 = "Vous êtes un utilisateur ?";
            var text2 = "Vous êtes un fournisseur ?";

            // Set initial text
            $('#link-role').text(text1);

            // Toggle text on click
            $('#link-role').click(function(){
                $(this).text($(this).text() === text1 ? text2 : text1);
                 $('#admin-input').toggle();
            });


        });