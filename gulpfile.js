var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ]);
    mix.scripts([
        './bower_components/jquery/dist/jquery.min.js',
        'app.js'
    ]);
});
