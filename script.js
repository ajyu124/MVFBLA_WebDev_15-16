(function ($, run) {
	if (!run) return;
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
		if ($(window).scrollTop() > 550)
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
	});
	if (location.hash.substring(1) == "")
		location.hash = "#menu";
	if ($(".subcata." + location.hash.substring(1)).hasClass("bakery"))
		$(".cata.bakery").click();
	else if ($(".subcata." + location.hash.substring(1)).hasClass("restaurant"))
		$(".cata.restaurant").click();
	else
		$(".cata.fullmenu").click();
	$(".subcata." + location.hash.substring(1)).click();
})($, $(".menu-item").length > 0);
