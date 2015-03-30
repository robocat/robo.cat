		<div class="footer-container cont" id="footer">
			<div class="footer int">
				<div class="location">
					<a class="map" href="https://www.google.dk/maps/place/Pilestr%C3%A6de+43,+1112+K%C3%B8benhavn+K/@55.6811462,12.579215,17z/data=!3m1!4b1!4m2!3m1!1s0x46525310a82927d1:0xa3f8d542574de862?hl=en">
						<?php rk_img("footer-map.png") ?>
					</a>
					<div class="physical">
						<p class="company">Robocat</p>
						<p class="address">
							Pilestaede 43, 2nd Floor<br>
							1112 Copenhagen<br>
							Denmark
						</p>
					</div>
				</div>
				<div class="getintouch">
					<a href="//twitter.com/robocat/"
						class="button twitter"
						onClick="sendEvent('button', 'clicked', 'social-twitter');">@robocat</a>

					<a href="//facebook.com/robocatapps/"
					class="button facebook"
					onClick="sendEvent('button', 'clicked', 'social-facebook');">/robocatapps</a>

					<a href="mailto:hello@robo.cat"
						class="button email"
						onClick="sendEvent('button', 'clicked', 'social-email');">hello@robo.cat</a>
				</div>
			</div>
		</div>
	</div>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-2395002-27', 'auto');
	  ga('send', 'pageview');

	</script>
	
	<script src="<?php rk_theme_url("js/vendor.js"); ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php rk_theme_url("js/app.js"); ?>" type="text/javascript" charset="utf-8" async defer></script>

	<?php wp_footer(); ?>
</body>
</html>