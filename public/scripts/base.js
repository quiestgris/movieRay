let carrouselPosition = document.querySelector(".carrousel-items").scrollLeft;

let activeIndicator = 0;

document.querySelector(".carrousel-arrow.reverse").addEventListener("click", function () {

    activeIndicator++;

    document.querySelector(".carrousel-indicator.active").classList.remove("active");
    document.querySelector(".carrousel-indicators").children[activeIndicator].classList.add("active");

    carrouselPosition = carrouselPosition +
        document.querySelector(".carrousel-item").offsetWidth + 
        (document.querySelector(".carrousel-items").offsetWidth - document.querySelector(".carrousel-items").offsetWidth * 2);

    document.querySelector(".carrousel-items").scrollLeft = 
        carrouselPosition +
        document.querySelector(".carrousel-item").offsetWidth + 
    (document.querySelector(".carrousel-items").offsetWidth - document.(".carrousel-item").offsetWidth * 2);
    
})

document.querySelector(".carrousel-arrow").addEventListener("click", function () {

    activeIndicator--;

    document.querySelector(".carrousel-indicator.active").classList.remove("active");
    document.querySelector(".carrousel-indicators").children[activeIndicator].classList.add("active");

    carrouselPosition = document.querySelector(".carrousel-items").scrollLeft = 
        carrouselPosition -
        document.querySelector(".carrousel-item").offsetWidth - 
        (document.querySelector(".carrousel-items").offsetWidth - document.querySelector(".carrousel-item").offsetWidth * 3);

    document.querySelector(".carrousel-items").scrollLeft = 
        carrouselPosition -
        document.querySelector(".carrousel-item").offsetWidth - 
        (document.querySelector(".carrousel-items").offsetWidth - document.querySelector(".carrousel-item").offsetWidth * 3);
    
})