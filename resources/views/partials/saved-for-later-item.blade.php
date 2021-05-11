<div class="item">
    <div class="image">
        <img src="/images/laptop.jpg">
    </div>
    <div class="content">
        <a class="header" href="{{ $item->model->path() }}">
            {{ $item->name }} - {{ $item->model->present_price }}
        </a>

        <div class="meta">
            <span class="cinema">{{ $item->model->details }}</span>
        </div>

        <div class="extra">
            <button class="ui red tiny button remove-save-for-later" data-remove-save-for-later="{{ $item->rowId }}">
                <i class="trash icon"></i> Remove
            </button>

            <form action="{{ route('saveforlater.destroy', $item->rowId) }}" style="display: none" method="POST" 
                id="remove-save-for-later-{{ $item->rowId }}" class="ui left floated">
                @csrf @method('delete')
            </form>

            <div class="ui right floated">
                <button class="ui tiny button move-to-cart" data-move-to-cart="{{ $item->rowId }}">
                    <i class="shopping cart icon"></i> Move to Cart
                </button>
    
                <form action="{{ route('saveforlater.movetocart', $item->rowId) }}" style="display: none" method="POST" 
                    id="move-to-cart-{{ $item->rowId }}" class="ui left floated">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>