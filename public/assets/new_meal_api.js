function closeModal() {
    document.getElementById('meal-modal').style.display = 'none';
    document.getElementById('meal-search').value = '';
    document.getElementById('meal-results').innerHTML = '';
}

function openModal(selectEl) {
    const modal = document.getElementById('meal-modal');
    const input = document.getElementById('meal-search');
    const resultsContainer = document.getElementById('meal-results');

    modal.style.display = 'block';
    input.value = '';
    resultsContainer.innerHTML = '';
    input.focus();

    // Rimuove vecchi event listener (se presenti)
    const newInput = input.cloneNode(true);
    input.parentNode.replaceChild(newInput, input);

    newInput.addEventListener('input', () => {
        const q = newInput.value;
        if (q.length > 2) {
            fetch('/recipeek/Recipe/loadMeal', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `input=${encodeURIComponent(q)}`
                })
                .then(res => res.text())
                .then(txt => {
                    console.log('Risposta grezza:', txt);
                    try {
                        const data = JSON.parse(txt);
                        console.log('Parsed JSON:', data);
                        resultsContainer.innerHTML = '';
                        if (Array.isArray(data)) {
                            data.forEach(meal => {
                                const btn = document.createElement('button');
                                btn.className = 'list-group-item list-group-item-action';
                                btn.textContent = meal.name;
                                btn.onclick = () => {
                                    const option = document.createElement('option');
                                    option.value = meal.name;
                                    option.textContent = meal.name;
                                    selectEl.appendChild(option);
                                    selectEl.value = meal.name;
                                    closeModal();
                                };
                                resultsContainer.appendChild(btn);
                            });
                        }
                    } catch (e) {
                        console.error('Errore parsing JSON:', e);
                        resultsContainer.innerHTML = '<div class="text-danger">Errore nella risposta del server</div>';
                    }
                })
                .catch(err => {
                    resultsContainer.innerHTML = '<div class="text-danger">Errore nella richiesta</div>';
                    console.error(err);
                });
        }
    });
}

document.addEventListener('change', function (e) {
    if (e.target && e.target.classList.contains('ingredient-select')) {
        if (e.target.value === '__load_more__') {
            openModal(e.target);
        }
    }
});