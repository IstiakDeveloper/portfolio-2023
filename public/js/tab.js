// Get all tab links and tab panes
var tabLinks = document.querySelectorAll(".nav-link3");
var tabPanes = document.querySelectorAll(".tab-pane");

// Attach click event listener to each tab link
tabLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
        event.preventDefault();

        // Get the ID of the clicked tab link
        var target = this.getAttribute("href").replace("#", "");

        // Show the corresponding tab pane and hide the others
        tabPanes.forEach(function (pane) {
            if (pane.id === target) {
                pane.classList.add("active", "show");
            } else {
                pane.classList.remove("active", "show");
            }
        });

        // Update the active state of the clicked tab link and hide the others
        tabLinks.forEach(function (link) {
            if (link.getAttribute("href") === "#" + target) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    });
});
