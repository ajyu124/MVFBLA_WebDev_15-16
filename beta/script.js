(function ($) {
	var nav = false;
	$("#pages").hide();
	$("#pages").click(function () {
		$("#pages").fadeOut();
		nav = false;
	});
	$(".close").click(function () {
		$("#pages").fadeOut();
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").fadeOut() :$("#pages").fadeIn();
		nav = !nav;
	});
})($);