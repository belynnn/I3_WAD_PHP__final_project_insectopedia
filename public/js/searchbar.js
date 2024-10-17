document.getElementById('rechercheInsecte').addEventListener('focusin', function() {
    document.getElementById('resultatsRecherche').classList.add('active');
});

document.getElementById('rechercheInsecte').addEventListener('focusout', function() {
    setTimeout(() => document.getElementById('resultatsRecherche').classList.remove('active'), 100);
});

document.getElementById('rechercheInsecte').addEventListener('input', function() {
    let term = this.value;

    // Appel AJAX pour obtenir les suggestions
    fetch('/insectes/rechercher?term=' + term)
        .then(response => response.json())
        .then(data => {
            let resultatsListe = document.getElementById('resultatsRecherche');
            resultatsListe.innerHTML = '';  // Vider les anciens résultats

            if (data.length === 0) {
                resultatsListe.innerHTML = '<li>Aucun insecte trouvé</li>';
            } else {
                data.forEach(function(insect) {
                    let li = document.createElement('li');
                    li.textContent = insect.nameInsect;

                    // Ajouter un gestionnaire d'événements lorsqu'on clique sur une suggestion
                    li.addEventListener('click', function() {
                        // Redirection vers la page spécifique de l'insecte
                        window.location.href = `/insectes/afficher/${insect.id}`;
                    });

                    resultatsListe.appendChild(li);
                });
            }
        })
        .catch(error => {
            console.error('Erreur:', error);  // Loguer les erreurs pour déboguer
        });
});

document.getElementById('observation_nameInsect').addEventListener('focusin', function() {
    document.getElementById('resultSearch').classList.add('active');
});

document.getElementById('observation_nameInsect').addEventListener('focusout', function() {
    setTimeout(() => document.getElementById('resultSearch').classList.remove('active'), 100);
});

document.getElementById('observation_nameInsect').addEventListener('input', function() {
    let term = this.value;

    // Appel AJAX pour obtenir les suggestions
    fetch('/insectes/rechercher?term=' + term)
        .then(response => response.json())
        .then(data => {
            let resultatsListe = document.getElementById('resultSearch');
            resultatsListe.innerHTML = '';

            if (data.length === 0) {
                resultatsListe.innerHTML = '<li>Aucun insecte trouvé</li>';
            } else {
                data.forEach(function(insect) {
                    let li = document.createElement('li');
                    li.textContent = insect.nameInsect;

                    li.addEventListener('click', function(e) {
                        // event = click - target = cible
                        console.log(e.target.textContent);
                        document.getElementById('observation_nameInsect').value = e.target.textContent;
                        resultatsListe.innerHTML = '<li>Aucun insecte trouvé</li>';
                    });

                    resultatsListe.appendChild(li);
                });
            }
        })
        .catch(error => {
            console.error('Erreur:', error);  // Loguer les erreurs pour déboguer
        });
});

// retirer l'autocomplete
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner le formulaire ou le champ
    const form = document.getElementById("observation_nameInsect");

    if (form) {
        form.setAttribute("autocomplete", "off");
    }
});