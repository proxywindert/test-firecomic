

document.addEventListener("DOMContentLoaded", function() {

    let isDragging = false;
    let startX;
    let scrollLeft;
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