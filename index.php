<?php
//Mike Prelesnik
//1/11/19
//Dating Website
//the fat-free setup for the dating website

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

//create an instance of the base class
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function() {
    //echo "<h1>My Dating Website</h1>";
    $view = new View;
    echo $view->render('views/home.html');
});







//define a personal info view
$f3->route('GET|POST /personalInfo', function() {
    $view = new View();
    echo $view->render('views/personalInfo.html');
});

//define a profile view
$f3->route('GET|POST /profile', function() {
    $view = new View();
    echo $view->render('views/profile.html');
});

//define an interests view
$f3->route('GET|POST /interests', function() {
    $view = new View();
    echo $view->render('views/interests.html');
});









//run fat-free
$f3->run();