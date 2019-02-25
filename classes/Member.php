<?php

/**
 * Class Member creates a Member Object for the dating website
 * @author Mike Prelesnik
 * @version 1.0
 */
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
    private $_bio;

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
     * Gets the first name
     * @return String fname the first name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets the first name
     * @param String $fname the first name
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * Gets the last name
     * @return String lname the last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets the last name
     * @param String $lname the last name
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * Gets the age
     * @return int age the age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * Sets the age
     * @param int $age the age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * Gets the gender
     * @return String gender the gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * Sets the gender
     * @param String $gender the gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * Gets the phone number
     * @return String $phone the phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets the phone number
     * @param String $phone the phone number
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * Gets the email
     * @return String $email the email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Sets the email
     * @param String $email the email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Gets the state
     * @return String $state the state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Sets the state
     * @param String $state the state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * Gets the gender seeking
     * @return String $seeking the gender the user seeks
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * Sets the gender seeking
     * @param String $seeking the gender the user seeks
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * Gets the bio
     * @return String $bio the biography
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * Sets the bio
     * @param String $bio the biography
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}