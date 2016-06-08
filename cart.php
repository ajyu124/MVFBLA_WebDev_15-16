<?php
require_once("header.php");
?>
<header class="window half" id="windowMenu">
	<div class="container">
		<h2>Your order</h2>
		<p>Order food online for in-store pick up</p>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="columns nine">
			<a class="special reverse">Back to Menu</a>
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
					<tbody class="body">
						<tr>
							<td class="name">Fried Mozzarella</td>
							<td class="desc">Golden-fried mozzarella cheese, topped with an alfredo drizzle. Served with marinara sauce.</td>
							<td class="price">$3.99</td>
							<td class="quant"><input type="number" min="1" step="1" value="1" /><a href="" class="close"></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="columns three">
			<table id="cart-side">
				<tr><td>Subtotal</td><td>$3.99</td></tr>
				<tr><td>Tax</td><td>$0.35</td></tr>
				<tr><td>Total</td><td>$4.34</td></tr>
			</table>
			<input type="button" class="pushtop button" value="Order now">
		</div>
	</div>
</div>
<?php
require_once("footer.php")
?>