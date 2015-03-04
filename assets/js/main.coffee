fitHeader = ->
	$(".header-container.autoresize").css 'height', $(window).height()

stickyMenu = ->
	$navigation = $(".navigation")
	origin = $('.header-container').height() - $navigation.height()
	if $navigation.hasClass 'topstick'
		origin = 0
	if $(window).scrollTop() > origin + 1
		$navigation.addClass "sticky"
	else
		$navigation.removeClass "sticky"

navigateTo = (e, id, done = undefined) ->
	e.preventDefault()
	$("html body").animate { scrollTop: $(id).offset().top }, "slow", done

$(window).resize -> fitHeader()

$(window).scroll -> 
	stickyMenu()

$(document).ready ->
	fitHeader()
	stickyMenu()

	$("#nav-products").click (e) -> navigateTo e, "#products"
	$("#nav-team").click (e) -> navigateTo e, "#team"
	$("#nav-getintouch").click (e) -> navigateTo e, "#footer"