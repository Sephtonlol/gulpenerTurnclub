function previewImage() {
  var preview = document.getElementById("preview");
  var file = document.getElementById("image").files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}
