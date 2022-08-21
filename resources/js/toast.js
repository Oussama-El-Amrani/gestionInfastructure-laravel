let toastElList = [].slice.call(document.querySelectorAll('.toast'))

let toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl);
});

toastList.map(toast => toast.show());
