@if(session()->has('coupon'))

    <div class="ui small header">You have used the coupon below.</div>

    <div class="ui large blue label">
        {{ session('coupon')['name'] }}
        <i class="delete icon" onclick="document.getElementById('remove-coupon').submit()"></i>

        <form action="{{ route('coupon.destroy') }}" id="remove-coupon" method="POST" style="display: none">
            @csrf @method('DELETE')
        </form>
    </div>

@else

    <div class="ui small header">Do you have a coupon code?</div>

    <form class="ui form" action="{{ route('coupon.store') }}" method="POST">
        @csrf

        <div class="three fields">
            <div class="field">
                <input type="text" name="coupon" placeholder="Coupon Code" required>
            </div>
            <div class="field">
                <button class="ui button" type="submit">Apply Code</button>
            </div>
        </div>
    </form>

@endif
