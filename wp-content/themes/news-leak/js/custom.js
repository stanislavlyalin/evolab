$(document).ready(function() {
   $('table').removeAttr('summary');
   $('li.menu-item-type-custom > a').contents().unwrap().wrap('<span class="dir"></span>');
   $('#container_ad').html($('#container_ad_loader').html());
 });

$(function() {
	$("ul.tabs").tabs("div.panes > div");
});
