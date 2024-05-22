function check() {
  var result = confirm("Wil je echt dit verwijderen?");
  if (result == false) {
    event.preventDefault();
  }
}
