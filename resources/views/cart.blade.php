@extends('layouts.app')

@section('content')

<div class="ui container masthead">

    <div class="ui breadcrumb">
        <a href="{{ route('home') }}" class="section">Home</a>
        <i class="right angle icon divider"></i>
        <a class="active section">Cart</a>
    </div>

</div>

<div class="ui divider"></div>

<div class="ui vertical segment product">
    <div class="ui grid container">

        <div class="twelve wide column">

            @include('partials.alert-message')

            @if(Cart::count())

                <h1 class="ui header">{{ Cart::count() }} item(s) in our shopping cart</h1>
                <p class="lead">You have some items in yout cart</p>

                <div class="ui hidden divider"></div>

                <div class="ui divided items">

                    @foreach (Cart::content() as $item)

                        @include('partials.cart-item')

                    @endforeach

                </div>

                @include('partials.coupon-section')
                
                <div class="ui divider"></div>
    
                <div class="ui grid">
                    <div class="two column row">
                        <div class="column">
                            Shipping is free because we our company is awesome. :)
                        </div>
                        <div class="column right aligned">
                            <table class="ui cart-amount">
                                <tbody>
                                    <tr>
                                        <td>Subtotal:</td>
                                        <td>{{ $subtotal }}</td>
                                    </tr>

                                    @if(session()->has('coupon'))
                                        <tr>
                                            <td>Discount ({{ $code }}):</td>
                                            <td>{{ $discount }}</td>
                                        </tr>

                                        <tr>
                                            <td>New Subtotal:</td>
                                            <td>{{ $newSubtotal }}</td>
                                        </tr>
                                    @endif
    
                                    <tr>
                                        <td>Tax ({{ $tax }}):</td>
                                        <td>{{ $newTax }}</td>
                                    </tr>

                                    <tr>
                                        <td><h4 class="ui header">Total:</h2></td>
                                        <td><h4 class="ui header">{{ $newTotal }}</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="ui divider"></div>
    
                <div>
                    <a href="{{ route('shop.index') }}" class="ui button">
                        <i class="shopping cart icon"></i> Continue Shopping
                    </a>
                    <a href="{{ route('checkout.index') }}" class="ui right floated primary button">
                        <i class="cc visa icon"></i> Procced to Checkout
                    </a>
                </div>

            @else

                <h1 class="ui header">No items in the cart!</h1>
                <p class="lead">Try exploring shop section and add ptoducts</p>

                <a class="ui button" href="{{ route('shop.index') }}">
                    <i class="shopping cart icon"></i>
                    Continue Shopping
                </a>

            @endif

            <div class="ui divider"></div>

            @if(Cart::instance('saveForLater')->count())

                <h1 class="ui header">
                    {{ Cart::instance('saveForLater')->count() }} item(s) saved for later
                </h1>
                <p class="lead">You have some items in yout cart</p>

                <div class="ui hidden divider"></div>

                <div class="ui divided items">

                    @foreach (Cart::instance('saveForLater')->content() as $item)

                        @include('partials.saved-for-later-item')

                    @endforeach

                </div>

            @else

                <h1 class="ui header">No items saved for later!</h1>
                <p class="lead">Try exploring shop section and add products</p>

            @endif

        </div>

    </div>
</div>

<div class="divider"></div>

@include('partials.might-like')


@endsection
