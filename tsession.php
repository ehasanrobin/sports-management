<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['email'];
   
   $ses_sql = mysqli_query($conn,"select email from teachers where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['email'])){
      header("location: ../index.php");
      die();
   }
?>