window.onload = function () {
  var x = document.getElementsByClassName("tmm_names");
  var i;
  for (i = 0; i < x.length; i++) {
    var index = i % 4
    function upper () {
      if (i > 3) {
        return '3%'
      } else {
        return '53%'
      }
    }
    if (x[i].innerHTML === '') {
      console.log(x[i].parentNode.parentNode.childNodes[0].style.background = 'transparent')
    }
    x[i].parentNode.parentNode.parentNode.style.backgroundImage = 'url("./images/Kids-Graffiti.jpg");'
    x[i].parentNode.parentNode.parentNode.style.backgroundPosition = (3 + (index * 25)) + '% ' + upper()
  }

  // you want to enable the pointer events only on click;
  var overlay = document.getElementById('map-overlay')
  var map = document.getElementById('google-map')

  map.classList.add("scrolloff") // set the pointer events to none on doc ready

  overlay.addEventListener("click", function () {
    map.classList.remove("scrolloff");
  });

  // you want to disable pointer events when the mouse leave the canvas area;

  map.addEventListener("mouseout", function () {
    map.classList.add("scrolloff") // set the pointer events to none on doc ready
  })

}
