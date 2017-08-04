/**
 * Handles toggling the navigation menu for small screens and
 * accessibility for submenu items.
 */

document.onload = (function() {
  setTimeout(function () {
    var nav = document.getElementById( 'site-navigation' ), button, menu, container;
    var nav2 = document.getElementsByClassName('main-navigation')

    if ( ! nav ) {
      return;
    }

    button = nav.getElementsByTagName( 'h3' )[0];
    menu   = nav.getElementsByTagName( 'ul' )[0];
    container = nav.getElementsByClassName('menu-primary-container')[0]
    if ( ! button ) {
      return;
    }

    // Hide button if menu is missing or empty.
    if ( ! menu || ! menu.childNodes.length ) {
      button.style.display = 'none';
      return;
    }

    var navMenuItems = Array.from(document.getElementById('menu-primary').getElementsByTagName( 'a' )).filter(function(a) {
      return a.innerHTML != '|'
    })

    var navMenuItemsDividers = Array.from(document.getElementById('menu-primary').getElementsByTagName( 'a' )).filter(function(a) {
      return a.innerHTML == '|'
    })

    navMenuItems.forEach(function (item) {
      item.onclick = function () {
        button.className = button.className.replace( ' toggled-on', '' );
        menu.className = menu.className.replace( ' toggled-on', '' );
      }
    })

    function reverseUL () {
      var parent = document.getElementById('menu-primary'),
      divs = parent.children,
      i = divs.length - 1;

      for (; i--;) {
        parent.appendChild(divs[i])
      }
    }

    button.onclick = function() {
      reverseUL()
      if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        menu.className = 'nav-menu';
        container.style.display = 'none'

        navMenuItemsDividers.forEach(function (item) {
          console.log(item)
          item.parentNode.style.display = 'block'
        })}
      if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
        button.className = button.className.replace( ' toggled-on', '' );
        menu.className = menu.className.replace( ' toggled-on', '' );
        container.style.display = 'block';
        navMenuItemsDividers.forEach(function (item) {
          item.parentNode.style.display = 'none'
        })} else {
          button.className += ' toggled-on';
          menu.className += ' toggled-on';
          container.style.display = 'block'
          navMenuItemsDividers.forEach(function (item) {
            item.parentNode.style.display = 'none'
          })
        }
    };
  }, 500)
} )();
