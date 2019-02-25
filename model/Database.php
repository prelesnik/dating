<?php
/**
 *
CREATE TABLE members (
member_id INT AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
age INT,
gender VARCHAR(10),
phone VARCHAR(30),
email VARCHAR(50),
state VARCHAR(30),
seeking VARCHAR(10),
bio VARCHAR(500),
premium TINYINT,
image VARCHAR(100),
interests VARCHAR(500))
 */

class Database
{
    function connect()
    {

    }

    function insertMember()
    {

    }

    function getMembers()
    {

    }

    function getMember($id)
    {

    }
}
