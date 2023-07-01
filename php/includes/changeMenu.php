<?php
    $menu_id = $_GET['q'];

    session_start();
    $guest_id = $_SESSION["guest_id"];
    include 'dbConfig.php';

    if ($menu_id == 1) {
        include 'getPersonalDetails.php';
    }
    else if ($menu_id == 2) {
        include 'getBookings.php';
    }
    else if ($menu_id == 3) {
        include 'getResetPasswordForm.php';
    }
    else {
        echo "<h2>Default</h2>";
    }

    $conn->close();
?>


