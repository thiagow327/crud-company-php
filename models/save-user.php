<?php
switch ($_REQUEST["action"]) {
    case 'create-user':
        $name = $_POST["name"];
        $email = $_POST["email"];
        $sectorName = $_POST["sector"];
        $newSector = isset($_POST["new_sector"]) ? $_POST["new_sector"] : null;

        $sqlInsertUser = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";
        $resInsertUser = $conn->query($sqlInsertUser);

        if ($resInsertUser) {
            $userId = $conn->insert_id;

            $sqlSector = "SELECT id FROM sectors WHERE name = '{$sectorName}'";
            $resSector = $conn->query($sqlSector);
            $sector = $resSector->fetch_object();
            $sectorId = $sector->id;

            $sqlInsertUserSector = "INSERT INTO users_sectors (sector_id, user_id) VALUES ('{$sectorId}','{$userId}')";
            $resInsertUserSector = $conn->query($sqlInsertUserSector);

            if ($resInsertUserSector) {
                print "<script>alert('User successfully registered');</script>";
                print "<script>location.href='?page=view-users';</script>";
            } else {
                print "<script>alert('Unable to register this user');</script>";
                print "<script>location.href='?page=new-user';</script>";
            }
        } else {
            print "<script>alert('Unable to register this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;

    case 'edit-user':
        $name = $_POST["name"];
        $email = $_POST["email"];
        $id = $_REQUEST["id"];
        $newSector = isset($_POST["new_sector"]) ? $_POST["new_sector"] : null;

        $sqlUpdateUser = "UPDATE users SET name='{$name}', email='{$email}' WHERE id='{$id}'";
        $resUpdateUser = $conn->query($sqlUpdateUser);

        if (!empty($newSector)) {
            $sqlUpdateUserSector = "UPDATE users_sectors SET sector_id='{$newSector}' WHERE user_id='{$id}'";
            $resUpdateUserSector = $conn->query($sqlUpdateUserSector);
        } else {
            $sqlUpdateUserSector = "UPDATE users_sectors SET sector_id=NULL WHERE user_id='{$id}'";
            $resUpdateUserSector = $conn->query($sqlUpdateUserSector);
        }

        if ($resUpdateUser && ($resUpdateUserSector !== false)) {
            print "<script>alert('User successfully updated');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to update user');</script>";
            print "<script>location.href='?page=edit-user&id={$id}';</script>";
        }
        break;


    case 'delete-user':
        $sql = "DELETE FROM users WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('User successfully deleted');</script>";
            print "<script>location.href='?page=view-users';</script>";
        } else {
            print "<script>alert('Unable to delete this user');</script>";
            print "<script>location.href='?page=new-user';</script>";
        }
        break;
}
