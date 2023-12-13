<?php
switch ($_REQUEST["action"]) {
    case 'create':
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('User successfully registered');</script>";
            print "<script>location.href='?page=view-users';</script>";
        }else{
            print "<script>alert('Unable to register this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;
    case 'edit':
        # code...
        break;
    case 'delete':
        # code...
        break;
}
