<?php
session_start();
include("connection.php");
include("functions.php");

$userdata = checklogin($conn);

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
                <li><a href="reserve.php">Reserved</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>About Us</h1>
            <p>Welcome to Arklow Library, a haven for literature enthusiasts and knowledge seekers in the heart of our vibrant community. Established with a passion for fostering a love of reading and learning, Arklow Library has been a cornerstone of education and cultural engagement since its inception. Our library is more than just a repository of books; it's a place where individuals of all ages come together to explore the vast realms of literature, embark on intellectual journeys, and connect with the rich tapestry of stories that shape our world.</p>
            <p>At Arklow Library, our dedicated team of librarians and staff are committed to providing a welcoming and inclusive environment for patrons to delve into the diverse collection of books, engage in thought-provoking events, and participate in educational programs. Whether you're a student seeking resources for academic pursuits, a family looking for exciting storytelling sessions, or a curious mind eager to explore new literary landscapes, Arklow Library is here to inspire, educate, and create a sense of community. Join us as we celebrate the joy of reading and the boundless possibilities that the world of literature unfolds.</p>
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