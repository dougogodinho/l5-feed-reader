<!DOCTYPE html>
<html>
    <head>

        <title>Laravel 5.1 Feed Reader</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="container">

            <div class="next"></div>
            <div class="prev"></div>

            <div class="main-title">Laravel 5.1 Feed Reader</div>

            @foreach($feeds as $i => $feed)

                <a class="feed" style="{{ $i ? 'display:none;':'' }}" href="{{ $feed->link }}" target="_blank">
                    <div class="title">{{ $feed->title }}</div>
                    <div class="date">{{ $feed->pubDate->format('d/m/Y H:i') }}</div>
                    <div class="category">{{ $feed->category }}</div>
                    <div class="description">{!! $feed->description !!}</div>
                </a>

            @endforeach

        </div>

    </body>

    <script src="{{ asset('js/all.js') }}"></script>
</html>
