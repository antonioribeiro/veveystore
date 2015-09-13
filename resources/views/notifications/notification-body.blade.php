<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="jumbotron">
        @if ($title)
            <h1>{!! $title !!}</h1>
        @endif

        <p>{!! $message !!}</p>

        <p>
            @if ($buttons)
                @foreach($buttons as $button)
                    <a href="{!! $button['url'] !!}" class="btn btn-danger btn-lg">{{ $button['caption'] }}</a>
                @endforeach
            @endif
        </p>
    </div>
</div>
