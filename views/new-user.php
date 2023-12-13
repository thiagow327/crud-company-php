<h1>New User</h1>
<form action="?page=save" method="POST">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Sector:</label>
        <select class="form-select" name="sector">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>