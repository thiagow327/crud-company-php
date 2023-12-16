<h1>Edit User</h1>
<?php
$id = $_REQUEST["id"];
$sqlUser = "SELECT u.*, s.id AS sector_id, s.name AS sector_name
            FROM users u
            LEFT JOIN users_sectors us ON u.id = us.user_id
            LEFT JOIN sectors s ON us.sector_id = s.id
            WHERE u.id = {$id}";
$resUser = $conn->query($sqlUser);
$rowUser = $resUser->fetch_object();
?>
<form action="?page=save-user" method="POST">
    <input type="hidden" name="action" value="edit-user">
    <input type="hidden" name="id" value="<?php echo $rowUser->id; ?>">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $rowUser->name; ?>">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" value="<?php echo $rowUser->email; ?>">
    </div>
    <div class="mb-3">
        <label>New Sector</label>
        <select class="form-select" name="new_sector">
            <?php
            $sqlSectors = "SELECT * FROM sectors";
            $resSectors = $conn->query($sqlSectors);

            while ($rowSector = $resSectors->fetch_object()) {
                $selected = ($rowSector->id == $rowUser->sector_id) ? 'selected' : '';
                echo "<option value='{$rowSector->id}' {$selected}>{$rowSector->name}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>