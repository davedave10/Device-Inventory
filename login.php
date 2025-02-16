<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed;" . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if ($row['user_password'] == $password){
                header("Location: dashboard.php");
                echo "Your are login";
            } else {
                echo "Please check your email or password";
            }
        } 
    
    }else{
        echo"Please check your email or password";
    }
    } 

?>