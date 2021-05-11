<div class="card">
    <a href="{{ $product->path() }}" class="image">
        <img src="/images/laptop.jpg">
    </a>
    <div class="content">
        <a href="{{ $product->path() }}" class="header">{{ $product->name }}</a>
        <div class="meta">
            <span class="date">Coworker</span>
        </div>
        <div class="description">
            Molly is a personal assistant living in Paris.
        </div>
    </div>
    <div class="extra content">
        <span class="right floated">
            Price {{ $product->present_price }}
        </span>
        <span>
            <i class="user icon"></i>
            35 Friends
        </span>
    </div>
</div>
