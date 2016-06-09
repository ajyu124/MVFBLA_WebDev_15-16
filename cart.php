<?php
$page = 7;
require_once("header.php");

if (isset($_REQUEST["add"])) {
	$cookie = "";
	if (isset($_COOKIE["cart"]) && $_COOKIE["cart"] != "") {
		$cookie = $_COOKIE["cart"];
		if (strpos($cookie, $_REQUEST["add"]) === false) {
			$cookie .= "," . $_REQUEST["add"] . ":1";
		}
	}
	else {
		$cookie = $_REQUEST["add"] . ":1";
	}
	setcookie("cart", $cookie);
}
?>
<header class="window half" id="windowMenu">
	<div class="container">
		<h2 class="animated fadeInDown">Your order</h2>
		<p class="animated fadeInUp">Order food online for in-store pick up</p>
	</div>
</header>
<div class="container">
	<div id="tymsg" class="row">
		<div class="columns twelve">
			<p>Thank you!<br>
			Your order has been placed.</p>
			<p>It will be ready for you to pick it up at Panettiere in <?php if ($open) { ?>about 15 minutes<?php } else { ?>the morning<?php } ?>.</p>
		</div>
	</div>
	<div class="row cart-holder">
		<div class="columns nine">
			<a class="special reverse" href="/menu.php">Back to Menu</a>
			<div class="table-wrapper">
				<table id="cart" class="pushtop">
					<thead class="head">
						<tr>
							<!--<th></th>-->
							<th class="name">Item</th>
							<th class="desc">Description</th>
							<th class="price">Price</th>
							<th class="quant">Quantity</th>
							<!--<th></th>-->
						</tr>
					</thead>
					<tbody class="body"></tbody>
				</table>
			</div>
		</div>
		<div class="columns three pushtop u-center">
			<table id="cart-side">
				<tbody>
					<tr><td>Subtotal</td><td class="sub">$3.99</td></tr>
					<tr><td>Tax</td><td class="tax">$0.35</td></tr>
					<tr><td>Total</td><td class="tot">$4.34</td></tr>
				</tbody>
			</table>
			<label for="comments">Additional Comments</label>
			<textarea name="comments" id="comments" rows="3" class="u-full-width" placeholder="Any special requests you have." required></textarea>
			<input type="button" class="pushtop button" value="Order now">
		</div>
	</div>
</div>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="/assets/js/items.js"></script>
<script src="/assets/js/prices.js"></script>
<?php
require_once("footer.php")
?>