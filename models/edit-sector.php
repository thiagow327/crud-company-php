<h1>Edit Sector</h1>
<?php
$sql = "SELECT * FROM sectors WHERE id=" . $_REQUEST["id"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>
<form action="?page=save-sector" method="POST">
    <input type="hidden" name="action" value="edit-sector">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php print $row->name; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>