window.addEventListener('DOMContentLoaded', event => {

    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

var images = document.getElementById('order-images');
var containers = images.getElementsByClassName('container');
for(i = 0; i < containers.length; i++) {
    containers[i].addEventListener('click', (e) => {
        var modal = new bootstrap.Modal(document.getElementById("zoomModal"), {});
        var url = e.srcElement.offsetParent.getElementsByTagName('img')[0].currentSrc;
        if(url != null) {
            const imgModal = document.getElementById('img-modal');
            imgModal.setAttribute('src', url);
            modal.show();
        }
        console.log(e.srcElement.offsetParent.getElementsByTagName('img')[0].currentSrc)
    })
}
