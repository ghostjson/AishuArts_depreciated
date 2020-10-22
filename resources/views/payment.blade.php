@extends('layouts.ecommerce')
@section('contents')
            <!-- SHOP CHECKOUT -->
            <section id="shop-checkout">
                <div class="container">
                    <div class="shop-cart">
                        <div class="seperator"><i class="fa fa-credit-card"></i>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="upper">Your Order</h4>
                                <div class="table table-sm table-striped table-responsive table table-bordered table-responsive">
                                    <table class="table m-b-0">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-thumbnail">Product</th>
                                                <th class="cart-product-name">Description</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart->items as $item)
                                            <tr>
                                                <td class="cart-product-thumbnail">
                                                <div class="cart-product-thumbnail-name">{{$item['data']['name']}}</div>
                                                </td>
                                                <td class="cart-product-description">
                                                    <p><span>{{$item['data']['description']}}</span>
                                                    </p>
                                                </td>
                                                <td class="cart-product-subtotal">
                                                    <span class="amount">₹{{$item['price']*$item['quantity']}}</span>
                                                </td>
                                            </tr> 
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <h4>Order Total</h4>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Order Subtotal</strong>
                                                        </td>
                                                        <td class="cart-product-name text-right">
                                                            <span class="amount">₹{{$cart->totalPrice}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Shipping</strong>
                                                        </td>
                                                        <td class="cart-product-name  text-right">
                                                            <span class="amount">Free Shipping</span>
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Coupon</strong>
                                                        </td>
                                                        <td class="cart-product-name  text-right">
                                                            <span class="amount">-20%</span>
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="cart-product-name">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td class="cart-product-name text-right">
                                                        <span class="amount color lead"><strong>₹{{$cart->totalPrice}}</strong></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="upper">Payment Method</h4>
                                        <div class="list-group">
                                            {{-- <input type="radio" name="RadioInputName" value="Value1" id="Radio1" />
                                            <label class="list-group-item" for="Radio1">Direct Bank Transfer</label>
                                            <input type="radio" name="RadioInputName" value="Value2" id="Radio2" />
                                            <label class="list-group-item" for="Radio2">Cheque Payment</label> --}}
                                            {{-- <input type="radio"  name="RadioInputName" value="Value3" id="Radio3" /> --}}
                                            <label class="list-group-item" for="Radio3">Powered by <img width="90" alt="paypal" src="{{asset('images/shop/upi.png')}}"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                    <a class="btn icon-left float-right mt-3" href="/complete/{{$order->id}}"><span>Pay</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: SHOP CHECKOUT -->
@endsection