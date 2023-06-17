<?php

require 'Routing.php';
# index.php jest pierwszym plikiem uruchamianym na serwerze
setcookie("Wazowski_cookie", "cookie_value", time()+3600*24*30, "/"); #https://www.guru99.com/cookies-and-sessions.html

# $_SERVER['REQUEST_URI'] contains the URI of the current page.
# So if the full path of a page is https://www.w3resource.com/html/html-tutorials.php, 
# $_SERVER['REQUEST_URI'] would contain /html/html-tutorials.php.
$path = trim($_SERVER['REQUEST_URI'], '/'); # delete first "/" from string
$path = parse_url($path, PHP_URL_PATH); # return string (because of component ("PHP_URL_PATH"))

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('reviews', 'ReviewController');
Routing::get('community', 'SecurityController');

Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('search_people', 'SecurityController');
Routing::post('add_review', 'ReviewController');
Routing::post('search_review', 'ReviewController');

Routing::run($path);
