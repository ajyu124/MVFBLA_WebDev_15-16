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