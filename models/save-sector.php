<?php
switch ($_REQUEST["action"]) {
    case 'create-sector':
        $name = $_POST["name"];

        $sql = "INSERT INTO sectors (name) VALUES ('{$name}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Sector successfully registered');</script>";
            print "<script>location.href='?page=view-sectors';</script>";
        } else {
            print "<script>alert('Unable to register this sector');</script>";
            print "<script>location.href='?page=new-sector';</script>";
        }
        break;
    case 'edit-sector':
        $id = $_REQUEST["id"];
        $name = $_POST["name"];

        $sql = "UPDATE sectors SET 
                        name='{$name}'
                    WHERE 
                        id='{$id}'";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Sector successfully edit');</script>";
            print "<script>location.href='?page=view-sectors';</script>";
        } else {
            print "<script>alert('Unable to edit this sector');</script>";
            print "<script>location.href='?page=new-sector';</script>";
        }
        break;

    case 'delete-sector':
        $sql = "DELETE FROM sectors WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Sector successfully delete');</script>";
            print "<script>location.href='?page=view-sectors';</script>";
        } else {
            print "<script>alert('Unable to delete this sector');</script>";
            print "<script>location.href='?page=new-sector';</script>";
        }
        break;
}
