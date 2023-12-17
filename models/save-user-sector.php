<?php
switch ($_REQUEST["action"]) {
    case 'link-user-sector':
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('User successfully registered');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to register this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;

    case 'unlink-user-sector':
        $sql = "DELETE FROM users WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('User successfully delete');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to delete this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;
}
