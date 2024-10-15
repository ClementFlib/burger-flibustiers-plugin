document.getElementById('burger-menu-icon').addEventListener('click', function() {
	// Toggle l'état ouvert/fermé du menu burger
	document.getElementById('burger-menu').classList.toggle('open');
	this.classList.toggle('open');
});