<?php 

session_start();
$path = $_SERVER['DOCUMENT_ROOT'] . "/";
include($path. "auth/passwords.php"); 

if(array_key_exists("ac", $_POST)){
     if ($_POST["ac"]=="log") { 
     /// do after login form is submitted and details are sent to login.php by post method
          if(array_key_exists($_POST["email"], $USERS)){
               if ($USERS[$_POST["email"]]==$_POST["password"]) { 
               /// check if submitted username and password exist in $USERS array.
               /// set "logged" attribute of $_SESSION as user name and redirect to readblogs.php
                    $_SESSION["logged"]=$_POST["email"]; 
                    $_SESSION["admin"] = $ADMIN[$_POST["email"]];
                    /// header('Location: ' .$path. 'index.php'); 
               } else { 
                    echo '<center><h3 style="color:red">Incorrect password. Please, try again.</h3></center>'; 
               }; 
          }
          else {
               echo '<center><h3 style="color:red">Email does not exist. Please, try again.</h3></center>';
          }
     }
     else{
          ///echo '<center><h3 style="color:red">User Already Exists.</h3></center>';
     }
}

if(array_key_exists("logged", $_SESSION)){
     if (array_key_exists($_SESSION["logged"],$USERS)) { //// check if user is logged or not 
          header('Location:'.'/index.php');
           //// if user is logged show a message            
     }
} else { //// if not logged show login form 
     include 'loginForm.php';
}; 
?>
