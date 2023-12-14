<?php
switch ($_REQUEST["action"]) {
    case 'create-sector':
        $name = $_POST["name"];

        $sql = "INSERT INTO sectors (name) VALUES ('{$name}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Sector successfully registered');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to register this sector');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;
}
