// Function to toggle the sidebar
function toggleSidebar() {
    var sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("sidebar-open");
}

// Function to activate the current page link in the sidebar
function activateCurrentPageLink() {
    var currentPage = window.location.pathname.split("/").pop(); // Get the current page filename
    var menuLinks = document.querySelectorAll(".menu a"); // Select all menu links

    menuLinks.forEach(function (link) {
        var href = link.getAttribute("href").split("/").pop(); // Get the href attribute of the link

        // Check if the link href matches the current page filename
        if (href === currentPage) {
            link.classList.add("active"); // Add the 'active' class to the link
        }
    });
}

// Call the function to activate the current page link when the DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    activateCurrentPageLink();
});

function loadSidebarContent() {
    fetch('/sidebar/global') // Change this line to point to global.php
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("sidebarContainer").innerHTML = data;
            // Add event listeners to sidebar links
            document.querySelectorAll(".menu a").forEach((link) => {
                link.addEventListener("click", function (event) {
                    event.preventDefault(); // Prevent default link behavior
                    const href = this.getAttribute("href");
                    // Navigate to the specified page
                    window.location.href = href;
                });
            });
        })
        .catch((error) =>
            console.error("Error fetching sidebar content:", error)
        );
}

window.addEventListener("DOMContentLoaded", loadSidebarContent);
