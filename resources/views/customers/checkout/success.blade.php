@extends('customers.layout.app')

@section('title', 'Payment Success')

@section('content')
<div class="container mx-auto px-4 py-8 text-center">
    <h1 class="text-4xl font-bold mb-4">Payment Successful!</h1>
    <p class="text-lg">Thank you for your purchase. Your order has been placed successfully.</p>
    <a href="" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded">Back to Cart</a>
</div>
@endsection
