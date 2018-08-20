for (let sel of document.querySelectorAll('.has-create-inputs')) {
  sel.addEventListener('change', function() {
    sel.classList.toggle('show-create', this.value == 0);
  })
}