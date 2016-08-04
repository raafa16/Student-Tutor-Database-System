<!DOCTYPE html>
<html>

<head>
    <title>Add End Date</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>

<?php
include('t_session.php');
?>

<?php

if (isset($_POST['submit']))
{
    $user_id_st = $_POST['submit'];
    /*echo $user_id_st;*/
}

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Add Student End Date:
</h2>

<div id="main">
    <div id="login">
        <form action="end.php" method="post">
        <label style="text-decoration: underline; font-weight: bold">Add End Date :</label>
        <br>
        <br>
        <input id="date" name="End_date" placeholder="End Date" type="date" style = "width: 30%">
        <br>
        <br>

        <?php

            echo "<button name ='add' type='submit' value = $user_id_st >Add End Date</button>";

        ?>
            </form>
    </div>
</div>


</html>