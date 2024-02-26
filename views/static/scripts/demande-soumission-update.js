function updateSelectedAddress() {
  var selectedOption =
    document.getElementById("field2").options[
      document.getElementById("field2").selectedIndex
    ];
  var selectedAddressId = selectedOption.getAttribute("data-address-id");
  var selectedAddress = selectedOption.text;

  var selectedAddressElement = document.getElementById("selected-address");
  selectedAddressElement.innerHTML = "";

  var li = document.createElement("li");
  li.className = "list-group-item";
  li.appendChild(document.createTextNode(selectedAddress));
  selectedAddressElement.appendChild(li);

  document.getElementById("selected-address-id").value = selectedAddressId;
}

function updateDureeAndPrice() {
  var field3 = document.getElementById("field3");
  var selectedOption = field3.options[field3.selectedIndex];
  var duration = selectedOption.text.split(":")[0];
  var price = parseFloat(selectedOption.text.split(":")[1]);
  document.getElementById("duree-forfait").textContent = duration;
  document.getElementById("total").textContent = price.toFixed(2) + "$";
  document.getElementById("selected-duration").value = duration;
}
