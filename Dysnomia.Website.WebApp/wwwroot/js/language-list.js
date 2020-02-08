let iconSelect;
let selectedText;
let languageForm;
let changed;

window.addEventListener('load', function() {
	// Variables de base
	selectedText = document.getElementById('selected-language');
	languageForm = document.getElementById('language-form');
	changed = 0;

	// Evenement du changement de drapeau
	document.getElementById('language-list').addEventListener('changed', function(e){
		selectedText.value = iconSelect.getSelectedValue();
		changed++;

		if (changed === 2) { // Car sinon il s'envoie dès le chargement de la page
			window.location.href = '/' + iconSelect.getSelectedValue() + '/';
		}
	});

	// Chargement de la liste des drapeaux
	iconSelect = new IconSelect('language-list');

	const icons = [];
	icons.push({'iconFilePath':'https://***REMOVED***/website/img/flags/fr.png', 'iconValue':'fr'});
	icons.push({'iconFilePath':'https://***REMOVED***/website/img/flags/en.png', 'iconValue':'en'});
	//icons.push({'iconFilePath':'https://***REMOVED***/website/img/flags/ru.png', 'iconValue':'ru'});
	//icons.push({'iconFilePath':'https://***REMOVED***/website/img/flags/de.png', 'iconValue':'de'});

	iconSelect.refresh(icons);
});
