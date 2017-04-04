<?php
    // Display errors
    ini_set('display_errors', true);
    error_reporting(E_ALL);

    // Include files
    include("includes/config.php");
    include("includes/functions.php");
    session_start();


    // Vars
    $error = "";
    // Login processing
    if(isset($_POST['submit'])) {

        // username and password sent from form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $employee_id = get_employee_id($db, $username);


        $hash = get_pasword($db, $employee_id);


        // verify user
        if(verified($password, $hash) == true){
            $_SESSION['employee_id'] = $employee_id;
            header("location: index.php");
        } else {
          $error = "Your Login Name or Password is invalid";
        }

    // end of if statement
    }
?>


<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body>

      <div>
         <div>
            <div><b>Login</b></div>

            <div>

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" name="submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
