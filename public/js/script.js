const carousels = document.querySelectorAll(".carousel"); // Select all carousel elements

const showHideIcons = () => {
    carousels.forEach(carousel => {
        // showing and hiding prev/next icon according to carousel scroll left value
        let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
        carousel.previousElementSibling.style.display = carousel.scrollLeft == 0 ? "none" : "block";
        carousel.nextElementSibling.style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
    });
}

const autoSlide = (carousel, positionDiff, prevScrollLeft) => {
    // if there is no image left to scroll then return from here
    if (carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = carousel.querySelector("img").clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;

    if (carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const arrowIcons = document.querySelectorAll(".wrapper i");
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let carousel = icon.parentElement.querySelector(".carousel");
        let firstImgWidth = carousel.querySelector("img").clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

document.addEventListener("mouseup", () => {
    carousels.forEach(carousel => {
        autoSlide(carousel, positionDiff, carousel.prevScrollLeft);
    });
});

document.addEventListener("touchend", () => {
    carousels.forEach(carousel => {
        autoSlide(carousel, positionDiff, carousel.prevScrollLeft);
    });
});


const sel = document.querySelector('.entry select');
const label = document.querySelector('.labelline');
const options = sel.querySelectorAll('option');

sel.addEventListener('click', (e) => {
  e.stopPropagation();
  sel.classList.toggle('active');
});

document.body.addEventListener('click', (e) => {
  sel.classList.remove('active');
});

options.forEach((option) => {
  option.addEventListener('click', (e) => {
    e.stopPropagation();
    label.textContent = e.target.textContent;
    sel.classList.remove('active');
  });
});
