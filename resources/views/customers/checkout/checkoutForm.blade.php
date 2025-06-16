

<script src="https://js.stripe.com/v3/"></script>

<div class="container">
    <h2>أدخل بيانات الدفع</h2>
    <form id="payment-form">
        <div id="card-element"></div>
        <button id="submit">ادفع الآن</button>
        <div id="error-message"></div>
    </form>
</div>

<script>
    const stripe = Stripe('{{ config('stripe.secret') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    const clientSecret = '{{ $clientSecret }}';

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const {paymentIntent, error} = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: card
            }
        });

        if (error) {
            document.getElementById('error-message').textContent = error.message;
        } else if (paymentIntent.status === 'succeeded') {
            window.location.href = '/checkout/success';
        }
    });
</script>
