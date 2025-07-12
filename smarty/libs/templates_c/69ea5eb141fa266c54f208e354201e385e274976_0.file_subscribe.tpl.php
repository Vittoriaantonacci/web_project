<?php
/* Smarty version 5.5.1, created on 2025-07-12 02:11:10
  from 'file:subscribe.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6871a81e61cf79_33361758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69ea5eb141fa266c54f208e354201e385e274976' => 
    array (
      0 => 'subscribe.tpl',
      1 => 1752275888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6871a81e61cf79_33361758 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11478751296871a81e613557_77468008', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "body"} */
class Block_11478751296871a81e613557_77468008 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/recipeek/smarty/libs/templates';
?>

<div class="container py-5">
    <div class="text-center mb-4">
        <h2>Abbonati a Recipeek</h2>
        <p>Accedi a contenuti esclusivi, crea post e ricette riservati agli abbonati e pianifica i tuoi pasti con funzionalità premium.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/recipeek/User/heckout" method="POST" id="payment-form" class="card p-4 shadow">
                <h4 class="mb-3">Scegli il tuo piano</h4>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="plan" id="monthly" value="monthly" checked>
                    <label class="form-check-label" for="monthly">
                        Mensile - 1,99€ / mese
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="radio" name="plan" id="yearly" value="yearly">
                    <label class="form-check-label" for="yearly">
                        Annuale - 19,99€ / anno
                    </label>
                </div>

                <h4 class="mb-3">Dati di pagamento</h4>
                <div class="mb-3">
                    <label for="cardholder-name" class="form-label">Nome intestatario</label>
                    <input type="text" class="form-control" id="cardholder-name" name="cardholder_name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Stripe Elements card placeholder -->
                <div id="card-element" class="mb-3">
                    <!-- Stripe Card Element will be inserted here -->
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Abbonati ora</button>
            </form>
        </div>
    </div>
</div>

<!-- Include Stripe.js  (non ancora implementato)-->
<!--<?php echo '<script'; ?>
 src="https://js.stripe.com/v3/"><?php echo '</script'; ?>
>-->
<!--<?php echo '<script'; ?>
 src="/recipeek/assets/js/stripe-handler.js"><?php echo '</script'; ?>
>-->
<?php
}
}
/* {/block "body"} */
}
