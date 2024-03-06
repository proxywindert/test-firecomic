document.addEventListener("DOMContentLoaded", function() {

    let isDragging = false;
    let startX;
    let scrollLeft;




    // tabList.addEventListener("click", function (event) {
    //     const clickedLi = event.target.closest("li");
    //
    //     if (clickedLi) {
    //         const lis = tabList.querySelectorAll("li");
    //
    //         lis.forEach((li) => {
    //             const isSelected = li === clickedLi;
    //             li.setAttribute("data-is-selected", isSelected.toString());
    //
    //             const classToAdd = isSelected ? "s14-bold-white" : "s14-bold-grey05";
    //             const classToRemove = isSelected ? "s14-bold-grey05" : "s14-bold-white";
    //
    //             li.querySelector("p").classList.add(classToAdd);
    //             li.querySelector("p").classList.remove(classToRemove);
    //         });
    //     }
    // });



    // Handle nav menu header
    var tabNavHeader = document.getElementById('tab-nav-header');
    var closeBtn = document.getElementById('close-tab-nav-header');
    var openBtn = document.getElementById('open-tab-nav-header');

    closeBtn.addEventListener('click', function() {
        tabNavHeader.style.width = '0';
    });

    openBtn.addEventListener('click', function() {
        tabNavHeader.style.width = '500px';
    });
});

window.addEventListener('load', function () {
    let whiteLinks = document.querySelectorAll("#custom-top-nav a.s14-bold-white");
    whiteLinks.forEach(function (link) {
        scrollToCenterInTopNav(link);
    });
});

function scrollToCenterInTopNav(element) {
    let tabListNavTop = document.getElementById("tabList");
    let customTopNavWidth = tabListNavTop.offsetWidth;
    let elementRect = element.getBoundingClientRect();
    let elementLeftInTopNav = elementRect.left - tabListNavTop.getBoundingClientRect().left;
    let scrollToX = elementLeftInTopNav - ((customTopNavWidth - elementRect.width) / 2);
    tabListNavTop.scrollTo({
        left: scrollToX,
        behavior: 'smooth'
    });
}