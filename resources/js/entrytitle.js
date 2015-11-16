$(function(){
	var
		$titleWrapper      = $("#page-header"),
		$title             = $titleWrapper.find("h1"),
		$titleFieldWrapper = $("#title-field"),
		$titleField        = $("#title");
	if (!$titleWrapper.length) { return false; }

	$titleFieldWrapper
		.hide()
		.find("ul.errors")
			.insertAfter($title);
	$title
		.attr("contenteditable", true)
		.attr("title", "Click to edit")
		.on("keypress keyup paste", function(){
			$(this).html($(this).text());
			$titleField.val($(this).text());
		})
		.after('<i data-icon="edit"></i>');

	if ($titleWrapper.find("ul.errors li").length) {
		$title.addClass("error");
	}
});