window.onload = function () {
  if (document.querySelector('.meer-kenmerken-btn')) {
    document.querySelector('.meer-kenmerken-btn').addEventListener("click", function () {
      document.querySelector('.meer-kenmerken-btn').style.display = 'none'
      document.querySelector('.meer-kenmerken-tabel').style.display = 'block'
    });
  }
  if (document.querySelector('.meer-omschrijving-btn')) {
    document.querySelector('.meer-omschrijving-btn').addEventListener("click", function () {
      document.querySelector('.meer-omschrijving-btn').style.display = 'none'
      document.querySelector('.meer-omschrijving-container').style.display = 'block'
    });
  }
  if (document.querySelector('.bezichtigings-btn-btn')) {
    var elem = document.getElementById('foldalbe-contact')
    var btn = document.getElementById('foldBtn')
    document.querySelector('.bezichtigings-btn-btn').addEventListener('click', function () {
      btn.classList.remove('active_')
      elem.classList.add('active')
    })
  }
  if (document.querySelector('._mPS2id-h')) {
    var elem = document.getElementById('foldalbe-contact')
    var btn = document.getElementById('foldBtn')
    document.querySelectorAll('._mPS2id-h').forEach(function (e) {
      e.addEventListener('click', function () {
      btn.classList.remove('active_')
      elem.classList.add('active')
      })
    })
  }
}
