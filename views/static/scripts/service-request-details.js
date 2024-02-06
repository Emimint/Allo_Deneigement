$(document).ready(function () {
  // Use AJAX to fetch data from JSON file
  $.ajax({
    url: "service_request_details.json",
    dataType: "json",
    success: function (data) {
      // Populate table body with fetched data
      var tableBody = $("#tableBody");
      tableBody.empty(); // Clear existing rows

      $.each(data, function (index, item) {
        var row = `<tr>
                  <td>${item.Service}</td>
                  <td>${item["Date de fin"]}</td>
                  <td>${item["Date de debut"]}</td>
                  <td>${item.Status}</td>
                  <td>${item.Adresse}</td>
                  <td>${item.Fournisseur}</td>
                  <td><a href="#" data-bs-toggle="modal" data-bs-target="#reg-modal"><i class="fa-sharp fa-solid fa-circle-info"></i></a></td>
                </tr>`;

        tableBody.append(row);
      });

      // Initialize DataTable after populating data
      new DataTable("#example");

      // Display data in the modal body
      var modalBody = $(".modal-body");
      modalBody.empty(); // Clear existing content

      $.each(data, function (index, item) {
        // Create paragraphs for each key-value pair
        $.each(item, function (key, value) {
          var paragraph = `<p class="mb-3"><strong>${key}:</strong> ${value}</p>`;
          modalBody.append(paragraph);
        });
      });

      // Check status and modify buttons accordingly
      var status = data[0].Status;
      modifyButtonsBasedOnStatus(status);
    },
    error: function (error) {
      console.error("Error fetching data:", error);
    },
  });
});

function modifyButtonsBasedOnStatus(status) {
  // Remove existing buttons
  $(
    "#updateBtn, #deleteBtn, #CancelBtn, #Contact-admin, #Contact-supplier, #addReviewBtn"
  ).remove();

  // Add buttons based on status
  if (status === "Accepted") {
    addButton("contacter admin", "Contact-admin");
    addButton("contacter fournisseur", "Contact-supplier");
  } else if (status === "Completed") {
    addButton("Add Review", "addReviewBtn");
    // Attach click event to the "Add Review" button
    $("#addReviewBtn")
      .off("click")
      .on("click", function () {
        // Your review logic here
        alert(
          "Add Review button clicked! You can implement your review logic here."
        );
      });
  }
}

function addButton(label, id) {
  // Add a new button
  var newButton = $("<button>", {
    type: "button",
    class: "btn btn-primary action-btn",
    id: id,
    text: label,
  });

  // Append the new button to the container
  $(".modal-footer").append(newButton);
}
// Rest of your script...
