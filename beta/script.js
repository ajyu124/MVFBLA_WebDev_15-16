(function ($) {
	var nav = false;
	$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
	$("#pages").click(function () {
		$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
		nav = false;
	});
	$(".close").click(function () {
		$("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350);
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").css("opacity", 0) && setTimeout(function () {$("#pages").css("display", "none");}, 350) : $("#pages").css("display", "flex") && setTimeout(function () {$("#pages").css("opacity", 1);}, 1);
		nav = !nav;
	});
})($);

(function($) {
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

	$("#form input[type='submit']").click(function () {
		$("#form input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#form input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_contact.php",
			"type": "POST",
			"data": {
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
})($);

(function ($) {
	$("#r_time").timepicker({
		'scrollDefault': 'now',
		'disableTimeRanges': [
			['2pm', '5pm'],
			['11pm', '11:59pm'],
			['12am', '5:30am']
		]
	});
	$('#date_container').datepicker({});
})($);

(function($) {
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
			$("#r .tables").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		return good;
	}

	$("#r input[type='submit']").click(function () {
		$("#r input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#r input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_contact.php", //TODO
			"type": "POST",
			"data": {
				"name": $("#r #r_name").val(),
				"guests": $("#r #r_guests").val(),
				"email": $("#r #r_email").val(),
				"phone": $("#r #r_phone").val(),
				"time": $("#r #r_time").val(),
				"date": $('#r #date_container').datepicker('getDate').toDateString(),
				"table": $(".tables-table.active").text().trim(),
				"submit": false //TODO
			}
		}).done(function () {
			$("#r").html("<div class='row'><div class='columns twelve'><p>Your reservation has been placed!</p></div></div>");
			//$("#r .row").hide();
		});
	});
})($);

(function($) {
	var validate = function() {
		var good = true;
		if ($("#s #name").val().trim() == "") {
			$("#s #name").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#s #email").val().trim() == "" || $("#form #email").val().indexOf("@") == -1 || $("#form #email").val().indexOf(".") == -1) {
			$("#s #email").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		if ($("#s #review").val().trim() == "") {
			$("#s #review").css("border-color", "rgba(192,0,0,0.5)");
			good = false;
		}
		return good;
	}

	$("#s input[type='submit']").click(function () {
		$("#s input").attr("disabled", true);
		var ok = validate();
		if (!ok) {
			$("#s input").attr("disabled", false);
			return;
		}
		$.ajax({
			"url": "/_contact.php",
			"type": "POST",
			"data": {
				"name": $("#form #name").val(),
				"email": $("#form #email").val(),
				"message": $("#form #review").val(),
				"submit": false
			}
		}).done(function () {
			$("#s").html("<div class='row'><div class='columns twelve'><p>Thank you for your review! We will get back to you soon, and possibly feature your review on the Panettiere website!</p></div></div>");
		});
	});
})($);

(function ($) {
	$(".menu-item").hide();
	$(".cata.bakery").click(function () { $(".subcata:not(.bakery)").hide().siblings(".bakery").show().first().children().click(); });
	$(".cata.restaurant").click(function () { $(".subcata:not(.restaurant)").hide().siblings(".restaurant").show().first().children().click(); });
	$(".cata.fullmenu").click(function () { $(".subcata:not(.fullmenu)").hide().siblings(".fullmenu").show().first().children().click(); });
	$(".subcata a").click(function () {
		$(this).parent().siblings().children().removeClass("active");
		$(this).addClass("active");
		$(".menu-item:not(."+$(this).attr("href").substring(1)+")").hide().siblings("."+$(this).attr("href").substring(1)).fadeIn();
	});
	if (location.hash.substring(1) == "")
		location.hash = "#bakery";
	if ($(".subcata." + location.hash.substring(1)).hasClass("bakery"))
		$(".cata.bakery").click();
	else if ($(".subcata." + location.hash.substring(1)).hasClass("restaurant"))
		$(".cata.restaurant").click();
	else
		$(".cata.fullmenu").click();
	$(".subcata." + location.hash.substring(1)).click();
})($);
