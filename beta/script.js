(function ($) {
	var nav = false;
	$("#pages").hide();
	$("#pages").click(function () {
		$("#pages").hide();
		nav = false;
	});
	$(".close").click(function () {
		$("#pages").hide();
		nav = false;
	});
	$("a[href='#pages']").click(function () {
		var t = nav;
		t = t ? $("#pages").hide() :$("#pages").show();
		nav = !nav;
	});
})($);