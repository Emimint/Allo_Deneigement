$(document).ready(function () {
  var BASE_URL =
    "http://localhost:80/Allo_Deneigement/views/templates/pages/soumission-offre.php";
  var table = new DataTable("#showData", {
    ajax: "./test-table.json",

    scrollCollapse: true,
    scroller: true,
    scrollY: 300,
    columnDefs: [
      {
        targets: 6,
        render: function (data, type, row, meta) {
          data = `<div  style="width:100%; display:flex; justify-content: space-around;"><a id="detail-link" href="#"><i class="fa-sharp fa-solid fa-circle-info" style="color: #b50303;"></i></a></div>`;
          return data;
        },
      },
      {
        targets: 7, // Index of the new column
        render: function (data, type, row, meta) {
          data =
            '<div style="width:100%; display:flex; justify-content: space-around;"><a id="delete-link" href="#" ><i class="fa-solid fa-trash" style="color: #b50303;"></i></a></div>';
          return data;
        },
      },
    ],
  });

  // Event delegation for dynamic elements
  $(document).on("click", "#detail-link", function (e) {
    e.preventDefault();

    var rowData = table.row($(this).closest("tr")).data();
    populateModal(rowData);

    disableAllBtn();
    $("#largeModal").modal("show");
  });

  //modify event
  $("#UpdateBtn").click(function (e) {
    e.preventDefault();
    enableBtn();
  });

  //Save event
  $("#SaveBtn").click(function (e) {
    e.preventDefault();
    $("#largeModal").modal("hide");
  });

  $("#delete-request-btn").click(function (e) {
    e.preventDefault();

    alert("demande supprimee");
    $("#delete-modal").modal("hide");
  });

  //delete event
  $(document).on("click", "#delete-link", function () {
    $("#delete-modal").modal("show");
  });
});

function verifyStatus(rowData) {
  var status = rowData[4].toLowerCase();

  switch (status) {
    case "complete":
      // Status is 'Complete', hide the button
      $("#UpdateBtn").hide();
      break;
    case "annule":
      // Status is 'Annule', show the button or perform other logic
      $("#UpdateBtn").hide();
      $("#ReviewBtn").hide();

      break;
    case "en cours":
      // Status is 'En cours', show the button or perform other logic
      $("#contacterFournisseurBtn").hide();
      $("#contacterAdminBtn").hide();
      $("#ReviewBtn").hide();

      break;
    case "accepted":
      // Status is 'Accepted', show the button or perform other logic
      $("#contacterAdminBtn").hide();
      $("#ReviewBtn").hide();

      break;
    default:
      // Handle other status values or provide a default case
      break;
  }
}

function populateModal(rowData) {
  // Populate input fields in the modal
  $("#startDate").val(rowData[2]);
  $("#endDate").val(rowData[3]);
  $("#status").val(rowData[4]);
  $("#commentaire").val(rowData[6]);
  // Add more fields as needed
  // Show all buttons
  $(
    "#SaveBtn, #contacterFournisseurBtn, #contacterAdminBtn, #UpdateBtn,#ReviewBtn"
  ).show();
  verifyStatus(rowData);
}

function enableBtn() {
  $("#startDate, #endDate, #commentaire").prop("readonly", false);
  $("#SaveBtn").prop("disabled", false);
}

function disableAllBtn() {
  $("#startDate, #endDate, #status, #commentaire").prop("readonly", true);
  $("#SaveBtn").prop("disabled", true);
}
