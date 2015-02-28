fitHeader = ->
	$("#header-container").css 'height', $(window).height()

bindResize = () ->
	fitHeader()
	$(window).resize fitHeader

navigateTo = (e, id, done = undefined) ->
	e.preventDefault()
	$("html body").animate { scrollTop: $(id).offset().top }, "slow", done

$(document).ready ->
	bindResize()

	$("#nav-products").click (e) -> navigateTo e, "#products"
	$("#nav-team").click (e) -> navigateTo e, "#team"
	$("#nav-getintouch").click (e) -> navigateTo e, "#getintouch"