@if(session()->has('success'))
    <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
            {{ session('success') }}
        </div>
        <p>{{ session('info') }}</p>
    </div>
@endif

@if(session()->has('warning'))
    <div class="ui warning message">
        <i class="close icon"></i>
        <div class="header">
            {{ session('warning') }}
        </div>
        <p>{{ session('info') }}</p>
    </div>
@endif

@if(count($errors) > 0)
    <div class="ui error message">
        <i class="close icon"></i>
        <div class="header">
            There were some errors with your submission.
        </div>
        <ul class="list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
