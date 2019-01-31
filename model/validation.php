<?php
    //check name
    function validName($fname, $lname)
    {
        if(!(preg_match('/^[a-z]+$/i',$fname)) OR $fname == "") //if the name does not only contain letters
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
        if(preg_match('/^[a-z]+$/i',$phone) OR $phone == "") //if the phone contains letters
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

    }

    function validOutdoor()
    {

    }





