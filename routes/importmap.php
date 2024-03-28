<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom('resources/js', to: 'js/');
Importmap::pin("@hotwired/turbo", to: "/js/vendor/@hotwired--turbo.js"); // @hotwired/turbo@8.0.4 downloaded from https://ga.jspm.io/npm:@hotwired/turbo@8.0.4/dist/turbo.es2017-esm.js
Importmap::pin("laravel-echo", to: "/js/vendor/laravel-echo.js"); // laravel-echo@1.16.0 downloaded from https://ga.jspm.io/npm:laravel-echo@1.16.0/dist/echo.js
Importmap::pin("pusher-js", to: "/js/vendor/pusher-js.js"); // pusher-js@8.4.0-rc2 downloaded from https://ga.jspm.io/npm:pusher-js@8.4.0-rc2/dist/web/pusher.js
Importmap::pin("@hotwired/stimulus", to: "/js/vendor/@hotwired--stimulus.js"); // @hotwired/stimulus@3.2.2 downloaded from https://ga.jspm.io/npm:@hotwired/stimulus@3.2.2/dist/stimulus.js
Importmap::pin("@hotwired/strada", to: "/js/vendor/@hotwired--strada.js"); // @hotwired/strada@1.0.0-beta1 downloaded from https://ga.jspm.io/npm:@hotwired/strada@1.0.0-beta1/dist/strada.js
Importmap::pin("@hotwired/stimulus-loading", to: "vendor/stimulus-laravel/stimulus-loading.js", preload: true);Importmap::pin("el-transition", to: "/js/vendor/el-transition.js"); // el-transition@0.0.7 downloaded from https://ga.jspm.io/npm:el-transition@0.0.7/index.js
Importmap::pin("sortablejs", to: "/js/vendor/sortablejs.js"); // sortablejs@1.15.2 downloaded from https://ga.jspm.io/npm:sortablejs@1.15.2/modular/sortable.esm.js
