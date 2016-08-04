<!DOCTYPE html>

<style>

    h4
    {
        font-size: 20px;
        text-shadow: 1px 1px #888888;
        font-family: sans-serif;
        text-decoration: underline;
        color: #CC0000;
        font-weight: bold;
        margin:20px ;
    }

    h5
    {
        font-size: 18px;
        font-family: sans-serif;
        text-decoration: none;
        color: black;
        margin:20px ;
    }

    li
    {
        font-family: sans-serif;
        text-decoration: none;
        color: #CC0000;
        margin:20px ;
        font-weight: bold;

    }

</style>

<html>
<head>
    <title>Track</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Add Student:
</h2>

<?php
include('t_session.php');
?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 07-Dec-14
 * Time: 12:55 AM
 */
if (isset($_POST['submit']) )
    $value = $_POST['submit'];
//echo $value;
?>
<div id="main">
<div id="login">
<form action="add.php" method="post">

    <label style="text-decoration: underline; font-weight: bold">Start date :</label>
    <br>
    <input id="date" name="Date" placeholder="Tuition Start Date" type="date">
    <br>
    <br>

    <label style="text-decoration: underline; font-weight: bold">Negotiated Salary:</label>
    <br>
    <input id="salary" name="Salary" placeholder="Salary" type="number" style = "width: 30%">
    <br>
    <br>

    <label>Salary type :</label>
    <br>
    <select name="list4">
        <option value="">---------</option>
        <option value="daily">Daily</option>
        <option value="monthly">Monthly</option>
    </select>
    <br>
    <br>

    <?php


    echo "<button name ='submit' type='submit' value = $value >Add to list</button>";


    ?>

</form>
    </div>
    </div>


</body>
</html>