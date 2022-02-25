<!-- 
// include("form-configration.php");
// extract($_POST);
// // inserting data from php to database
// $sql = "INSERT INTO `contactdata`(`firstname`, `lastname`, `phone`, `email`, `business`) VALUES ('".$firstname."','".$lastname."',".$phone.",'".$email."','".$business."')";
// $result = $mysqli->query($sql);
// //if enter wrong would get an error
// if(!$result){
//     die("Couldn't enter data: ".$mysqli->error);
// }
// echo "Thank You For Contacting Us ";
// $mysqli->close();
-->

<?php

//It is used to start the session
session_start();

include("function.php");

$index_user = new users();

$index_user->check_login();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h2>Index Page</h2>

    <a href="Logout.php">Log Out</a>

    <br>
</body>
</html>