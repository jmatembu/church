(function($) {
	"use strict";

	//cover images
	$( ".cover-image").each(function() {
		  var attr = $(this).attr('data-image-src');

		  if (typeof attr !== typeof undefined && attr !== false) {
			  $(this).css('background', 'url('+attr+') center center');
		  }
	});

	//cover image2
	$( ".cover-image2").each(function() {
		  var attr = $(this).attr('data-image-src');

		  if (typeof attr !== typeof undefined && attr !== false) {
			  $(this).css('background', 'url('+attr+') center center');
		  }
	});

	//mCustomScrollbar
	$(".app-sidebar").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});

	// popover
	$('[data-toggle="popover"]').popover({
		container: 'body'
	});

	/*----SideBar----*/
	$(".app-sidebar a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});


	/*----CollapseableLeftMenu----*/
	$("[data-collapse]").each(function() {
		var me = $(this),
				target = me.data('collapse');

		me.click(function() {
			$(target).collapse('toggle');
			$(target).on('shown.bs.collapse', function() {
				me.html('<i class="ion ion-minus"></i>');
			});
			$(target).on('hidden.bs.collapse', function() {
				me.html('<i class="ion ion-plus"></i>');
			});
			return false;
		});
	});

	/*----Alerts----*/
	$(".alert-dismissible").each(function() {
		var me = $(this);

		me.find('.close').on("click", function(e) {
			me.alert('close');
		});
	});

	$('#declaration-name').on('change', function () {
		$('.declaration-name-copy').html($(this).val());
	});

	if ($('.datatable').length) {
        $('.datatable').DataTable({
            ordering: false,
        });
    }




})(jQuery);
