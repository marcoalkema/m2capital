window.onload = function () {
  // var x = document.getElementsByClassName("tmm_names");
  // var i;
  // for (i = 0; i < x.length; i++) {
  //   var index = i % 4
  //   function upper () {
  //     if (i > 3) {
  //       return '3%'
  //     } else {
  //       return '53%'
  //     }
  //   }
  //   if (x[i].innerHTML === '') {
  //     console.log(x[i].parentNode.parentNode.childNodes[0].style.background = 'transparent')
  //   }
  //   // x[i].parentNode.parentNode.parentNode.style.backgroundImage = 'url("./images/Kids-Graffiti.jpg");'
  //   // x[i].parentNode.parentNode.parentNode.style.backgroundPosition = (3 + (index * 25)) + '% ' + upper()
  //   x[i].parentNode.parentNode.parentNode.style.backgroundColor = 'white;'
  // }

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
  var contactInnerHTML = document.getElementsByClassName('contact-fields')[0].querySelectorAll('tr')[4].getElementsByTagName('td')[0]

  var link = document.createElement("A");
  link.setAttribute('href','mailto:info@kidsart.nl');
  link.text=document.getElementsByClassName('contact-fields')[0].querySelectorAll('tr')[4].getElementsByTagName('td')[0].innerHTML
  document.getElementsByClassName('contact-fields')[0].querySelectorAll('tr')[4].getElementsByTagName('td')[0].innerHTML=''
  contactInnerHTML.appendChild(link);

  document.getElementsByClassName('contact-fields')[0].querySelectorAll('tr')[4].classList.add("mail-link")

  document.getElementsByClassName('contact-fields')[0].querySelectorAll('tr')[5].classList.add("LRK-number")


  // var slideIndex = 3;
  // carousel();

  // function carousel() {
  //   var i;
  //   var x = document.getElementById("headerSlider").childNodes;
  //   for (i = 0; i < x.length; i++) {
  //     if (i % 2 !== 0 && i < 6 && i !== 0) {
  //       x[i].style.visibility = "hidden";
  //       x[i].style.opacity = "0";
  //       x[i].style.transition = "visibility 0s, opacity 1s linear";
  //     }
  //   }

  //   slideIndex = slideIndex + 2;
  //   if (slideIndex > 5) {slideIndex = 1}
  //   x[(slideIndex)].style.visibility = "visible";
  //   x[(slideIndex)].style.opacity = "1";
  //   x[slideIndex].style.transition = "visibility 0s, opacity 1s linear";
  //   setTimeout(carousel, 5000); // Change image every 2 seconds
  // }
}
