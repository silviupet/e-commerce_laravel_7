<!-- Following Menu -->
<div class="ui top fixed large menu">
    <div class="ui container">
        <a class="active item" href="{{ route('home') }}">Laravel Ecommerce</a>
        <a class="item" href="{{ route('shop.index') }}">Shop</a>
        <a class="item">About</a>
        <a class="item">Blog</a>

        <div class="right menu">
            <div class="item">
                <div class="ui transparent icon input">
                  <i class="search icon"></i>
                  <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="item">
                <a class="ui button" href="{{ route('cart.index') }}">
                    <i class="shopping cart icon"></i> Cart

                    @if(Cart::instance('default')->count())
                        <div class="floating ui red circular label">
                            {{ Cart::instance('default')->count() }}
                        </div>
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item">Home</a>
    <a class="item">Work</a>
    <a class="item">Company</a>
    <a class="item">Careers</a>
    <a class="item">Login</a>
    <a class="item">Signup</a>
</div>
