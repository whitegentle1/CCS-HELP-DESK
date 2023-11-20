function toggleLeftDrawer() {
    const leftDrawer = document.getElementById("left-drawer");
    leftDrawer.classList.toggle("hidden");
}
function toggleMainMenuContent(contentId, otherContentIds) {
    var content = document.getElementById(contentId);
    var isHidden = content.classList.contains("hidden");

    if (isHidden) {
        content.classList.remove("hidden");
        otherContentIds.forEach((id) => {
            var otherContent = document.getElementById(id);
            if (otherContent && !otherContent.classList.contains("hidden")) {
                otherContent.classList.add("hidden");
            }
        });
    }
}
document.addEventListener("DOMContentLoaded", function () {
    const drawer = document.querySelector(".drawer");
    const paragraphElements = drawer.querySelectorAll("p");
    const carouselContainer = document.getElementById("carousel-container");
    const carouselContainerRadioButton = document.getElementById(
        "carousel-container-radio-button"
    );

    function updateElement() {
        const screenWidth =
            window.innerWidth || document.documentElement.clientWidth;

        if (screenWidth > 767) {
            const elementToUpdate =
                document.getElementById("carousel-container");
            const elementToUpdate2 = document.getElementById(
                "carousel-container-radio-button"
            );

            if (elementToUpdate || elementToUpdate2) {
                carouselContainer.classList.remove("hidden");
                carouselContainerRadioButton.classList.remove("hidden");
            }
        }
    }

    updateElement();

    window.addEventListener("resize", updateElement);

    paragraphElements.forEach(function (p) {
        p.style.display = "none";
    });

    function hideCarouselOnSmallScreen() {
        if (window.innerWidth < 767) {
            carouselContainer.classList.add("hidden");
            carouselContainerRadioButton.classList.add("hidden");
        }
    }

    function showCarouselOnSmallScreen() {
        if (window.innerWidth < 767) {
            carouselContainer.classList.remove("hidden");
            carouselContainerRadioButton.classList.remove("hidden");
        }
    }

    drawer.addEventListener("mouseenter", function () {
        drawer.classList.remove("w-20");
        drawer.classList.add("w-60");

        paragraphElements.forEach(function (p) {
            p.style.display = "block";
        });
        hideCarouselOnSmallScreen();
    });

    drawer.addEventListener("mouseleave", function () {
        drawer.classList.remove("w-60");
        drawer.classList.add("w-20");

        paragraphElements.forEach(function (p) {
            p.style.display = "none";
        });
        showCarouselOnSmallScreen();
    });
});
const carousel = document.getElementById("carousel");
const radioButtons = document.querySelectorAll('[name="carousel-radio"]');
let currentIndex = 0;

function showItem(index) {
    currentIndex = index;
    const offset = -index * 100 + "%";
    carousel.style.transform = "translateX(" + offset + ")";
    updateRadioButtons(index);
}

function updateRadioButtons(index) {
    radioButtons.forEach((radio, i) => {
        radio.checked = i === index;
    });
}

function next() {
    currentIndex = (currentIndex + 1) % carousel.children.length;
    showItem(currentIndex);
}

setInterval(() => next(), 10000);
