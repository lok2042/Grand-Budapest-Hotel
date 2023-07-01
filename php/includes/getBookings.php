<div class='inner-container' style='width: 90%'>
    <h2>Bookings Made</h2>
    <br>
    <?php 
        $sql = "SELECT bg.`check_in`, bg.`check_out`, bg.`quantity`, bg.`last_updated`, rt.`name`, 
        (rt.`rate_per_night` * bg.`quantity`) AS `price`
        FROM `booking` bg
        JOIN `room_type` rt
        ON bg.`room_type_id` = rt.`room_type_id`
        WHERE bg.`guest_id` = '$guest_id';";

        $result = $conn->query($sql);
            
        $count = 1;
        if($result->num_rows > 0) {
        
            echo "<table>
                    <tr class='header-row'>
                        <th>#</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Room Type</th>
                        <th># of Rooms</th>
                        <th>Total Price</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>";

            while($row = $result->fetch_assoc()) {

                echo "<tr class='data-row'>
                    <td>".$count."</td>
                    <td>".$row['check_in']."</td>
                    <td>".$row['check_out']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['quantity']."</td>
                    <td>$".$row['price']."</td>
                    <td>".$row['last_updated']."</td>
                    <td>
                        <div class='btns-container'>
                            <button class='booking-btn review-btn'>
                                Review
                            </button>
                            <button class='booking-btn modify-btn'>
                                Modify
                            </button>
                            <button class='booking-btn cancel-booking-btn'>
                                Cancel
                            </button>
                        </div>
                    </td>
                </tr>";

                $count++;
            }
            echo "</table>";
        }
        else {
            echo "<p>You haven't made any bookings yet.</p>";
        }
    ?>
</div>