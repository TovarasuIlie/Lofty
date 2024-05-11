window.addEventListener('alert', (event) => {
    Swal.fire({
        position: event.detail.position,
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
        icon: "success",
        title: "Signed in successfully"
      });
});