let gallery = document.getElementById('gallery');

gallery.addEventListener('click', (e) => {
    var modal = new bootstrap.Modal(document.getElementById("zoomModal"), {});
    var url = null;
    if(e.target.parentNode.className == "container") {
      url = e.target.parentNode.getElementsByTagName('img')[0].currentSrc;
    }
    else {
      url = e.target.parentNode.parentNode.parentNode.getElementsByTagName('img')[0].currentSrc;
    }
    if(url != null) {
      const imgModal = document.getElementById('img-modal');
      imgModal.setAttribute('src', url);
      modal.show();
    }
});