<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $query = "select * from users where username = '$username' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $userdata = mysqli_fetch_assoc($result);
                
                if($userdata['password'] === $password)
                {
                    $_SESSION['username'] = $userdata['username'];
                    header("Location: home.php");
                    die;
                }
            }
        }
        echo "wrong username or password";
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

                <h1>Login</h1>

                <div class="inputbox">
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn" value="Login">Login</button>
                <div class="registerlink">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
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