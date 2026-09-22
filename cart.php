<?php
 include 'include/header.php';
  $cuser = new auth();
  if(!isset($_SESSION['uid'])){
      header('Location: login.php');
      exit;
  }
  $user_id = $_SESSION['uid'];
  $result1 = $cuser->checkOut_product($user_id);

?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Your Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<div class="container">
				<div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $cart_total = 0;
                                 if(empty($result1)){
                                     echo '<tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>';
                                 } else {
                                     foreach($result1 as $row){	
                                        $product_price = $row['p_price'];
                                        $product_qty = $row['p_qty'];
                                        $total = $product_price * $product_qty;	
                                        $cart_total += $total;
                                        $product_image = get_product_image($row['images']);
                                ?>
                                <tr>
                                    <td style="width: 100px;">
                                        <img src="uploads/<?php echo htmlspecialchars($product_image); ?>" width="80" alt="">
                                    </td>
                                    <td>
                                        <a href="product.php?p_id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['p_name']); ?></a>
                                    </td>
                                    <td>Rs <?php echo $product_price; ?></td>
                                    <td>
                                        <div class="input-number" style="width: 100px;">
                                            <input type="number" class="qty-input" data-id="<?php echo $row['id']; ?>" value="<?php echo $product_qty; ?>" min="1" max="99">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                    </td>
                                    <td>Rs <?php echo $total; ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm remove-cart" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Remove</button>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Subtotal:</th>
                                    <th colspan="2">Rs <?php echo $cart_total; ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-right">
                            <a href="store.php" class="primary-btn">Continue Shopping</a>
                            <?php if(!empty($result1)): ?>
                            <a href="checkout.php" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<?php include 'include/footer.php'; ?>
		<!-- /FOOTER -->

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
        
        <script>
        $(document).ready(function(){
            // Remove cart item
            $('.remove-cart').click(function(){
                var pid = $(this).data('id');
                if(confirm("Are you sure you want to remove this item?")){
                    $.post("admin/include/process.php", { Mode: "delete_cart", product_id: pid }, function(data){
                        location.reload();
                    });
                }
            });

            // Update quantity on input change
            $('.qty-input').on('change', function(){
                var pid = $(this).data('id');
                var qty = $(this).val();
                $.post("admin/include/process.php", { Mode: "update_cart", product_id: pid, qty: qty }, function(data){
                    location.reload();
                });
            });

            // Re-bind up/down buttons since main.js might not trigger change
            $('.input-number .qty-up').on('click', function () {
				var $input = $(this).parent().find('input');
				var pid = $input.data('id');
                var qty = parseInt($input.val()) + 1; // It was incremented by main.js, wait main.js handles it, so we just read after delay
                setTimeout(function(){
                    $.post("admin/include/process.php", { Mode: "update_cart", product_id: pid, qty: $input.val() }, function(){
                        location.reload();
                    });
                }, 100);
			});
            $('.input-number .qty-down').on('click', function () {
				var $input = $(this).parent().find('input');
				var pid = $input.data('id');
                setTimeout(function(){
                    $.post("admin/include/process.php", { Mode: "update_cart", product_id: pid, qty: $input.val() }, function(){
                        location.reload();
                    });
                }, 100);
			});
        });
        </script>
	</body>
</html>
