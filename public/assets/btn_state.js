document.addEventListener("DOMContentLoaded", function () {
    function updateButton(button, newText, newClass, oldClass, newAction) {
        button.textContent = newText;
        button.classList.remove(oldClass);
        button.classList.add(newClass);
        button.dataset.action = newAction;
    }

    document.querySelectorAll('.btn-like, .btn-save, .btn-follow').forEach(button => {
        button.addEventListener('click', async () => {
            const action = button.dataset.action;

            const pathParts = window.location.pathname.split('/');
            const controller = pathParts[2] || 'Post'; 

            let idParamName = 'postId'; // fallback
            if (controller === 'Profile') idParamName = 'profileId';
            else if (controller === 'Recipe') idParamName = 'recipeId';
            else if (controller === 'MealPlan') idParamName = 'mealPlanId';

            const itemId = button.dataset.postId || button.dataset.profileId || button.dataset.recipeId || button.dataset.mealPlanId;

            const bodyData = `${idParamName}=${encodeURIComponent(itemId)}`;

            const response = await fetch(`/recipeek/${controller}/${action}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: bodyData
            });

            if (response.ok) {
                if (button.classList.contains('btn-like')) {
                    if (action === 'addLike') {
                        updateButton(button, '❤️ Rimuovi Like', 'btn-danger', 'btn-outline-danger', 'removeLike');
                    } else {
                        updateButton(button, '🤍 Metti Like', 'btn-outline-danger', 'btn-danger', 'addLike');
                    }
                } else if (button.classList.contains('btn-save')) {
                    if (action === 'addSave') {
                        updateButton(button, '🔖 Rimuovi dai salvati', 'btn-warning', 'btn-outline-warning', 'removeSave');
                    } else {
                        updateButton(button, '🔖 Salva post', 'btn-outline-warning', 'btn-warning', 'addSave');
                    }
                } else if (button.classList.contains('btn-follow')) {
                    if (action === 'follow') {
                        updateButton(button, '👤 Seguito', 'btn-success', 'btn-outline-success', 'removeFollow');
                    } else {
                        updateButton(button, '➕ Segui', 'btn-outline-success', 'btn-success', 'addFollow');
                    }
                }
            } else {
                alert("Errore durante l'operazione. Riprova.");
            }
        });
    });
});