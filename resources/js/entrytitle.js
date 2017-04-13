$(function(){
	var
		$titleWrapper      = $("#page-header"),
		$title             = $titleWrapper.find("h1"),
		$titleFieldWrapper = $("#title-field"),
		$titleField        = $("#title"),
		$editIcon = $('<i data-icon="edit"></i>');

	if (!$titleWrapper.length) { return false; }

	$titleFieldWrapper
		.hide()
		.find("ul.errors")
			.insertAfter($title);
	$title
		.attr("contenteditable", true)
		.attr("title", "Click to edit")
		.on("keydown keypress keyup paste", function(e) {
			if (e.charCode == 13) {
				e.preventDefault();
				return;
			}
			$titleField.val($(this).text());
		})
		.after($editIcon);

	$editIcon.on("click", function() {
		var
			range = document.createRange(),
			sel = window.getSelection();

		$title.focus();
		range.setStart($title[0].childNodes[0], $title[0].childNodes[0].length);
		range.collapse(true);
		sel.removeAllRanges();
		sel.addRange(range);
	});

	if ($titleWrapper.find("ul.errors li").length) {
		$title.addClass("error");
	}
});
