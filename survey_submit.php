<!DOCTYPE html>

<html>
<head>
    <title>Submitted</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: blanchedalmond">


<?php
include('session.php');
?>

    <!--<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>-->

<?php

if (isset($_POST['survey']) )
{
    /*$login_session;*/

    $value = $_POST['survey'];/*teacher user id*/
    $name = $login_session;/*login user name*/
    /*echo $value;
    echo $name;*/

    $t_user_id = $value;
    $st_user_name = $name;

    //else
    {
        $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
        $db = mysql_select_db("tuition", $connection) or die(mysql_error());

        $friendly = $_POST['list1'];
        $recommend = $_POST['list2'];
        $punctual = $_POST['list3'];
        $efficient = $_POST['list4'];
        $rating = $_POST['list5'];
        $comment = $_POST['Comment'];

        $sql = "SELECT User_ID FROM student WHERE Username = '$st_user_name' ";
        $id = mysql_query($sql);

        while($row = mysql_fetch_array($id))
        {
            $st_user_id = $row['User_ID'];
        }

        /*echo $st_user_id;
        echo "<br>";
        echo $t_user_id;
        echo "<br>";
        echo $friendly;//1
        echo "<br>";
        echo $recommend;//2
        echo "<br>";
        echo $punctual;//3
        echo "<br>";
        echo $efficient;//4
        echo "<br>";
        echo $rating;//rating
        echo "<br>";
        echo $comment;//comments
        echo "<br>";
        echo date("Y/m/d");*/

        $sql2 = "INSERT INTO survey (User_ID_ST, User_ID_T, Date, q1_yes_no,
                q2_yes_no, q3_yes_no, q4_yes_no, Comments, Rating) VALUES ($st_user_id, $t_user_id, CURDATE(),
                  '$friendly', '$recommend', '$punctual', '$efficient', '$comment', $rating)";

        mysql_query($sql2) or die(mysql_error());

        $sql3 = "SELECT AVG(Rating) FROM survey WHERE User_ID_T = $t_user_id";
        $id3 = mysql_query($sql3) or die(mysql_error());

        while($row = mysql_fetch_array($id3))
        {
            $avg_rating = $row['AVG(Rating)'];
        }

        $sql4 = "UPDATE teacher SET Rating = $avg_rating WHERE User_ID = $t_user_id ";
        $id4 = mysql_query($sql4)or die(mysql_error());

    }

}

?>


<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Thank You For Your Time!!
</h2>

<?php
header('Refresh: 5; URL = profile.php');
?>

 </body>
</html>