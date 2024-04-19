let groepTurn = document.getElementById("year2023");

let Groep = document.getElementById('Groepen');

year2023.addEventListener("mouseover", () => {
	Groepen.classList.add('active')
});

groepTurn.addEventListener("mouseleave", () => {
	Groepen.classList.remove('active')
});

groepTurn.addEventListener("mouseover", () => {
	Groepen.classList.add('active')
});

Groep.addEventListener("mouseleave", () => {
	Groepen.classList.remove('active')

});