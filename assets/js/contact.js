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
			"message": $("#form #message").val()
		}
	}).done(function () {
		$("#form p").css("margin-top", "30px").html("Thank you for your comments! We'll be in touch shortly.");
		$("#form .field").hide();
		$("#form .actions").hide();
	});
});
function validate() {
	var good = true;
	if ($("#form #name").val().trim() == "") {
		$("#form #name").css("border-color", "rgba(0,0,0,0.5)");
		good = false;
	}
	if ($("#form #email").val().trim() == "" || $("#form #email").val().indexOf("@") == -1 || $("#form #email").val().indexOf(".") == -1) {
		$("#form #email").css("border-color", "rgba(0,0,0,0.5)");
		good = false;
	}
	if ($("#form #message").val().trim() == "") {
		$("#form #message").css("border-color", "rgba(0,0,0,0.5)");
		good = false;
	}
	return good;
}