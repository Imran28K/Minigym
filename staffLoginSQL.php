<?php

function login($id, $password) {
    // Connect to the database
    $db = new sqlite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

    
    $username = $db->escapeString($id);
    $password = $db->escapeString($password);

    
    $query = "SELECT * FROM staff WHERE id='$id' AND pwd='$password'";

    // Execute the query and fetch the result
    $result = $db->query($query);

    // Check if the query returned a result
    if ($result->fetchArray()) {
        // If it did, it means the login credentials are valid
        return true;
    } else {
        // Otherwise, the login credentials are invalid
        return false;
    }
}

?>