
var lastScrollTop = 0;
var isClick = false;
window.addEventListener('scroll', function () {
    var headerMenu = document.getElementById('block-search');
    var navigationBar = document.getElementById('navigationBar-content');

    var contentHeight = document.body.scrollHeight; // Chiều cao của nội dung trang web
    var windowHeight = window.innerHeight; // Chiều cao của cửa sổ trình duyệt
    var scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop; // Vị trí cuộn hiện tại

    if ((contentHeight - (windowHeight) <= scrollPosition) || scrollPosition == 0) {
        // Trang đã cuộn xuống cuối cùng
        headerMenu.classList.remove('header-hidden');
        if (navigationBar)
            navigationBar.classList.remove('header-hidden');
        // Thực hiện các hành động tương ứng ở đây
    } else {
        if (navigationBar)
            navigationBar.classList.add('header-hidden');
        headerMenu.classList.add('header-hidden');
    }
});

window.addEventListener('click', function (event) {
    targetElement = event.target;
    var computedStyle = window.getComputedStyle(targetElement);

    // Kiểm tra nếu cursor của phần tử là 'pointer'
    if (computedStyle.getPropertyValue('cursor') === 'pointer') {
        return
    }

    if (event.button === 0) {
        var headerMenu = document.getElementById('block-search');
        var navigationBar = document.getElementById('navigationBar-content');

        if (headerMenu.classList.contains("header-hidden")) {
            headerMenu.classList.remove('header-hidden');
            if (navigationBar)
                navigationBar.classList.remove('header-hidden');
        }
        else {
            if (navigationBar)
                navigationBar.classList.add('header-hidden');
            headerMenu.classList.add('header-hidden');
        }

    }
});