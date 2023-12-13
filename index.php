<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!-- Links to Bootstrap CSS and JavaScript files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/images/logo.png" alt="PHP" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Users
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=new-user">New User</a></li>
                            <li><a class="dropdown-item" href="?page=view-users">View Users</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sectors
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=new-sector">New Sector</a></li>
                            <li><a class="dropdown-item" href="?page=view-sectors">View Sectors</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Request page -->
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <?php
                include("database.php");
                switch (@$_REQUEST["page"]) {
                    case "new-user":
                        include("views/new-user.php");
                        break;
                    case "view-users":
                        include("views/view-users.php");
                        break;
                    case "new-sector":
                        include("views/new-sector.php");
                        break;
                    case "view-sectors":
                        include("views/view-sectors.php");
                        break;
                    case "save":
                        include("models/save-user.php");
                        break;
                    default:
                        print "<h1>Welcome</h1>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-pzjw8t+4zLX7L3np8F9ltI5lb9sL06aOK6E7Ll5f7Iao00jMn5endoGZ5biSQtQ6" crossorigin="anonymous"></script>
</body>

</html>