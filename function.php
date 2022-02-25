
<!-- // define is constant.constant value cannot be changed after it is set
// define("DB_HOST","localhost");
// define("DB_USER","root");
// define("DB_PASSWORD","");
// define("DB_NAME","business_contact");

// connecting php to database..the database user should be same
// $mysqli = new mysqli(DB_HOST,DB_USER, DB_PASSWORD,DB_NAME);
//  -->

<?php
//to connect to local host with DB name
class users {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'business_contact';
    private $port = 3306;
    
    //Database connection
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if(mysqli_connect_error()){
            trigger_error("Error is in DB" . mysqli_connect_error());
        } else {
            return $this->conn;
        }
    }

    //add new user to the list
    public function addUser() {
        $user_name = $_POST["user_name"];
        $email = $_POST['email'];
        $phone = (int)$_POST['phone'];
        $name = $_POST['name'];
        $password = $_POST['password'];
    
        if (!empty($user_name) && !empty($email) && !empty($phone) && !empty($name) && !empty($password) && !is_numeric($user_name))
        {
            $user_id = $this->random_num(20);
            
            
            $sql = "INSERT INTO users (user_name,email,phone ,name,password, user_id) VALUES ('$user_name', '$email','$phone','$name', '$password', '$user_id')";

            $this->conn->query($sql);
            header("Location:login.php");

            
    
        } else {
            echo "Please enter sign up form";
        }
    }

    
    public function random_num($length) {
        $text = "";
        if ($length < 5) {
            $length = 5;
        }

        $len = rand(4, $length);
        for ($i = 0; $i < $len; $i++) {
            $text .=rand(0,9);
        }
        return $text;
    }

    //to check the username password is right
    //wrong id or password
    public function checkUser() {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $query = "SELECT * from users where user_name = '$user_name' limit 1";
            $result = $this->conn->query($query);

            if($result)
            {
                if($result && $result->num_rows > 0) {
                    $user_data = $result->fetch_assoc();

                    if($users['password']===$password)
                    {
                        $_SESSION['user_id'] = $users['user_id'];
                        header("Location:contact.php");
                        die;
                    }
                    

                }
            } else {
                echo "wrong username or password!";
            }
        } else {
            echo "wrong username or password!";
        }
    }

    //check if the user id and password 
    public function check_login() {
        if(isset($_SESSION['user_id']))
        {
            $id = $_SESSION['user_id'];
            $query = "SELECT * from users where user_id = '$id' limit 1";

            $result = $this->conn->query($query);

            if($result && $result->num_rows > 0)
            {
                $user_data = $result->fetch_assoc();
                return $user_data;
            }
        } else {
            header("Location:login.php");
            die;
        }

    }

    //add names to contact form
    public function addContactForm() {
        $business = $_POST["business"];
        $contact = $_POST["firstname"];
        $email = $_POST['email'];
        $phone = (int)$_POST['phone'];
    
        if (!empty($business) && !empty($firstname) && !empty($email) && !empty($phone) && !is_numeric($business) && !is_numeric($firstname))
        {
            
            
            $sql = "INSERT INTO contactdata (business, firstname, email, phone) VALUES ('$business', '$firstname', '$email', '$phone')";

            $this->conn->query($sql);
            header("Location:contact.php");

          
    
        } else {
            echo "Please enter sign up form";
        }
    }

    // View students data
    public function viewUsers() {
        $sql = "SELECT * FROM contactdata";
        $result = $this->conn->query($sql);

       
        if($result->num_rows >0){

          
            $data = array();

         
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }

            return $data;
        }

    }

    // delete user from th table
    public function deleteUser($id){
        $sql = "DELETE FROM contactdata WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if($result) {
            echo "The user record has been deleted";
            header("Location:contact.php");
        } else {
            echo "No delete";
        }
    }

    //to get record by Id
    public function getRecordById($id) {
        $query = "SELECT * FROM contactdata where id = '$id' limit 1";
        $result = $this->conn->query($query);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "No records found";
        }

    }

    //to update or make changes use Update 
    public function updateUser($postData) {
        $business = $_POST["business"];
        $email = $_POST["email"];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = (int)$_POST['phone'];
        $id = $_POST['id'];

        if(!empty($id) && !empty($postData)) {
            $sql = "UPDATE contactdata SET business = '$business', email ='$email', firstname = '$firstname', lastname = '$lastname', phone = '$phone' WHERE id = '$id'";

            $result = $this->conn->query($sql);

            if($sql == true) {
                header("Location:contact.php");
            } else {
                echo "Update failed";
            }
        }

    }
    




}


?>