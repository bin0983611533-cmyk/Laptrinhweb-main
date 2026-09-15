<footer id="footer" class="pt-5" style="background-color: #1e1f29; color: #fff;">
<?php 
 $cuser = new auth();
 $result = $cuser->select_footer_data();
?>
<!-- Top Footer -->
<div class="section" style="padding-bottom:0;">
	<div class="container">
		<div class="row">

			<div class="col-md-4 col-sm-6 mb-4">
				<div class="footer">
					<h3 class="footer-title mb-3" style="color: #D10024; letter-spacing:1px; font-weight:800;">About Us</h3>
					<p style="color: #b0b3c4; font-size:15px; line-height:1.8;"><?php echo $result['description']?></p>
					<ul class="footer-links about-list mb-3" style="padding-left:0; list-style:none;">
						<li class="mb-1">
							<a href="#"><i class="fa fa-map-marker"></i><?php echo $result['street']?></a>
						</li>
						<li class="mb-1">
							<a href="#"><i class="fa fa-location-arrow"></i><?php echo $result['city']?></a>
						</li>
						<li class="mb-1">
							<a href="#"><i class="fa fa-phone"></i><?php echo $result['phone']?></a>
						</li>
						<li class="mb-1">
							<a href="mailto:<?php echo $result['email']?>"><i class="fa fa-envelope-o"></i><?php echo $result['email']?></a>
						</li>
					</ul>
					<!-- Social Media Icons Refined -->
					<ul class="footer-links footer-social-icons list-inline mt-3 mb-0" style="padding-left:0;">
						<li class="list-inline-item">
							<a href="https://facebook.com/" target="_blank" title="Facebook">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://twitter.com/" target="_blank" title="Twitter">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://instagram.com/" target="_blank" title="Instagram">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://linkedin.com/" target="_blank" title="LinkedIn">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://youtube.com/" target="_blank" title="YouTube">
								<i class="fa fa-youtube"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Categories -->
			<div class="col-md-3 col-sm-6 mb-4">
				<div class="footer">
					<h3 class="footer-title mb-3" style="color: #D10024; letter-spacing:1px;">Categories</h3>
					<ul class="footer-links">
						<?php
							require_once(__DIR__ . '/../admin/include/auth.php');
							$cuser = new auth();
							$categories = $cuser->select_cat();
							if (!empty($categories) && is_array($categories)) {
								$max = min(count($categories), 5);
								for ($i = 0; $i < $max; $i++):
									$category = $categories[$i];
						?>
									<li>
										<a href="store.php?cat_id=<?php echo htmlspecialchars($category['id']); ?>"
											style="color:#b0b3c4; text-decoration:none; transition:color 0.3s ease;"
											onmouseover="this.style.color='#D10024'"
											onmouseout="this.style.color='#b0b3c4'">
											<i class="fa fa-angle-right" style="color:#D10024; margin-right:8px;"></i>
											<?php echo htmlspecialchars($category['cat_name']); ?>
										</a>
									</li>
						<?php
								endfor;
							} else {
								echo '<li><span style="color:#b0b3c4;">No categories available.</span></li>';
							}
						?>
					</ul>
				</div>
			</div>

			<!-- Newsletter Subscription -->
			<div class="col-md-5 col-sm-12 mb-4">
				<div class="footer">
					
					<!-- Map nicely boxed for visual alignment -->
					<div id="map" style="width:100%;height:250px;border-radius:10px;overflow:hidden;box-shadow:0 2px 8px rgba(30,31,41,0.08);margin-top:18px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Top Footer -->

<!-- Bottom Footer Redesigned -->
<div id="bottom-footer" class="section py-3" style="background:#D10024;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center" style="color:#fff;font-weight:500;letter-spacing:1px;font-size:16px;">
				<span class="copyright">
					&copy; <?php echo date('Y'); ?> 
					<a target="_blank" href="https://www.worldwebtree.com" style="color:#fff;text-decoration:underline;">WorldWebTree</a>
					<span class="mx-2">|</span>
					Made with <i class="fa fa-heart" style="color:#fff;"></i> for you 
					<span class="mx-2">|</span>
					Build and design by <b>Umar FarooQ</b>
				</span>
			</div>
		</div>
	</div>
</div>
<!-- /Bottom Footer -->

</footer>
<script type="text/javascript">
function myMap() {
	var positionMap = {lat: 34.0006, lng: 71.5067};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 10,
		center: positionMap,
		disableDefaultUI: true,
		styles: [
			{
				"featureType": "all",
				"elementType": "labels.text.fill",
				"stylers": [{"color": "#D10024"}]
			},
			{ "featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e4e7ed"}] }
		]
	});
	var marker = new google.maps.Marker({
		position: positionMap,
		map: map,
		animation: google.maps.Animation.BOUNCE,
		icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
	});
	var infowindow = new google.maps.InfoWindow({
		content: "<strong style='color:#D10024;'>WorldWebTree Company</strong><br/><span style='color:#333;'>Welcome!</span>"
	});
	infowindow.open(map,marker);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTbYZF_kDxKNopcvej6oh-eVs1z9Xq2J0&callback=myMap"></script>
