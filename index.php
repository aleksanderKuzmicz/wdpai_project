<?php

require 'Routing.php';

# $_SERVER['REQUEST_URI'] contains the URI of the current page.
# So if the full path of a page is https://www.w3resource.com/html/html-tutorials.php, 
# $_SERVER['REQUEST_URI'] would contain /html/html-tutorials.php.
$path = trim($_SERVER['REQUEST_URI'], '/'); # delete "/" from string
$path = parse_url($path, PHP_URL_PATH); # return string (because of component ("PHP_URL_PATH"))

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('reviews', 'DefaultController');
Routing::get('community', 'DefaultController');
Routing::post('login', 'SecurityController');

Routing::run($path);
