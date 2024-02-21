var rating_data = 0;

$("#add_review").click(function () {
  $("#review_modal").modal("show");
});

$(document).on("mouseenter", ".submit_star", function () {
  var rating = $(this).data("rating");

  reset_background();

  // Highlight stars up to the selected rating
  for (var count = 1; count <= rating; count++) {
    $("#submit_star_" + count).addClass("text-warning");
  }

  // Update the hidden input with the selected rating
  $("#score").val(rating);
});

function reset_background() {
  for (var count = 1; count <= 5; count++) {
    $("#submit_star_" + count).addClass("star-light");

    $("#submit_star_" + count).removeClass("text-warning");
  }
}

$(document).on("mouseleave", ".submit_star", function () {
  reset_background();

  for (var count = 1; count <= rating_data; count++) {
    $("#submit_star_" + count).removeClass("star-light");

    $("#submit_star_" + count).addClass("text-warning");
  }
});

$(document).on("click", ".submit_star", function () {
  rating_data = $(this).data("rating");
});

// $("#save_review").click(function () {
//   var user_name = $("#user_name").val();

//   var user_review = $("#user_review").val();

//   if (user_name == "" || user_review == "") {
//     alert("Please Fill Both Field");
//     return false;
//   } else {
//     $.ajax({
//       url: "",
//       method: "POST",
//       data: {
//         rating_data: rating_data,
//         user_name: user_name,
//         user_review: user_review,
//       },
//       success: function (data) {
//         $("#review_modal").modal("hide");

//         // load_rating_data();

//         alert(data);
//       },
//     });
//   }
// });
