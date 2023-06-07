<?php

require 'Routing.php';
# index.php jest pierwszym plikiem uruchamianym na serwerze

# $_SERVER['REQUEST_URI'] contains the URI of the current page.
# So if the full path of a page is https://www.w3resource.com/html/html-tutorials.php, 
# $_SERVER['REQUEST_URI'] would contain /html/html-tutorials.php.
$path = trim($_SERVER['REQUEST_URI'], '/'); # delete first "/" from string
$path = parse_url($path, PHP_URL_PATH); # return string (because of component ("PHP_URL_PATH"))

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('reviews', 'DefaultController');
Routing::get('community', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('add_review', 'ReviewController');

Routing::run($path);
