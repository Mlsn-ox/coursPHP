const colorShown = document.querySelectorAll("#colorShown");
const select = document.querySelector("select");
const btn = document.querySelector(".btn");
btn.disabled = true;
select.value = "Choisissez un format";

console.log(colorShown);

colorShown.forEach((element) => {
  element.style.backgroundColor = `${element.innerHTML}60`;
});

select.addEventListener("change", function () {
  select[0].disabled = true;
  btn.disabled = false;
});
