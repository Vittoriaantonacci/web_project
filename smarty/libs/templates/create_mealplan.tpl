<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crea Piano Alimentare</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    .meal-block {
      border: 1px solid #ddd;
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 0.375rem;
      position: relative;
    }
    .remove-meal-btn {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4">Crea un nuovo Piano Alimentare</h2>

  {if $error}
    <div class="alert alert-danger">{$error}</div>
  {/if}

  <form method="post" action="/mealplan/create">
    
    <div class="mb-3">
      <label for="planName" class="form-label">Nome del Piano</label>
      <input type="text" name="planName" id="planName" class="form-control" required />
    </div>

    <div id="meals-container">
      <div class="meal-block">
        <button type="button" class="btn btn-sm btn-danger remove-meal-btn">X</button>

        <div class="mb-3">
          <label class="form-label">Tipo di pasto</label>
          <select name="meal_type[]" class="form-select meal-type" required>
            <option value="">--Seleziona--</option>
            <option value="meal">Pasto</option>
            <option value="recipe">Ricetta</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Seleziona pasto o ricetta</label>
          <select name="meal_item[]" class="form-select meal-item" required disabled>
            <option value="">--Seleziona prima il tipo--</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Porzione (descrizione)</label>
          <input type="text" name="serving_description[]" class="form-control" placeholder="E.g., 1 piatto, 150g, 2 fette" required />
        </div>

        <div class="row">
          <div class="col-6 col-md-3 mb-3">
            <label class="form-label">Calorie</label>
            <input type="number" name="serving_calories[]" step="0.1" class="form-control" required />
          </div>
          <div class="col-6 col-md-3 mb-3">
            <label class="form-label">Carboidrati (g)</label>
            <input type="number" name="serving_carbohydrate[]" step="0.1" class="form-control" required />
          </div>
          <div class="col-6 col-md-3 mb-3">
            <label class="form-label">Proteine (g)</label>
            <input type="number" name="serving_protein[]" step="0.1" class="form-control" required />
          </div>
          <div class="col-6 col-md-3 mb-3">
            <label class="form-label">Grassi (g)</label>
            <input type="number" name="serving_fat[]" step="0.1" class="form-control" required />
          </div>
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary mb-4" id="addMealBtn">Aggiungi pasto</button>

    <button type="submit" class="btn btn-success">Salva Piano Alimentare</button>
  </form>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Lista dati di esempio da backend (da passare via Smarty)
  const meals = [
    { id: 1, name: "Yogurt" },
    { id: 2, name: "Pane" },
    { id: 3, name: "Uova" }
  ];
  const recipes = [
    { id: 101, name: "Insalata di pollo" },
    { id: 102, name: "Pasta al pomodoro" }
  ];

  // Funzione per popolare select pasto o ricetta in base al tipo
  function updateMealItemSelect(mealTypeSelect) {
    const mealBlock = mealTypeSelect.closest('.meal-block');
    const mealItemSelect = mealBlock.querySelector('.meal-item');
    const selectedType = mealTypeSelect.value;

    mealItemSelect.innerHTML = '';

    if (selectedType === 'meal') {
      mealItemSelect.append(new Option('--Seleziona pasto--', ''));
      meals.forEach(m => {
        mealItemSelect.append(new Option(m.name, m.id));
      });
      mealItemSelect.disabled = false;
    } else if (selectedType === 'recipe') {
      mealItemSelect.append(new Option('--Seleziona ricetta--', ''));
      recipes.forEach(r => {
        mealItemSelect.append(new Option(r.name, r.id));
      });
      mealItemSelect.disabled = false;
    } else {
      mealItemSelect.append(new Option('--Seleziona prima il tipo--', ''));
      mealItemSelect.disabled = true;
    }
  }

  // Gestione evento cambio tipo pasto
  document.querySelectorAll('.meal-type').forEach(select => {
    select.addEventListener('change', function() {
      updateMealItemSelect(this);
    });
  });

  // Rimuovi blocco pasto
  document.querySelectorAll('.remove-meal-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const mealBlock = this.closest('.meal-block');
      mealBlock.remove();
    });
  });

  // Aggiungi nuovo pasto
  document.getElementById('addMealBtn').addEventListener('click', function() {
    const container = document.getElementById('meals-container');
    const newMealBlock = container.firstElementChild.cloneNode(true);

    // Reset valori
    newMealBlock.querySelectorAll('input, select').forEach(el => {
      if(el.tagName === 'SELECT') {
        el.selectedIndex = 0;
        if(el.classList.contains('meal-item')) {
          el.disabled = true;
          el.innerHTML = '<option>--Seleziona prima il tipo--</option>';
        }
      } else {
        el.value = '';
      }
    });

    // Aggiungi evento cambio tipo al nuovo select
    newMealBlock.querySelector('.meal-type').addEventListener('change', function() {
      updateMealItemSelect(this);
    });

    // Aggiungi evento click per rimuovere
    newMealBlock.querySelector('.remove-meal-btn').addEventListener('click', function() {
      const mealBlock = this.closest('.meal-block');
      mealBlock.remove();
    });

    container.appendChild(newMealBlock);
  });
</script>

</body>
</html>
