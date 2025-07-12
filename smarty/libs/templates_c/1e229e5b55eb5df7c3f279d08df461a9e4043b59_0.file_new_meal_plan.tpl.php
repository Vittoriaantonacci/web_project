<?php
/* Smarty version 5.5.1, created on 2025-07-12 17:20:43
  from 'file:new_meal_plan.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68727d4b0f01b8_32039431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e229e5b55eb5df7c3f279d08df461a9e4043b59' => 
    array (
      0 => 'new_meal_plan.tpl',
      1 => 1752275928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68727d4b0f01b8_32039431 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_35195949268727d4b0d5769_38831911', 'body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_143551683868727d4b0ef7a5_84640080', 'script');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block 'body'} */
class Block_35195949268727d4b0d5769_38831911 extends \Smarty\Runtime\Block
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

        <!-- Categoria -->
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled selected>Seleziona una categoria</option>
                <option value="antipasto">Antipasto</option>
                <option value="primo">Primo</option>
                <option value="secondo">Secondo</option>
                <option value="dolce">Dolce</option>
                <option value="bevanda">Bevanda</option>
                <?php if ($_smarty_tpl->getValue('isVip')) {?>
                    <option value="antipasto #Fit">Antipasto #Fit</option>
                    <option value="primo #Fit">Primo #Fit</option>
                    <option value="secondo #Fit">Secondo #Fit</option>
                    <option value="dolce #Fit">Dolce #Fit</option>
                    <option value="bevanda #Fit">Bevanda #Fit</option>
                    <option value="contorno #Fit">Contorno #Fit</option>
                    <option value="salsa #Fit">Salsa #Fit</option>
                    <option value="snack #Fit">Snack #Fit</option>
                    <option value="colazione #Fit">Colazione #Fit</option>
                <?php }?>
            </select>
        </div>

        <?php $_smarty_tpl->assign('mealtimes', array('Colazione','Pranzo','Snacks','Cena'), false, NULL);?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('mealtimes'), 'mealtime', false, NULL, 'outer', array (
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealtime')->value) {
$foreach0DoElse = false;
?>
        <div class="card mb-4">
            <div class="card-header bg-success text-white"><?php echo $_smarty_tpl->getValue('mealtime');?>
</div>
            <div class="card-body">
                <label class="form-label">Ingredienti</label>
                <div id="ingredient-list-<?php echo mb_strtolower((string) $_smarty_tpl->getValue('mealtime'), 'UTF-8');?>
" class="ingredient-list">
                    <div class="d-flex mb-2">
                        <select class="form-select me-2 ingredient-select" name="ingredients[<?php echo mb_strtolower((string) $_smarty_tpl->getValue('mealtime'), 'UTF-8');?>
][]">
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
                            <option value="__load_more__">🔍 Carica altri cibi...</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove()">Rimuovi</button>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary mt-2" onclick="addIngredient('<?php echo mb_strtolower((string) $_smarty_tpl->getValue('mealtime'), 'UTF-8');?>
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
class Block_143551683868727d4b0ef7a5_84640080 extends \Smarty\Runtime\Block
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
<?php
}
}
/* {/block 'script'} */
}
