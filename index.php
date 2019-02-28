<?php
//Mike Prelesnik
//1/11/19
//Dating Website
//the fat-free setup for the dating website

//turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "vendor/autoload.php";

session_start();

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

$f3->set('states', array('AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas',
                        'CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware',
                        'DC'=>'District of Columbia','FL'=>'Florida','GA'=>'Georgia',
                        'HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana',
                        'IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana',
                        'ME'=>'Maine','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan',
                        'MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri',
                        'MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada',
                        'NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico',
                        'NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota',
                        'OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon',
                        'PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina',
                        'SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas',
                        'UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington',
                        'WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming'));


//define a default route
$f3->route('GET|POST /', function() {
    $template = new Template;
    echo $template->render('views/home.html');
});

//define a personal info view
$f3->route('GET|POST /personalInfo', function($f3) {

    //create an empty session array to hold values
    $_SESSION = array();

    //if the information is entered
    if(!empty($_POST))
    {
        $isValid = true;

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
            $isValid = false;
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
            $isValid = false;
            $f3->set("errors['age']", "Age must be greater than 18. Please try again.");
        }

        //if phone is valid
        if(validAge($_POST['phone']))
        {
            $_SESSION['phone'] = $_POST['phone'];
        }

        //if the info is not submitted correctly
        else
        {
            $isValid = false;
            $f3->set("errors['phone']", "Phone number is not entered correctly. Please try again.");
        }

        if ($isValid)
        {
            if (isset($_POST['premium']))
            {
                $_SESSION['premium'] = 1;

                $newPremiumMember = new PremiumMember($_SESSION['fname'], $_SESSION['lname'],
                            $_SESSION['age'], $_SESSION['gender'], $_SESSION['phone']);

                $_SESSION['newPremiumMember'] = $newPremiumMember;
            }

            else
            {
                //do not assign the session for premium membership
                $newMember = new Member($_SESSION['fname'], $_SESSION['lname'],
                    $_SESSION['age'], $_SESSION['gender'], $_SESSION['phone']);

                $_SESSION['newMember'] = $newMember;
            }

            //reroute
            $f3 -> reroute('/profile');
        }
    }

    $template = new Template();
    echo $template->render('views/personalInfo.html');
});

//define a profile view
$f3->route('GET|POST /profile', function($f3) {
    if(!empty($_POST))
    {
        $isValid = true;

        //assign un-validated values
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['state'] = $_POST['state'];

        //if email is valid
        if(validEmail($_POST['email']))
        {
            $_SESSION['email'] = $_POST['email'];
        }

        //if the info is not submitted correctly
        else
        {
            $isValid = false;
            $f3->set("errors['email']", "Email is not entered correctly. Please try again.");
        }

        if ($isValid)
        {
            if ($_SESSION['premium'] == 1)
            {


                //set new data to the object
                $_SESSION['newPremiumMember']->setEmail($_SESSION['email']);
                $_SESSION['newPremiumMember']->setState($_SESSION['state']);
                $_SESSION['newPremiumMember']->setSeeking($_SESSION['seeking']);
                $_SESSION['newPremiumMember']->setBio($_SESSION['bio']);

                //reroute
                $f3 -> reroute('/interests');
            }

            else
            {
                //set new data to the object
                $_SESSION['newMember']->setEmail($_SESSION['email']);
                $_SESSION['newMember']->setState($_SESSION['state']);
                $_SESSION['newMember']->setSeeking($_SESSION['seeking']);
                $_SESSION['newMember']->setBio($_SESSION['bio']);

                //reroute
                $f3 -> reroute('/summary');
            }

        }
    }

    $template = new Template();
    echo $template->render('views/profile.html');
});

//define an interests view
$f3->route('GET|POST /interests', function($f3) {
    if(isset($_POST['submitButton']))
    {
        $isValid = true;

        //if checkboxes are valid
        if (isset($_POST['indoor']) AND !validIndoor())
        {
            $isValid = false;
            $f3->set("errors['indoor']", "Interests are not valid. Please try again.");
        }

        if (isset($_POST['outdoor']) AND !validOutdoor())
        {
            $isValid = false;
            $f3->set("errors['indoor']", "Interests are not valid. Please try again.");
        }

        if ($isValid)
        {
            if (isset($_POST['indoor']))
            {
                $_SESSION['indoor'] = implode(" ", $_POST['indoor']);
                $_SESSION['newPremiumMember']->setInDoorInterests($_SESSION['indoor']);
            }

            if (isset($_POST['outdoor']))
            {
                $_SESSION['outdoor'] = implode(" ", $_POST['outdoor']);
                $_SESSION['newPremiumMember']->setOutDoorInterests($_SESSION['outdoor']);
            }

            //reroute
            $f3 -> reroute('/summary');
        }
    }


    $template = new Template();
    echo $template->render('views/interests.html');
});

//define a summary view
$f3->route('GET|POST /summary', function() {

    //connect to db
    $db = new Database();
    $db->connect();

    //insert new member
    $db->insertMember();

    $template = new Template();
    echo $template->render('views/summary.html');
});

//define an admin view
$f3->route('GET|POST /admin', function($f3) {
    //connect to db
    $db = new Database();
    $db->connect();
    $result = $db->getMembers();
    $f3->set('result', $result);

    $template = new Template();
    echo $template->render('views/admin.html');
});



//run fat-free
$f3->run();