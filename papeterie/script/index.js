const body = document.querySelector("body");
const color = document.querySelector(".form-control-color");

color.value = "#ffffff";

color.addEventListener("change", function () {
  body.style.backgroundColor = color.value;
});
