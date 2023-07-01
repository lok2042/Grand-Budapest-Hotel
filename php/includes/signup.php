<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
        
        // Personal Details
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        // Profile pic
        $fileName = $_FILES['profile_pic']['name'];      // name
        $type = pathinfo($fileName, PATHINFO_EXTENSION); // file extension
        $size = $_FILES['profile_pic']['size'];          // size
        $max_size = 16000000;                            // max size is 16 MB
        $tmp_name = $_FILES['profile_pic']['tmp_name'];  // temporary location

        // Username and Password
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];

        // Check password and re-password
        if(strcmp($pass, $re_pass) == 0) {

            $allowTypes = array('jpg','png','jpeg');
            if(in_array($type, $allowTypes) && $size <= $max_size) {

                // Rename filename to username.extension
                $fileName = $user.".".$type;
                $target_file = '../../guests/'.$fileName;
                
                if(move_uploaded_file($tmp_name, $target_file)) {
                    
                    include 'dbConfig.php';

                    // Record guest's personal details
                    $sql = "INSERT INTO `guest` (`first_name`, `last_name`, `dob`, `contact_number`, `email`, `profile_pic`) 
                    VALUES ('$fname', '$lname', '$dob', '$contact', '$email', '$fileName');";
                    
                    if($conn->query($sql) === TRUE) {

                        $guest_id = $conn->insert_id;
                        $encrypted_password = md5($pass);

                        // Record guest's account credentials
                        $sql = "INSERT INTO `account` (`username`, `password`, `last_updated`, `guest_id`) 
                        VALUES ('$user', '$encrypted_password', now(), '$guest_id');";

                        // Registration processing
                        $success = false;
                        if($conn->query($sql) === TRUE) {
                            $success = true;
                            session_start();
                            $_SESSION["guest_id"] = $guest_id;
                        }
                        $conn->close();
            
                        if($success == true) {
                            echo "<script>
                                    alert('Sign up successful!')
                                    location = '../profile.php'
                                </script>";
                        }
                        else {
                            echo "<script>
                                    alert('Sorry, your account cannot be registered.')
                                    location = '../../static/sign_up.html'
                                </script>";
                        }
                    }
                    else {
                        echo "<script>
                                alert('Sorry, your personal details cannot be saved.')
                                location = '../../static/sign_up.html'
                            </script>";
                    }
                }
                else {
                    echo "<script>
                            alert('Sorry. There is an error when uploading profile pic onto our server.')
                            location = '../../static/sign_up.html'
                        </script>";
                }
            }
            else {
                echo "<script>
                        alert('Your profile picture must be of jpg, png, or jpeg types with a maximum size of 16 MB.')
                        location = '../../static/sign_up.html'
                    </script>";
            }
        }
        else {
            echo "<script>
                    alert('Your passwords do not match!')
                    location = '../../static/sign_up.html'
                </script>";
        }
    }
?>