<footer class="footer">
	<div class="container">
		<h5>Want to check us out?</h5>
		<div class="row">
			<div class="columns six">
				<ul class="contact">
					<li class="fa-home">
						<a href="https://goo.gl/maps/pD5L1BYHgpE2">21840 McClellan Rd<br>Cupertino, CA 95014</a>
					</li>
					<li class="fa-clock-o"><strong><?php if ($open) { ?>Open right now!<?php } else { ?>Closed now<?php } ?></strong><br>
										Mon - Fri: 5:30 AM - 2:00 PM | 5:00 PM - 9:30 PM<br>
										Sat - Sun: 6:30 AM - 2:00 PM | 5:00 PM - 11:00 PM</li>
					<li class="fa-phone"><a href="tel:+14083209455">(408) 320-9455</a></li>
					<li class="fa-envelope"><a href="mailto:hello@panettiere.ml">hello@panettiere.ml</a></li>
					<li class="fa-facebook"><a href="https://www.facebook.com/panettierebakery">/panettierebakery/</a></li>
					<li class="fa-instagram"><a href="https://www.instagram.com/panettierebakery/">/panettierebakery/</a></li>
				</ul>
			</div>
			<div class="columns six">
				<form id="form" class="form">
					<p>If you have any questions about our mission, food, or anything else, please feel free to contact us directly through the form below, or via any of the listed social media. </p>
					<div class="row field">
						<div class="columns twelve">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="u-full-width" placeholder="Hi, what's your name?" required />
						</div>
					</div>
					<div class="row field">
						<div class="columns twelve">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="u-full-width" placeholder="How should we get back to you?" required />
						</div>
					</div>
					<div class="row field">
						<div class="columns twelve">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="3" class="u-full-width" placeholder="What's on your mind?" required></textarea>
						</div>
					</div>
					<input class="actions" type="submit" value="Send Message" />
			</form>
			</div>
		</div>
		<ul class="copyright">
			<li>&copy; Copyright 2015-2016 Panettiere, LLC. All rights reserved.</li>
			<li>All media used on this website and on compansion social media accounts is either public domain or appropriately licensed, including images, videos, icons, graphics, et cetera. Proper attribution has been clearly cited and noted wherever necessary. The Panettiere brand and website as well as all works used in its creation and derived from it are licensed under the <a href="http://creativecommons.org/licenses/by/4.0/">CCA 4.0 International License.</a></li>
		</ul>
	</div>
</footer>
	<script src="/assets/js/jquery.all.js"></script>
	<script src="/script.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-49750866-5', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
<?php
if (isset($conn))
	$conn->close();
?>