
window.addEventListener('scroll', function () {
    let elementPosition = navBarAnchor.getBoundingClientRect().top - headerMenu.offsetHeight;
    if (elementPosition <= headerMenu.offsetHeight) {
        fakeHeaderMenu.style.opacity = 1;
        return;
    }
    navBarAnchor.style.top = headerMenu.offsetHeight + 'px';

    let scrollTop = window.scrollY || window.pageYOffset || document.documentElement.scrollTop; // Vị trí cuộn hiện tại

    let opacity = (scrollTop / (viewportHeight * 1));
    opacity = opacity > 1 ? 1 : opacity;
    if (scrollTop > lastScrollTop) {
        // Cuộn chuột xuống
        opacity = Math.max(opacity, 0); // Sử dụng biến opacity thay vì scrollDiv.style.opacity
    } else {
        // Cuộn chuột lên
        opacity = Math.min(opacity, 1); // Sử dụng biến opacity thay vì scrollDiv.style.opacity
    }

    fakeHeaderMenu.style.opacity = opacity.toString(); // Thiết lập opacity cho scrollDiv

    lastScrollTop = scrollTop;
});


