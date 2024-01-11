 $(document).ready(function(){
            // Initial text
            var text1 = "Show More";
            var text2 = "Show Less";

            // Set initial text
            $('#link-role').text(text1);

            // Toggle text on click
            $('#link-role').click(function(){
                $(this).text($(this).text() === text1 ? text2 : text1);
                // Add logic here to toggle content visibility or perform other actions
            });
        });