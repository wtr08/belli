<?php
    include('includes/session.php');
    include('includes/config.php');
    include('includes/functions.php');

    // $login_session = ID session


    /**
     * Reset error array.
     */
    unset($errors);


    // processing
    if(isset($_POST['submit_new_client'])){

        if(empty($_POST['voornaam'])){
            $errors[] = "voornaam is required" .  "<br />";
        }


        if(empty($_POST['achternaam'])){
            $errors[] = "achternaam is required" .  "<br />";
        }


        if(empty($_POST['leeftijd'])){
            $errors[] = "leeftijd is required" .  "<br />";
        }


        if(empty($_POST['zwangerdatum'])){
            $errors[] = "zwanger datum is required" .  "<br />";
        }


        if(empty($_POST['uitgeteld'])){
            $errors[] = "uitgeteld datum is required" .  "<br />";
        }


        if(empty($_POST['email'])){
            $errors[] = "email is required" .  "<br />";
        }


        if(empty($_POST['telnummer'])){
            $errors[] = "telefoon nummer is required" .  "<br />";
        }

        if(empty($errors)){
            $stmt = $db->prepare("INSERT INTO clients (client_firstname, client_lastname, age, pregnant, exhausted, email, tel_nr) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssissss', $client_firstname, $client_lastname, $age, $pregnant, $exhausted, $email, $tel_nr);

            $client_firstname  = $_POST['voornaam'];
            $client_lastname = $_POST['achternaam'];
            $age = $_POST['leeftijd'];

            $pregnant = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['zwangerdatum'])));
            $exhausted = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['uitgeteld'])));


            $email = $_POST['email'];
            $tel_nr = $_POST['telnummer'];

            $stmt->execute();
            echo $stmt->insert_id;
            $stmt->close();

        }
    }


    if($errors){
        foreach($errors as $error){
            echo $error;
        }
    }

?>
<html>

   <head>
      <title>Niew client  </title>
   </head>
   <body>
       <form action="" method="post">
            First name: <input type="text" placeholder="Voornaam" name="voornaam" value="<?php if(isset($_POST['voornaam'])){ echo $_POST['voornaam']; } ?>"><br>
            Last name: <input type="text" placeholder="Achternaam" name="achternaam" value="<?php if(isset($_POST['achternaam'])){ echo $_POST['achternaam']; } ?>"><br>
            <br />
            Leeftijd: <input type="text" placeholder="Leeftijd" name="leeftijd" value="<?php if(isset($_POST['leeftijd'])){ echo $_POST['leeftijd']; } ?>"><br>
            Zwangerdatum: <input type="date" placeholder="Achternaam" name="zwangerdatum" value="<?php if(isset($_POST['zwangerdatum'])){ echo $_POST['zwangerdatum']; } ?>"><br>
            Uitgeteld: <input type="date" placeholder="uitgeteld" name="uitgeteld" value="<?php if(isset($_POST['uitgeteld'])){ echo $_POST['uitgeteld']; } ?>"><br>
            <br />
            E-mail: <input type="text" placeholder="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>"><br>
            Telefoonnummer: <input type="text" placeholder="telefoonnummer" name="telnummer" value="<?php if(isset($_POST['telefoonnummer'])){ echo $_POST['telefoonnummer']; } ?>"><br>
            <input type="submit" name="submit_new_client" value="Submit">
       </form>
   </body>

</html>
