<?php
//Mike Prelesnik
//1/11/19
//Dating Website
//the fat-free setup for the dating website

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";
//require validation
require_once('model/validation.php');

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
$f3->route('GET|POST /personalInfo', function($f3) {

    $_SESSION = array();

    //if the information is entered
    if(!empty($_POST))
    {
        //assign gender
        $_SESSION['gender'] = $_POST['gender'];

        //if name is valid
        if(validName($_POST['fname'], $_POST['lname']))
        {
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
        }

        //if the info is not submitted correctly
        else
        {
            $f3->set("errors['fname']", "Name is not entered correctly. Please try again.");
        }

        //if age is valid
        if(validAge($_POST['age']))
        {
            $_SESSION['age'] = $_POST['age'];
        }

        //if the info is not submitted correctly
        else
        {
            $f3->set("errors['age']", "Name is not entered correctly. Please try again.");
        }

        //if phone is valid
        if(validAge($_POST['phone']))
        {
            $_SESSION['phone'] = $_POST['phone'];
        }

        //if the info is not submitted correctly
        else
        {
            $f3->set("errors['phone']", "Name is not entered correctly. Please try again.");
        }

        //reroute
        $f3 -> reroute('/profile');
    }

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

//define a summary view
$f3->route('GET|POST /summary', function() {
    $template = new Template();
    echo $template->render('views/summary.html');
});









//run fat-free
$f3->run();