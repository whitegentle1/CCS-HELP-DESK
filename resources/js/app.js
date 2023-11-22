import "./bootstrap";
import "flowbite";
import { Carousel, initTE } from "tw-elements";
initTE({ Carousel });

Livewire.hook("commit", ({ component, commit, respond, succeed, fail }) => {
    succeed(({ snapshot, effect }) => {
        queueMicrotask(() => {
            initFlowbite();
            initMap();
            initTE({ Carousel });
        });
    });
});

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
    initMap();
    initTE({ Carousel });
});

Livewire.hook("component.initialized", (component) => {
    initMap();
    initTE({ Carousel });
});

Livewire.hook("message.processed", (message, component) => {
    initMap();
    initTE({ Carousel });
});

document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.getElementById("carouselDarkVariant");

    const interval = setInterval(function () {
        const event = new Event("click");
        const nextButton = document.querySelector('[data-te-slide="next"]');
        nextButton.dispatchEvent(event);
    }, 3000);

    carousel.addEventListener("te:destroy", function () {
        clearInterval(interval);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.getElementById("controls-carousel");

    const interval = setInterval(function () {
        const event = new Event("click");
        const nextButton = document.querySelector("[data-carousel-next]");
        nextButton.dispatchEvent(event);
    }, 5000);

    carousel.addEventListener("te:destroy", function () {
        clearInterval(interval);
    });
});
