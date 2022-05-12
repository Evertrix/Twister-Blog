{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<x-layout>
    <div class="container-payment">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{ __('Checkout page') }}</div>--}}

                    <div class="card-body">
                        <form id="payment-form" class="form-payment" action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                            <div class="form-row">
                                    <label for="card-element" class="label-payment">
                                        Credit or debit card number
                                    </label>
                                <input type="text" name="name" id="card-holder-name" class="field-payment" value=""
                                       placeholder="Name on the card">
                            </div>
                            <div class="form-row">
                                <label for="" class="label-payment">Card details</label>
                                <div id="card-element"></div>
                            </div>

                            <div class="form-row">
                                <label for="" class="label-payment">Card details</label>
                                {{ $plan->stripe_id ?? 'no info' }}
                            </div>

{{--                            <button type="submit" class="btn btn-primary w-100 text-white" id="card-button"--}}
{{--                                    data-secret="{{ $intent->client_secret }}">Pay--}}
{{--                            </button>--}}
                            <button type="submit" class="btn-payment" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const stripe = Stripe('{{ config('cashier.key') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const {setupIntent, error} = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if (error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')

                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();
            }
        })

        // Create a Stripe client
        {{--var stripe = Stripe('{{ config('cashier.key') }}');--}}

        {{--// Create an instance of Elements--}}
        {{--var elements = stripe.elements();--}}

        {{--// Custom styling can be passed to options when creating an Element.--}}
        {{--// (Note that this demo uses a wider set of styles than the guide below.)--}}
        {{--var style = {--}}
        {{--    base: {--}}
        {{--        color: '#242424',--}}
        {{--        lineHeight: '24px',--}}
        {{--        fontFamily: '"Lato", sans-serif',--}}
        {{--        fontSmoothing: 'antialiased',--}}
        {{--        fontSize: '14px',--}}
        {{--        '::placeholder': {--}}
        {{--            color: '#D4D4D4'--}}
        {{--        }--}}
        {{--    },--}}
        {{--    invalid: {--}}
        {{--        color: '#FF0033',--}}
        {{--        iconColor: '#FF0033'--}}
        {{--    }--}}
        {{--};--}}

        {{--// Create an instance of the card Element--}}
        {{--var card = elements.create('card', {style: style});--}}

        {{--// Add an instance of the card Element into the `card-element` <div>--}}
        {{--card.mount('#card-element');--}}

        {{--// Handle real-time validation errors from the card Element.--}}
        {{--card.addEventListener('change', function(event) {--}}
        {{--    var displayError = document.getElementById('card-errors');--}}
        {{--    if (event.error) {--}}
        {{--        displayError.textContent = event.error.message;--}}
        {{--    } else {--}}
        {{--        displayError.textContent = '';--}}
        {{--    }--}}
        {{--});--}}

        {{--// Handle form submission--}}
        {{--var form = document.getElementById('payment-form');--}}
        {{--form.addEventListener('submit', function(event) {--}}
        {{--    event.preventDefault();--}}

        {{--    stripe.createToken(card).then(function(result) {--}}
        {{--        if (result.error) {--}}
        {{--            // Inform the user if there was an error--}}
        {{--            var errorElement = document.getElementById('card-errors');--}}
        {{--            errorElement.textContent = result.error.message;--}}
        {{--        } else {--}}
        {{--            // Send the token to your server--}}
        {{--            stripeTokenHandler(result.token);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
</x-layout>
{{--@endsection--}}
