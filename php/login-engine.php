<?php 

session_start();

require_once ("connection.php");

if (isset($_POST['login-btn'])) {

$email=$_POST['email'];

$password=$_POST['password'];

$heshpassword=password_hash($password,PASSWORD_DEFAULT);

 ///Checking the email 

 if ($email==="" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

    header("Location:../login.php?login=error1");

 } else {

     ///Checking the Password 

     if ($password ==="") {

        header("Location:../login.php?login=error2&email=$email");

     } else {

        $sql = "SELECT email FROM users WHERE email = ?";

        $query=$conn->prepare($sql);

        $query->bind_param("s", $email);

        $query->execute();

        $result=$query->get_result()->fetch_assoc();

         if (!$conn->affected_rows) {

            header("Location:../login.php?login=error3&email=$email");

            exit();

         } else {

            $sql = "SELECT * FROM users WHERE email = ?";

            $query=$conn->prepare($sql);

            $query->bind_param("s", $email);

            $query->execute();

            $result=$query->get_result()->fetch_assoc();

            if (password_verify($password,$result['password'])){

                // Log In (SESSION)
                $_SESSION["start"] = time(); 
               header("Location:../dashboard.php");              
            }else{
               header("Location:../login.php?login=error4&email=$email");
            }
         }
      }  
    } 
};