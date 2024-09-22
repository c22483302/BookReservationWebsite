<?php

function checklogin($conn)
{
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $query = "select * from users where username = '$username' limit 1";
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $userdata = mysqli_fetch_assoc($result);
            return $userdata;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}