<?php

session_start();

include("function.php");

$contactUser = new users();

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $contactUser->addContactForm();
    
}

// Display
$data = $contactUser->viewUsers();

// Delete
if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
    $delId = $_GET['del_id'];
    $contactUser->deleteUser($delId);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Contact</title>
</head>
<body>
    <h2>Contact <form action=""></form></h2>
    <!-- Create a html page(structure) -->
    <div class="container">
        <h3>CRUD-Contact Records</h3>

        <!-- POST - is used to collect form data after submitting HTML file--used to pass variable -->
        <form action="contact.php" method="POST">
            
            <!-- First name -->
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" required>
            </div>
            
            <!-- Last name -->
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
            </div>
            
            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" required>
            </div>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <!-- Business name -->
            <div class="form-group">
                <label for="business">Business Name</label>
                <input type="text" name="business" id="business" class="form-control" required>
            </div>
            <div class="form-group">
        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-danger" type="reset">Reset</button>
    </div>
        </form>

        <main>

            
                <!-- table which will display the records HTML file -->
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Business Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $user) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $user['id'] ?></th>
                            <td><?php echo $user['firstname'] ?></td>
                            <td><?php echo $user['lastname'] ?></td>
                            <td><?php echo $user['phone'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['business'] ?></td>
                            
                            <td><a href="index.html?edit_id=<?php echo $user['id']; ?>"><i class="fas fa-edit"> </i></a>
                                <a href="login.php"><i class="fas fa-trash"></i></a>
                            </td>



                        </tr>
                    <?php } ?>
                </tbody>

            </table>


        </main>
    </div>
    
</body>
</html>