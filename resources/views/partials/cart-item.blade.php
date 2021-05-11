<div class="item cart">
    <div class="image">
        <img src="/images/laptop.jpg">
    </div>

    <div class="content">
        <a class="header" href="{{ $item->model->path() }}">
            {{ $item->name }} 
            <div class="ui green label">
                {{ $item->model->present_price }}
            </div>
        </a>
        

        <div class="meta">
            <span class="cinema">{{ $item->model->details }}</span>
        </div>

        <div class="extra">
            <button class="ui red tiny button remove-cart" data-remove-cart="{{ $item->rowId }}">
                <i class="trash icon"></i> Remove
            </button>

            <button class="ui tiny button save-for-later" data-save-for-later="{{ $item->rowId }}">
                <i class="heart icon"></i> Save for Later
            </button>

            <form action="{{ route('cart.destroy', $item->rowId) }}" style="display: none" method="POST" 
                id="remove-cart-{{ $item->rowId }}" class="ui left floated">
                @csrf @method('delete')
            </form>

            <form action="{{ route('saveforlater.store', $item->rowId) }}" style="display: none" method="POST" 
                id="save-for-later-{{ $item->rowId }}" class="ui left floated">
                @csrf
            </form>

            <div class="ui right floated">
                <label for="quantity">quantity:</label>
                <select name="quantity" id="quantity" class="quantity" data-id="{{ $item->rowId }}">
                    @foreach (range(1, 5) as $index)
                        <option value="{{ $index }}" @if($item->qty == $index) selected @endif>{{ $index }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>