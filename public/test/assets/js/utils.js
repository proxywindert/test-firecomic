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


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollToTopBtn").style.display = "block";
  } else {
    document.getElementById("scrollToTopBtn").style.display = "none";
  }
}

function scrollToTop() {
//   document.body.scrollTop = 0; /* For Safari */
//   document.documentElement.scrollTop = 0; /* For Chrome, Firefox, IE and Opera */
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}
