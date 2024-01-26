document.addEventListener("DOMContentLoaded", function () {
  var myModal = new bootstrap.Modal(
    document.getElementById("exampleModalCenter")
  );

  $("#field2").change(function () {
    if ($(this).val() === "Saississez une adresse...") {
      myModal.show();
    }
  });

  $("#filtrerButton").click(function () {
    myModal.show();
  });
});
