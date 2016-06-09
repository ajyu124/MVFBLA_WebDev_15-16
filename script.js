(function ($, run) {
	if (!run) return;
	var nav = false;
	$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
	$("#pages").click(function () {
		$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
		nav = false;
	});
	$("#pages .close").click(function () {
		$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350) : $("#pages").css("display", "flex") && setTimeout(function () {$("#pages").css("opacity", 1);}, 1);
		nav = !nav;
	});
	//
	var navFix = function () {
		setTimeout(function () { $("#nav #nav-bar").css("display", "none"); }, 1);
		setTimeout(function () { $("#nav #nav-bar").css("display", ""); }, 5);
	}
	navFix();
	setInterval(navFix, 1000);
})($, true);

(function($, run) {
	if (!run) return;
	var validate = function() {
		var good = true;
		if ($("#form #name").val().trim() == "") {
			$("#form #name").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#form #email").val().trim() == "" || $("#form #email").val().indexOf("@") == -1 || $("#form #email").val().indexOf(".") == -1) {
			$("#form #email").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#form #message").val().trim() == "") {
			$("#form #message").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		return good;
	}

	$("#form input[type='submit']").click(function (e) {
		e.preventDefault();
		$("#form input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#form input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_process.php",
			"type": "POST",
			"data": {
				"type": "contact",
				"name": $("#form #name").val(),
				"email": $("#form #email").val(),
				"message": $("#form #message").val(),
				"submit": true
			}
		}).done(function () {
			$("#form p").css("margin-top", "30px").html("Thank you for your comments! We'll be in touch shortly.");
			$("#form .field").hide();
			$("#form .actions").hide();
		});
	});
})($, true);

(function ($, run) {
	if (!run) return;
	$("#r_time").timepicker({
		'scrollDefault': 'now',
		'disableTimeRanges': [
			['2pm', '5pm'],
			['11pm', '11:59pm'],
			['12am', '5:30am']
		]
	});
	$('#date_container').datepicker({});
})($, $("#r_time").length > 0);

(function($, run) {
	if (!run) return;
	$(".tables-table").click(function () {
		$(".tables-table.active").removeClass("active");
		$(this).addClass("active");
	});
	var validate = function() {
		var good = true;
		if ($("#r #r_name").val().trim() == "") {
			$("#r #r_name").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#r #r_guests").val().trim() == "") {
			$("#r #r_guests").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#r #r_email").val().trim() == "") {
			$("#r #r_email").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#r #r_phone").val().trim() == "") {
			$("#r #r_phone").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#r #r_time").val().trim() == "") {
			$("#r #r_time").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($('#r #date_container').datepicker('getDate') == null) {
			$("#r #date_container").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($(".tables-table.active").length < 1) {
			$("#r #tables_container").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		return good;
	}

	$("#r input[type='submit']").click(function (e) {
		e.preventDefault();
		$("#r input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#r input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_process.php",
			"type": "POST",
			"data": {
				"type": "reservation",
				"name": $("#r #r_name").val(),
				"guests": $("#r #r_guests").val(),
				"email": $("#r #r_email").val(),
				"phone": $("#r #r_phone").val(),
				"time": $("#r #r_time").val(),
				"date": $('#r #date_container').datepicker('getDate').toDateString(),
				"table": $(".tables-table.active").text().trim(),
				"submit": true
			}
		}).done(function () {
			$("#r").html("<div class='row'><div class='columns twelve'><p class='pushtop'>Thank you! Your reservation has been placed.</p></div></div>");
			//$("#r .row").hide();
		});
	});
})($, $("#r").length > 0);

(function($, run) {
	if (!run) return;

	$(".stars span").click(function () {
		$(this).addClass("active").siblings().removeClass("active");
		$("#s_rating").val($(this).attr("data-val"));
	});

	var validate = function() {
		var good = true;
		if ($("#s #s_name").val().trim() == "") {
			$("#s #s_name").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#s #s_email").val().trim() == "" || $("#s #s_email").val().indexOf("@") == -1 || $("#s #s_email").val().indexOf(".") == -1) {
			$("#s #s_email").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#s #s_review").val().trim() == "") {
			$("#s #s_review").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		return good;
	}

	$("#s input[type='submit']").click(function (e) {
		e.preventDefault();
		$("#s input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#s input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_process.php",
			"type": "POST",
			"data": {
				"type": "review",
				"name": $("#s #s_name").val(),
				"email": $("#s #s_email").val(),
				"message": $("#s #s_rating").val() + "\n" + $("#s #s_review").val(),
				"submit": true
			}
		}).done(function () {
			$("#s").html("<div class='row'><div class='columns twelve'><p class='pushtop'>Thank you for your review! We will get back to you soon, and possibly feature your review on the Panettiere website!</p></div></div>");
		});
	});
})($, $("#s").length > 0);

(function ($, run) {
	if (!run) return;

	$(window).on('scroll', function () {
		if ($(window).scrollTop() >= 550 && $(window).scrollTop() <= $(".footer")[0].offsetTop-315)
			$("#mcr").addClass("sticky");
		else
			$("#mcr").removeClass("sticky");
	});

	$(".menu-item").hide();
	$(".cata.bakery").click(function () { $(".subcata:not(.bakery)").hide().siblings(".bakery").show().first().children().click(); });
	$(".cata.restaurant").click(function () { $(".subcata:not(.restaurant)").hide().siblings(".restaurant").show().first().children().click(); });
	$(".cata.fullmenu").click(function () { $(".subcata:not(.fullmenu)").hide().siblings(".fullmenu").show().first().children().click(); });
	$(".subcata a").click(function () {
		$(this).parent().siblings().children().removeClass("active");
		$(this).addClass("active");
		$(".menu-item:not(."+$(this).attr("href").substring(1)+")").hide().siblings("."+$(this).attr("href").substring(1)).fadeIn();
		if ($(window).scrollTop() > 550) $(window).scrollTop(550);
	});
	if (location.hash.substring(1) == "")
		location.hash = "#restaurant";
	if ($(".subcata." + location.hash.substring(1)).hasClass("bakery"))
		$(".cata.bakery").click();
	else if ($(".subcata." + location.hash.substring(1)).hasClass("restaurant"))
		$(".cata.restaurant").click();
	else
		$(".cata.fullmenu").click();
	$(".subcata." + location.hash.substring(1)).click();
})($, $(".menu-item").length > 0);

(function ($, run) {
	if (!run) return;
	var images = new Array(), items = $(".menu-item");
	for (var i = 0; i < items.length; i++) {
		images[i] = new Image();
		images[i].src = items.css("background-image").replace("menu", "menuhd");
	}
})($, $(".menu-item").length > 0);

(function ($, run) {
	if (!run) return;
	var description = function(name) {
		return menu[name] || "";
	}
	var modal = false;
	$(".modal-container").css("opacity", 0) && setTimeout(function () {$(".modal-container").css("display", "none");}, 350);
	$(".modal-container").click(function (e) {
		if (e.target == $(this)[0])
		{
			$(".modal-container").css("opacity", 0) && setTimeout(function () {$(".modal-container").css("display", "none");}, 350);
			modal = false;
		}
	});
	$(".modal-container .close").click(function (e) {
		e.preventDefault();
		$(".modal-container").css("opacity", 0) && setTimeout(function () {$(".modal-container").css("display", "none");}, 350);
		modal = false;
	});
	$(".menu-item:not(.fullmenu)").click(function () {
		$("#modal .modal-image").css("background-image", $(this).css("background-image").replace("menu", "menuhd"));
		$("#modal .modal-content h5").html($(this).children(".details").children(".name").html().replace("&amp;","&"));
		$("#modal .modal-content p").html(description($(this).children(".details").children(".name").html().replace("&amp;","&")));
		$("#modal .modal-footer .price").html($(this).children(".details").children(".price").html());
		$("#modal .modal-footer a").attr("href", "/cart.php?add=" + encodeURIComponent($(this).children(".details").children(".name").html().replace("&amp;","&")));
		if ($(this).hasClass("scones"))
			$("#modal .modal-image").css("background-position-x", "-250px");
		else
			$("#modal .modal-image").css("background-position-x", "inherit");
		//
		var t = modal;
		t = t ? $(".modal-container").css("opacity", 0) && setTimeout(function () {$(".modal-container").css("display", "none");}, 350) : $(".modal-container").css("display", "block") && setTimeout(function () {$(".modal-container").css("opacity", 1);}, 1);
		modal = !modal;
	});
})($, $("#modal").length > 0);

(function ($, run) {
	if (!run) return;
	var items = document.cookie.split("; ");
	for (var i = 0; i < (items.length || 0); i++)
		if (items[i].indexOf("cart=") == 0)
			items = items[i];
	items = decodeURIComponent(items.substring(5)).replace(/\+/g, " ").split(",");
	var saveItems = function () {
		document.cookie = "cart=" + encodeURIComponent(items.join(","));
	}
	var updateSidebar = function () {
		var rows = $("#cart .body tr");
		var sub = 0;
		for (var i = 0; i < rows.length; i++) {
			sub += Number($(rows[i]).children(".quant").children("input").val()) * Number($(rows[i]).children(".price").html().substring(1));
		}
		var tax = 0.0875*sub, tot = sub+tax;
		sub = Math.round(sub * 100) + "";
		tax = Math.round(tax * 100) + "";
		tot = Math.round(tot * 100) + "";
		if (sub.length == 2) sub = "0" + sub;
		if (tax.length == 2) tax = "0" + tax;
		if (tot.length == 2) tot = "0" + tot;
		if (sub.length == 1) sub = "00" + sub;
		if (tax.length == 1) tax = "00" + tax;
		if (tot.length == 1) tot = "00" + tot;
		$("#cart-side .sub").html("$" + sub.substring(0,sub.length-2) + "." + sub.substring(sub.length-2));
		$("#cart-side .tax").html("$" + tax.substring(0,tax.length-2) + "." + tax.substring(tax.length-2));
		$("#cart-side .tot").html("$" + tot.substring(0,tot.length-2) + "." + tot.substring(tot.length-2));
	}
	//add all items from cookie
	for (var i = 0; i < items.length; i++) {
		$("#cart .body").append($("<tr><td class='name'>" + items[i].substring(0,items[i].indexOf(":")) + "</td><td class='desc'>" + menu[items[i].substring(0,items[i].indexOf(":"))] + "</td><td class='price'>" + prices[items[i].substring(0,items[i].indexOf(":"))] + "</td><td class='quant'><input type='number' min='1' max='99' step='1' value='" + items[i].substring(items[i].indexOf(":")+1) + "' /><a class='close'></a></td></tr>"));
	}
	updateSidebar();
	//add quantity handler (m.cookie)
	$("#cart .body .quant input").on('change', function () {
		for (var i = 0; i < items.length; i++) {
			if (items[i].indexOf($(this).parent().parent().children(".name").html()) != -1) {
				items[i] = items[i].substring(0,items[i].indexOf(":")) + ":" + $(this).val();
			}
		}
		saveItems();
		updateSidebar();
	});
	//add .close handler (m.cookie)
	$("#cart .body .close").click(function (e) {
		e.preventDefault();
		for (var i = 0; i < items.length; i++) {
			if (items[i].indexOf($(this).parent().parent().children(".name").html()) != -1) {
				items = items.slice(0,i).concat(items.slice(i+1));
			}
		}
		$(this).parent().parent().remove();
		saveItems();
		updateSidebar();
	});
	//add checkout handler
	var handler = StripeCheckout.configure({
		name: 'Panettiere',
		key: 'pk_test_6pRNASCoBOKtIshFeQd4XMUh',
		image: '/images/brand/logo_icon.png',
		locale: 'auto',
		zipCode: true,
		token: function(token) {
			// push cart & token
			$.ajax({
				"url": "/_process.php",
				"type": "POST",
				"data": {
					"type": "order",
					"name": token.id,
					"email": token.email,
					"message": JSON.stringify(items.concat(["comments:"+$("#comments").val()])),
					"submit": true
				}
			});
			// clear cart, display thank you message
			items = [];
			saveItems();
			$(".cart-holder").hide();
			$("#tymsg").css("display", "block");
		}
	});
	$('#cart-side ~ .button').on('click', function(e) {
		updateSidebar();
		handler.open({
			amount: Number($("#cart-side .tot").html().substring(1))*100
		});
		e.preventDefault();
	});
	$(window).on('popstate', function() {
		handler.close();
	});
})($, $("#cart").length > 0);
