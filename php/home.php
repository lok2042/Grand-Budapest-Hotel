<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home | GBH</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/primary.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "../images/logo.jpg" type = "image/jpg">
    </head>
    <body>
        
        <!-- header -->
        <header class = "header" id = "header">
            <div class = "head-top">
                <div class = "site-name">
                    <span>GBH</span>
                </div>  
                <div class = "site-nav">
                    <span id = "nav-btn">MENU <i class = "fas fa-bars"></i></span>
                </div>
            </div>

            <div class = "head-bottom flex">
                <h2 style="color: #ddd690">The Grand Budapest Hotel</h2>
                <p style="color: #fff; font-weight: bold;">We shall explore the themes of fascism, nostalgia, friendship, and loyalty!</p>
                <button type = "button" class = "head-btn">EXPLORE</button>
            </div>
        </header>
        <!-- end of header -->

        <!-- side navbar -->
        <div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

            <ul class = "navbar">
                <li><a href = "#header">home</a></li>
                <li><a href = "#services">services</a></li>
                <li><a href = "#rooms">rooms</a></li>
                <li><a href = "#customers">customers</a></li>
            </ul>
            <?php 
                session_start(); 

                if(isset($_SESSION["guest_id"])) {
                    echo "<button class = 'btn account' onclick='moveTo(3)'>
                            <span><i class = 'fas fa-solid fa-user'></i></span>
                            ACCOUNT
                        </button>";
                    echo "<button class = 'btn logout' onclick='logout()'>LOG OUT</button>";
                }
                else {
                    echo "<button class = 'btn sign-up' onclick='moveTo(1)'>sign up</button>
                    <button class = 'btn log-in' onclick='moveTo(2)'>log in</button>";
                }
            ?>
        </div>
        <!-- end of side navbar -->

        <!-- fullscreen modal -->
        <div id = "modal"></div>
        <!-- end of fullscreen modal -->

        <!-- body content  -->
        <section class = "services sec-width" id = "services">
            <div class = "title">
                <h2>services</h2>
            </div>
            <div class = "services-container">
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-utensils"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Food Service/ Food Runner</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-swimming-pool"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Refreshment</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-broom"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Housekeeping</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-door-closed"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Room Security</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
            </div>
        </section>
        
        <div class = "book" id = "booking">
        <?php
            if(isset($_SESSION["guest_id"])) {
                echo '<form class = "book-form" action="includes/makeBooking.php" method="POST">
                            <div class = "form-item">
                            <label for = "checkin-date">Check In Date: </label>
                            <input type = "date" id = "chekin-date" name = "checkin_date" required>
                        </div>
                        <div class = "form-item">
                            <label for = "checkout-date">Check Out Date: </label>
                            <input type = "date" id = "chekout-date" name = "checkout_date" required>
                        </div>
                        <div class = "form-item">
                            <label for = "room-type">Room Type: </label>
                            <select name="room_type" id="room-type">
                                <option value="1">Standard</option>
                                <option value="2">Deluxe</option>
                                <option value="3">Presidential</option>
                            </select>
                        </div>
                        <div class = "form-item">
                            <label for = "no_of_room"># of Rooms: </label>
                            <input type = "number" id = "no_of_room" name = "quantity" min=1 max=5 value=1 required>
                        </div>
                        <div class = "form-item">
                            <label for = "message">Any special requests / message?</label>
                            <textarea name="message" id="message" cols="30" rows="6" placeholder="Write if you need any special requests or leave any messages to us."></textarea>
                        </div>
                        <div class = "form-item button-container">
                            <input type = "submit" class = "btn" value = "Book Now" name = "make_booking">
                        </div>
                    </form>';
            }
            else {
                echo "<div>
                    <p align='center'>To make a booking, you need to have an account first</p>
                    <br>
                    <button class = 'btn sign-up' onclick='moveTo(1)'>sign up</button>
                    <button class = 'btn log-in' onclick='moveTo(2)'>log in</button>
                </div>";
            }
        ?>
        </div>

        <section class = "rooms sec-width" id = "rooms">
            <div class = "title">
                <h2>rooms</h2>
            </div>
            <div class = "rooms-container">
                <?php
                    include 'includes/dbConfig.php';

                    $sql = "SELECT * FROM `room_type`";

                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<article class = "room">
                                <div class = "room-image">
                                    <img src = "../images/'.$row['image'].'" alt = "room image">
                                </div>
                                <div class = "room-text">
                                    <h3>'.$row['name'].'</h3>
                                    <ul>
                                        <li>
                                            <i class = "fas fa-arrow-alt-circle-right"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li>
                                            <i class = "fas fa-arrow-alt-circle-right"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                        <li>
                                            <i class = "fas fa-arrow-alt-circle-right"></i>
                                            Lorem ipsum dolor sit amet.
                                        </li>
                                    </ul>
                                    <p>'.$row['description'].'</p>
                                    <p class = "rate">
                                        <span>$ '.$row['rate_per_night'].' /</span> Per Night
                                    </p>
                                    <br>
                                    <p>NOTE: Maximum of '.$row['total_occupants'].' occupants.</p>
                                    <br>
                                    <button type = "button" class = "btn">book now</button>
                                </div>
                            </article>';
                        }
                    }
                    else {
                        echo "Sorry. Rooms cannot be displayed at the moment.";
                    }
                ?>
            </div>
        </section>


        <section class = "customers" id = "customers">
            <div class = "sec-width">
                <div class = "title">
                    <h2 style="color: white">reviews</h2>
                </div>
                <div class = "customers-container">
                    <?php
                        $sql = "SELECT rw.`title`, rw.`comment`, rw.`stars`, CONCAT(gt.`first_name`, ' ', gt.`last_name`) AS 'full_name', gt.`profile_pic`
                        FROM `review` rw 
                        JOIN `booking` bg
                        ON rw.`booking_id` = bg.`booking_id`
                        JOIN `guest` gt
                        ON bg.`guest_id` = gt.`guest_id`
                        WHERE rw.`stars` BETWEEN 4 AND 5
                        ORDER BY bg.`check_out`
                        LIMIT 3";

                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class = "customer">
                                    <div class = "rating">';
                                
                                for ($i = 0; $i < $row['stars']; $i++) {
                                    echo '<span><i class = "fas fa-star"></i></span>';
                                }
                                        
                                echo '</div>
                                    <h3>'.$row['title'].'</h3>
                                    <p>'.$row['comment'].'</p>
                                    <img src = "../guests/'.$row['profile_pic'].'" alt = "customer image">
                                    <span>'.$row['full_name'].'</span>
                                </div>';
                            }
                        }
                        else {
                            echo "Sorry. Reviews cannot be displayed at the moment.";
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- end of body content -->
        
        <!-- footer -->
        <?php include '../static/footer.html'; ?>
        <!-- end of footer -->
        
        <script src="../script/main.js"></script>
    </body>
</html>