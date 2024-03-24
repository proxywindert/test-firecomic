
window.addEventListener('scroll', function () {
    var contentHeight = document.body.scrollHeight; // Chiều cao của nội dung trang web
     // Chiều cao của cửa sổ trình duyệt
    var scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop; // Vị trí cuộn hiện tại

    if ((contentHeight - (viewportHeight) <= scrollPosition) || scrollPosition == 0) {
        // Trang đã cuộn xuống cuối cùng

        visibleElement([headerMenu, fakeHeaderMenu]);
        if (navigationBar)
            visibleElement([navigationBar]);
        // Thực hiện các hành động tương ứng ở đây
    } else {
        if (navigationBar)
            hiddenElement([navigationBar]);
        hiddenElement([headerMenu, fakeHeaderMenu]);
    }
    lastScrollTop = scrollPosition
});

function hiddenElement(elements) {
    elements.forEach(item => {
        item.classList.add('header-hidden');
    })
}

function visibleElement(elements) {
    elements.forEach(item => {
        item.classList.remove('header-hidden');
    })
}

window.addEventListener('click', function (event) {
    targetElement = event.target;
    var computedStyle = window.getComputedStyle(targetElement);

    // Kiểm tra nếu cursor của phần tử là 'pointer' thi ko lam gi
    if (computedStyle.getPropertyValue('cursor') === 'pointer') {
        return
    }

    if (event.button === 0) {
        if (headerMenu.classList.contains("header-hidden")) {
            visibleElement([headerMenu, fakeHeaderMenu]);
            if (navigationBar)
                visibleElement([navigationBar]);
        }
        else {
            if (navigationBar)
                hiddenElement([navigationBar]);
            hiddenElement([headerMenu, fakeHeaderMenu]);
        }

    }
});

// document.querySelector('.back-button').addEventListener('click', function () {
//     window.history.back();
// });
