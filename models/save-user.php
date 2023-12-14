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
        } else {
            print "<script>alert('Unable to register this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;

    case 'edit':
        $name = $_POST["name"];
        $email = $_POST["email"];
        $id = $_REQUEST["id"];

        $sql = "UPDATE users SET 
                    name='{$name}', 
                    email='{$email}'
                WHERE 
                    id='{$id}'";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('User successfully edit');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to edit this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;

    case 'delete':
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
