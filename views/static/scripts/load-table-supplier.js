var table;
function populateDataTable(dataArray) {
  table = new DataTable("#showData1", {
    data: dataArray,
    scrollCollapse: true,
    scroller: true,
    scrollY: 300,
    columns: [
      { data: "idDemande" },
      { data: "Service" },
      { data: "dateDebut" },
      { data: "dateFin" },
      { data: "status" },
      { data: "Commentaire" },

      {
        data: null,
        render: function (data, type, row, meta) {
          // Assuming the 'customColumn' data is present in your JSON
          return `<div style="width:100%; display:flex; justify-content: space-around;"><a href="#"><i class="fa-sharp fa-solid fa-circle-info" style="color: #b50303;"></i></a></div>`;
        },
      },
    ],
  });
}

// Event handler for clicking on the custom column
$("#showData1").on("click", "td div a", function () {
  rowData = table.row($(this).closest("tr")).data();
  DisplayBtn_basedOnStatus(rowData.status);
  $("#myModal").modal("show");
});

function DisplayBtn_basedOnStatus(status) {
  // 'Acceptée', 'Refusée', 'En attente', 'Completée'
  if (status === "En attente") {
    $("#acceptBtn").show();
    $("#declineBtn").show();
    $("#completeBtn").hide();
  } else if (status === "Acceptée") {
    $("#acceptBtn").hide();
    $("#declineBtn").hide();
    $("#completeBtn").show();
  } else {
    // Handle other status cases
    $("#acceptBtn").hide();
    $("#declineBtn").hide();
    $("#completeBtn").hide();
  }
}

$("#completeBtn").click(function (e) {
  // e.preventDefault();

  // Assuming you have the demand ID stored in a variable
  var demandId = rowData.idDemande;
  console.log(demandId); // Replace this with the actual demand ID

  // Make an AJAX request to update the status
  $.ajax({
    type: "POST",
    url: "dashboard_fournisseur.php", // Replace with the actual URL
    data: {
      updateStatus: true,
      idDemande: demandId,
      newStatus: "Completée", // Replace with the desired new status
    },
    success: function (response) {
      // Handle the success response, if needed
      console.log("Status updated successfully");
    },
    error: function (error) {
      // Handle the error, if any
      console.error("Error updating status:", error);
    },
  });

  $(document).ajaxStop(function () {
    window.location.reload();
  });
});
