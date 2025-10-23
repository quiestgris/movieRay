let carrouselPosition = document.querySelector(".carrousel-items").scrollLeft;

let activeIndicator = 0;

document.querySelector(".carrousel-arrow.reverse").addEventListener("click", function () {

    isScrolling = true


    if(activeIndicator < 4 && isScrolling) {
        activeIndicator++;
        document.querySelector(".carrousel-indicator.active").classList.remove("active");
        document.querySelector(".carrousel-indicators").children[activeIndicator].classList.add("active");
        

        document.querySelector(".carrousel-items").scrollLeft = 
        document.querySelector(".carrousel-items").scrollLeft +
        document.querySelectorAll(".carrousel-item")[0].offsetWidth + parseInt(window.getComputedStyle(document.querySelector(".carrousel-items")).gap.replace("px", ""));
    
        isScrolling = false;
    }

    setTimeout(function () {
        isScrolling = true;
    })

    let gap = window.getComputedStyle(document.querySelector(".carrousel-items")).gap;
    
})

document.querySelector(".carrousel-arrow").addEventListener("click", function () {

    if(activeIndicator > 0 && isScrolling) {
        activeIndicator--;
        document.querySelector(".carrousel-indicator.active").classList.remove("active");
        document.querySelector(".carrousel-indicators").children[activeIndicator].classList.add("active");

        

    document.querySelector(".carrousel-items").scrollLeft = document.querySelector(".carrousel-items").scrollLeft -
        (document.querySelector(".carrousel-item").offsetWidth + parseInt(window.getComputedStyle(document.querySelector(".carrousel-items")).gap.replace("px", "")));
        
        isScrolling = false;
    }

    setTimeout(function () {
        isScrolling = true;
    })
    
})