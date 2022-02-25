<?php

session_start();

include ("function.php");

$loginUser = new users();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $loginUser->checkUser();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Log-in</title>
</head>
<body>
    <div class="container">
        <header>
            <h2 style="color:lightgray;">CRUD Login Application </h2>
        </header>

        <div class="section">
            <h1>Log in</h1>
            <form action="" method="POST">
                
                <!-- Username -->
                <div class="form-group">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="user_name" class="form-control col-6" name="user_name" id="user_name" aria-describedby="user_name">
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control col-6" name ="password" id="password" aria-describedby="password">
                </div>

                <input type="submit" style="margin-top: 20px;" name= "submit" value="LOG IN" class="btn btn-danger">

            </form>

            <div style="margin-top: 20px">
                <a href="signup.php"Sign up></a><br><br>
            </div>
    </div>
    
</body>
</html>