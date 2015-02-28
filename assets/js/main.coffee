fitHeader = ->
	$("#header-container").css 'height', $(window).height()

initialMenuPosition = 0

prepareMenu = ->
	initialMenuPosition = $(".navigation").position().top

	stickyMenu()

stickyMenu = ->
	$navigation = $(".navigation")
	if $(window).scrollTop() > initialMenuPosition + 1
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
	prepareMenu()

	$("#nav-products").click (e) -> navigateTo e, "#products", ->
		navigateTo ""
	$("#nav-team").click (e) -> navigateTo e, "#team"
	$("#nav-getintouch").click (e) -> navigateTo e, "#getintouch"