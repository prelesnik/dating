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

//arrays for interests
$f3->set('indoor', array('tv', 'movies', 'cooking', 'board games',
            'puzzles', 'reading', 'playing cards', 'video games'));
$f3->set('outdoor', array('hiking', 'biking', 'swimming', 'collecting',
                        'walking'), 'climbing');



//define a default route
$f3->route('GET|POST /', function() {
    $template = new Template;
    echo $template->render('views/home.html');
});

//define a personal info view
$f3->route('GET|POST /personalInfo', function() {
    $template = new Template();
    echo $template->render('views/personalInfo.html');
});

//define a profile view
$f3->route('GET|POST /profile', function() {
    $template = new Template();
    echo $template->render('views/profile.html');
});

//define an interests view
$f3->route('GET|POST /interests', function() {
    $template = new Template();
    echo $template->render('views/interests.html');
});









//run fat-free
$f3->run();