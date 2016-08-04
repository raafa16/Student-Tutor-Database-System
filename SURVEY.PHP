<!DOCTYPE html>

<script>

    function validateForm() {
        var a = document.forms["form"]["list1"].value;
        var b = document.forms["form"]["list2"].value;
        var c = document.forms["form"]["list3"].value;
        var d = document.forms["form"]["list4"].value;
        var e = document.forms["form"]["list5"].value;
        var f = document.forms["form"]["Comment"].value;

        if (!f)
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else if(!a)
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else if(!b)
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else if(!c)
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else if(!d)
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else if(!e )
        {
            alert("Please Do not Leave any fields empty!!!");
            return false;
        }

        else
        {
            return true;
        }
    }

</script>

<style>

    h4
    {
        font-size: 20px;
        text-shadow: 1px 1px #888888;
        font-family: sans-serif;
        text-decoration: underline;
        color: #CC0000;
        font-weight: bold;
        //margin:20px ;
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

    }

    table
    {
        margin:20px;
        border: 3px solid red;
        box-shadow: 2px 2px #888888;

    }

    th
    {
        border-bottom: black solid;
        font-size: 20px;
    }

    td
    {
        padding:10px 25px 10px 25px;
    }

    tr td:first-child /*(puts the elements of the first column slightly to the left)*/
    {
        padding-left:0px;
    }

</style>

<html>
<head>
    <title>Survey</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    USER SURVEY:
</h2>

<?php

include('session.php');

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<?php

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("tuition", $connection) or die(mysql_error());

if (isset($_POST['survey']) )
    $value = $_POST['survey'];
//echo $value;

$sql1 = "SELECT * FROM teacher WHERE User_ID = $value ";
$id1 = mysql_query($sql1)or die(mysql_error());

while($row1 = mysql_fetch_array( $id1 ))
{
    $username = $row1['Username'];
    $first_name = $row1['First_name'];
    $last_name = $row1['Last_name'];
}

?>

<form name = form action="survey_submit.php" onsubmit='return validateForm()' method="post">

<div id="main">
    <div id="login">
        <h4 style = " text-decoration: underline; font-size: 30px">Survey</h4>

        <label style = "font-weight: bold"> 1) Is <?php echo $first_name ?> a friendly person? </label>
        <br>
        <br>
        <select name="list1">
            <option value="">---------</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <br>
        <br>

        <label style = "font-weight: bold"> 2) Would you recommend <?php echo $first_name ?>
            to someone else? </label>
        <br>
        <br>
        <select name="list2">
            <option value="">---------</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <br>
        <br>

        <label style = "font-weight: bold"> 3) Is <?php echo $first_name ?> punctual? </label>
        <br>
        <br>
        <select name="list3">
            <option value="">---------</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <br>
        <br>

        <label style = "font-weight: bold"> 4) Would you say <?php echo $first_name ?> used his/her allocated time
            effectively? </label>
        <br>
        <br>
        <select name="list4">
            <option value="">---------</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <br>
        <br>
        <label style = "font-weight: bold">Any additional comments about <?php echo $first_name ?>? </label>
        <br>
        <textarea rows="5" cols="40" id = about name = Comment></textarea>
        </textarea>

        <br>
        <br>

        <label style = "font-weight: bold"> 5) Your final rating on <?php echo $first_name ?> ?</label>
        <br>
        <br>
        <select name="list5">
            <option value="">---------</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
        </select>

        <?php

        echo "<h4>";
        echo "<td colspan='2'>";
        echo "<button name ='survey' type='submit' value = $value style = 'width: 50%'>
        Submit survey on $first_name</button>";
        echo "</h4>";

        ?>

        </div>
    </div>

</form>

</body>
</html>