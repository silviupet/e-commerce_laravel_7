@extends('layouts.app')

@section('content')

<div class="ui container masthead">

    <div class="ui breadcrumb">
        <a href="{{ route('home') }}" class="section">Home</a>
        <i class="right angle icon divider"></i>
        <a class="section">Shop</a>
        <i class="right angle icon divider"></i>
        <a class="active section">{{ $categoryName }}</a>
    </div>

</div>

<div class="ui divider"></div>

<div class="main ui container">
    <div class="ui grid">
        <div class="three wide column">
            <h4 class="ui header">By Categories</h4>
            <div class="ui list">
                @foreach ($categories as $category)
                <a class="item" href="{{ route('shop.index', ['category' => $category->slug]) }}">
                    <div class="@if(request()->category == $category->slug) header @endif">{{ $category->name }}</div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="thirteen wide column">

            <div class="ui menu">
                <div class="ui dropdown item">
                    Sort By Price
                    <div class="menu">
                        <a class="item" href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">
                            Low to High
                        </a>
                        <a class="item" href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">
                            High to Low
                        </a>
                    </div>
                </div>

                <div class="right menu">
                    <div class="item">
                        <div class="ui transparent icon input">
                            <input type="text" placeholder="Search within category...">
                            <i class="search link icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            @if($products->isNotEmpty())

            <div class="ui three doubling stackable link cards">

                @foreach ($products as $product)

                @include('partials.product')

                @endforeach

            </div>

            @else

            <h2 class="ui icon center aligned header">
                <i class="info circle icon"></i>
                <div class="content">
                    Sorry! No Products Found..
                    <div class="sub header">Try search on different categories.</div>
                </div>
            </h2>

            @endif

            <div class="ui divider"></div>

            {{ $products->appends(request()->input())->links() }}

        </div>

    </div>
</div>


@endsection
