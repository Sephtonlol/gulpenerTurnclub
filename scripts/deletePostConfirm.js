function check() {
  var result = confirm("Wil je echt deze blogpost verwijderen?");
  if (result == false) {
    event.preventDefault();
  }
}
