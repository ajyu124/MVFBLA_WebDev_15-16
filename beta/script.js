(function ($) {
	var nav = false;
	$("#pages").css("opacity", 0).show();
	$("#pages").click(function () {
		$("#pages").css("opacity", 0);
		nav = false;
	});
	$(".close").click(function () {
		$("#pages").css("opacity", 0);
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").css("opacity", 0) : $("#pages").css("opacity", 1);
		nav = !nav;
	});
})($);