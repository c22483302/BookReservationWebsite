<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $addressline1 = $_POST['addressline1'];
    $addressline2 = $_POST['addressline2'];
    $city = $_POST['city'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];

    // checks if both numbers are 10 characters long and are numeric
    if (!is_numeric($telephone) || strlen($telephone) !== 10 || !is_numeric($mobile) || strlen($mobile) !== 10) {
        echo "Invalid mobile or telephone number. Please enter numeric values with 10 characters.";
        die;
    }

    // checks if password is 6 characters long and matches password confirmation
    if (strlen($password) !== 6 || $password !== $passwordconfirm) {
        echo "Invalid password. Password should be at least six characters and match the confirmation.";
        die;
    }

    // checks if username already taken
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "Username '$username' has already been taken. Please choose a different username.";
        die;
    }

    // checks if all boxes are filled and registers user
    if(!empty($username) && !empty($password) && !empty($firstname) && !empty($surname) && !empty($addressline1) && !empty($addressline2) && !empty($city) && !empty($telephone) && !empty($mobile)){
        $query = "INSERT INTO users (username, password, firstname, surname, addressline1, addressline2, city, telephone, mobile) VALUES ('$username', '$password', '$firstname', '$surname', '$addressline1', '$addressline2', '$city', '$telephone', '$mobile')";
        mysqli_query($conn, $query);

        header("Location: login.php");
        die;
    }
    else{
        echo "Invalid information";
    }
}
?>


<html>
<head>
    <title>Arklow Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
    <div class="banner">
        <div class="navbar">
            <img src="Images/logo3.png" class="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="login.php">Log In</a></li>
            </ul>
        </div>

        <div class="loginbox">
            <form method="post">

                <h1>Register</h1>

                <div class="inputbox">
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Re-enter Password" name="passwordconfirm" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="First name" name="firstname" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="Surname" name="surname" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="Address line 1" name="addressline1" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="Address line 2" name="addressline2" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="City" name="city" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="Telephone Number" name="telephone" required>
                </div>
                <div class="inputbox">
                    <input type="text" placeholder="Mobile Number" name="mobile" required>
                </div>

                <button type="submit" class="btn" value="Register">Register</button>
                <div class="registerlink">
                    <p>Have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>  


    <footer>
        <div class="footerRow">
            <div class="footerCol">
                <p class="footerText">Developed by Sergei Larionov.</p>
                <p class="footerText">Contact Us: 083 312 4053</p>
            </div>
            <div class="footerCol socialMediaFollow">
                <h2 class="socialMediaHeader">Follow Arklow Library on Social Media</h2>
                <h5 class="socialMediaStatus">Currently Unavailable</h5>
                <div class="socialMediaPictures">
                    <img src="Images/instagramLogo.png" alt="Instagram" width="40px">
                    <img src="Images/twitterLogo.png" alt="Twitter" width="40px">
                    <img src="Images/facebookLogo.png" alt="Facebook" width="40px">
                </div>
            </div>
        </div>
    </footer>

</body>
</html> 