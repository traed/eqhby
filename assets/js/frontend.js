jQuery(document).ready(function($) {
	$('.sidenav').sidenav({
		menuWidth: 300,
		edge: 'right',
		closeOnClick: true
	});

	var $submenus = $('.main-menu > li > .sub-menu');	
	if($submenus.length > 0) {
		for(var i = 0; i < $submenus.length; i++) {
			var $submenu = $submenus.eq(i);
			var submenuOffsetLeft = $submenu.offset().left;
			var submenuOffsetRight = submenuOffsetLeft + $submenu.width();
			var menuItemOffsetLeft = $submenu.parent().offset().left;
			var menuItemOffsetRight = menuItemOffsetLeft + $submenu.parent().width();
	
			if(menuItemOffsetLeft < submenuOffsetLeft || menuItemOffsetRight > submenuOffsetRight) {
				var newLeft = menuItemOffsetLeft - $('.main-menu').parent().offset().left + ($submenu.parent().width() / 2);
				$submenu.css({
					left: parseInt(newLeft) + 'px'
				});
			}
		}
	}

	$('.modal').modal();
});