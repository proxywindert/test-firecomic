document.addEventListener("DOMContentLoaded", function() {
    const tabList = document.getElementById("tabList");
    let isDragging = false;
    let startX;
    let scrollLeft;

    tabList.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - tabList.offsetLeft;
        scrollLeft = tabList.scrollLeft;
    });

    tabList.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - tabList.offsetLeft;
        const walk = (x - startX);

        // Cáº­p nháº­t vá»‹ trĂ­ má»—i frame
        requestAnimationFrame(() => {
            tabList.scrollLeft = scrollLeft - walk;
        });
    });

    tabList.addEventListener("mouseup", () => {
        isDragging = false;
    });

    tabList.addEventListener("mouseleave", () => {
        isDragging = false;
    });

    tabList.addEventListener("selectstart", (e) => {
        if (isDragging) {
            e.preventDefault();
        }
    });

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

    // Hidden block logo when scroll
    var blockLogo = document.getElementById('block-logo');
    var blockNav = document.getElementById('block-nav');
    var blockSearch = document.getElementById('block-search');
    var tabListNav = document.getElementById('tabList');
    var lastScrollTop = 10;
    var setTopNav = '15%';

    if (window.innerWidth <= 768) {
        setTopNav = '45%';
        lastScrollTop = 50;
    }

    window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;


        if (scrollTop > lastScrollTop) {
            blockLogo.style.display = 'none';
            // blockNav.style.height = '70px';
            tabListNav.style.top = setTopNav;
            blockSearch.style.display = 'none';
        } else {
            if (scrollTop < lastScrollTop) {
                blockLogo.style.display = 'block';
                // blockNav.style.height = '180px';
                tabListNav.style.top= '0';
                blockSearch.style.display = 'flex';
            }
        }
    });
});