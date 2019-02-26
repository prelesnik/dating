<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfect Match - Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript and Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a href="/328/dating">My Dating Website</a>
            <a href="/328/dating/admin">Admin</a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
        </nav>
    </div>
    <br>
    <h1>Perfect Match Members</h1>
    <table id="memberTable">
        <!-- fill with values from db -->
        <tbody>

        <?php
        //Define the query
        $sql = "SELECT * FROM members;";
        //execute the query
        $result = @mysqli_query($cnxn, $sql);
        echo print_r(@mysqli_fetch_assoc($result));
        //process the results
        while ($row = @mysqli_fetch_assoc($result)) {

            $id = $row['member_id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $age = $row['age'];
            $gender = $row['gender'];
            $phone = $row['phone'];
            $email = $row['email'];
            $state = $row['state'];
            $seeking = $row['seeking'];
            $bio = $row['bio'];
            $premium = $row['premium'];
            $image = $row['image'];
            $interests = $row['interests'];


            echo "<tr><td>$id</td><td>$fname</td><td>$lname</td><td>$age</td>
                <td>$gender</td><td>$phone</td><td>$email</td><td>$state</td><td>$seeking</td>
                <td>$bio</td><td>$premium</td><td>$image</td><td>$interests</td></tr>";
        }
        ?>

        </tbody>
    </table>
</body>
</html>