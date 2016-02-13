$(".menu-item").hide();

$(".cata.bakery").click(function () { $(".subcata.restaurant").hide().siblings(".bakery").show().first().click(); });
$(".cata.restaurant").click(function () { $(".subcata.bakery").hide().siblings(".restaurant").show().first().click(); });

$(".subcata a").click(function () {
	$(this).parent().siblings().children().removeClass("special");
	$(this).addClass("special");
	$(".menu-item:not(."+$(this).attr("href").substring(1)+")").hide().siblings("."+$(this).attr("href").substring(1)).show();
});

if (location.hash.substring(1) == "") {
	location.hash = "#breads";
}

if ($(".subcata." + location.hash.substring(1)).hasClass("bakery"))
	$(".cata.bakery").click();
else
	$(".cata.restaurant").click();

$(".subcata." + location.hash.substring(1)).click();
