<h1>View Users</h1>

<form method="GET" action="?page=view-users" class="form-inline">
    <div class="form-group">
        <label for="sector-filter" class="mr-2">Filter by Sector:</label>
        <select name="sector" id="sector-filter" class="form-control" onchange="this.form.submit()">
            <option value="all" <?php echo (isset($_GET['sector']) && $_GET['sector'] == 'all') ? 'selected' : ''; ?>>All Sectors</option>
            <?php
            $sqlSectors = "SELECT * FROM sectors";
            $resSectors = $conn->query($sqlSectors);

            while ($rowSector = $resSectors->fetch_object()) {
                $selected = (isset($_GET['sector']) && $_GET['sector'] == $rowSector->id) ? 'selected' : '';
                echo "<option value='{$rowSector->id}' {$selected}>{$rowSector->name}</option>";
            }
            ?>
        </select>
    </div>
    <input type="hidden" name="page" value="view-users">
</form>

<br>

<?php
$sql = "SELECT u.*, s.name AS sector_name
        FROM users u
        LEFT JOIN users_sectors us ON u.id = us.user_id
        LEFT JOIN sectors s ON us.sector_id = s.id";

// Adicionar condição de filtro se um setor for selecionado
$filteredSector = isset($_GET['sector']) ? $_GET['sector'] : 'all';

if ($filteredSector !== 'all') {
    $sql .= " WHERE s.id = ?";
}

$stmt = $conn->prepare($sql);

if ($filteredSector !== 'all') {
    $stmt->bind_param("i", $filteredSector);
}

$stmt->execute();
$res = $stmt->get_result();

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-bordered mb-4'>";
    print "<thead class='table-dark'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Name</th>";
    print "<th>E-mail</th>";
    print "<th>Sector</th>";
    print "<th>Actions</th>";
    print "</tr>";
    print "</thead>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->name . "</td>";
        print "<td>" . $row->email . "</td>";
        print "<td>" . ($row->sector_name ?: 'Not assigned') . "</td>";
        print "<td>
                    <button onclick=\"
                        location.href='?page=edit-user&id=" . $row->id . "&sector=" . urlencode($filteredSector) . "';\"
                    class='btn btn-secondary'>Edit</button>
                    <button onclick=\"
                        if(confirm('The user will be deleted, do you want to proceed?')){
                            location.href='?page=save-user&action=delete-user&id=" . $row->id . "&sector=" . urlencode($filteredSector) . "';
                        }else{
                            false;
                        }\"
                     class='btn btn-danger'>Delete</button>
                </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p>No results found</p>";
}

$stmt->close();
?>