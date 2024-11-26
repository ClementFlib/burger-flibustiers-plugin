//Icone ouverture/fermeture/reset menu
document.getElementById('burger-menu-icon').addEventListener('click', function() {
	// Toggle l'état ouvert/fermé du menu burger
	document.getElementById('burger-menu').classList.toggle('open');
	this.classList.toggle('open');

	const submenus = document.querySelectorAll('.submenu-container');
	submenus.forEach(submenu => {
	
		// masquer tous les sous-menus ouverts
		submenu.classList.remove('open');
	});
});

// Ouverture des sous-menus
const menuItems = document.querySelectorAll('.menu-item');

menuItems.forEach(item => {
    item.addEventListener('click', (event) => {
		event.stopPropagation(); // Empêche la propagation de l'événement
        const submenu = item.querySelector('.submenu-container');
        const link = item.querySelector('a');

        // Vérifier si le sous-menu existe ET contient des éléments
        if (submenu) {
            event.preventDefault(); // Bloque la navigation

            // Ouvrir le sous-menu
            submenu.classList.add('open');

            // Gestion du bouton "backdash"
            const backdash = submenu.querySelector('.backdash');
            if (backdash && !backdash.dataset.listenerAdded) {
                backdash.addEventListener('click', (backEvent) => {
                    backEvent.stopPropagation(); // Empêche la propagation
                    submenu.classList.remove('open');
                });

                // Éviter les multiples écouteurs
                backdash.dataset.listenerAdded = "true";
            }
        } else if (link) {
            return; // Permet au navigateur de suivre le lien normalement
        }
    });
});
