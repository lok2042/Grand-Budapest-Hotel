<?php
  // Localhost
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "grand_budapest_hotel";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
  }
?>