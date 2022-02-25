<?php

include("function.php");

$editUser = new users();

// to check if the list has records
if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
    $editId = $_GET['edit_id'];

    $userRecord = $editUser->getRecordById($editId);

} else {
    echo "No records";
}

if(isset($_POST['update'])) {
    echo "Update";

    $data = $editUser->updateUser($_POST);
    echo $data;
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

    <title>Document</title>
</head>
<body>
<div class="container">
        <header>
            <h2 style="color:lightgray;">CRUD Login Application </h2>
        </header>
        <!-- Create a html page(structure) -->
        <div class="section">
            <h1>Edit Record</h1>
            <form action="" method="POST">
                
            <!-- First Name -->
                <div class="form-group">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="firstname" class="form-control col-6" value = "<?php echo $userRecord['firstname']; ?>" name="firstname" id="firstname" aria-describedby="firstname">
                </div>
                
                <!-- last Name -->
                <div class="form-group">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control col-6" value = "<?php echo $userRecord['lastname']; ?>" name ="lastname" id="lastname" aria-describedby="lastname">
                </div>
                
                <!-- Phone No -->
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control col-6" value = "<?php echo $userRecord['phone']; ?>" name ="phone" id="phone" aria-describedby="phone #">
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control col-6" value = "<?php echo $userRecord['email']; ?>" name ="email" id="email" aria-describedby="email">
                </div>
                
                <!-- Business name -->
                <div class="form-group">
                    <label for="business" class="form-label">Business Name</label>
                    <input type="text" class="form-control col-6" value = "<?php echo $userRecord['business']; ?>" name ="business" id="business" aria-describedby="business">
                </div>

                <!-- Hidden data cannot be changed or modified -->
                <input type="hidden" name ="id" value ="<?php echo $userRecord['id']; ?>">

                <input type="submit" style="margin-top: 20px;" name= "update" value="Update Record" class="btn btn-danger">

            </form>

            <div style="margin-top: 20px">
                <a href="signup.php">Sign up</a><br><br>
            </div>
        </div>
    </div>
</body>
</html>