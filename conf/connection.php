<?php

    // DB Credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'testblog';

    // var holding database, datbase name
    $dsn = 'mysql:host='. $host .';dbname='. $db;
    // Connect to database
    $conn = new PDO($dsn, $username, $password);
    // Set default fetch to object
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>