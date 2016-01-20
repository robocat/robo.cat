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
	e.preventDefault()
	
	href = $(this).attr('href')
	if href == "#"
		offsetTop = 0
	else
		offsetTop = $(href).offset().top
	$('html body').stop().animate {scrollTop: offsetTop}, "slow"

appItems = $(".service .app a.scrollbased")
scrollAppItems = appItems.map ->
	item = $($(this).attr('href'))
	return item if item.length

appItems.click (e) ->
	e.preventDefault()
	
	href = $(this).attr('href')
	if href == "#"
		offsetTop = 0
	else
		offsetTop = $(href).offset().top
	$('html body').stop().animate {scrollTop: offsetTop}, "slow"

setActiveMenuItem = ->
	$win = $(window)
	fromTop = $win.scrollTop() + $win.height() - 200

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

handleSignup = (e) ->
	e.preventDefault()


	$emailfield = $('#newsletter_form .email')
	$submit = $('#newsletter_form .submit')

	return if $emailfield.val() == ""

	$emailfield.attr 'disabled', 'disabled'
	$emailfield.blur()
	$submit.attr 'disabled', 'disabled'

	data = { email: $emailfield.val(), list: 'robocat' }
	url = 'http://newsletters.robocatapps.com/signup'

	$.post url, data, (rep, status, xhr) ->
		$emailfield.val 'Thank you'
		console.log data
	

removeHoverOnTouch = ->
	$('body').removeClass 'no-touch' if Modernizr.touch != false

configureServices = ->
	services = $(".services-container .service")
	selectors = $(".services-selector .service")

	services.addClass 'hidden'
	services.fadeTo(0, 0)

	services.first().removeClass 'hidden'
	services.first().fadeTo(200, 1)
	selectors.first().addClass 'active'

	selectors.click (e) ->
		e.preventDefault()

		service = $(this).data 'service'

		services.fadeTo(200, 0)
		services.addClass('hidden')
		selectors.removeClass 'active'

		$("#service_#{service}").fadeTo(200, 1)
		$("#service_#{service}").removeClass 'hidden'
		$(this).addClass 'active'

$(window).resize -> fitHeader()

$(window).scroll -> 
	stickyMenu()
	setActiveMenuItem()

$(document).ready ->
	fitHeader()
	stickyMenu()
	removeHoverOnTouch()
	configureServices()

	if !Modernizr.touch
		drContainer = $('.app-container.drtv .video-overlay')
		bv = new $.BigVideo {container: drContainer, controls: false, forceAutoplay: false, doLoop: true}
		bv.init()
		bv.show [
			type: 'video/mp4', src: '/drtv_movie.mp4', {ambient: true, doLoop: true}
			type: 'video/webm', src: '/drtv_movie.webm', {ambient: true, doLoop: true}
		]

		bv.getPlayer().on 'loadedmetadata', () ->
			drContainer.css 'opacity', 1

	$("#newsletter_form").on 'submit', (e) -> handleSignup e
	# $("#newsletter_form .submit").on 'click', (e) -> handleSignup e

	atvImg()

