@extends('layouts.app')

@section('header')

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

<div class="ui container masthead">

    <div class="ui breadcrumb">
        <a href="{{ route('home') }}" class="section">Home</a>
        <i class="right angle icon divider"></i>
        <a class="active section">Checkout</a>
    </div>

</div>

<div class="ui divider"></div>

<div class="main ui container">

    <h1 class="ui header">Okay, Lets Checkout!</h1>

</div>


<div class="ui vertical segment product">

    <div class="ui container">

        @include('partials.alert-message')

        <div class="ui grid">

            <div class="eight wide column">

                <h3 class="ui header">Billing Details</h3>

                <form class="ui form" id="payment-form">
                    <div class="field">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Name">
                    </div>

                    <div class="field">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Enter Address">
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>City</label>
                                <input type="text" name="city" placeholder="Enter City">
                            </div>
                            <div class="field">
                                <label>Province</label>
                                <input type="text" name="province" placeholder="Enter Province">
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" placeholder="Enter Postal Code">
                            </div>
                            <div class="field">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>

                    <h3 class="ui header">Payment details</h3>

                    <div class="field">
                        <label>Name on Card</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <label for="card-element">Credit or debit card</label>

                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        
                    </div>

                    {{-- <div class="field">
                        <label>Billing Address</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <label>Credit Card Number</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>

                    <div class="field">
                        <div class="two fields">
                            <div class="field">
                                <label>Expiry</label>
                                <input type="text" name="city" placeholder="Enter City">
                            </div>
                            <div class="field">
                                <label>CVC Code</label>
                                <input type="text" name="province" placeholder="Enter Province">
                            </div>
                        </div>
                    </div> --}}

                    <div class="inline field">
                        <div class="ui toggle checkbox">
                          <input type="checkbox" tabindex="0" class="hidden">
                          <label>I approve the terms and condition before payment.</label>
                        </div>
                    </div>

                    <button class="ui fluid button" type="submit">Complete Order</button>
                </form>

            </div>

            <div class="seven wide column right floated">

                @if(Cart::count())

                    <h3 class="ui header">Your Orders</h3>

                    <div class="ui hidden divider"></div>

                    <div class="ui divided items">

                        @foreach (Cart::content() as $item)

                            @include('partials.order-item')

                        @endforeach

                    </div>

                @endif

                <div class="ui divider"></div>

                <div class="ui grid">
                    <div class="row two columns">
                        <div class="column">
                            <div class="ui list">
                                <div class="item">Subtotal</div>

                                @if(session()->has('coupon'))
                                    <div class="item">Discount ({{ $code }})</div>

                                    <div class="item">New Subtotal </div>
                                @endif

                                <div class="item">Tax</div>

                                <div class="item">
                                    <div class="header">Total</div>
                                </div>
                            </div>
    
                        </div>
                        
                        <div class="column right aligned">
                            <div class="ui list">
                                <div class="item">{{ $subtotal }}</div>

                                @if(session()->has('coupon'))
                                    <div class="item">{{ $discount }}</div>

                                    <div class="item">{{ $newSubtotal}}</div>
                                @endif

                                <div class="item">{{ $newTax }}</div>

                                <div class="item">
                                    <div class="header">{{ $newTotal }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
                <div class="ui divider"></div>

                @include('partials.coupon-section')

            </div>

        </div>

    </div>
</div>

@endsection

@section('footer')

    <script src="/js/stripe-checkout.js"></script>

@endsection
