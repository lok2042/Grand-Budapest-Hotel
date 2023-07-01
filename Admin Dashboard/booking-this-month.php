<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel = "icon" href = "../images/logo.jpg" type = "image/jpg">
    <title>Booking This Week | GBH</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="dashboard.html">Admin</a>
          <a class="active_link href='#'">Booking This Month</a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a>
          <a href="#">
            <img width="30" src="assets/avatar.svg" alt="" />
          </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
            <?php
              include '../php/includes/dbConfig.php';

              $sql = "SELECT bg.`check_in`, bg.`check_out`, bg.`check_in`, rt.`name`, bg.`quantity`,
              DATEDIFF(bg.`check_out`, bg.`check_in`) AS `nights`,
              (DATEDIFF(bg.`check_out`, bg.`check_in`) * rt.`rate_per_night` * bg.`quantity`) AS `price`, 
              CONCAT(gt.`first_name`, ' ', gt.`last_name`) AS 'full_name', gt.`contact_number`, gt.`email`, bg.`message`
              FROM `guest` gt
              JOIN `booking` bg
              ON bg.`guest_id` = gt.`guest_id`
              JOIN `room_type` rt
              ON bg.`room_type_id` = rt.`room_type_id`
              WHERE (bg.`check_in` BETWEEN '2022-03-01' AND '2022-03-31')
              OR (bg.`check_out` BETWEEN '2022-03-01' AND '2022-03-31')
              ORDER BY bg.`check_in`;";

              $result = $conn->query($sql);

              if($result->num_rows > 0) {
                
                echo "<div class='grid_container'>";
                $tempDate = ""; 

                while($row = $result->fetch_assoc()) {

                  if ($tempDate == "" or $tempDate != $row['check_in']) {
                    $date = strtotime($row['check_in']);
                    $formatted_date = date('D, d M Y', $date);

                    echo "<h2 class='res_date_heading'>".$formatted_date."</h2>";
                    $tempDate = $row['check_in'];
                  }

                  echo "<div class='res_item_div'>";

                  if ($tempDate == $row['check_in']) {
                    echo "<table class='res-item-table'>
                      <tr class='res-item-row'>
                        <th>Check In</th>
                        <td>".$row['check_in']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Check Out</th>
                        <td>".$row['check_out']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Room Type</th>
                        <td>".$row['name']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th># of Rooms</th>
                        <td>".$row['quantity']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th># of Nights</th>
                        <td>".$row['nights']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Price</th>
                        <td>$".$row['price']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Guest's Name</th>
                        <td>".$row['full_name']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Contact No.</th>
                        <td>".$row['contact_number']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Email</th>
                        <td>".$row['email']."</td>
                      </tr>
                      <tr class='res-item-row'>
                        <th>Message</th>
                        <td>".$row['message']."</td>
                      </tr>
                    </table>
                    <button class='btn edit_btn'>Edit</button>
                    <button class='btn remove_btn'>Remove</button>";
                  }
                  echo "</div>";
                }
                echo "</div>";
              }
              else {
                echo "No Booking this week. :(";
              }

              $conn->close();
            ?>
        </div>
      </main>
      

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <h1>Admin @ GBH</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          <div class="sidebar__link">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <a href="#">Admin Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="#">Company Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="#">Employee Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-archive"></i>
            <a href="#">Warehouse</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-handshake-o"></i>
            <a href="#">Contracts</a>
          </div>
          <h2>LEAVE</h2>
          <div class="sidebar__link">
            <i class="fa fa-question"></i>
            <a href="#">Requests</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-sign-out"></i>
            <a href="#">Leave Policy</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="#">Special Days</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-files-o"></i>
            <a href="#">Apply for leave</a>
          </div>
          <h2>PAYROLL</h2>
          <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="#">Payroll</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-briefcase"></i>
            <a href="#">Paygrade</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="#">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>
