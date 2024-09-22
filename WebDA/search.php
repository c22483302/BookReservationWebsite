<?php
session_start();
include("connection.php");
include("functions.php");

$userdata = checklogin($conn);

$booktitle = '';
$author = '';
$categoryid = '';
$result = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // gets user input from search form
    $booktitle = $_POST['booktitle'];
    $author = $_POST['author'];
    $categorydescription = $_POST['categorydescription'];

    $sql = "SELECT b.isbn, b.booktitle, b.author, b.edition, b.year, c.categorydescription, b.reserved, r.username
            FROM books b
            LEFT JOIN categories c ON b.categoryid = c.categoryid
            LEFT JOIN reservations r ON b.isbn = r.isbn
            LEFT JOIN users u ON r.username = u.username
            WHERE 1";

    if (!empty($booktitle)) {
        $sql .= " AND booktitle LIKE '%$booktitle%'";
    }

    if (!empty($author)) {
        $sql .= " AND author LIKE '%$author%'";
    }

    if (!empty($categorydescription)) {
        $sql .= " AND categorydescription LIKE '%$categorydescription%'";
    }

    $result = $conn->query($sql);
}

else {
    // shows entire list of books before user input
    $sql = "SELECT b.isbn, b.booktitle, b.author, b.edition, b.year, c.categorydescription, b.reserved, r.username
    FROM books b
    LEFT JOIN categories c ON b.categoryid = c.categoryid
    LEFT JOIN reservations r ON b.isbn = r.isbn
    LEFT JOIN users u ON r.username = u.username
    WHERE 1";
    $result = $conn->query($sql);
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
                <li><a href="reserve.php">Reserved</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Search</h1>

            <form method="post" action="search.php">
                    <input type="text" placeholder="Title" name="booktitle" value="<?php echo $booktitle; ?>">
                    <input type="text" placeholder="Author" name="author" value="<?php echo $author; ?>">  

                    <label for="category"></label>
                    <select name="categorydescription" id="categorydescription">
                        <option value="">All Categories</option>
                        <option value="Health">Health</option>
                        <option value="Business">Business</option>
                        <option value="Biography">Biography</option>
                        <option value="Technology">Technology</option>
                        <option value="Travel">Travel</option>
                        <option value="Self-Help">Self-Help</option>
                        <option value="Cookery">Cookery</option>
                        <option value="Fiction">Fiction</option>
                    </select>

                <input type="submit" value="Search">
            </form>

            <?php
            if ($result && $result->num_rows > 0){
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
                    if ($row["reserved"] == 'N') {
                        ?>
                        <form method="post2" action="search.php">
                            <td><input type="submit" name="reserved" value="Reserve"></td>
                        </form>
                    <?php
                    }
                    else {
                        echo '<td>Reserved</td>';
                    }
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