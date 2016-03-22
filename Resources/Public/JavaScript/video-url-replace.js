"use strict";
$(function() {
	$(".vurpl-youtube").each(function() {
		// set the videothumbnail as background
		
		var th_url_large = 'https://i.ytimg.com/vi/' + this.id + '/maxresdefault.jpg';
		
		// maxresdefault/high if width > 640 else standard/high
		if ($(this).width() > 640) var img_src = $(this).data("thumb-large");
		else	var img_src = $(this).data("thumb-medium");
		$(this).css('background-image', 'url(' + img_src + ')');

		// Overlay the Play icon to make it look like a video player
		$(this).append($('<div/>', {'class': 'play'}));

		$(document).delegate('#'+this.id, 'click', function() {
			// Create an iframe with autoplay set to true
			var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
			if ($(this).data('params')) iframe_url+='&'+$(this).data('params');
			var iframe = $('<iframe/>', {'src': iframe_url });
			// Replace the YouTube thumbnail with YouTube HTML5 Player
			$(this).html(iframe);

		});
	});
	$(".vurpl-vimeo").each(function() {
		// set the videothumbnail as background
		// thumb-large if width > 200 else medium
		if ($(this).width() > 200) var img_src = $(this).data("thumb-large");
		else	var img_src = $(this).data("thumb-medium");
		$(this).css('background-image', 'url(' + img_src + ')');

		// Overlay the Play icon to make it look like a video player
		$(this).append($('<div/>', {'class': 'play'}));

		$(document).delegate('#'+this.id, 'click', function() {
			// Create an iFrame with autoplay set to true
			var iframe_url = "https://player.vimeo.com/video/" + this.id + "?autoplay=1&title=0&byline=0&portrait=0";
			if ($(this).data('params')) iframe_url+='&'+$(this).data('params');
			var iframe = $('<iframe/>', {'src': iframe_url });
			// Replace the Vimeo thumbnail with iframe
			$(this).html(iframe);

		});
	});
	
	$(".vurpl-dailymotion").each(function() {
		// set the videothumbnail as background
		// thumb-large if width > 340 else medium
		if ($(this).width() > 340) var img_src = $(this).data("thumb-large");
		else	var img_src = $(this).data("thumb-medium");
		$(this).css('background-image', 'url(' + img_src + ')');

		// Overlay the Play icon to make it look like a video player
		$(this).append($('<div/>', {'class': 'play'}));

		$(document).delegate('#'+this.id, 'click', function() {
			// Create an iFrame with autoplay set to true
			var iframe_url = "https://www.dailymotion.com/embed/video/" + this.id + "?autoplay=1&title=0&byline=0&portrait=0";
			if ($(this).data('params')) iframe_url+='&'+$(this).data('params');
			var iframe = $('<iframe/>', {'src': iframe_url });
			// Replace the Dailymotion thumbnail with HTML5 Player
			$(this).html(iframe);

		});
	}); 
 });
