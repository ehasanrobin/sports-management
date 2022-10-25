<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['email'];
   
   $ses_sql = mysqli_query($conn,"select a_email from admin where a_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['a_email'];
   
   if(!isset($_SESSION['email'])){
      header("location: ../adminLogin.php");
      die();
   }
?>