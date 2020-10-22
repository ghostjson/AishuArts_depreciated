@extends('layouts.ecommerce')
@section('contents')
            <!-- SHOP CHECKOUT COMPLETED -->
            <section id="shop-checkout-completed">
                <div class="container">
                    <div class="p-t-10 m-b-20 text-center">
                        <div class="text-center">
                            <h3>Congratulations! Your order is completed!</h3>
                            <p>Your order is number #{{$order->id}}. You can
                                <a href="" class="text-underline">
                                    {{-- <mark>view your order</mark> --}}
                                </a> An email has been sent to you with order details. Also you will get periodic shipment sms onto your mobile.</p>
                        </div>
                        <a class="btn icon-left" href="/"><span>Return To Shop</span></a>
                    </div>
                </div>
            </section>
            <!-- end: SHOP CHECKOUT COMPLETED -->
@endsection