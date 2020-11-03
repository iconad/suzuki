<div class="w-full mx-auto">

    @foreach (['red', 'orange', 'green', 'blue'] as $msg)
        @if(Session::has($msg))
        <div class="mb-5">
            <div class="ui {{$msg}} message"><span>{{ Session::get($msg) }}</span></div>
        </div>
        @endif
    @endforeach

    @if ($errors->any())
    <div class="mb-5">
        <div class="ui red message">
            @foreach ($errors->all() as $error)
            <div class="container flex items-center justify-between mb-1 mx-auto">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-2 fill-current"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                <span>{{$error}}</span>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
