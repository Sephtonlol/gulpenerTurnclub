function previewImage1() {
  let preview = document.getElementById("preview1");
  let file = document.getElementById("image1").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}
function previewImage2() {
  let preview = document.getElementById("preview2");
  let file = document.getElementById("image2").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}

function previewImage3() {
  let preview = document.getElementById("preview3");
  let file = document.getElementById("image3").files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}
