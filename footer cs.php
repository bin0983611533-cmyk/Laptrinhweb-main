<footer id="footer" class="pt-5" style="background: linear-gradient(135deg, #15161d 0%, #1e1f29 100%); color: #fff; border-top: 3px solid #D10024;">
<?php 
 $cuser = new auth();
 $result = $cuser->select_footer_data();
?>
<!-- Phần trên của Chân trang -->
<div class="section" style="padding-bottom: 30px;">
    <div class="container">
        <div class="row">

            <!-- Thông tin giới thiệu & Liên hệ -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="footer">
                    <h3 class="footer-title mb-3" style="color: #D10024; letter-spacing: 1px; font-weight: 800; position: relative;">Về Chúng Tôi</h3>
                    <p style="color: #b0b3c4; font-size: 14px; line-height: 1.7;"><?php echo htmlspecialchars($result['description']); ?></p>
                    <ul class="footer-links about-list mb-3" style="padding-left: 0; list-style: none;">
                        <li class="mb-2">
                            <a href="#" style="color: #b0b3c4; text-decoration: none;"><i class="fa fa-map-marker" style="color: #D10024; width: 20px;"></i> Địa chỉ: <?php echo htmlspecialchars($result['street']); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="#" style="color: #b0b3c4; text-decoration: none;"><i class="fa fa-location-arrow" style="color: #D10024; width: 20px;"></i> Thành phố: <?php echo htmlspecialchars($result['city']); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="#" style="color: #b0b3c4; text-decoration: none;"><i class="fa fa-phone" style="color: #D10024; width: 20px;"></i> Điện thoại: <?php echo htmlspecialchars($result['phone']); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="mailto:<?php echo htmlspecialchars($result['email']); ?>" style="color: #b0b3c4; text-decoration: none;"><i class="fa fa-envelope-o" style="color: #D10024; width: 20px;"></i> Email: <?php echo htmlspecialchars($result['email']); ?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="footer">
                    <h3 class="footer-title mb-3" style="color: #D10024; letter-spacing: 1px; font-weight: 700;">Danh Mục Sản Phẩm</h3>
                    <ul class="footer-links" style="list-style: none; padding-left: 0;">
                        <?php
                            require_once(__DIR__ . '/../admin/include/auth.php');
                            $cuser = new auth();
                            $categories = $cuser->select_cat();
                            if (!empty($categories) && is_array($categories)) {
                                $max = min(count($categories), 5);
                                for ($i = 0; $i < $max; $i++):
                                    $category = $categories[$i];
                        ?>
                                    <li class="mb-2">
                                        <a href="store.php?cat_id=<?php echo htmlspecialchars($category['id']); ?>"
                                           style="color:#b0b3c4; text-decoration:none; transition: all 0.3s ease;"
                                           onmouseover="this.style.color='#D10024'; this.style.paddingLeft='5px'"
                                           onmouseout="this.style.color='#b0b3c4'; this.style.paddingLeft='0px'">
                                            <i class="fa fa-angle-right" style="color:#D10024; margin-right:8px;"></i>
                                            <?php echo htmlspecialchars($category['cat_name']); ?>
                                        </a>
                                    </li>
                        <?php
                                endfor;
                            } else {
                                echo '<li><span style="color:#b0b3c4;">Hiện chưa có danh mục nào.</span></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Bản đồ vị trí -->
            <div class="col-md-5 col-sm-12 mb-4">
                <div class="footer">
                    <h3 class="footer-title mb-3" style="color: #D10024; letter-spacing: 1px; font-weight: 700;">Vị Trí Cửa Hàng</h3>
                    <div id="map" style="width:100%; height:220px; border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1);"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Phần trên của Chân trang -->

<!-- Bản quyền & Chân trang dưới -->
<div id="bottom-footer" class="section py-3" style="background: #111; border-top: 1px solid rgba(255,255,255,0.05);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center" style="color:#8d8d8d; font-size:14px;">
                <span class="copyright">
                    &copy; <?php echo date('Y'); ?> <b>Bản quyền thuộc về Cửa Hàng Trực Tuyến</b> 
                    <span class="mx-2">|</span> 
                    Thiết kế và Phát triển bởi <b style="color: #fff;">Nhóm Phát Triển Web</b>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- /Bản quyền & Chân trang dưới -->

</footer>

<script type="text/javascript">
function myMap() {
    var positionMap = {lat: 21.028511, lng: 105.804817}; // Tọa độ Hà Nội
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: positionMap,
        disableDefaultUI: true,
        styles: [
            { "elementType": "geometry", "stylers": [{"color": "#242f3e"}] },
            { "elementType": "labels.text.stroke", "stylers": [{"color": "#242f3e"}] },
            { "elementType": "labels.text.fill", "stylers": [{"color": "#746855"}] },
            { "featureType": "water", "elementType": "geometry", "stylers": [{"color": "#17263c"}] }
        ]
    });
    var marker = new google.maps.Marker({
        position: positionMap,
        map: map,
        animation: google.maps.Animation.DROP,
        icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
    });
    var infowindow = new google.maps.InfoWindow({
        content: "<strong style='color:#D10024;'>Cửa Hàng Trực Tuyến</strong><br/><span style='color:#333;'>Rất hân hạnh được phục vụ quý khách!</span>"
    });
    infowindow.open(map, marker);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTbYZF_kDxKNopcvej6oh-eVs1z9Xq2J0&callback=myMap"></script>