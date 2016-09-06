<form class="form-horizontal" method="POST" action="/poll/vote">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! csrf_field() !!}

    @if($poll->multiple_choice)
        @foreach ($poll->options as $option)
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="option[]" value="{{ $option->id }}">
                            {{ $option->name }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @foreach ($poll->options as $option)
            <div class="form-group">
                <div class="col-md-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="option[]" value="{{ $option->id }}" required>
                            {{ $option->name }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {!! app('captcha')->display(); !!}

    <br>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Vote</button>
        </div>
    </div>

</form>
