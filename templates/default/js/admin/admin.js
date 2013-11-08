//jquery fx begin
$(document).ready(function() {
	var activemenu = $('.page-header').attr('rel');
	var section = $('.page-header').attr('id');
	var activemenuselector = $('#' + activemenu);
	if (activemenuselector.length) {
		activemenuselector.addClass('active');
	}
	// Check all checkboxes when the one in a table head is checked:
	$('.check-all').click(

	function() {
		$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));
	});
	//accordion sidebar custom animation for open/close
	$.fn.slideFadeToggle = function(speed, easing, callback) {
		return this.animate({
			opacity: 'toggle',
			height: 'toggle'
		}, speed, easing, callback);
	};
	$('.accordion').accordion({
		cssClose: 'accordion-close',
		//class you want to assign to a closed accordion header
		cssOpen: 'accordion-open',
		//class you want to assign an opened accordion header
		defaultOpen: section,
		speed: 'fast',
		animateOpen: function(elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		},
		animateClose: function(elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		}
	});
	// File manager interage with tinymce (elfinder)
	tinymce.init({
		mode: "specific_textareas",
		editor_selector: "mceEditor",
		editor_deselector: "mceNoEditor",
		width: 544,
		height: 400,
		plugins: "emotions",
		theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull|cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,undo,redo",
		theme_advanced_buttons2: "link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor,|,hr,removeformat,visualaid,|,charmap,media,|,ltr,rtl,|,fullscreen, emotions",
		theme_advanced_resizing: false,
		nonbreaking_force_tab: true,
		apply_source_formatting: true,
		file_browser_callback: 'elFinderBrowser'
	});
	// using checkbox checked in controller groupedit template
	$(".checkbox").click(function() {
		var keyid = $(this).attr('id');
		$("#all" + keyid).removeAttr("checked");
	});
	// show information of 1 controller
	$(".show-controller-info").click(function() {
		var info = $(this).attr('id');
		var cgkey = $(this).attr('rel');
		$.ajax({
			type: "POST",
			data: 'finfo=' + info,
			url: rooturl + 'admin/role/ajaxinfo',
			dataType: "json",
			success: function(data) {
				if (data.component !== '') {
					$('#controller-info-' + data.groupid + '-' + data.cgroup).html('<ul><li>' + data.component + '</li><li>' + data.written + '</li><li>' + data.date + '</li></ul>');
				} else {
					$('#controller-info-' + data.groupid + '-' + data.cgroup).html('No Description.');
				}
			}
		});
	});
	// Add remove select box
	$('#btn-add').click(function() {
		$('#select-from option:selected').each(function() {
			$('#select-to').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
			$(this).remove();
		});
	});
	$('#btn-remove').click(function() {
		$('#select-to option:selected').each(function() {
			$('#select-from').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
			$(this).remove();
		});
	});
});

function elFinderBrowser(field_name, url, type, win) {
	var elfinder_url = '../../../elfinder/elfinder.html'; // use an absolute path!
	tinyMCE.activeEditor.windowManager.open({
		file: elfinder_url,
		title: 'elFinder 2.0',
		width: 900,
		height: 500,
		resizable: 'yes',
		inline: 'yes',
		// This parameter only has an effect if you use the inlinepopups plugin!
		popup_css: false,
		// Disable TinyMCE's default popup CSS
		close_previous: 'no'
	}, {
		window: win,
		input: field_name
	});
	return false;
}
// JavaScript Document

function delm(theURL) {
	if (confirm(delConfirm)) {
		window.location.href = theURL;
	}
}

function scrollTo(selector) {
	var target = $('' + selector);
	if (target.length) {
		var top = target.offset().top;
		$('html,body').animate({
			scrollTop: top
		}, 1000);
		return false;
	}
}
//use this function to keep connection (prevent login session expired for contents manipulation) alive

function ping() {
	var nulltimestamp = new Date().getTime();
	var t = setTimeout("ping()", 1000 * 60 * 5); //5 minute
	$.ajax({
		type: "GET",
		url: rooturl_admin + 'null/index/timestamp/' + nulltimestamp,
		dataType: "xml",
		success: function(xml) {}
	}); //close $.ajax
}

function gameAddMorePhoto() {
	$("input.subphoto:last").after('<br />Photo: <input type="file" name="fphoto[]" class="subphoto text-input">');
}