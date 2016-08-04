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

    label
    {
        text-decoration: underline;
        font-weight: bold;
    }

    input[type=date]{
        width:99.5%;
        padding:10px;
        margin-top:8px;
        border:1px solid #ccc;
        padding-left:5px;
        font-size:16px;
        font-family:raleway
    }


</style>

<html>
<head>
    <title>Modify</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Modify:
</h2>

<?php
include('t_session.php');
?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<?php

if(isset($_POST['submit']))
{
    $userid = $_POST['submit'] ;

    $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
    $db = mysql_select_db("tuition", $connection) or die(mysql_error());

    $sql1 = "SELECT * FROM teacher WHERE User_ID = $userid ";

    $id1 = mysql_query($sql1)or die(mysql_error());

    while($row1 = mysql_fetch_array( $id1 ))
    {
        $first_name = $row1['First_name'];
        $last_name = $row1['Last_name'];
        $age = $row1['Age'];
        $phone_number = $row1['Phone_number'];
        $address = $row1['Address'];
        $days_week = $row1['Days_per_week'];
        $salary = $row1['Salary_per_subject'];
        $salary_type = $row1['Salary_type'];
    }
}

?>


<body style="background-color: blanchedalmond">
<div id="main" >
    <div id="login" style="background-color:#FEFFED;
         text-align: justify;
         border-radius:40px 40px 0 0;
         margin:50px -10px;">

        <form action="t_change.php" method="post">

            <br>
            <br>

            <label>First name :</label>
            <br>
            <input id="first_name" name="First_name" placeholder = <?php echo "$first_name"; ?> type="text">
            <br>
            <br>
            <label>Last name :</label>
            <br>
            <input id="last_name" name="Last_name" placeholder = <?php echo "$last_name"; ?> type="text">
            <br>
            <br>
            <label>Age :</label>
            <br>
            <input id="age" name="Age" placeholder = <?php echo "$age"; ?> type="number">
            <br>
            <br>
            <label>Phone Number :</label>
            <br>
            <input id="number" name="Number" placeholder = <?php echo "$phone_number"; ?> type="tel">
            <br>
            <br>
            <label>Address :</label>
            <br>
            <input id="address" name="Address" placeholder = <?php echo "$address"; ?> type="text">
            <br>
            <br>
            <label>Days Per Week :</label>
            <br>
            <input id="dpw" name="Dpw" placeholder = <?php echo "$days_week"; ?> type="number">
            <br>
            <br>
            <label>Salary :</label>
            <br>
            <input id="salary" name="Salary" placeholder = <?php echo "$salary"; ?> type="number">
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

            <label>Current Subjects Offered List :</label>

            <ul>
                <?php

                $sql2 = "SELECT * FROM t_subjects WHERE User_ID = $userid ";

                $id2 = mysql_query($sql2)or die(mysql_error());

                while($row2 = mysql_fetch_array( $id2 ))
                {
                    echo "<li style='font-size: 15px'>";
                    echo $row2['Type'];
                    echo "</li>";
                }

                ?>
            </ul>
            <br>
            <br>

            <label>Add to Subjects :</label>
            <br>
            <input id="physics" name="sub1[]" value="Physics"  type="checkbox">Physics
            <input id="chemistry" name="sub1[]" value ="Chemistry" type="checkbox">Chemistry
            <input id="math" name="sub1[]" value ="Math" type="checkbox">Math
            <br>
            <input id="biology" name="sub1[]" value = "Biology" type="checkbox">Biology
            <input id="science" name="sub1[]" value="Science" type="checkbox">Science
            <input id="economics" name="sub1[]" value = "Economics" type="checkbox">Economics
            <input id="accounting" name="sub1[]" value = "Accounting" type="checkbox">Accounting
            <br>
            <br>

            <label>Remove from Subjects :</label>
            <br>
            <input id="physics" name="sub2[]" value="Physics"  type="checkbox">Physics
            <input id="chemistry" name="sub2[]" value ="Chemistry" type="checkbox">Chemistry
            <input id="math" name="sub2[]" value ="Math" type="checkbox">Math
            <br>
            <input id="biology" name="sub2[]" value = "Biology" type="checkbox">Biology
            <input id="science" name="sub2[]" value="Science" type="checkbox">Science
            <input id="economics" name="sub2[]" value = "Economics" type="checkbox">Economics
            <input id="accounting" name="sub[]" value = "Accounting" type="checkbox">Accounting
            <br>
            <br>
            <br>

            <label>Current Regions Covered :</label>

            <ul>
                <?php

                $sql3 = "SELECT * FROM region_covered_teacher WHERE User_ID = $userid ";

                $id3 = mysql_query($sql3)or die(mysql_error());

                while($row3 = mysql_fetch_array( $id3 ))
                {
                    echo "<li style='font-size: 15px'>";
                    echo $row3['Regions'];
                    echo "</li>";
                }

                ?>
            </ul>
            <br>
            <br>

            <label>Add Region :</label>
            <br>
            <input id="dhanmondi" name="reg1[]" value="Dhanmondi"  type="checkbox">Dhanmondi
            <input id="gulshan" name="reg1[]" value ="Gulshan" type="checkbox">Gulshan
            <input id="farmgate" name="reg1[]" value ="Farmgate" type="checkbox">Farmgate
            <br>
            <input id="lalmatia" name="reg1[]" value = "Lalmatia" type="checkbox">Lalmatia
            <input id="mohammadpur" name="reg1[]" value="Mohammadpur" type="checkbox">Mohammadpur
            <input id="moghbazar" name="reg1[]" value = "Moghbazar" type="checkbox">Moghbazar

            <br>
            <br>

            <label>Remove Region :</label>
            <br>
            <input id="dhanmondi" name="reg2[]" value="Dhanmondi"  type="checkbox">Dhanmondi
            <input id="gulshan" name="reg2[]" value ="Gulshan" type="checkbox">Gulshan
            <input id="farmgate" name="reg2[]" value ="Farmgate" type="checkbox">Farmgate
            <br>
            <input id="lalmatia" name="reg2[]" value = "Lalmatia" type="checkbox">Lalmatia
            <input id="mohammadpur" name="reg2[]" value="Mohammadpur" type="checkbox">Mohammadpur
            <input id="moghbazar" name="reg2[]" value = "Moghbazar" type="checkbox">Moghbazar

            <br>
            <br>

            <label>Add New Degree :</label>
            <ol>
                <li><select name="deg">
                        <option value="">---------</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Graduate">Graduate</option>
                        <option value="A-Level/HSC">A-Level/HSC</option>
                    </select></li>
                <input id="year" name="year" placeholder="year passed e.g(1992)" type="number">
                <br>
                <br>
                <select name="inst">
                    <option value="">---------</option>
                    <option value="NSU">NSU</option>
                    <option value="IBA">IBA</option>
                    <option value="DU">DU</option>
                    <option value="IUB">IUB</option>
                    <option value="AIUB">AIUB</option>
                    <option value="BUET">BUET</option>
                    <option value="English Medium">English Medium</option>
                    <option value="National Curriculum">National Curriculum</option>
                </select>
                </ol>

                <br>
                <br>
                <br>

                <?php
                echo "<button name ='submit' type='submit' value = $userid >Update</button>";
                ?>

        </form>

        </div>
    </div>

</body>
</html>