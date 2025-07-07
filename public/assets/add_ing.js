function addIngredient() {
    const container = document.getElementById('ingredient-list');
    const div = document.createElement('div');
    div.className = 'd-flex mb-2';
    div.innerHTML = `
        <select class="form-select me-2" name="ingredients[]">
            ${document.querySelector('select[name="ingredients[]"]').innerHTML}
        </select>
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
    `;
    container.appendChild(div);
}



