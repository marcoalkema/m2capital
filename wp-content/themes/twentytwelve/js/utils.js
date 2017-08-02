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
      x[i].parentNode.style.background = 'transparent'
    }
    x[i].parentNode.parentNode.parentNode.style.backgroundImage = 'url("./images/Kids-Graffiti.jpg");'
    x[i].parentNode.parentNode.parentNode.style.backgroundPosition = (3 + (index * 25)) + '% ' + upper()
    console.log(x[i].parentNode.parentNode.parentNode.style)
  }
}
