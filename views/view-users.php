<h1>View Users</h1>
<?php
$sql = "SELECT * FROM users";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-bordered'>";
    print "<thead class='table-dark'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Name</th>";
    print "<th>E-mail</th>";
    print "<th>Actions</th>";
    print "</tr>";
    print "</thead>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->name . "</td>";
        print "<td>" . $row->email . "</td>";
        print "<td>
                    <button class='btn btn-secondary'>Edit</button>
                    <button class='btn btn-danger'>Delete</button>
                </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p class='No results found</p>";
}
