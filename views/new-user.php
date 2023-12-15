<h1>New User</h1>
<form action="?page=save-user" method="POST">
    <input type="hidden" name="action" value="create-user">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Sector</label>
        <select class="form-select" aria-label="Default select example">
            <?php
            $sql = "SELECT * FROM sectors";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            while ($row = $res->fetch_object()) {
                print "<option>" . $row->name . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>