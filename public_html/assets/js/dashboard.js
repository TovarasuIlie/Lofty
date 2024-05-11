if (sidebarToggle) {
    sidebarToggle.addEventListener('click', event1 => {
        event1.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
    });
} else {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
}

window.addEventListener('alert', (event) => {
    Swal.fire({
        position: 'center',
        icon: event.detail.type,
        title: event.detail.title,
        showConfirmButton: false,
        timer: 3000
    })
});

window.addEventListener('toast', (event) => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: event.detail.type,
        title: event.detail.title
      });
});

