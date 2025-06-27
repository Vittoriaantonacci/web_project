<?php
/**
 * class to access to external api client
 */
class UApiClient{

    /**
     * @var UApiClient|null for singleton instance
     */
    private static $instance = null;

    public static function getInstance(): UApiClient
    {
        if (self::$instance === null) {
            self::$instance = new UApiClient();
        }
        return self::$instance;
    }
    
    /**
     * Make a GET request to the API
     * @param string $term
     * @return mixed
     * @throws Exception
     */
    public static function searchFood(string $term)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://oauth.fatsecret.com/connect/token");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET),
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        if (!isset($data['access_token'])) {
            throw new Exception("Access token not received: " . json_encode($data));
        }

        $access_token = $data['access_token'];

        $url = "https://platform.fatsecret.com/rest/server.api?" . http_build_query([
            'method' => 'foods.search',
            'format' => 'json',
            'search_expression' => $term
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }


    /**
     * Create a Stripe payment intent
     * @param int $amount Amount in cents
     * @param string $currency Currency code (default 'eur')
     * @param string $description Payment description (default 'Pagamento')
     * @return array
     */
    function createStripePayment($amount, $currency = 'eur', $description = 'Pagamento') {
        try {
            // Qui dovresti fare \Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY'); ma io ho già impostato la chiave segreta nel file di configurazione

            // Importante: amount deve essere in centesimi (es. 10.00€ = 1000)
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'description' => $description,
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            return [
                'clientSecret' => $paymentIntent->client_secret,
                'status' => 'success',
            ];
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }  
}