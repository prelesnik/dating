<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;

    //constructor
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }


    //getters and setters

    /**
     * @return String fname the first name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param String $fname the first name
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return String lname the last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param String $lname the last name
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return int age the age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param int $age the age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return String gender the gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param String $gender the gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return String $phone the phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param String $phone the phone number
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return String $email the email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param String $email the email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return String $state the state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param String $state the state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return String $seeking the gender the user seeks
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param String $seeking the gender the user seeks
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return String $bio the biography
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param String $bio the biography
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
    private $_bio;
}