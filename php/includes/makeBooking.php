<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['make_booking'])) {
        $checkin_date = $_POST['checkin_date'];
        $checkout_date = $_POST['checkout_date'];
        $room_type = $_POST['room_type'];
        $quantity = $_POST['quantity'];
        $message = $_POST['message'];
        $guest_id = $_SESSION["guest_id"];

        include 'dbConfig.php';

        // Sum the number of rooms already booked
        $sql = "SELECT SUM(`quantity`) AS 'occupied_rooms'
        FROM `booking`
        WHERE `room_type_id` = '$room_type'
        AND (`check_in` BETWEEN '$checkin_date' AND '$checkout_date'
        OR `check_out` BETWEEN '$checkin_date' AND '$checkout_date');";

        // Count total rooms available
        $sql .= "SELECT COUNT(`room_no`) AS 'total_rooms'
        FROM `room`
        WHERE `room_type_id` = '$room_type';";

        $arr = [];
        $curr = 0;
        if (mysqli_multi_query($conn, $sql)) {
            do {
                if ($result = mysqli_store_result($conn)) {
                    while ($row = mysqli_fetch_row($result)) {
                        $arr[$curr] = $row[0];
                }
                mysqli_free_result($result);
            }
                if (mysqli_more_results($conn)) {
                    $curr++;
                }
            } while (mysqli_next_result($conn));
        }
        else {
            $message = "Sorry, our server is currently facing a downturn. Try again soon.";
        }

        $occupied_rooms = (int) $arr[0];
        $total_rooms = (int) $arr[1];
        $available_rooms = $total_rooms - $occupied_rooms;

        $occupied_rooms = (int) $arr[0];
        $total_rooms = (int) $arr[1];
        $available_rooms = $total_rooms - $occupied_rooms;

        if ($available_rooms > $quantity) {
            $sql = "INSERT INTO `booking` (`check_in`, `check_out`, `room_type_id`, `quantity`, `message`, `last_updated`, `guest_id`)
            VALUES ('$checkin_date', '$checkout_date', '$room_type', '$quantity', '$message', now(), '$guest_id');";

            if($conn->query($sql) === TRUE) {
                $success = true;
            }
    
            $conn->close();
    
            if($success) {
                $message = "Your booking has been saved. We hope to see you soon.";
            }
            else {
                $message = "Sorry, your booking cannot be made at the moment. Contact support for help.";
            }
        } 
        else {
            $message = "Sorry, we're overbooked.";
        }

        echo "<script>
            alert('".$message."');
            location = '../home.php#booking';
        </script>";
    }
?>