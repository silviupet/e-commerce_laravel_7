<div class="item">
    <div class="image">
        <img src="/images/laptop.jpg">
    </div>
    <div class="content">
        <a class="header" href="{{ $item->model->path() }}">
            {{ $item->name }}
        </a>

        <div class="description">
            <p>{{ $item->model->details }}</p>
        </div>

        <div class="meta">
            <span class="cinema red">{{ $item->model->present_price }}</span>
        </div>
    </div>

    <div class="quantity">
        <span>{{ $item->qty }}</span>    
    </div>

</div>