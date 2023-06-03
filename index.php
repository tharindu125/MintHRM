<?php 

    include 'connect.php';
    
    if(isset($_POST['submit'])){

        // Retrieve  values
        $guestName = $_POST['guestName'];
        $roomNumber = $_POST['roomNum'];
        $mobileNumber = $_POST['mobileNum'];
        $email = $_POST['email'];
        $dishes = $_POST['dishes'];

        // non-empty 
        if (empty($guestName) || empty($roomNumber) || empty($mobileNumber) || empty($email)) {
            die("All fields are required");
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email address");
        }

        // Mobile number validation
        if (!preg_match("/^[0-9]{10}$/", $mobileNumber)) {
            die("Invalid mobile number");
        }

        // Concatenate selected checkbox values into a string
        $dishesString = implode(', ', $dishes);

        // send data in to the sql database
        $sql = "insert into `guest_details` (guestName, roomNumber, mobileNumber, email, selectedDishes) values ('$guestName', '$roomNumber', '$mobileNumber', '$email', '$dishesString' )";
        $result = mysqli_query($Connectdb, $sql);
        if ($result){
            echo '<script>alert("Data saved successfully");</script>';
            header('location:index.php');           
        }else{
          die(mysqli_error(($Connectdb)));
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mint Cafe & Restaurant</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>

    <body>

        <div class="container">

            <h1>Mint Cafe & Restaurant</h1>

            <form method="post" class="form">

                <div class="body01">
                    <label>Guest Name :</label><br/>
                    <input type="text" name="guestName" placeholder="Enter Guest Name">
                </div>

                <div class="body01">
                    <label>Room Number :</label><br/>
                    <input type="number" name="roomNum" placeholder="Enter Room Number">
                </div>

                <div class="body01">
                    <label>Mobile Number :</label><br/>
                    <input type="number" name="mobileNum" placeholder="Enter Mobile Number">
                </div>

                <div class="body01">
                    <label>E-mail Address :</label><br/>
                    <input type="email" name="email" placeholder="Enter e-mail">
                </div>

                <div>
                    <p>Food Cuisine</p>
                    <div class="body02">
                        <label class='body02_lbl'># Indian :</label><br/>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 01"> Test Dish 01</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 02"> Test Dish 02</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 03"> Test Dish 03</label>
                    </div>
                    <div class="body02">
                        <label class='body02_lbl'># Sri Lankan :</label><br/>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 04"> Test Dish 04</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 05"> Test Dish 05</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 06"> Test Dish 06</label>
                    </div>
                    <div class="body02">
                        <label class='body02_lbl'># Chinese :</label><br/>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 07"> Test Dish 07</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 08"> Test Dish 08</label>
                        <label><input type="checkbox" name="dishes[]" value="Test Dish 09"> Test Dish 09</label>
                    </div>
                    
                </div>

                <div class="bodybtn">
                    <button type="submit" name="submit" class="btn">Save</button>
                </div>

            </form>
        </div>
    </body>

</html>