/**
 * Handles toggling the navigation menu for small screens and
 * accessibility for submenu items.
 */
( function() {
	var nav = document.getElementById( 'site-navigation' ), button, menu;
	if ( ! nav ) {
		return;
	}

	button = nav.getElementsByTagName( 'h3' )[0];
	menu   = nav.getElementsByTagName( 'ul' )[0];
	if ( ! button ) {
		return;
	}

	// Hide button if menu is missing or empty.
	if ( ! menu || ! menu.childNodes.length ) {
		button.style.display = 'none';
		return;
	}

  var navMenuItems = Array.from(document.getElementById('menu-menu-1').getElementsByTagName( 'a' ))

  navMenuItems.forEach(function (item) {
    item.onclick = function () {
      button.className = button.className.replace( ' toggled-on', '' );
      menu.className = menu.className.replace( ' toggled-on', '' );
    }
  })


  button.onclick = function() {
    if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
      menu.className = 'nav-menu';
    }

    if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
      button.className = button.className.replace( ' toggled-on', '' );
      menu.className = menu.className.replace( ' toggled-on', '' );
    } else {
      button.className += ' toggled-on';
			menu.className += ' toggled-on';
    }
  };
} )();
