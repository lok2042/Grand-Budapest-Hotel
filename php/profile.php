<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Profile | GBH</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/primary.css">
        <link rel="stylesheet" href="../css/secondary.css">
        <link rel = "icon" href = "../images/logo.jpg" type = "image/jpg">
    </head>
    <body>
        
        <!-- header -->
        <header class = "header" id = "header">
            <div class = "head-top">
                <div class = "site-name">
                    <span onclick="location.href='home.php'">GBH</span>
                </div>  
                <div class = "site-nav">
                    <span id = "nav-btn">MENU <i class = "fas fa-bars"></i></span>
                </div>
            </div>
        </header>
        <!-- end of header -->

        <!-- side navbar -->
        <div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

            <ul class = "navbar">
                <li><a href = "home.php#header">home</a></li>
                <li><a href = "home.php#services">services</a></li>
                <li><a href = "home.php#rooms">rooms</a></li>
                <li><a href = "home.php#customers">customers</a></li>
            </ul>

            <button class = "btn logout" onclick="logout()">LOG OUT</button>
            
        </div>
        <!-- end of side navbar -->

        <!-- fullscreen modal -->
        <div id = "modal"></div>
        <!-- end of fullscreen modal -->

        <!-- body content  --> 
        <div class="grid">
            <div class="container current-menu-container">
                <?php
                    include 'includes/dbConfig.php';

                    session_start();
                    $guest_id = $_SESSION["guest_id"];

                    $sql = "SELECT `profile_pic`, CONCAT(`first_name`, ' ', `last_name`) AS 'full_name' FROM `guest` WHERE `guest_id` = '$guest_id';";
                    $result = $conn->query($sql);

                    echo '<div class="profile-pic-container">';

                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<img src="../guests/'.$row['profile_pic'].'" alt="Profile Picture" class="profile-pic">
                        <button class="edit-image-btn">Edit</button>
                        </div>
                        <h2>'.$row['full_name'].'</h2>';
                    }
                    else {
                        echo '<img src="../guests/default.jpeg" alt="Profile Picture" class="profile-pic">
                        <button class="edit-image-btn">Edit</button>
                        </div>
                        <h2>Default Name</h2>';
                    }
                ?>
            </div>
            <div class="container options-container">
                <button class="option-btn" onclick="changeMenu(1)">Personal Details</button>
                <button class="option-btn" onclick="changeMenu(2)">Bookings</button>
                <button class="option-btn" onclick="changeMenu(3)">Reset Password</button>
            </div>
            <div class="container menu-container" id="menu">
                <div class="inner-container">
                    <h1>Welcome to The Grand Budapest Hotel</h1>
                    <br>
                    <img style='max-width: 500px; margin: 0 auto;' src="../images/gbh-pc.jpg" alt="iMac">
                    <br>
                    <div style='max-width: 500px; margin: 0 auto;'>
                        <p>Here, you can perfrom the following things: </p><br>
                        <ul align='left'>
                            <li>Update personal details</li>
                            <li>Edit profile picture</li>
                            <li>View your bookings</li>
                            <li>Review, modify, or delete a booking</li>
                            <li>Reset account password</li>
                        </ul>
                        <br>
                        <p>If you face any technical issues, feel free to send us an email at 
                            <a style='color: pink; text-decoration: none' href="support@gbh.com">support@gbh.com</a>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of body content  --> 

        <!-- footer -->
        <?php include '../static/footer.html'; ?>
        <!-- end of footer -->

        <script src="../script/main.js"></script>
        <script src="../script/profile.js"></script>
    </body>
</html>