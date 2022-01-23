$(document).ready(function () {
  const body = $("body");
  const urlParams = new URLSearchParams(window.location.search);
  const myParam = urlParams.get("showpopup");

  if (myParam) {
    setTimeout(() => {
      $("#registerSuccessModal").modal("show");
    }, 250);
  }

  setTimeout(() => {
    $("#registerSuccessModal").on("hidden.bs.modal", function () {
      window.history.pushState({}, document.title, window.location.pathname);
    });
  }, 250);


  var script = {
    navbarToggle: function () {
      setTimeout(() => {
        const navbar = $("#navbar-toggle");
        navbar.click(function () {
          const scope = $(this).parents(".header-wrapper");
          const navbarContent = scope.find(".navbar-wrapper-mobile");
          body.toggleClass("hide-scroll");
          navbarContent.toggleClass("show");
        });
      }, 200);
    },
    refreshAOS: function () {
      document.onreadystatechange = function () {
        console.log(document.readyState);
        if (document.readyState == "complete") {
          AOS.refresh();
        }
      }
    },
    init: function () {
      AOS.init({
        once: true,
      });
      this.navbarToggle();
      this.refreshAOS();
    },
  };
  script.init();

  $(document).on('click', '.img-input-pass', function(e) {
    e.preventDefault();
    var scope = $(this).parents('.input-password');
    var type = scope.find('input').attr('type');
    switch (type) {
      case 'password':
      {
        scope.find('input').attr('type', 'text');
        $(this).find('img').attr('src', './images/login-register/close_eye.png');
        return;
      }
      case 'text':
      {
        scope.find('input').attr('type', 'password');
        $(this).find('img').attr('src', './images/login-register/open_eye.png');
        return;
      }
    }
  });
});
