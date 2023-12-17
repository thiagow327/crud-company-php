<h1>View Sectors</h1>
<?php
$sql = "SELECT * FROM sectors";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<thead class='table-dark'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Name</th>";
    print "<th>Actions</th>";
    print "</tr>";
    print "</thead>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->name . "</td>";
        print "<td>
                    <button onclick=\"
                        location.href='?page=edit-sector&id=" . $row->id . "';\"
                    class='btn btn-secondary'>Edit</button>
                    <button onclick=\"
                        if(confirm('The user will be deleted, do you want to proceed?')){
                            location.href='?page=save-sector&action=delete-sector&id=" . $row->id . "';
                        }else{
                            false;
                        }\"
                     class='btn btn-danger'>Delete</button>
                </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p class='No results found</p>";
}
