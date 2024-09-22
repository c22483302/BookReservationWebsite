<?php
session_start();
include("connection.php");
include("functions.php");

$userdata = checklogin($conn);

$sql = "SELECT b.isbn, b.booktitle, b.author, b.edition, b.year, c.categorydescription, b.reserved, r.username
FROM books b
LEFT JOIN categories c ON b.categoryid = c.categoryid
LEFT JOIN reservations r ON b.isbn = r.isbn
LEFT JOIN users u ON r.username = u.username
WHERE b.reserved = 'Y'";
$result = $conn->query($sql);
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
            <h1>Reserved</h1>
            <?php
            if ($result && $result->num_rows > 0){
                // Output data of each row in a table format
                echo '<table>';
                echo '<tr>';
                echo '<th>ISBN</th>';
                echo '<th>Book Title</th>';
                echo '<th>Author</th>';
                echo '<th>Edition</th>';
                echo '<th>Year</th>';
                echo '<th>Category Description</th>';
                echo '<th>Reservation</th>';
                echo '</tr>';

                while($row = $result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>' . $row["isbn"] . '</td>';
                    echo '<td>' . $row["booktitle"] . '</td>';
                    echo '<td>' . $row["author"] . '</td>';
                    echo '<td>' . $row["edition"] . '</td>';
                    echo '<td>' . $row["year"] . '</td>';
                    echo '<td>' . $row["categorydescription"] . '</td>';
                    ?>
                    <form method="post" action="reserve.php">
                        <td><input type="submit" name="remove" value="Remove"></td>
                    </form>
                    <?php
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo "0 results";
            }
            ?>

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