function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, exseconds) {
    const d = new Date();
    d.setTime(d.getTime() + (exseconds * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function closeModal() {
    $(".mask-sl").removeClass("active-sl");
}

$(".close-sl, .mask-sl").on("click", function () {
    closeModal();
});
$(document).keyup(function (e) {
    if (e.keyCode == 27) {
        closeModal();
    }
});



function checkOverflow(element) {
  return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}