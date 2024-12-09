let planets = document.querySelectorAll("#titre");
console.log(planets);

planets.forEach((planet) => {
  planet.style.background = `linear-gradient(320deg, ${planet.dataset.color}15 0%, ${planet.dataset.color} 100%)`;
  planet.style.width = planet.dataset.size + "px";
  planet.style.height = planet.dataset.size + "px";
  planet.style.border = "solid " + planet.dataset.atmo + "px";
  planet.style.borderColor = "#a8a8a8 ";
});
