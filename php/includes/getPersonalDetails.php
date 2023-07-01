<div class='inner-container'>
    <h2>Personal Details</h2>
    <br>
    <?php
        $sql = "SELECT * FROM `guest` WHERE `guest_id` = '$guest_id';";

        $result = $conn->query($sql);
            
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form>
                <label class='form-label'>First Name</label>
                <input type='text' name='fname' placeholder='Enter your first name' required value='".$row['first_name']."'>
                <label class='form-label'>Last Name</label>
                <input type='text' name='lname' placeholder='Enter your last name' required value='".$row['last_name']."'>
                <label class='form-label'>Date of Birth</label>
                <input type='date' name='dob' placeholder='Enter your date of birth' required value='".$row['dob']."'>
                <label class='form-label'>Contact Number</label>
                <input type='text' name='contact' placeholder='Enter your contact number' required value='".$row['contact_number']."'>
                <label class='form-label'>Email Address</label>
                <input type='text' name='email' placeholder='Enter your email address' required value='".$row['email']."'>
                <input type='submit' name='update' value='Save Changes' style='background-color: rgb(120,66,131)'>
            </form>";
        }
        else {
            echo "<p>You cannot update your personal details at this moment.</p>";
        }
    ?>
</div>