delay = (ms, func) -> setTimeout func, ms

sendEvent = (category, action, label = "", value = undefined) ->
	ga('send', 'event', category, action, label, value) #if typeof ga != 'undefined'

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
	offset = $(id).offset().top - $(".navigation").height()
	$("html body").animate { scrollTop: offset }, "slow", done

$(window).resize -> fitHeader()

$(window).scroll -> 
	stickyMenu()

$(document).ready ->
	fitHeader()
	stickyMenu()

	$("#nav-products").click (e) -> navigateTo e, "#products"
	$("#nav-team").click (e) -> navigateTo e, "#team"
	$("#nav-getintouch").click (e) -> navigateTo e, "#footer"