<?php

require __DIR__.'/includes/app.php';

use \App\Http\Router;

$obRouter = new Router(URL);

include __DIR__.'/routes/admin/users.php';
include __DIR__.'/routes/home.php';
include __DIR__.'/routes/login.php';

$obRouter->run()
         ->sendResponse();