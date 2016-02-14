$("#form input[type='submit']").click(function () {
	$("#form input").attr("disabled", true);
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
