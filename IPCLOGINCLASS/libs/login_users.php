<?php
   if (isset($_POST['register']))
   {
     include_once('classes/class.ManageUsers.php');
     $success="";
     $error="";
     $user = new ManageUsers();

     $username = $_POST['username'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     $repassword = $_POST['repassword'];
     $ip_address = $_SERVER['REMOTE_ADDR'];
     $time = date("H:i:s");
     $date = date("Y-m-d");

     if(empty($username) || empty($password) || empty($email) || empty($repassword) )
     {
         $error = "All fields are required";

     } elseif ($password !== $repassword) {
         $error = " Password does not match";

     } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL )) {
         $error = " Email is not valid";
     } else {

         $check_availability = $user->getUserInfo($username);
         if($check_availability == 0) {
               $reg_user = $user->registerUsers($username, $email, $password, $ip_address, $time,$date);
               if($reg_user == 1) {
                   $make_sessions = $user->getUserInfo($username);
                   foreach ($make_sessions as $userSession) {
                       $_SESSION['IPCSession_name' ] = $userSession['username'];
                       if(isset($_SESSION['IPCSession_name']) )
                       {
                          header("location: index.php");
                       }
                   } 
               }     

         } else {
              $error = "Username already exists";
         }

     }


   }

   if (isset($_POST['login']))
   {
     include_once('classes/class.ManageUsers.php');

     $username = $_POST['login_username'];
     $password = $_POST['login_password'];

     $success="";
     $error="";

     if(empty($username) || empty($password)) {
         $error = 'All fields are required';

     } else {
         //$password = md5($password);
         $login_user = new ManageUsers();
         $auth_user = $login_user->loginUsers($username, $password);

         if ($auth_user ==1 )
         {
             $make_sessions = $login_user->getUserInfo($username);
                   foreach ($make_sessions as $userSession) 
                   {
                       $_SESSION['IPCSession_name' ] = $userSession['username'];
                       if(isset($_SESSION['IPCSession_name']) )
                       {
                          header("location: index.php");
                         
                          $success = "Successfully Log in";
                          $error = "";
                          echo '<p class="bg-success">'.$success.'</p>';
                       }
                   } 
         }
         else {
             $error = "Wrong Username or password";
         }
     }
   }


?>

