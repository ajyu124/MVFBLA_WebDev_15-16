(function ($) {
	var nav = false;
	$("#pages").hide().css("opacity", 0);
	$("#pages").click(function () {
		$("#pages").css("opacity", 0).hide();
		nav = false;
	});
	$(".close").click(function () {
		$("#pages").css("opacity", 0).hide();
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").css("opacity", 0).hide() : $("#pages").show().css("opacity", 1);
		nav = !nav;
	});
})($);