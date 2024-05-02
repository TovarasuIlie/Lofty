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

// FilePond.registerPlugin(FilePondPluginFileValidateType);
// FilePond.registerPlugin(FilePondPluginFileValidateSize);
// FilePond.registerPlugin(FilePondPluginImagePreview);
// // Get a reference to the file input element
// const inputElement = document.querySelector('input[type="file"]');

// // Create a FilePond instance
// const pond = FilePond.create(inputElement);