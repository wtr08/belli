<?php
    include('includes/session.php');
    include('includes/config.php');
    include('includes/functions.php');

    // $login_session = ID session
?>
<html>

   <head>
      <title>Welcome  </title>
   </head>
   <body>

       <?php
       foreach(get_info_employee($db, $employee_id) as $employees) {
           $employee_name  	 		= $employees['employee_name'];
       }
       ?>
      <h1>Welcome <?php echo $employee_name; ?></h1>

      <h1><a href = "search_client.php">Search</a></h1>
      <h1><a href = "new_client.php">Nieuw client</a></h1>
      <p><a href = "logout.php">Sign Out</a></p>
      <p><a href = "">Settings</a></p>
   </body>

</html>
