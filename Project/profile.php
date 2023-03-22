
<!DOCTYPE html>

<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add in Wave Length Logo Later -->

</head>

<style>

</style>

<body>

<?php
require 'dbconnection.php';
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
    exit;
}
?>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-soundwave"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="network.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="jobs.php"><span class="glyphicon glyphicon-user"></span> Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>

                    <form class="form-inline navbar-form ml-auto">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>

                    <form method="post">
                        <input type="submit" name="buttonLogOut" class="btn btn-primary" value="Logout" />
                    </form>
            </div>
    </nav>


    <br>

    <!-- Profile Header -->

    <?php
    //retrieve user info from sql table
    $query = "SELECT firstname, lastname, age, gender, role, genre, manager, label, description, instruments FROM user WHERE id = 1";
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $age = $user['age'];
    $gender = $user['genre'];
    $role = $user['role'];
    $genre = $user['genre'];
    $manager = $user['manager'];
    $label = $user['label'];
    $description = $user['description'];
    $instruments = $user['instruments']

    ?>

    <body>
        <h1><?php echo $firstname ?></h1>
        <p>Age: <?php echo $age; ?></p>
        <p>Gender: <?php echo $gender; ?></p>
        <p>Role: <?php echo $role; ?></p>
        <p>Genre: <?php echo $genre; ?></p>
        <p>Manager: <?php echo $manager; ?></p>
        <p>Label: <?php echo $label; ?></p>
        <p>Description: <?php echo $description; ?></p>
        <p>Instruments: <?php echo $instruments; ?></p>
    </body>

    </html>