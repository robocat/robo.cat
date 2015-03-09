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
	if $(window).scrollTop() > origin
		$navigation.addClass "sticky"
	else
		$navigation.removeClass "sticky"

navigateTo = (e, id, done = undefined) ->
	e.preventDefault()
	offset = $(id).offset().top - $(".navigation").height()
	$("html body").animate { scrollTop: offset }, "slow", done

menuItems = $('.navigation .right a.scrollbased')
scrollItems = menuItems.map ->
	item = $($(this).attr('href'))
	return item if item.length

lastId = null

menuItems.click (e) ->
	href = $(this).attr('href')
	if href == "#"
		offsetTop = 0
	else
		offsetTop = $(href).offset().top
	$('html body').stop().animate {scrollTop: offsetTop}, "slow"

setActiveMenuItem = (fromTop) ->
	curr = scrollItems.map -> this if $(this).offset().top < fromTop

	curr = curr[curr.length-1]
	if curr && curr.length
		id = curr[0].id 
	else 
		id = ""

	if lastId != id
		lastId = id
		menuItems.removeClass('active')
		$('.navigation .right a[href=#'+id+']').addClass('active')

$(window).resize -> fitHeader()

$(window).scroll -> 
	stickyMenu()

	setActiveMenuItem($(window).scrollTop() + $(window).height() - 200)

$(document).ready ->
	fitHeader()
	stickyMenu()

	# $("#nav-products").click (e) -> navigateTo e, "#products"
	# $("#nav-team").click (e) -> navigateTo e, "#team"
	# $("#nav-getintouch").click (e) -> navigateTo e, "#footer"