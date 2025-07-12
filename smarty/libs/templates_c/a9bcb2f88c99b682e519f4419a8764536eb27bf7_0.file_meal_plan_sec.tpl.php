<?php
/* Smarty version 5.5.1, created on 2025-07-12 02:09:05
  from 'file:meal_plan_sec.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6871a7a15ef869_71710528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9bcb2f88c99b682e519f4419a8764536eb27bf7' => 
    array (
      0 => 'meal_plan_sec.tpl',
      1 => 1752275936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6871a7a15ef869_71710528 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7479722446871a7a15d7ed4_65534106', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_117937406871a7a15daef0_93766346', "body");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21125893326871a7a15ef273_78252752', "script");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "title"} */
class Block_7479722446871a7a15d7ed4_65534106 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>
I tuoi Piani Alimentari<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_117937406871a7a15daef0_93766346 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container mt-4">
    <div class="styled-card">
        <!-- Topbar Tabs -->
        <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary tab-btn active" data-variant="primary" data-target="#saved-mealplans">📌 Piani Salvati</button>
            <button class="btn btn-primary tab-btn" data-variant="primary" data-target="#created-mealplans">📝 Piani Creati</button>
        </div>

        <!-- Sezione: Meal Plans Salvati -->
        <div id="saved-mealplans" class="tab-content fade show">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('savedMealPlans')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('savedMealPlans'), 'mealPlan');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealPlan')->value) {
$foreach0DoElse = false;
?>
                    <a href="/recipeek/MealPlan/view/<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
" class="card text-decoration-none mb-2">
                        <div class="card-body">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getNameMealPlan(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('mealPlan')->getCreationTime(),"%d/%m/%Y");?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Nessun piano alimentare salvato.</p>
            <?php }?>
        </div>

        <!-- Sezione: Meal Plans Creati -->
        <div id="created-mealplans" class="tab-content fade" style="display: none;">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('createdMealPlans')) > 0) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('createdMealPlans'), 'mealPlan');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('mealPlan')->value) {
$foreach1DoElse = false;
?>
                    <a href="/recipeek/MealPlan/view/<?php echo $_smarty_tpl->getValue('mealPlan')->getIdMealPlan();?>
" class="card text-decoration-none mb-2">
                        <div class="card-body">
                            <h5><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getNameMealPlan(), ENT_QUOTES, 'UTF-8', true);?>
</h5>
                            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('mealPlan')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
                            <p class="mb-1 small">Creato il: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('mealPlan')->getCreationTime(),"%d/%m/%Y");?>
</p>
                        </div>
                    </a>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <p class="mb-1">Non hai ancora creato nessun piano alimentare.</p>
            <?php }?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_21125893326871a7a15ef273_78252752 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<?php echo '<script'; ?>
 src="/recipeek/public/assets/tab_btn.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
