<?php
    //check name
    function validName($fname, $lname)
    {
        if(1 === preg_match('~[0-9]+~', $fname))
        {
            return false;
        }

        else if(1 === preg_match('~[0-9]+~', $lname))
        {
            return false;
        }

        return true;
    }

    //check age
    function validAge($age)
    {
        if(1 !== preg_match('~[0-9]+~', $age) OR !($age > 18))
        {
            return false;
        }

        return true;
    }

    //check phone number
    function validPhone()
    {

    }

    //check interests
    function validIndoor()
    {

    }

    function validOutdoor()
    {

    }





