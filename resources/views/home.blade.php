@extends('layouts.app')

@section('content')
    <div class="pusher">
        <div class="ui inverted vertical stripe segment">
            <div class="ui middle aligned stackable grid container">
                <div class="row">
                    <div class="eight wide column">
                        <h3 class="ui inverted header">We Help Companies and Companions</h3>
                        <p>We can give your company superpowers to do things that they never thought possible. Let us
                            delight your customers and empower your needs...through pure data analytics.</p>
                        <h3 class="ui inverted header">We Make Bananas That Can Dance</h3>
                        <p>Yes that's right, you thought it was the stuff of dreams, but even bananas can be bioengineered.
                        </p>
                    </div>
                    <div class="six wide right floated column">
                        <img src="/images/laptop.jpg" class="ui large bordered rounded image">
                    </div>
                </div>
                <div class="row">
                    <div class="center aligned column">
                        <a class="ui huge button">Check Them Out</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui vertical stripe segment none">

            <h2 class="ui horizontal header divider">
                <a href="#">Featured / On Sale</a>
            </h2>
           
            <div class="ui container three doubling stackable link cards">

                @foreach ($products as $product)

                    @include('partials.product')

                @endforeach

            </div>

            <div class="ui center aligned header">
                <a class="ui huge button" href="{{ route('shop.index') }} ">View more products</a>
            </div>
        </div>
    </div>
@endsection
