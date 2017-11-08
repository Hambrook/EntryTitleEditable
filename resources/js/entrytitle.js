$(function(){
	let
		$titleWrapper      = $("#page-header"),
		$title             = $titleWrapper.find("h1"),
		$titleFieldWrapper = $("#title-field"),
		$titleField        = $("#title"),
		$editIcon          = $('<i data-icon="edit"></i>');

	if (!$titleWrapper.length) { return false; }
	
	let focus = function() {
		let
			range = document.createRange(),
			sel = window.getSelection();

		$title.focus();
		range.setStart($title[0].childNodes[0], $title[0].childNodes[0].length);
		range.collapse(true);
		sel.removeAllRanges();
		sel.addRange(range);
	}

	$titleFieldWrapper
		.hide()
		.find("ul.errors")
			.insertAfter($title);
	$title
		.attr("contenteditable", true)
		.attr("title", "Click to edit")
		.on("keydown keypress keyup paste", function(e){
			if (e.charCode == 13) {
				e.preventDefault();
				return;
			}
			if ($title.html() != $title.text()) {
				$title.html($title.text());
				focus();
			}
			$titleField.val($title.text());
		})
		.after($editIcon);

	$editIcon.on('click', focus);

	if ($titleWrapper.find("ul.errors li").length) {
		$title.addClass("error");
	}
});
