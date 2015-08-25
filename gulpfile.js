var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.copy('resources/components/font-awesome/fonts', 'public/fonts');
});
