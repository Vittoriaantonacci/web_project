function addIngredient(index) {
    const container = document.getElementById('ingredient-list-' + index);
    const div = document.createElement('div');
    div.className = 'd-flex mb-2';
    div.innerHTML = `
        <select class="form-select me-2 ingredient-select" name="ingredients[${index}][]">
            ${document.querySelector('select[name="ingredients[' + index + '][]"]').innerHTML}
        </select>
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
    `;
    container.appendChild(div);
}



