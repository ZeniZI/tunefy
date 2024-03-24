// Function to toggle the popup
function togglePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
}

// Function to close the popup
function closePopup() {
    var popup = document.getElementById("popup");
    var popupContent = document.querySelector(".popup-content");

    popupContent.classList.add("popup-close-animation");

    setTimeout(function () {
        popup.style.display = "none";
        popupContent.classList.remove("popup-close-animation");
    }, 300); // Sesuaikan dengan durasi animasi
}
