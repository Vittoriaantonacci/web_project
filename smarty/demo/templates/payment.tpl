<html>
<head>
  <title>Abbonati a FitRecipes VIP</title>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://www.paypal.com/sdk/js?client-id={{ paypal_client_id }}&currency=EUR"></script>
</head>
<body>
  <h1>Abbonati a VIP – €4.99/mese</h1>

  <h2>Seleziona metodo di pagamento</h2>

  <!-- Stripe (Carte di credito/debito) -->
  <div>
    <h3>Con carta</h3>
    <form id="stripe-form">
      <div id="card-element"></div>
      <div id="card-errors" role="alert"></div>
      <button id="stripe-button">Paga con carta</button>
    </form>
  </div>

  <hr>

  <!-- PayPal -->
  <div>
    <h3>Con PayPal</h3>
    <div id="paypal-button-container"></div>
  </div>

  <script>
    // Stripe
    const stripe = Stripe("{{ stripe_publishable_key }}");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    document.getElementById('stripe-form').addEventListener('submit', async function(event) {
      event.preventDefault();
      const { setupIntent, error } = await stripe.confirmCardSetup(
        "{{ client_secret }}", {
          payment_method: { card: card }
        }
      );
      if (error) {
        document.getElementById('card-errors').textContent = error.message;
      } else {
        fetch('/api/store-payment-method', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ payment_method: setupIntent.payment_method })
        }).then(() => {
          alert("Pagamento effettuato con carta!");
          window.location.href = "/vip";
        });
      }
    });

    // PayPal
    paypal.Buttons({
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': '{{ paypal_plan_id }}' // dal tuo backend
        });
      },
      onApprove: function(data, actions) {
        fetch('/api/paypal/subscribe', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ subscriptionID: data.subscriptionID })
        }).then(() => {
          alert("Pagamento effettuato con PayPal!");
          window.location.href = "/vip";
        });
      }
    }).render('#paypal-button-container');
  </script>
</body>
</html>
