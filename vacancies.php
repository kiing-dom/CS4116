<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <header>
    <?php
        include('navBar.php');
        ?>

                <div class="container-lg">
                <!-- Content here -->



                <form action="jobs.php" method="post">
  <div class="form-group">
    <label for="search">Search for vacancies:</label>
    <input type="text" class="form-control" id="search" name="search" placeholder="Enter keywords...">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
  <div class="job-container">
    <?php
    $sql = "SELECT * FROM vacancies";

    // Check if a search query has been submitted
    if (isset($_POST['search'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $sql .= " WHERE genre LIKE '%$search%' OR company_name LIKE '%$search%' OR location LIKE '%$search%' OR job_description LIKE '%$search%'";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['genre'] . ' for ' . $row['company_name'] . '</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">' . ' in ' . $row['location'] . '</h6>';
        echo '<p class="card-text">' . $row['job_description'] . '<br>' . $row['audition_date'] . '</p>';
        echo '<div class="form-check">';
        echo '<input type="checkbox" class="form-check-input" name="vacancies[]" value="' . $row['id'] . '">';
        echo '<label class="form-check-label">Select</label>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo '<p>No vacancies found.</p>';
    }
    ?>
  </div>
  <button type="submit" class="btn btn-primary">Apply</button>
</form>

 <?php
// Check if the form has been submitted
if (isset($_POST['vacancies'])) {
    // Create an array to store the selected vacancies
    $selectedVacancies = array();

    // Loop through the selected vacancies and retrieve their information
    foreach ($_POST['vacancies'] as $vacancyId) {
        $sql = "SELECT * FROM vacancies WHERE id = $vacancyId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $selectedVacancies[] = $row;
        }
    }

    // Redirect to jobs.php and pass the selected vacancies as a GET parameter
    header("Location: jobs.php?vacancies=" . urlencode(serialize($selectedVacancies)));
    exit();
}
?>




                