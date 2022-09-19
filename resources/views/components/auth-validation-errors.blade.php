
@if ($errors->any())
    <div class="mt-2 mb-2">
        <div class="text text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($errors->all() as $error)
                <li class="pl-2 list-group-item text-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
