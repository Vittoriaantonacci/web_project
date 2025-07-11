{extends file='layout.tpl'}

{block name="body"}
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
<!--<script src="https://js.stripe.com/v3/"></script>-->
<!--<script src="/recipeek/assets/js/stripe-handler.js"></script>-->
{/block}