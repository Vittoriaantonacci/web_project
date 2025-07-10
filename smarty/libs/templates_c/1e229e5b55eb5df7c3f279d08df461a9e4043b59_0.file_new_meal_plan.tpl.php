<?php
/* Smarty version 5.5.1, created on 2025-07-09 12:28:27
  from 'file:new_meal_plan.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686e444b54c750_90951752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e229e5b55eb5df7c3f279d08df461a9e4043b59' => 
    array (
      0 => 'new_meal_plan.tpl',
      1 => 1752056614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686e444b54c750_90951752 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1140762417686e444b524589_71949960', 'body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_587151974686e444b548cb8_06658172', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block 'body'} */
class Block_1140762417686e444b524589_71949960 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container py-5">
    <h2 class="mb-4">Crea un nuovo piano alimentare</h2>

    <form action="/recipeek/MealPlan/onCreate" method="post" enctype="multipart/form-data">
        <!-- Nome del Meal Plan -->
        <div class="mb-3">
            <label for="nameMealPlan" class="form-label">Nome del Piano</label>
            <input type="text" class="form-control" id="nameMealPlan" name="nameMealPlan" required>
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <!-- Tag -->
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" required>
        </div>

        <?php $_smarty_tpl->assign('mealtimes', array('Colazione','Pranzo','Snacks','Cena'), false, NULL);?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('mealtimes'), 'mealtime', false, NULL, 'outer', array (
  'index' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealtime')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_outer']->value['index']++;
?>
        <div class="card mb-4">
            <div class="card-header bg-success text-white"><?php echo $_smarty_tpl->getValue('mealtime');?>
</div>
            <div class="card-body">
                <label class="form-label">Ingredienti</label>
                <div class="ingredient-list" id="ingredient-list-<?php echo ($_smarty_tpl->getValue('__smarty_foreach_outer')['index'] ?? null);?>
">
                    <div class="d-flex mb-2">
                        <select class="form-select me-2 ingredient-select" name="ingredients[]">
                            <option disabled selected value="">Seleziona un ingrediente</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('meals'), 'meal');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('meal')->value) {
$foreach1DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('meal')->getId();?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('meal')->getName(), ENT_QUOTES, 'UTF-8', true);?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            <option value="_load_more_">🔍 Carica altri cibi...</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" onclick="addIngredientTo('ingredient-list-<?php echo ($_smarty_tpl->getValue('__smarty_foreach_outer')['index'] ?? null);?>
')">Aggiungi ingrediente</button>
            </div>
        </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Crea piano alimentare</button>
        </div>
    </form>

    <!-- Modal per caricamento ingredienti via API -->
    <div id="meal-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1050;">
        <div class="modal-dialog modal-dialog-centered" style="max-width:500px; margin:auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cerca un alimento</h5>
                    <button type="button" class="btn-close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="meal-search" class="form-control mb-3" placeholder="Es. banana">
                    <div id="meal-results" class="list-group"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'body'} */
/* {block 'script'} */
class Block_587151974686e444b548cb8_06658172 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/add_ing.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/recipeek/public/assets/new_meal_api.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function addIngredientTo(containerId) {
        const container = document.getElementById(containerId);
        const select = document.createElement("select");
        select.name = "ingredients[]";
        select.className = "form-select me-2 ingredient-select";

        const defaultOption = document.createElement("option");
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.text = "Seleziona un ingrediente";
        select.appendChild(defaultOption);

        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('meals'), 'meal');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('meal')->value) {
$foreach2DoElse = false;
?>
            const opt = document.createElement("option");
            opt.value = "<?php echo $_smarty_tpl->getValue('meal')->getId();?>
";
            opt.text = "<?php echo strtr((string)$_smarty_tpl->getValue('meal')->getName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", 
						"\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S",
						"`" => "\\`", "\${" => "\\\$\{"));?>
";
            select.appendChild(opt);
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

        const loadMore = document.createElement("option");
        loadMore.value = "_load_more_";
        loadMore.text = "🔍 Carica altri cibi...";
        select.appendChild(loadMore);

        const wrapper = document.createElement("div");
        wrapper.className = "d-flex mb-2";
        wrapper.appendChild(select);

        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.className = "btn btn-outline-danger";
        removeBtn.textContent = "Rimuovi";
        removeBtn.onclick = function () { wrapper.remove(); };
        wrapper.appendChild(removeBtn);

        container.appendChild(wrapper);
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
