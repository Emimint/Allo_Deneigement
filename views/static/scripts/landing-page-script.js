var aboutSectionLink = document.querySelector("li.nav-link:first-child a");
var searchSectionLink = document.querySelector("li.nav-link:nth-child(3) a");

aboutSectionLink.addEventListener("click", function () {
  // Check if the anchor tag is found
  if (aboutSectionLink) {
    // Update the href attribute to "#section"
    aboutSectionLink.href = "#about";
  }
});

searchSectionLink.addEventListener("click", function () {
  // Check if the anchor tag is found
  if (searchSectionLink) {
    // Update the href attribute to "#section"
    searchSectionLink.href = "#search-section";
  }
});
