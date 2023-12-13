<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'Crud123.');
    define('BASE', 'DB_COMPANY');

    $conn = new mysqli(HOST,USER,PASSWORD,BASE);
    
    if ($conn->connect_error) {
        die("Error in database connection: " . $conn->connect_error);
    };