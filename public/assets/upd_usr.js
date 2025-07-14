function updateSection(id, items) {
    const container = document.getElementById(id);
    container.innerHTML = '';
    const linkPrefix = container.dataset.linkPrefix || '';

    if (!items || items.length === 0) {
        container.innerHTML = `<p class="mb-1">Nessun contenuto disponibile.</p>`;
        return;
    }

    items.forEach(item => {
        const html = `
        <a href="${linkPrefix}${item.id}" class="text-decoration-none text-reset">
            <div class="card mb-2">
                <div class="d-flex align-items-center">
                    <img src="${item.propic}"
                         class="rounded-circle profile-pic-sm img-thumbnail" alt="Immagine profilo">
                    <div class="ms-3 card-body">
                        <p class="mb-0 fw-bold">${item.name} ${item.surname}</p>
                        <p class="mb-1">@${item.username}</p>
                    </div>
                </div>
            </div>
        </a>
        `;
        container.insertAdjacentHTML('beforeend', html);
    });
}

document.getElementById('user-filter-select').addEventListener('change', function () {
    const selectedCategory = this.value;

    fetch('/recipeek/User/userfilter_api', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'category=' + encodeURIComponent(selectedCategory)
    })
    .then(res => res.json())
    .then(data => {
        updateSection('tab-users', data.users);
    })
    .catch(err => {
        console.error('Errore durante il caricamento degli utenti filtrati:', err);
    });
});