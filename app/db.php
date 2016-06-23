<?php

    # Credentials
    $dbhost = 'localhost';
    $dbname = 'employees';
    $dbuser = '';
    $dbpass = '';

    try {

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    catch(PDOException $e) {

        $error = 'Connection failed: ' . $e->getMessage();
        error_log($error);
        exit;
        
    }