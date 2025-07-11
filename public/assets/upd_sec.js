function updateSection(id, items, type) {
    const container = document.getElementById(id);
    container.innerHTML = '';

    if (!items || items.length === 0) {
        let msg = 'Nessun contenuto disponibile.';
        if (type === 'post') msg = 'Non sono stati trovati post per questa categoria.';
        if (type === 'recipe') msg = 'Non sono state trovate ricette per questa categoria.';
        if (type === 'mealPlan') msg = 'Non sono stati trovati piani alimentari per questa categoria.';
        container.innerHTML = `<p class="mb-1">${msg}</p>`;
        return;
    }

    items.forEach(item => {
        let html = '';
        if (type === 'post') {
            html = `
                <a href="/recipeek/Post/view/${item.id}" class="card text-decoration-none" data-category="${item.category.toLowerCase()}">
                    <div class="card-body">
                        <h5 class="card-title">${item.title}</h5>
                        <h6 class="card-subtitle mb-2">di ${item.username}</h6>
                        <p class="card-text">${item.description}</p>
                        <p class="mb-1 small">Creato il: ${item.created}</p>
                    </div>
                </a>
            `;
        } else if (type === 'recipe') {
            html = `
                <a href="/recipeek/Recipe/view/${item.id}" class="card text-decoration-none" data-category="${item.category.toLowerCase()}">
                    <div class="card-body">
                        <h5 class="card-title">${item.title}</h5>
                        <h6 class="card-subtitle mb-2">di ${item.username}</h6>
                        <p class="card-text">${item.description}</p>
                        <p class="mb-1 small">Creato il: ${item.created}</p>
                    </div>
                </a>
            `;
        } else if (type === 'mealPlan') {
            html = `
                <a href="/recipeek/MealPlan/view/${item.id}" class="card text-decoration-none" data-category="${item.category.toLowerCase()}">
                    <div class="card-body">
                        <h5>${item.name}</h5>
                        <p>${item.description}</p>
                        <p class="mb-1 small">Creato il: ${item.created}</p>
                    </div>
                </a>
            `;
        }
        container.insertAdjacentHTML('beforeend', html);
    });
}

document.getElementById('category-select').addEventListener('change', function () {
    const selectedCategory = this.value;

    fetch('/recipeek/User/filter_api', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'category=' + encodeURIComponent(selectedCategory)
    })
    .then(res => res.json())
    .then(data => {
        updateSection('tab-posts', data.posts, 'post');
        updateSection('tab-recipes', data.recipes, 'recipe');
        updateSection('tab-mealplans', data.mealPlans, 'mealPlan');
    })
    .catch(err => {
        console.error('Errore durante il caricamento dei dati filtrati:', err);
    });
});