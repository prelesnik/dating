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

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

/**
 * Class Database connects to the database and inserts and views members
 */
class Database
{
    /**
     * This method connects to the database
     */
    function connect()
    {
        require_once '/home/mprelesn/config.php';

        //connect to the db
        try {
            //instantiate a db Object
            $GLOBALS['dbh'] = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected to db!";
        } catch (PDOException $e) {
            //echo "not connected";
            echo $e->getMessage();
        }
    }

    /**
     * This method inserts a member
     * @return bool returns true if the insertion was successful and false if not
     */
    function insertMember()
    {
        global $dbh;

        //1. define the query
        $sql = "INSERT INTO members (fname, lname, age, gender, phone, email,
                        state, seeking, bio, premium, image, interests)
                VALUES (:fname, :lname, :age, :gender, :phone, :email,
                        :state, :seeking, :bio, :premium, :image, :interests)";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //3. bind parameters
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $age = $_SESSION['age'];
        $gender = $_SESSION['gender'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $state = $_SESSION['state'];
        $seeking = $_SESSION['seeking'];
        $bio = $_SESSION['bio'];

        if ($_SESSION['premium'] == 1)
        {
            $image = "images/noProfilePic.jpg";
            $premium = 1;
            $indoor = $_SESSION['indoor'];
            $outdoor = $_SESSION['outdoor'];
            $interests = $indoor . " " . $outdoor;
        }
        else
        {
            $image = null;
            $premium = 0;
            $interests = null;
        }

        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_STR);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_STR);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);

        //4. execute the statement
        $success = $statement->execute();

        //5. return the result
        return $success;
    }

    /**
     * This method views a specific member in the table
     * @param $member_id the id of the member
     * @return the row of the associated member
     */
    function getMember($member_id)
    {
        global $dbh;

        //1. define the query
        $sql = "SELECT * FROM members where member_id = :member_id";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //bind params
        $statement->bindParam(':member_id', $member_id, PDO::PARAM_STR);

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * This method returns all of the members in the table
     * @return array of members
     */
    function getMembers()
    {
        global $dbh;

        //1. define the query
        $sql = "SELECT * FROM members ORDER BY lname;";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //3. execute the statement
        $statement->execute();

        //4. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }
}
