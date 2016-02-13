jQuery.fn.extend({
  hide2: function() {
    return this.each(function() {
       $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
    });
  },
  show2: function() {
    return this.each(function() {
       $(this).animate({width: 200}).animate({opacity: "1.0"}).show(0);
    });
  },
  showInst: function () {
  	return this.each(function () {
  		$(this).css("width", "auto").animate({opacity: "1.0"}).show(0);
  	});
  }
});

$(".menu-item").hide();

$(".cata.bakery").click(function () { $(".subcata.restaurant").hide2().siblings(".bakery").showInst().first().children().click(); });
$(".cata.restaurant").click(function () { $(".subcata.bakery").hide2().siblings(".restaurant").showInst().first().children().click(); });

$(".subcata a").click(function () {
	$(this).parent().siblings().children().removeClass("special");
	$(this).addClass("special");
	$(".menu-item:not(."+$(this).attr("href").substring(1)+")").hide2().siblings("."+$(this).attr("href").substring(1)).show2();
});

if (location.hash.substring(1) == "") {
	location.hash = "#breads";
}

if ($(".subcata." + location.hash.substring(1)).hasClass("bakery"))
	$(".cata.bakery").click();
else
	$(".cata.restaurant").click();

$(".subcata." + location.hash.substring(1)).click();
