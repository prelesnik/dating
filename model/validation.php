<?php
    //check name
    function validName($fname, $lname)
    {
//        if(!(preg_match('/^[a-z]+$/i',$fname)) OR $fname == "") //if the name does not only contain letters
//        {
//            return false;
//        }

        if(!ctype_alpha($fname) OR $fname == "") //if the name does not only contain letters
        {
            return false;
        }

        else if(!(preg_match('/^[a-z]+$/i',$lname)) OR $lname == "") //if the name does not only contain letters
        {
            return false;
        }

        return true;
    }

    //check age
    function validAge($age)
    {
        if(preg_match('/^[a-z]+$/i',$age) OR !($age > 18) OR $age == "") //if the age contains letters or is under 18
        {
            return false;
        }

        return true;
    }

    //check phone number
    function validPhone($phone)
    {
        if(preg_match('/^[a-z]+$/i',$phone) OR $phone == "" OR strlen((string)$phone) != 10) //if the phone contains letters
        {
            return false;
        }

        return true;
    }

    //check phone number
    function validEmail($email)
    {
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) //if email is not valid
        {
            return false;
        }

        return true;
    }

    //check interests
    function validIndoor()
    {
        $validIndoorInterests = array('tv', 'movies', 'cooking', 'board games',
                    'puzzles', 'reading', 'playing cards', 'video games');

        //if no interests are checked, still allow (since it is optional)
        if (!isset($_POST['indoor']))
        {
            return true;
        }

        //check that the client did not spoof the data
        foreach ($_POST['indoor'] as $interest)
        {
            if (!(in_array($interest, $validIndoorInterests)))
            {
                return false;
            }
        }
        return true;
    }

    function validOutdoor()
    {
        $validOutdoorInterests = array('hiking', 'biking', 'swimming', 'collecting',
                                        'walking', 'climbing');

        //if no interests are checked, still allow (since it is optional)
        if (!isset($_POST['outdoor']))
        {
            return true;
        }

        //check that the client did not spoof the data
        foreach ($_POST['outdoor'] as $interest)
        {
            if (!(in_array($interest, $validOutdoorInterests)))
            {
                return false;
            }
        }
        return true;
    }





