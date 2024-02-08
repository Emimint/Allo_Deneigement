$(document).ready(function () {
  // Use AJAX to fetch data from JSON file
  $.ajax({
    url: "service_request_details.json",
    dataType: "json",
    success: function (data) {
      // Populate table body with fetched data
      var tableBody = $("#tableBody");
      tableBody.empty(); // Clear existing rows
      var row;
      $.each(data, function (index, item) {
        row = `<tr>
                  <td>${item.request_id}</td>
                  <td>${item.end_date}</td>
                  <td>${item.start_date}</td>
                  <td>${item.status}</td>
                  <td>${item.address}</td>
                  <td>${item.comment}</td>
                  <td><a id="details-link" href="#" data-bs-toggle="modal" data-bs-target="#reg-modal"><i class="fa-sharp fa-solid fa-circle-info"></i></a></td>
                </tr>`;

        tableBody.append(row);
      });

      // Initialize DataTable after populating data
      new DataTable("#example");

      // Display data in the modal body
      var modalBody = $(".modal-body");
      modalBody.empty(); // Clear existing content

      modalBody.append(
        `<p class="mb-3"><strong>Start Date:</strong> <input type="text"  value="${data[0].start_date}" disabled /></p>`
      );
      modalBody.append(
        `<p class="mb-3"><strong>End Date:</strong> <input type="text" value="${data[0].end_date}" disabled /></p>`
      );
      modalBody.append(
        `<p class="mb-3"><strong>Review:</strong> <input type="text" value="${data[0].review}" disabled /></p>`
      );
      modalBody.append(
        `<p class="mb-3"><strong>Address:</strong> <input type="text" value="${data[0].address}" disabled /></p>`
      );
      modalBody.append(
        `<p class="mb-3"><strong>Comment:</strong> <input type="text" value="${data[0].comment}" disabled /></p>`
      );

      // Check status and modify buttons accordingly
      var status = data[0].status;
      modifyButtonsBasedOnStatus(status);
      handleUpdate();
      handleClose();
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
    addButton("contacter admin", "Contact-admin", false);
    addButton("contacter fournisseur", "Contact-supplier", false);
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
  } else if (status == "Pending") {
    addButton("Modifier", "Update", false);
    addButton("enregistrer", "Submit", true);
  }
}

function addButton(label, id, status) {
  // Add a new button
  var newButton = $("<button>", {
    type: "button",
    class: "btn btn-primary action-btn",
    id: id,
    text: label,
  });
  newButton.prop("disabled", status);
  // Append the new button to the container
  $(".modal-footer").append(newButton);
}

function handleUpdate() {
  $("#Update").click(function () {
    // Enable specific input fields
    $(".modal-body").find("p input").prop("disabled", false);
    $("#Submit").prop("disabled", false);
  });
}

function handleClose() {
  // Change ".details-link" to "#details-link" since it has an ID
  $("#details-link").on("click", function (event) {
    event.preventDefault();
    $(".modal-body").find("input").prop("disabled", true);
    $("#Submit").prop("disabled", true);
  });
}
