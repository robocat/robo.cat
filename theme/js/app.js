var fitHeader, initialMenuPosition, navigateTo, prepareMenu, stickyMenu;

fitHeader = function() {
  return $("#header-container").css('height', $(window).height());
};

initialMenuPosition = 0;

prepareMenu = function() {
  initialMenuPosition = $(".navigation").position().top;
  return stickyMenu();
};

stickyMenu = function() {
  var $navigation;
  $navigation = $(".navigation");
  if ($(window).scrollTop() > initialMenuPosition + 1) {
    return $navigation.addClass("sticky");
  } else {
    return $navigation.removeClass("sticky");
  }
};

navigateTo = function(e, id, done) {
  if (done == null) {
    done = void 0;
  }
  e.preventDefault();
  return $("html body").animate({
    scrollTop: $(id).offset().top
  }, "slow", done);
};

$(window).resize(function() {
  return fitHeader();
});

$(window).scroll(function() {
  return stickyMenu();
});

$(document).ready(function() {
  fitHeader();
  prepareMenu();
  $("#nav-products").click(function(e) {
    return navigateTo(e, "#products", function() {
      return navigateTo("");
    });
  });
  $("#nav-team").click(function(e) {
    return navigateTo(e, "#team");
  });
  return $("#nav-getintouch").click(function(e) {
    return navigateTo(e, "#getintouch");
  });
});

//# sourceMappingURL=maps/app.js.map