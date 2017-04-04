<?php
   include('config.php');
   session_start();

   $employee_id = $_SESSION['employee_id'];

   $ses_sql = mysqli_query($db,"SELECT employee_id FROM employees where employee_id = '$employee_id' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['employee_id'];

   if(!isset($_SESSION['employee_id'])){
      header("location:login.php");
   }
?>
