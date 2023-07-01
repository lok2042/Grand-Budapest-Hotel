<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {

      // Username and Password
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $encrypted_password = md5($pass);

      include 'dbConfig.php';
      $sql = "SELECT guest_id FROM `account` WHERE `username` = '$user' AND `password` = '$encrypted_password'";
      $result = $conn->query($sql);

      // Checks the password
      $success = false;
      if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["guest_id"] = $row['guest_id'];
        $success = true;
      }

      $conn->close();

      if($success) {
        echo "<script>
              alert('Login Successful!')
              location = '../profile.php'
            </script>";
      }
      else {
        echo "<script>
                alert('Login Failed: No match for Username and/or Password.')
                location = '../../static/log_in.html'
              </script>";
      }
    }
?>