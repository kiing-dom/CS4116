<?php
session_start();

require 'dbconnection.php';
$conn = createConnection('sql300.epizy.com', 'epiz_33768646', 'DnPkUp7wbvcfJ', 'epiz_33768646_CS4116ProjGroup10');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['Login'])
    ) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if the email and password are valid
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // The email and password are valid, so set $_SESSION['valid'] to true
            $_SESSION['valid'] = true;
            $_SESSION['id'] = $user['id'];

            echo "Login is successful";
            print_r($_POST);

            // Redirect to the profile.php page
            header('Location: profile.php');


        } else {
            // The email and password are invalid, so display an error message
            $error = 'Invalid email or password';
        }
    }
}
?>