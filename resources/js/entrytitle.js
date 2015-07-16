$(function(){
	var
		$title        = $("#page-header h1"),
		$titleWrapper = $("#title-field"),
		$titleField   = $("#title");
	if (!$titleWrapper.length) { return false; }

	$titleWrapper.hide();
	$title
		.attr("contenteditable", true)
		.attr("title", "Click to edit")
		.on("keypress keyup paste", function(){
			console.log("foo");
			$(this).html($(this).text());
			$titleField.val($(this).text());
		})
		.after('<i data-icon="edit"></i>');
});