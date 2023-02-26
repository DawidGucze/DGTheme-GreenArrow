jQuery(document).ready(function($) {
 
	$('#dgt_logo_button').click(function() {

		formfield = $('#dgt_logo').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;

	});
	 
	window.send_to_editor = function(html) {

		imgurl = $('img',html).attr('src');
		$('#dgt_logo').val(imgurl);
		tb_remove();

	}
 
});