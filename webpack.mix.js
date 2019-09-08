const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js/combine.js");
mix.browserSync("localhost:8000");
