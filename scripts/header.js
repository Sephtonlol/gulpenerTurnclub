var isClicked = false;

document.querySelector("svg").addEventListener("click", function () {
  if (!isClicked) {
    document.getElementById("top-line").style.animation =
      "down-rotate 0s ease-out both";
    document.getElementById("bottom-line").style.animation =
      "up-rotate 0s ease-out both";
    document.getElementById("middle-line").style.animation =
      "hide 0s ease-out forwards";
    var menus = document.getElementsByClassName("menu");
    for (var i = 0; i < menus.length; i++) {
      menus[i].style.display = "flex";
    }
  } else {
    document.getElementById("top-line").style.animation = "";
    document.getElementById("bottom-line").style.animation = "";
    document.getElementById("middle-line").style.animation = "";
    var menus = document.getElementsByClassName("menu");
    for (var i = 0; i < menus.length; i++) {
      menus[i].style.display = "none";
    }
  }
  isClicked = !isClicked;
});
