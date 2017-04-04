<?php
// Get the hash password
function get_pasword($db, $employee_id){
    $stmt = $db->prepare("SELECT password FROM employees WHERE employee_id = ?");
    $stmt->bind_param('i', $employee_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($password_hash);
    while ($row = $stmt->fetch()) {
        return $password_hash;

    }
    $stmt->close();
}


// Verify user if it matches the username and password
function verify_user($db, $username, $password){
   $stmt = $db->prepare("SELECT employee_id FROM employees WHERE username = ? AND password = ?");
   $stmt->bind_param('ss', $username, $password);
   $stmt->execute();
   $stmt->store_result();
   $stmt->bind_result($result);
   while ($row = $stmt->fetch()) {
       return true;
   }
   $stmt->close();
}

// verified user
function verified($password, $hash){
    if (password_verify($password, $hash)){
        return true;
    }
}


// Get employee ID for inlog
function get_employee_id($db, $username){
    $stmt = $db->prepare("SELECT employee_id FROM employees WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);
    while ($row = $stmt->fetch()) {
        return $result;
    }
    $stmt->close();
}



// Get all information about a employee
function get_info_employee($db, $employee_id){
    // // Fetch array (SELECT *)
    $stmt = $db->prepare("SELECT * FROM employees WHERE employee_id = ?");
    $stmt->bind_param('i', $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // echo $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    return $array;
    $stmt->close();
}


// Insert a client
//
// TOEVOEGEN



// get info client
function get_info_client(){
    // // Fetch array (SELECT *)
    $stmt = $db->prepare("SELECT * FROM clients WHERE client_id = ?");
    $stmt->bind_param('i', $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    // echo $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    return $array;
    $stmt->close();
}
