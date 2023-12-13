<?php
    switch ($_REQUEST["action"]) {
        case 'create':
            $name = $_POST["name"];
            $email = $_POST["email"];

            $sql = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";

            $res = $conn->query($sql);
            break;
        case 'edit':
            # code...
            break;
        case 'delete':
            # code...
            break;
    }