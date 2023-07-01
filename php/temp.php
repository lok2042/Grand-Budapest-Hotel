<?php
    include 'includes/dbConfig.php';

    $sql = "SELECT SUM(`quantity`) AS 'occupied_rooms'
    FROM `booking`
    WHERE `room_type_id` = '1'
    AND (`check_in` BETWEEN '2022-03-01' AND '2022-03-31'
    OR `check_out` BETWEEN '2022-03-01' AND '2022-03-31');";

    $sql .= "SELECT COUNT(`room_no`) AS 'total_rooms'
    FROM `room`
    WHERE `room_type_id` = '1';";

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
    
    mysqli_close($conn);

    $occupied_rooms = (int) $arr[0];
    $total_rooms = (int) $arr[1];
    $available_rooms = $total_rooms - $occupied_rooms;
    print_r($arr);
    echo "<br>";
    echo "Occupied: ".$occupied_rooms."<br>";
    echo "Total: ".$total_rooms."<br>";
    echo "Available: ".$available_rooms."<br>";

    $quantity = 100;

    if ($available_rooms < (int) $quantity) {
        $message = "Sorry, we're currently overbooked. Try again soon.";
    } 
    else {
        $message = "Your booking has been saved. We hope to see you soon.";
    }
    echo $message;
?>